<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Websiteemail;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class FrontController extends Controller
{
 public function home(){
        return view('front.home');
}
 public function about(){
    return view('front.about');
}

public function registration(){
    return view('front.registration');
}
public function login(){
    return view('front.login');
}

public function registration_verify_email($email,$token){

    $user = User::where('token',$token)->where('email',$email)->first();
    if(!$user) {
        return redirect()->route('login');
    }
    $user->token = '';
    $user->status = 1;
    $user->update();

    return redirect()->route('login')->with('success', 'Your email is verified. You can login now.');
}


public function registration_submit(Request $request)
{
    // Validate the form input
    $request->validate([
        'name'            => 'required',
        'email'           => 'required|email|unique:users,email',
        'password'        => 'required',
        'retype_password' => 'required|same:password',
    ]);

    // Generate a unique verification token
    $token = hash('sha256', time());

    // Create and save the user
    $user = new User();
    $user->name     = $request->name;
    $user->email    = $request->email;
    $user->password = bcrypt($request->password);
    $user->token    = $token;
    $user->save();
    $token = hash('sha256', time());
    // Generate verification link with token and email
    $verification_link = route('registration_verify_email', [
        'email' => $request->email,
        'token' => $token
    ]);

    // Compose email
    $subject = 'User Account Verification';
    $message = "Please click the following link to verify your email address: <a href=\"{$verification_link}\">Verify Email</a>";

    // Send verification email
    Mail::to($request->email)->send(new Websitemail($subject, $message));

    // Redirect with success message
    return redirect()->back()->with('success', 'Registration successful. Please check your email to verify your account before logging in.');
}
 public function userlogin(Request $request){
     $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],

    ]);

    $check = $request->all();
    $data = [
        'email' => $check['email'],
        'password' => $check['password'],
        'status'=> 1,
    ];

    if(Auth::guard('web')->attempt($data)) {
        return redirect()->route('user_dashboard')->with('success','login is successfull!');
    } else {
        return redirect()->route('login')->with('error','The information you entered is incorrect! Please try again!')->withInput();
    }
 }


public function forget_password(){
    return view('front.forget-password');
}


    public function reset_password($token,$email){
        $user =User::where('email',$email)->where('token',$token)->first();
        if(!$user) {
            return redirect()->route('admin_login')->with('error','Token or email is not correct');
        }
        return view('front.resetpassword',compact('token','email'));
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

public function logout(Request $request){
    Auth::guard('web')->logout();
    return redirect()->route('login')->with('success', 'Logout was successful!');
}

public function forget_password_submits(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],
    ]);

    $email = trim(strtolower($request->email)); // Normalize email

    $user = User::whereRaw('LOWER(email) = ?', [$email])->first();

    if (!$user) {
        return redirect()->back()->with('error', 'Email is not found');
    }

    $token = hash('sha256', time());
    $user->token = $token;
    $user->update();

    $reset_link = route('reset_passwords', ['token' => $token, 'email' => $email]);

    $subject = "Password Reset";
    $message = "To reset password, please click on the link below:<br>";
    $message .= "<a href='" . $reset_link . "'>Click Here</a>";

    try {
        Mail::to($email)->send(new Websitemail($subject, $message));
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Mail could not be sent. Error: ' . $e->getMessage());
    }

    return redirect()->back()->with('success', 'We have sent a password reset link to your email. Please check your inbox or spam folder.');
}

public function reset_password_submits(Request $request, $token, $email)
{
    // Validate form inputs
    $request->validate([
        'password' => ['required', 'min:6'],
        'retype_password' => ['required', 'same:password'],
    ]);

    // Normalize email
    $email = trim(strtolower($email));

    // Find user with token and email
    $user = User::whereRaw('LOWER(email) = ?', [$email])
                ->where('token', $token)
                ->first();

    if (!$user) {
        return redirect()->back()->with('error', 'Invalid token or email.');
    }

    // Update password and clear token
    $user->password = Hash::make($request->password);
    $user->token = null;
    $user->save();

    return redirect()->route('login')->with('success', 'Password reset successful. You can now log in.');
}

    public function reset_passwords($token,$email){
        $user = User::where('email',$email)->where('token',$token)->first();
        if(!$user) {
            return redirect()->route('login')->with('error','Token or email is not correct');
        }
        return view('front.resetpassword',compact('token','email'));
    }
}
