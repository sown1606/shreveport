@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 450px; margin: 0 auto; padding: 0 0 100px 0; text-align: center;">
        <div class="card-body" style="padding: 30px; background: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

            <form method="POST" action="{{ route('register') }}" style="width: 100%;">
                @csrf
                <h3 style="margin-bottom: 20px;">Sign Up</h3>

                {{-- Thông báo lỗi nếu có --}}
                @if(!$errors->isEmpty())
                    <div style="color: #527428; margin-bottom: 15px;">
                        <ul style="list-style:none; padding:0;">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Account ID --}}
                <div style="margin-bottom: 15px;">
                    <input type="text"
                           id="account"
                           name="account"
                           value="{{ old('account') }}"
                           placeholder="Account ID"
                           required
                           class="form-control"
                           style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                </div>

                {{-- Full Name --}}
                <div style="margin-bottom: 15px;">
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="Full Name"
                           required
                           class="form-control"
                           style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                </div>

                {{-- Email --}}
                <div style="margin-bottom: 15px;">
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Email"
                           required
                           class="form-control"
                           style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                </div>

                {{-- Password --}}
                <div style="margin-bottom: 15px;">
                    <input type="password"
                           id="password"
                           name="password"
                           placeholder="Password"
                           required
                           class="form-control"
                           style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                </div>

                {{-- Confirm Password --}}
                <div style="margin-bottom: 20px;">
                    <input type="password"
                           id="password-confirm"
                           name="password_confirmation"
                           placeholder="Confirm Password"
                           required
                           class="form-control"
                           style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                </div>

                <button type="submit"
                        style="width: 100%; padding: 10px; background: #5c8d33; color: #fff; border: none; cursor: pointer;">
                    Sign Up
                </button>

                <div style="height: 30px;"></div>

                <div>
                    Already have an account?
                    <a href="{{ url('admin/login') }}" style="color: #5c8d33; font-weight: bold;">
                        Sign In
                    </a>
                </div>

                <div style="margin-top: 10px; color: #777;">
                    Powered by Digital Dog Direct Web Services
                </div>
            </form>
        </div>
    </div>

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
