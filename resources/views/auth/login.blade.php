@extends('dashboard.authBase')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <h1>Login</h1>
                        <p class="text-muted">Sign In to your account</p>

                        @if($errors->has('email'))
                            @component('partials.alerts.error', ['message' => $errors->first('email')])@endcomponent
                        @endif

                        <form method="POST" action="/admin/login">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="cil-user c-icon"></i></span>
                                </div>
                                <label class="sr-only" for="email">Email</label>
                                <input class="form-control" type="email" id="email"
                                       placeholder="{{ __('E-Mail Address') }}" name="email"
                                       value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="cil-lock-locked c-icon"></i></span>
                                </div>
                                <label class="sr-only" for="password">Password</label>
                                <input class="form-control" type="password" placeholder="{{ __('Password') }}"
                                       name="password" id="password" required>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary px-4" type="submit">{{ __('Login') }}</button>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('password.request') }}"
                                       class="btn btn-link px-0">{{ __('Forgot Your Password?') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')

@endsection
