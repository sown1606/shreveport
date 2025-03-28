@extends('layouts.app')

@section('content')
        <div class="row justify-content-center" style="background: #fff; padding-bottom: 30px; padding-top:30px">
            <div class="col-md-8">
                <div class="card-body">
                                @if(!$errors->isEmpty())
                                    <div class="alert alert-red" style="text-align: center;padding:0; margin:0">
                                        <ul class="list-unstyled" style="color: #527428">
                                            @foreach($errors->all() as $err)
                                                <li>{{ $err }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="first_name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="col-md-6">
                                <input id="first_name" type="text"
                                       class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                       value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="col-md-6">
                                <input id="last_name" type="text"
                                       class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                       value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>
                            @error('user_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="col-md-6">
                                <input id="user_name" type="text"
                                       class="form-control @error('user_name') is-invalid @enderror" name="user_name"
                                       value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Your Birthday') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date"
                                       class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                                       value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>
                                @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Player_ID"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Account Number') }}</label>

                            <div class="col-md-6">
                                <input id="Player_ID" type="text"
                                       class="form-control @error('Player_ID') is-invalid @enderror"
                                       name="Player_ID" value="{{ old('Player_ID') }}" required
                                       autocomplete="Player_ID">

                                @error('Player_ID')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <p style="text-align: center;font-weight: 700">By providing your email address, you agree to receive marketing emails from Eldorado</p>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 "><a href="login">Already have an account, login now!</a></div>
            <div class="col-sm-6 text-right"> Powered By Digital Dog Direct
            </div>
        </div>
@endsection
