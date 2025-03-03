@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 400px; margin: 0 auto; padding: 40px 0; text-align: center;">
        <div class="card-body" style="background: #fff; padding: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

            @if (session()->has('message'))
                <div class="alert alert-success">
                    <ul style="list-style-type: none; text-align: center; margin: 0; padding: 0;">
                        <li>{!! session('message') !!}</li>
                    </ul>
                </div>
            @else
                <h3 style="margin-bottom: 20px;">Reset Password</h3>
                <p style="margin-bottom: 20px;">
                    Enter your email to receive a password recovery link.
                </p>

                @if (session('status'))
                    <div class="alert alert-success" role="alert" style="margin-bottom: 15px;">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="/forget-password" style="width: 100%;">
                    @csrf
                    @error('email')
                    <div style="color: red; margin-bottom: 15px;">{{ $message }}</div>
                    @enderror
                    <div style="margin-bottom: 15px;">
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="Your Email Address"
                               class="form-control @error('email') is-invalid @enderror"
                               style="width: 100%; padding: 10px; border: 1px solid #ccc;"
                               autocomplete="email" autofocus>
                    </div>
                    <button type="submit"
                            class="btn btn-primary"
                            style="width: 100%; padding: 10px; background: #5c8d33; color: #fff; border: none; cursor: pointer;">
                        Send Password Reset Link
                    </button>
                </form>
            @endif

            {{-- Khoảng trống tuỳ ý --}}
            <div style="height: 30px;"></div>

            <div>
                <a href="{{ url('admin/login') }}" style="color: #5c8d33; text-decoration: none; font-weight: bold;">
                    Already have an account? Login Now!
                </a>
            </div>
            <div style="margin-top: 10px;">
                Powered By Digital Dog Direct Web Services
            </div>
        </div>
    </div>

    {{-- Style tùy chỉnh --}}
    <style>
        input:focus {
            border-color: #000 !important;
            outline: none;
        }
        button:hover {
            background: #fff !important;
            color: #5c8d33 !important;
            border: 1px solid #5c8d33 !important;
        }
        @media (max-width: 576px) {
            .container {
                padding: 20px 10px;
            }
        }
    </style>
@endsection
