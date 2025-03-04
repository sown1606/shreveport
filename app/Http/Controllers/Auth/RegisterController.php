<?php

namespace App\Http\Controllers\Auth;

use App\Data;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function storeUser(Request $request)
    {
        // Bổ sung 'name' (full_name) vào danh sách validation
        $request->validate([
            'account' => 'required|string|max:40|unique:users,Player_ID',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ],
            [
                'account.unique' => 'Sorry, this Account ID is already registered in our system. Please contact guest services.',
                'email.unique' => 'Sorry, this Email Address is already used by another user. Please try with a different one, Thanks.',
            ]);

        // Kiểm tra xem Account ID có tồn tại trong bảng Datas hay không
        $checkAccount = Data::where('Player_ID', $request->account)->first();
        if (!$checkAccount) {
            throw ValidationException::withMessages([
                'No_Match_Up' => 'Your Account ID does not match our records. Please contact guest services.',
            ]);
        }

        // Lấy thông tin FName, LName, DOB từ bảng Datas
        $firstName = $checkAccount->FName ?? '';
        $lastName = $checkAccount->LName ?? '';
        $dob = $checkAccount->DOB ?? null;
        $tier = $checkAccount->Tier ?? 'Standard';
        $points = $checkAccount->Points ?? 0;

        // Tạo user mới
        $user = User::create([
            'Player_ID' => $request->account,
            // Lấy FName, LName từ bảng Datas
            'FName' => $firstName,
            'LName' => $lastName,
            'DOB'       => $dob,

            // Lấy Full Name do người dùng nhập
            'Fullname'  => $request->name,
            'email' => $request->email,
            'role_id' => 2,
            'password' => Hash::make($request->password),
        ]);

        $user->Tier = $tier;
        $user->Points = $points;
        // Gửi email chào mừng (tuỳ chỉnh nội dung trong WelcomeMail)
        Mail::to($request->email)->send(new WelcomeMail($user));

        return redirect('login')->with('message', 'Registration completed! Please login using your account ID.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'account' => 'required|string|max:40',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt(['Player_ID' => $request->account, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['login_error' => 'Invalid account or password.']);
    }
}
