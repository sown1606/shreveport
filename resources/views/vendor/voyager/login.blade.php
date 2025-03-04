@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 450px; margin: 0 auto; padding: 0 0 100px 0; text-align: center;">
        <div class="card-body" style="padding: 30px; background: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

            {{-- Thông báo session --}}
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            {{-- Form login --}}
            <form action="{{ route('voyager.login') }}" method="POST" style="width: 100%;">
                @csrf
                <h3 style="margin-bottom: 20px;">Sign In</h3>

                @if($errors->has('Player_ID'))
                    <span style="color: #527428; display: block; margin-bottom: 10px;">
                    {{ $errors->first('Player_ID') }}
                </span>
                @endif
                <div style="margin-bottom: 15px;">
                    <input type="text"
                           name="Player_ID"
                           id="Player_ID"
                           placeholder="Account"
                           value="{{ old('Player_ID') }}"
                           required
                           class="form-control @error('Player_ID') is-invalid @enderror"
                           style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                </div>

                <div style="margin-bottom: 15px;">
                    <input type="password"
                           name="password"
                           placeholder="Password"
                           required
                           class="form-control"
                           style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                </div>

                <div style="text-align: right; margin-bottom: 15px;">
                    <a href="/forget-password" style="font-size: 14px; color: #5c8d33; text-decoration: none;">
                        Recover Password
                    </a>
                </div>

                <button type="submit"
                        style="width: 100%; padding: 10px; background: #5c8d33; color: #fff; border: none; cursor: pointer;">
                    Sign In
                </button>

                {{-- Dòng trống 2-3 hàng, tuỳ ý --}}
                <div style="height: 30px;"></div>

                <div style="margin-top: 10px;">
                    Do not have an account?
                    <a href="register" style="color: #5c8d33; font-weight: bold;">Sign Up Now!</a>
                </div>

                <div style="margin-top: 10px;">
                    Powered by Digital Dog Direct Web Services
                </div>

            </form>
        </div>
    </div>
    {{-- Style tuỳ ý --}}
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
