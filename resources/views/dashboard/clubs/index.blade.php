@extends('dashboard.base')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4 m-auto">
                    Clubs
                </div>
                <div class="col-md-8 text-right">
                    <a class="btn btn-success" role="button"
                       href="{{ route('dm.admin.clubs.create') }}">
                        <i class="cil-pencil"></i>
                        New
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm table-hover table-outline mb-0">
                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>President</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($clubs as $club)
                    <tr>
                        <td>{{ $club->id }}</td>
                        <td>{{ $club->name }}</td>
                        <td><img src="{{ $club->logoUrl }}" alt="logo of {{ $club->name  }}"
                                 class="list-logo"></td>
                        <td>{{ $club->president->fullName }}</td>
                        <td>
                            <a role="button" title="Show" class="btn bg-info text-white"
                               href="{{ route('dm.admin.clubs.show', $club) }}">
                                <i class="cil-description"></i>
                            </a>
                            <a role="button" title="Edit" class="btn bg-warning text-white"
                               href="{{ route('dm.admin.clubs.edit', $club) }}">
                                <i class="cil-pencil"></i>
                            </a>
                            <a role="button" title="Delete" class="btn bg-danger text-white"
                               href="{{ route('dm.admin.clubs.destroy', $club) }}"
                               onclick="event.preventDefault(); if (confirm('Are you sure?')) document.getElementById('delete-form-{{ $loop->index }}').submit();">
                                <i class="cil-trash"></i>
                            </a>
                            <form action="{{ route('dm.admin.clubs.destroy', $club) }}"
                                  id="delete-form-{{$loop->index}}" class="hide" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">This table is empty</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
