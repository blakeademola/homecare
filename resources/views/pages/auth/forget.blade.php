@extends('layouts.auth')

@section('title')
    Forgot password
@stop

@section('content')

    <div class="login-wrap">
        <div class="login-content">
            <div class="login-header">
                <div class="login-icon"><i class="fa fa-lock fa-2x"></i></div>
                <div class="login-text">
                    <h3>Password reset</h3>
                    <p>
                        Please enter your email address.</p>
                </div>
            </div>
            <div class="login-form">
                {!! Form::open(['method' => 'post','route' => 'forgot.post']) !!}
                <div class="form-group">
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                </div>

                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">SUBMIT</button>
                {!! Form::close() !!}
                <div class="register-link">
                    <p>
                        <label>
                            <a href="{{ route('login') }}"><i class="fa fa-arrow-left"></i>&nbsp;Back To Login</a>
                        </label>
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-text">
            <p>&copy; 2021 <br/> Home care </p>
        </div>
    </div>

@endsection
