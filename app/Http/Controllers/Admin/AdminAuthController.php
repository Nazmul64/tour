<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; 
use App\Mail\Websitemail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function profile(){
        return view('admin.profile');
    }

    public function forget_password(){
        return view('admin.forgotpassword');
    }

    
    public function reset_password($token,$email){
        $admin = Admin::where('email',$email)->where('token',$token)->first();
        if(!$admin) {
            return redirect()->route('admin_login')->with('error','Token or email is not correct');
        }
        return view('admin.resetpassword',compact('token','email'));
    }
public function forget_password_submit(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],
    ]);

    $admin = Admin::where('email', $request->email)->first();
    if (!$admin) {
        return redirect()->back()->with('error', 'Email is not found');
    }

    $token = hash('sha256', time());
    $admin->token = $token;
    $admin->update();

    $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
    $subject = "Password Reset";
    $message = "To reset password, please click on the link below:<br>";
    $message .= "<a href='".$reset_link."'>Click Here</a>";

    try {
        Mail::to($request->email)->send(new Websitemail($subject, $message));
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Mail could not be sent. Error: '.$e->getMessage());
    }

    return redirect()->back()->with('success', 'We have sent a password reset link to your email. Please check your email (or spam folder).');
}

public function login_submit(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $check = $request->all();
    $data = [
        'email' => $check['email'],
        'password' => $check['password']
    ];

    if(Auth::guard('admin')->attempt($data)) {
        return redirect()->route('admin_dashboard')->with('success','login is successfull!');
    } else {
        return redirect()->route('admin_login')->with('error','The information you entered is incorrect! Please try again!');
    }
}

public function logout()
{
    Auth::guard('admin')->logout();
    return redirect()->route('admin_login')->with('success','Logout is successful!');
}
public function reset_password_submit(Request $request, $token, $email)
{
    $request->validate([
        'password' => ['required'],
        'confirm_password' => ['required','same:password'],
    ]);

    $admin = Admin::where('email',$request->email)->where('token',$request->token)->first();
    $admin->password = Hash::make($request->password);
    $admin->token = "";
    $admin->update();

    return redirect()->route('admin_login')->with('success','Password reset is successful. You can login now.');
}
}
