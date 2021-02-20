<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Pat;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function ViewTeam()
    {
        $data['allData']=Team::all();

        return view('backend.team.team_view',$data);
    }

    public function AddTeam()
    {

        $data['allData'] = Pat::all();
        return view('backend.team.team_add', $data);
    }

    public function StoreTeam(Request $request)
    {

        $validateData= $request->validate([
            
            'name' => 'required|unique:teams',
            

        ]);

        $data = new Team();
       
        $data->name = $request->name;
        $data->pat_id = $request->pat_id;
      

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/team_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/team_image'), $filename);
            $data['image'] = $filename;  
        }

        $data->save();

        $notif = array(
            'message' => 'Equipe ajoutée avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('team.view')->with($notif);
    }

    public function EditTeam($id)
    {
        $editData = Team::find($id);
        $pats = Pat::all();

        return view('backend.team.team_edit', compact('editData', 'pats'));
    }

    public function UpdateTeam(Request $request, $id)
    {

        

        $data = Team::find($id);
       
        $data->name = $request->name;
        $data->pat_id = $request->pat_id;
        

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/team_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/team_image'), $filename);
            $data['image'] = $filename;  
        }

        $data->save();

        $notif = array(
            'message' => 'Equipe mise a jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('team.view')->with($notif);
    }

    public function DeleteTeam($id)
    {
        $data = Team::find($id);
        $data->delete();
        $notif = array(
            'message' => 'Equipesupprimée avec succès',
            'alert-type' => 'danger'
        );

        return redirect()->route('team.view')->with($notif);
    }
}
