<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Pat;
use Illuminate\Http\Request;

class PatController extends Controller
{
    public function ViewPat()
    {
        $data['allData']=Pat::all();

        return view('backend.pat.pat_view',$data);
    }

    public function AddPat()
    {
        return view('backend.pat.pat_add');
    }

    public function EditPat($id)
    {
        $editData = Pat::find($id);

        return view('backend.pat.pat_edit', compact('editData'));
    }

    public function StorePat(Request $request)
    {

        $validateData= $request->validate([
            'address' => 'Required',
            'name' => 'required|unique:pats',
            'zip'  => 'required',

        ]);

        $data = new Pat();
       
        $data->name = $request->name;
        $data->address = $request->address;
        $data->zip = $request->zip;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/pat_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/pat_image'), $filename);
            $data['image'] = $filename;  
        }

        $data->save();

        $notif = array(
            'message' => 'Patinoire ajoutée avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('pat.view')->with($notif);
    }

    public function UpdatePat(Request $request, $id)
    {

        

        $data = Pat::find($id);
       
        $data->name = $request->name;
        $data->address = $request->address;
        $data->zip = $request->zip;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/pat_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/pat_image'), $filename);
            $data['image'] = $filename;  
        }

        $data->save();

        $notif = array(
            'message' => 'Patinoire mise a jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('pat.view')->with($notif);
    }

    public function DeletePat($id)
    {
        $data = Pat::find($id);
        $data->delete();
        $notif = array(
            'message' => 'Patinoire supprimée avec succès',
            'alert-type' => 'danger'
        );

        return redirect()->route('pat.view')->with($notif);
    }

    
}
