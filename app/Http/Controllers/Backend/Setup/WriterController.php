<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Team;
use App\Models\Writer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WriterController extends Controller
{
    public function ViewWriter()
    {
        $allData =Writer::all();
       

        return view('backend.writer.writer_view',compact('allData'));
    }

    public function AddWriter()
    {
        
        $team = Team::all();
        
        return view('backend.writer.writer_add', compact('team'));
    }

    public function Storewriter(Request $request)
    {

        

        $data = new Writer();
       
       
        $data->team_id = $request->team_id;
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/writer_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/writer_image'), $filename);
            $data['image'] = $filename;  
        }
        

        

        $data->save();

        $notif = array(
            'message' => 'writer ajouté avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('writer.view')->with($notif);
    }

    public function EditWriter($id)
    {
        $editData = Writer::find($id);
        $team = Team::all();

        return view('backend.writer.writer_edit', compact('editData', 'team'));
    }

    public function UpdateWriter(Request $request, $id)
    {
        $data = Writer::find($id);
       
        $data->team_id = $request->team_id;
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/writer_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/writer_image'), $filename);
            $data['image'] = $filename;  
        }

        
        
        
        

       

        $data->save();

        $notif = array(
            'message' => 'writer mis a jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('writer.view')->with($notif);
    }

    public function DeleteWriter($id)
    {
        $data = Writer::find($id);
        $data->delete();
        $notif = array(
            'message' => 'writer supprimé avec succès',
            'alert-type' => 'danger'
        );

        return redirect()->route('writer.view')->with($notif);
    }
}
