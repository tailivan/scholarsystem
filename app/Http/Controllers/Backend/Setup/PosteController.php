<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Poste;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PosteController extends Controller
{
    public function ViewPoste()
    {
        $data['allData']=Poste::all();

        return view('backend.poste.poste_view',$data);
    }

    public function AddPoste()
    {

        
        return view('backend.poste.poste_add');
    }

    public function StorePoste(Request $request)
    {

        $validateData= $request->validate([
            
            'name' => 'required|unique:postes',
            

        ]);

        $data = new Poste();
       
        $data->name = $request->name;
        

        

        $data->save();

        $notif = array(
            'message' => 'Poste ajouté avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('poste.view')->with($notif);
    }

    public function EditPoste($id)
    {
        $editData = Poste::find($id);
        

        return view('backend.poste.poste_edit', compact('editData'));
    }

    public function UpdatePoste(Request $request, $id)
    {

        

        $data = Poste::find($id);
       
        $data->name = $request->name;
        
        

       

        $data->save();

        $notif = array(
            'message' => 'Poste mis a jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('poste.view')->with($notif);
    }

    public function DeletePoste($id)
    {
        $data = Poste::find($id);
        $data->delete();
        $notif = array(
            'message' => 'Poste supprimé avec succès',
            'alert-type' => 'danger'
        );

        return redirect()->route('poste.view')->with($notif);
    }
}
