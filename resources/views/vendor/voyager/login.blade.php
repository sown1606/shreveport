@extends('layouts.app')

@section('content')
    <div class="container" style="text-align: center; margin: 0 auto; max-width: 500px; padding-bottom: 50px">
        <div class="card-body" style="padding: 40px; background: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            @if(session()->has('message'))
                <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 10px">
                    {{ session()->get('message') }}
                </div>
            @endif

            <p style="margin-bottom: 20px; font-size: 16px; color: #333;">
                Enter your Username and your password to sign in. <br><br>
                If you have a Players Club Account and this is your first time signing in, click on the
                <a href="register" style="color: #5c8d33; text-decoration: none; font-weight: bold;">"Sign Up"</a>
                Link to create your online account.
            </p>

            @if($errors->has('email') || $errors->has('user_name'))
                <span style="color: #5c8d33; font-weight: bold;">{{$errors->first('email') }} {{ $errors->first('user_name')}}</span>
            @endif

            <form action="{{ route('voyager.login') }}" method="POST" style="width: 100%;">
                {{ csrf_field() }}

                <div style="margin-bottom: 15px;">
                    <input type="text" name="user_name" id="user_name"
                           value="{{ old('user_name') }}" placeholder="Username or Email"
                           class="form-control @if($errors->has('email') || $errors->has('user_name')) has-error @endif"
                           required
                           style="width: 100%; padding: 10px; border: 1px solid #ccc; transition: 0.3s;">
                </div>

                <div style="margin-bottom: 15px;">
                    <input type="password" name="password" placeholder="Password" class="form-control" required
                           style="width: 100%; padding: 10px; border: 1px solid #ccc; transition: 0.3s;">
                </div>

                <div style="margin-bottom: 10px;">
                    <a href="/forget-password" style="color: #5c8d33; text-decoration: none; font-size: 14px;">Forgot password?</a>
                </div>

                <div style="margin-bottom: 15px;">
                    <input type="checkbox" name="remember" id="remember" value="1">
                    <label for="remember" style="font-size: 14px; color: #555;">{{ __('voyager::generic.remember_me') }}</label>
                </div>

                <button type="submit" style="width: 100%; padding: 10px; background: #5c8d33; color: white; border: none; font-size: 16px; cursor: pointer; transition: 0.3s;">
                    <span class="signingin"><span class="voyager-refresh"></span> Login</span>
                </button>
            </form>

        </div>

        <div style="margin-top: 20px; font-size: 14px;">
            <a href="register" style="color: #5c8d33; text-decoration: none; font-weight: bold;">Do not have an account? Sign Up now!</a>
        </div>

        <div style="margin-top: 10px; font-size: 14px; color: #777;">
            Powered By Digital Dog Direct
        </div>
    </div>

    <style>
        input:focus {
            border: 2px solid black !important;
        }

        button:hover {
            background: white !important;
            color: #5c8d33 !important;
            border: 1px solid #5c8d33 !important;
        }
    </style>
@endsection
