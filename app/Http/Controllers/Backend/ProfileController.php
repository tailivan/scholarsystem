<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView()
    {

        $id = Auth::user()->id;
        $user = User::find($id);

        return view('backend.user.profile_view', compact('user'));
    }

    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('backend.user.profile_edit', compact('editData'));

    }

    public function ProfileStore(Request $request)
    {

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile= $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image'] = $filename;  
        }
        $data->save();

        $notif = array(
            'message' => 'Profil mis a jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('profile.view')->with($notif);



    }

    public function PasswordView()
    {

        return view('backend.user.password_edit');
    }

    public function PasswordUpdate(Request $request)
    {

        $validateData= $request->validate([
            'oldpassword' => 'Required',
            'password' => 'required|confirmed',

        ]);

        $hashPassword =Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashPassword )) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }
    }
}
