<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // AdminDashboard
    public function AdminDashboard() {
        return view('admin.index');
    }

    // Admin Logout Action
    public function AdminLogout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    } // Admin Logout Action End

    // AdminLogin
    public function AdminLogin(){
        return view('admin.admin_login');
    }// End Method

    // AdminRegistration
    public function AdminRegistration(){
        return view('admin.admin_registration');
    }// End

    // AdminProfile
    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view',compact('profileData'));
    }// End Method

    // AdminProfileStore
    public function AdminProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required||confirmed',
        ]);

        // Math the old password

        if(!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => 'Old password Does Not Match',
                'alert-type' => 'error',
            );

            return back()->with($notification);
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }// End Method

    
}
