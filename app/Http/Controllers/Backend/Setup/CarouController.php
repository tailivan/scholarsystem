<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Carou;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarouController extends Controller
{
    public function ViewCarou()
    {
        $data['allData']=Carou::all();
        
     

        return view('backend.carou.carou_view',$data);
    }

    public function AddCarou()
    {
        
        
        return view('backend.carou.carou_add');
    }

    public function StoreCarou(Request $request)
    {

        

        $data = new Carou();
       
        $data->title = $request->title;
        $data->body = $request->body;
        

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/carou_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/carou_image'), $filename);
            $data['image'] = $filename;  
        }
        

        

        $data->save();

        $notif = array(
            'message' => 'slide ajouté avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('carou.view')->with($notif);
    }

    public function EditCarou($id)
    {
        $editData = Carou::find($id);
       

        return view('backend.carou.carou_edit', compact('editData'));
    }

    public function UpdateCarou(Request $request, $id)
    {
        $data = Carou::find($id);
        $data->title = $request->title;
        $data->body = $request->body;
        

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/carou_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/carou_image'), $filename);
            $data['image'] = $filename;  
        }

        
        
        
        

       

        $data->save();

        $notif = array(
            'message' => 'slider mis a jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('carou.view')->with($notif);
    }

    public function DeleteCarou($id)
    {
        $data = Carou::find($id);
        $data->delete();
        $notif = array(
            'message' => 'slider supprimé avec succès',
            'alert-type' => 'danger'
        );

        return redirect()->route('carou.view')->with($notif);
    }
}
