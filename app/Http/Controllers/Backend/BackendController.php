<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BackendController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        return view('backend.pages.dashboard.index');
    }

    /**
     * Display the admin profile.
     */
    public function profile()
    {
        return view('backend.pages.proifile.index');
    }

    /**
     * Update the admin profile.
     */
    public function updateProfile(Request $request)
    {
        $user = User::find($request->id);
        // Validate and update the profile
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = hexdec(uniqid()) . $file->getClientOriginalName();
            $photourl = "upload/profile/customer/" . $filename;
            $file->move(public_path('upload/profile/customer'), $filename);
            if (file_exists($user->photo)) {
                unlink($user->photo);
            }
        }

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'photo' => isset($photourl) ? $photourl : $user->photo,
            'updated_at' => now(),
        ]);

        notyf()->info('Profile updated successfully');
        return back();
    }

    /**
     * Update the admin password.
     */
    public function updatePassword(Request $request)
    {
        // Validate and update the password
        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        if (Hash::check($request->password, Auth::user()->password)) {
            Auth::user()->update([
                'password' => Hash::make($request->new_password),
            ]);
            notyf()->info('Password updated successfully');
            return back();
        } else {
            notyf()->error('Current password is incorrect');
            return back();
        }
    }
}
