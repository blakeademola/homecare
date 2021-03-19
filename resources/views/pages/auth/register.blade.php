@extends('layouts.auth')

@section('title')
    Register
@stop
@section('content')
    <div class="login-wrap">
        <div class="login-content">
            <div class="login-header">
                <div class="login-icon"><i class="fa fa-lock fa-2x"></i></div>
                <div class="login-text">
                    <h3>Register</h3>
                    <p>Please fill your details below.</p>
                </div>
            </div>
            <div class="login-form">
                @if ($errors->any())
                    <ul class="alert alert-danger small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form method='post' action="{{route('register.post')}}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-6">
                            <label><b>First Name</b></label>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" required>

                        </div>
                        <div class="form-group col-6">
                            <label><b>Last Name</b></label>
                            <input type="text" class="form-control" name="last_name" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label><b>Email Address</b></label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group col-6">
                            <label><b>Phone</b></label>
                            <input type="number" class="form-control" name="phone_number" min="0" placeholder="Phone" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><b>Password</b></label>
                        <input type="password" class="form-control" name="password" placeholder="password">
                    </div>

                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Register</button>

                </form>
                <div class="register-link">
                    <p>
                        <label>
                            <strong> <a href="{{ route('login') }}"><<< Back to Login </a></strong>
                        </label>

                    </p>
                </div>
            </div>
        </div>
        <div class="footer-text">
            <p>&copy; 2021 <br/> Homecare Company</p>
        </div>
    </div>
@endsection
