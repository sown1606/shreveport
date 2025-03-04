<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Controller;

class VoyagerAuthController extends Controller
{
    use AuthenticatesUsers;

    public function login()
    {
        if ($this->guard()->user()) {
            return redirect()->route('voyager.dashboard');
        }

        return Voyager::view('voyager::login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->email() => 'required',
            'password' => 'required',
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only($this->email(), 'password');

        // Thử đăng nhập
        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }

        // Tăng số lần đăng nhập sai
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function redirectTo()
    {
        return config('voyager.user.redirect', route('voyager.dashboard'));
    }

    protected function guard()
    {
        return Auth::guard(app('VoyagerGuard'));
    }

    public function email()
    {
        // Mặc định code cũ:
        // $field = (filter_var(request()->Player_ID, FILTER_VALIDATE_EMAIL) || !request()->Player_ID) ? 'email' : 'Player_ID';
        // request()->merge([$field => request()->Player_ID]);
        // return $field;

        // => Ở đây, nếu request()->Player_ID là email => $field = 'email'
        //    nếu request()->Player_ID không phải email => $field = 'Player_ID'
        //    => Tức là cho phép đăng nhập bằng email HOẶC Player_ID
        //
        // Nhưng trong cơ sở dữ liệu, admin user có 'Player_ID' = 'admin'
        // Chúng ta có 'Player_ID' chứ không còn 'Player_ID'?
        //
        // Thông thường, Voyager admin login là 1-2 user admin, chứ ko phải logic Player ID.
        // Nên code cũ vẫn OK nếu admin user có Player_ID = 'admin'
        //
        // Nếu bạn muốn thay "Player_ID" = "Player_ID" cho admin,
        // thì thay logic này như sau:
        //
        // $login = request()->input('Player_ID');
        // if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
        //     $field = 'email';
        // } else {
        //     $field = 'Player_ID';
        // }
        // request()->merge([$field => $login]);
        // return $field;
        //
        // => Cho phép đăng nhập admin qua email HOẶC Player_ID.
        //
        // Tuy nhiên, cẩn thận:
        //   - Thông thường admin account do CMS auto-tạo,
        //   - Còn "Player_ID" dành cho user.
        //   - Vậy admin login khác user login.
        //   - Ta nên kiểm soát 2 logic khác nhau.
        //
        // Tùy bạn, dưới đây mình giả sử admin vẫn có "Player_ID" cũ,
        // chứ không lẫn với "Player_ID":


        $field = (filter_var(request()->Player_ID, FILTER_VALIDATE_EMAIL) || !request()->Player_ID)
            ? 'email'
            : 'Player_ID';

        // Merge request
        request()->merge([$field => request()->Player_ID]);
        return $field;
    }
}
