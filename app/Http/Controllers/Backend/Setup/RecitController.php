<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Recit;
use App\Models\Compet;
use App\Models\Writer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecitController extends Controller
{
    public function ViewRecit()
    {
        $allData =Recit::all();
       

        return view('backend.recit.recit_view',compact('allData'));
    }

    public function AddRecit()
    {
        
        $compet = Compet::all();
        $writer = Writer::all();
        
        return view('backend.recit.recit_add', compact('compet', 'writer'));
    }

    public function StoreRecit(Request $request)
    {

        

        $data = new Recit();
       
       
        $data->compet_id = $request->compet_id;
        $data->writer_id = $request->writer_id;
        $data->title = $request->title;
        $data->body = $request->body;
        

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/recit_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/recit_image'), $filename);
            $data['image'] = $filename;  
        }
        

        

        $data->save();

        $notif = array(
            'message' => 'recit ajouté avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('recit.view')->with($notif);
    }

    public function EditRecit($id)
    {
        $editData = Recit::find($id);
     

        return view('backend.recit.recit_edit', compact('editData'));
    }

    public function UpdateRecit(Request $request, $id)
    {
        $data = Recit::find($id);
       
        $data->team_id = $request->team_id;
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/recit_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/recit_image'), $filename);
            $data['image'] = $filename;  
        }

        
        
        
        

       

        $data->save();

        $notif = array(
            'message' => 'recit mis a jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('recit.view')->with($notif);
    }

    public function DeleteRecit($id)
    {
        $data = Recit::find($id);
        $data->delete();
        $notif = array(
            'message' => 'recit supprimé avec succès',
            'alert-type' => 'danger'
        );

        return redirect()->route('recit.view')->with($notif);
    }
}
