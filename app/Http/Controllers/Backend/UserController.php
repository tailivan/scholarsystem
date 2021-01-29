<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Unique;
use Symfony\Contracts\Service\Attribute\Required;

class UserController extends Controller
{
    public function UserView()
    {
        $data['allData']=User::all();

        return view('backend.user.user_view',$data);
    }

    public function UserAdd()
    {
        return view('backend.user.user_add');
    }

    public function UserStore(Request $request)
    {

        $validateData= $request->validate([
            'email' => 'Required|unique:users',
            'name' => 'required',

        ]);

        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);

        $data->save();

        $notif = array(
            'message' => 'Utilisateur ajouté avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notif);
    }

    public function UserEdit($id)
    {
        $editData = User::find($id);

        return view('backend.user.user_edit', compact('editData'));
    }

    public function UserUpdate(Request $request,$id)
    {
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
       

        $data->save();

        $notif = array(
            'message' => 'Utilisateur mis a jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notif);
    }

    public function UserDelete($id)
    {
        $data = User::find($id);
        $data->delete();
        $notif = array(
            'message' => 'Utilisateur supprimé avec succès',
            'alert-type' => 'danger'
        );

        return redirect()->route('user.view')->with($notif);
    }
}
