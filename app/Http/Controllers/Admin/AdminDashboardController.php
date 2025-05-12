<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminDashboardController extends Controller
{
   public function dashboard(){
    return view('admin.dashboard');
}
   public function profile(){
    return view('admin.profile');
}

public function profilechange(Request $request)
{
    $request->validate([
        'name'  => ['required'],
        'email' => ['required', 'email'],
    ]);

    $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();

    // Handle profile photo
    if ($request->hasFile('photo')) {
        $request->validate([
            'photo' => ['mimes:jpg,jpeg,png,gif', 'max:2024'],
        ]);

        // Save old photo name for deleting after upload
        $oldPhoto = $admin->photo;

        $final_name = 'admin_' . time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $admin->photo = $final_name;

        // Delete old photo after updating new one
        if ($oldPhoto && file_exists(public_path('uploads/' . $oldPhoto))) {
            unlink(public_path('uploads/' . $oldPhoto));
        }
    }

    // Handle password update if provided
    if ($request->password) {
        $request->validate([
            'password'         => ['required'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        $admin->password = Hash::make($request->password);
    }

    // Update name and email
    $admin->name  = $request->name;
    $admin->email = $request->email;
    $admin->update();

    return redirect()->back()->with('success', 'Profile is updated!');
}




}
