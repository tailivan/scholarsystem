<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Team;
use App\Models\Compet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CompetController extends Controller
{
    public function ViewCompet()
    {
        $data['allData']=Compet::all();

       
        return view('backend.compet.compet_view',$data);
    }

    public function AddCompet()
    {
        
        $team = Team::all();
        
        return view('backend.compet.compet_add',compact('team'));
    }

    public function StoreCompet(Request $request)
    {

        

        $data = new Compet();

       // $c= Compet::find(1);
       
       
        $data->date = $request->date;
        $data->heure = $request->heure;
        $data->team1_id = $request->team_1;
        $data->team2_id = $request->team_2;
        $data->score_1 = $request->score_1;
        $data->score_2 = $request->score_2;
       

        

        

        $data->save();
        //dd($data->team);
        $notif = array(
            'message' => 'Match ajouté avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('compet.view')->with($notif);
    }

    public function EditCompet($id)
    {
        $editData = Compet::find($id);
       
        $team = Team::all();

        return view('backend.compet.compet_edit', compact('editData','team'));
    }

    public function Updatecompet(Request $request, $id)
    {
        $data = Compet::find($id);
        $data->date = $request->date;
        $data->heure = $request->heure;
        $data->team1_id = $request->team_1;
        $data->team2_id = $request->team_2;
        $data->score_1 = $request->score_1;
        $data->score_2 = $request->score_2;
       
        

        
        
        
        

       

        $data->save();

        $notif = array(
            'message' => 'Match mis a jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('compet.view')->with($notif);
    }

    public function DeleteCompet($id)
    {
        $data = Compet::find($id);
        $data->delete();
        $notif = array(
            'message' => 'compet supprimé avec succès',
            'alert-type' => 'danger'
        );

        return redirect()->route('compet.view')->with($notif);
    }
}
