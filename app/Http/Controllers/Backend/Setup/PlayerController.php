<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Team;
use App\Models\Poste;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    public function ViewPlayer()
    {
        $data['allData']=Player::all();
      /* $players = Player::all();

       foreach($players as $p){
           dd("but" .$p->Nbassist);
       }*/

        return view('backend.player.player_view',$data);
    }

    public function AddPlayer()
    {
        $poste = Poste::all();
        $team = Team::all();
        
        return view('backend.player.player_add',compact('poste', 'team'));
    }

    public function StorePlayer(Request $request)
    {

        

        $data = new Player();
       
        $data->poste_id = $request->poste_id;
        $data->team_id = $request->team_id;
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->cat = $request->cat;
        $data->age = $request->age;
        $data->taille = $request->taille;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/player_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/player_image'), $filename);
            $data['image'] = $filename;  
        }
        

        

        $data->save();

        $notif = array(
            'message' => 'player ajouté avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('player.view')->with($notif);
    }

    public function EditPlayer($id)
    {
        $editData = Player::find($id);
        $poste = Poste::all();
        $team = Team::all();

        return view('backend.player.player_edit', compact('editData','poste', 'team'));
    }

    public function Updateplayer(Request $request, $id)
    {
        $data = Player::find($id);
        $data->poste_id = $request->poste_id;
        $data->team_id = $request->team_id;
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->cat = $request->cat;
        $data->age = $request->age;
        $data->taille = $request->taille;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/player_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/player_image'), $filename);
            $data['image'] = $filename;  
        }

        
        
        
        

       

        $data->save();

        $notif = array(
            'message' => 'player mis a jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('player.view')->with($notif);
    }

    public function DeletePlayer($id)
    {
        $data = Player::find($id);
        $data->delete();
        $notif = array(
            'message' => 'player supprimé avec succès',
            'alert-type' => 'danger'
        );

        return redirect()->route('player.view')->with($notif);
    }

    

}
