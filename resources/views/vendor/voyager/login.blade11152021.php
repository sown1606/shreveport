@extends('layouts.app')

@section('content')
        <div class="row justify-content-center text-center" style="background: #fff; padding-bottom: 30px">
            <div class="col-md-8">
                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <p style="margin-bottom: 0px;">
                        Enter your Username and your password to sign in. <br><br>
                        If you have a Players Club account and this is your first time signing in, click on the <a href="register">"Sign
                            Up"</a> button to create your online account.
                    </p>
                        @if($errors->has('email') || $errors->has('user_name'))
                            <span style="color: #5c8d33">{{$errors->first('email') }} {{ $errors->first('user_name')}}</span>
                        @endif
                    <form action="{{ route('voyager.login') }}" method="POST"
                          style="    width: 60%;    margin: 0 auto;">
                        {{ csrf_field() }}
                        <div class="form-group form-group-default" id="emailGroup">
                            <div class="controls">
                                <input type="text" name="user_name" id="user_name"
                                       value="{{ old('user_name') }}" placeholder="Username or Email"
                                       class="form-control @if($errors->has('email') || $errors->has('user_name')) has-error @endif" required>
                            </div>
                        </div>

                        <div class="form-group form-group-default" id="passwordGroup">
                            <div class="controls">
                                <input type="password" name="password" placeholder="Password" class="form-control"
                                       required>
                            </div>
                        </div>

                        <div class="form-group" id="rememberMeGroup">
                            <div class="controls">
                                <a href="/forget-password">Forget password!</a>
                            </div>
                        </div>


                        <div class="form-group" id="rememberMeGroup">
                            <div class="controls">
                                <input type="checkbox" name="remember" id="remember" value="1"><label for="remember"
                                                                                                      class="remember-me-text">{{ __('voyager::generic.remember_me') }}</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block login-button">
                            <span class="signingin"><span class="voyager-refresh"></span> LOGIN</span>
                        </button>
                    </form>
{{--                    @if(!$errors->isEmpty())--}}
{{--                        <div class="alert alert-red">--}}
{{--                            <ul class="list-unstyled" style="color:red">--}}
{{--                                @foreach($errors->all() as $err)--}}
{{--                                    <li>{{ $err }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                </div>
            </div>
            <div class="col-sm-6"><a href="register">Do not have an account? Sign Up now!</a></div>
            <div class="col-sm-6"> Powered By Digital Dog Direct
            </div>
        </div>
@endsection
