@extends('layouts.app')
@section('content')
    <div class="container" style="text-align: center; background: #fff; margin: 0 auto;padding-top:20px">
    <div class="row justify-content-center">
        @if (\Session::has('message'))
            <div class="alert alert-success">
                <ul style="list-style-type: none; text-align: center;">
                    <li>{!! \Session::get('message') !!}</li>
                </ul>
            </div>
        @else
            <div class="col-md-2"></div>
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Reset Password</div>
                        Enter your email to get recovery link.
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="/forget-password">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail
                                        Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12 offset-md-4">
                                        <button type="submit" class="btn btn-primary" style="background-color: red !important;">
                                            Send Password Reset Link
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="col-md-2"></div>

        @endif
    </div>
    <div class="row" style="padding-bottom: 30px">
        <div class="col-sm-6"><a href="admin/login">Already have and account? Login Now!</a></div>
        <div class="col-sm-6"> Powered By Perfect Communications Services
        </div>
    </div>
    </div>
@endsection
