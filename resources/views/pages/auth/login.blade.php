@extends('layouts.auth')

@section('title')
    Login
@stop
@section('content')
    <div class="login-wrap">
        <div class="login-content">
            <div class="login-header">
                <div class="login-icon"><i class="fa fa-lock fa-2x"></i></div>
                <div class="login-text">
                    <h3>Login</h3>
                    <p>Please enter your credentials to login.</p>
                </div>
            </div>
            <div class="login-form">
                @if (session()->has('success'))
                    <ul class="alert alert-success small">
                        {{session('success')}}
                    </ul>
                @endif
                @if ($errors->any())
                    <ul class="alert alert-danger small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form method='post' action="{{route('login.post')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label><b>Username</b></label>
                        <input type="text" class="form-control" name="email" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label><b>Password</b></label>
                        <input type="password" class="form-control" name="password" placeholder="password">
                    </div>

                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">LOGIN</button>

                </form>
                <div class="register-link">
                    <p>
                        <strong>
                            {{--                        <label><a href="{{ route('forgot') }}">Forgotten Password? </a></label> |--}}
                            <label><a href="{{ route('register') }}"> Register </a></label>
                        </strong>
                    </p>

                </div>
            </div>
        </div>
        <div class="footer-text">
            <p>&copy; 2021 <br/> Homecare Company</p>
        </div>
    </div>
@endsection
