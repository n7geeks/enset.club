@extends('dashboard.base')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Club
        </div>
        <div class="card-body">
            {!! Form::model($club, ['url' => route('dm.admin.clubs.update', $club), 'method' => 'PUT', 'files' => true]) !!}

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <img src="{{ $club->logoUrl }}" alt="Logo of {{ $club->name }}" class="list-logo mb-2"> <br>
                        {!! Form::label('logo', 'Logo') !!}
                        {!! Form::file('logo', ['class' => $errors->has('logo') ? ' is-invalid' : '']) !!}
                        @error('logo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', old('name'), ['required' => '', 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('slogan', 'Slogan') !!}
                        {!! Form::text('slogan', old('slogan'), ['class' => 'form-control' . ($errors->has('slogan') ? ' is-invalid' : '')]) !!}
                        @error('slogan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) !!}
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone_number', 'Phone Number') !!}
                        {!! Form::text('phone_number', old('phone_number'), ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : '')]) !!}
                        @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', old('description'), ['required' => '', 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) !!}
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('president_id', 'President') !!}
                        {!! Form::select('president_id', $users, old('president_id'), ['required' => '', 'class' => 'form-control' . ($errors->has('president_id') ? ' is-invalid' : '')]) !!}
                        @error('president_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('domain', 'Sub-Domain Name (E.g: n7geeks)') !!}
                        {!! Form::text('domain', old('domain'), ['required' => '', 'class' => 'form-control' . ($errors->has('domain') ? ' is-invalid' : '')]) !!}
                        @error('domain')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
