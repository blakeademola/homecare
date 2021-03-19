@extends('layouts.auth')

@section('title')
    Password reset
@stop

@section('content')
    <div class="login-wrap">
        <div class="login-content">
            <div class="login-header">
                <div class="login-icon"><i class="fa fa-refresh fa-2x"></i></div>
                <div class="login-text">
                    <h3>Reset Password</h3>
                    <p>Enter your new password.</p>
                </div>
            </div>
            <div class="login-form">
                {!! Form::open(['method' => 'post','route' => ['password.update', 'id' => $id, 'token' => $token]]) !!}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {!! Form::password('password', ['class' => 'form-control ' . ($errors->has('password') ? 'is-invalid' : ''), 'placeholder' => 'Password', 'required']) !!}

                        @if ($errors->has('password'))
                            <small class="form-text text-danger">
                                {{ $errors->first('password') }}
                            </small>
                        @endif
                    </div>


                    <div class="form-group col-sm-12">
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm password', 'required']) !!}
                    </div>
                </div>

                <div class="reset-button">
                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">RESET</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="footer-text">
            <p>&copy; 2019 <br/> LawPavilion Business Solutions Limited</p>
        </div>
    </div>
@endsection