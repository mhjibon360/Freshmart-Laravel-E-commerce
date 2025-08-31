<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Show the user dashboard.
     */
    public function index()
    {
        return view('frontend.pages.dashboard.index');
    }

    /**
     * Show the user orders.
     */
    public function order()
    {
        return view('frontend.pages.dashboard.order');
    }

    /**
     * Show the user settings.
     */
    public function setting()
    {
        return view('frontend.pages.dashboard.setting');
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
            $photourl = "upload/profile/admin/" . $filename;
            $file->move(public_path('upload/profile/admin'), $filename);
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

    /**
     * Delete the user account.
     */
    public function deleteaccount(Request $request)
    {
        // validate
        $request->validate([
            'password' => 'required',
        ]);

        if (Hash::check($request->password, Auth::user()->password)) {
            User::where('id', $request->id)->delete();
            notyf()->info('Account deleted successfully');
            return redirect()->route('home.index');
        } else {
            notyf()->error('Current password is incorrect');
            return back();
        }
    }
}
