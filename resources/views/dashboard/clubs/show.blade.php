@extends('dashboard.base')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4 m-auto">
                    Club Details
                </div>
                <div class="col-md-8 text-right">
                    <a class="btn btn-warning" role="button"
                       href="{{ route('dm.admin.clubs.edit', $club) }}">
                        <i class="cil-pencil"></i>
                        Edit
                    </a>
                    <a class="btn btn-success" role="button"
                       href="{{ route('dm.admin.clubs.create') }}">
                        <i class="cil-pencil"></i>
                        New
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-borderless table-responsive">
                <tr>
                    <th>Name</th>
                    <td>{{ $club->name }}</td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td><a href="{{ $club->fullDomain }}">{{ $club->fullDomain }}</a></td>
                </tr>
                <tr>
                    <th>Slogan</th>
                    <td>{{ $club->slogan }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{!! $club->description !!}</td>
                </tr>
                <tr>
                    <th>President</th>
                    <td>{{ $club->president->fullName }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $club->email }}</td>
                </tr>
                <tr>
                    <th>Phone number</th>
                    <td>{{ $club->phone_number }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
