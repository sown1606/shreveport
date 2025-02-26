<?php

namespace App\Http\Controllers\Auth;

use App\Data;
use App\Flipbook;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Illuminate\Validation\ValidationException;
use Mail;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function register()
    {

        return view('auth.register');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users',
            'birthday' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'CSHRV_Player_ID' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ],
            [
                'CSHRV_Player_ID.unique' => 'Sorry, This Account ID is already register with our system. Please contact guest services.',
                'email.unique' => 'Sorry, This Email Address is already used by another user. Please try with different one, Thanks.',
                'user_name.unique' => 'Sorry, This User Name is already used by another user. Please try with different one, Thanks.',
            ]);

        //check if user register right birthday and CSHRV_Player_ID
        $checkAccount = Data::where('CSHRV_Player_ID', $request->CSHRV_Player_ID)
            ->where('CSHRV_DOB', $request->birthday)->first();
        if (!$checkAccount) {
            throw ValidationException::withMessages(['No_Match_Up' => 'Your Account Combined ID or Birthday does not match our records
. Please contact guest services.']);
        }
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'role_id' => 2,
            'password' => Hash::make($request->password),
            'CSHRV_Player_ID' => $request->CSHRV_Player_ID,
            'CSHRV_LName' => $checkAccount->CSHRV_LName,
            'CSHRV_FName' => $checkAccount->CSHRV_FName,
            'CSHRV_MI' => $checkAccount->CSHRV_MI,
            'CSHRV_Tier' => $checkAccount->CSHRV_Tier,
            'CSHRV_MTD_Points' => $checkAccount->CSHRV_MTD_Points,
            'CSHRV_Points_Next_Tier' => $checkAccount->CSHRV_Points_Next_Tier,
            'CSHRV_Host_Name' => $checkAccount->CSHRV_Host_Name,
            'CSHRV_Host_ID' => $checkAccount->CSHRV_Host_ID,
            'CSHRV_Time_Stamp' => $request->CSHRV_Time_Stamp,
            'CSHRV_DOB' => Carbon::parse($request->birthday),
        ]);
        Mail::to($request->email)->send(new WelcomeMail($request));

        return redirect('admin/login')->with('message', 'Register Completed! Please login use your username or your email.');
    }

}
