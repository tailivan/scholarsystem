<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Filter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    public function Viewfilter()
    {
        $data['allData']=Filter::all();
      

        return view('backend.filter.filter_view',$data);
    }

    public function Addfilter()
    {
        
        
        return view('backend.filter.filter_add');
    }

    public function Storefilter(Request $request)
    {

        

        $data = new Filter();
       
        $data->cat = $request->cat;
        $data->title = $request->title;
        $data->body = $request->body;
       

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/filter_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/filter_image'), $filename);
            $data['image'] = $filename;  
        }
        

        

        $data->save();

        $notif = array(
            'message' => 'filtre ajouté avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('filter.view')->with($notif);
    }

    public function Editfilter($id)
    {
        $editData = Filter::find($id);
       

        return view('backend.filter.filter_edit', compact('editData'));
    }

    public function Updatefilter(Request $request, $id)
    {
        $data = Filter::find($id);
        $data->cat = $request->cat;
        $data->title = $request->title;
        $data->body = $request->body;
        
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/filter_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/filter_image'), $filename);
            $data['image'] = $filename;  
        }

   
        $data->save();

        $notif = array(
            'message' => 'Filtre mis a jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('filter.view')->with($notif);
    }

    public function Deletefilter($id)
    {
        $data = Filter::find($id);
        $data->delete();
        $notif = array(
            'message' => 'Filtre supprimé avec succès',
            'alert-type' => 'danger'
        );

        return redirect()->route('filter.view')->with($notif);
    }
}
