<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Controller
{
   public function dashboard(){
      return view('user.dashboard');
   }


     public function userprofile(){
      return view('user.profile');
   }

public function profilesubmit(Request $request)
{
    $user = Auth::guard('web')->user();

    $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|unique:users,email,' . $user->id,
        'phone'   => 'required|string|max:20',
        'country' => 'required|string|max:100',
        'address' => 'required|string|max:255',
        'state'   => 'required|string|max:100',
        'city'    => 'required|string|max:100',
        'zip'     => 'required|string|max:20',
    ]);

    // Handle password update if provided
    if ($request->filled('password')) {
        $request->validate([
            'password'         => 'required|min:6',
            'retype_password'  => 'required|same:password',
        ]);
        $user->password = bcrypt($request->password);
    }

    // Handle photo upload
    if ($request->hasFile('photo')) {
        if ($user->photo && file_exists(public_path('uploads/' . $user->photo))) {
            unlink(public_path('uploads/' . $user->photo));
        }

        $ext = $request->photo->getClientOriginalExtension();
        $photoName = time() . '.' . $ext;
        $request->photo->move(public_path('uploads'), $photoName);
        $user->photo = $photoName;
    }

    // Update user fields
    $user->name    = $request->name;
    $user->email   = $request->email;
    $user->phone   = $request->phone;
    $user->country = $request->country;
    $user->address = $request->address;
    $user->state   = $request->state;
    $user->city    = $request->city;
    $user->zip     = $request->zip;

    $user->save();

    return back()->with('success', 'Profile updated successfully!');
}


}
