<?php

namespace App\Http\Controllers\Front;

use App\Models\Goal;
use App\Models\Team;
use App\Models\User;
use App\Models\Carou;
use App\Models\Recit;
use App\Models\Compet;
use App\Models\Filter;
use App\Models\Player;
use App\Models\Writer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data['allData']=Carou::all();
        $data['players']=Player::all();
        $data['playerslimit']=Player::all()->random(8);
        $data['recit']=Recit::orderBy('id', 'DESC')->limit(6)->get();
        $data['filter']=Filter::select('cat')->groupBy('cat')->get();
        $data['filterall']=Filter::all();
        $data['teams']=Team::all()->sortByDesc('points');
        return view('front.index',$data);
    }

    public function recit()
    {
        $data = Recit::paginate(4);
        $recit = Recit::with('writer')->limit(4)->get();
        
        return view('front.recit.recit', compact('data', 'recit'));
    }

    public function recitSingle($id)
    {
        $data = Recit::find($id);
        $recit = Recit::limit(4)->get();
        return view('front.recit.recit_single', compact('data', 'recit'));
    }

    

    public function classement()
    {
        $teams = Team::all()->sortByDesc('points');
        $recit = Recit::limit(4)->get();
        

        return view('front.classement', compact('teams', 'recit'));
    }

    public function equipes()
    {
        $recit = Recit::limit(4)->get();
        $teams = Team::all();
        return view('front.equipes', compact('teams', 'recit'));

    }

    public function stat()
    {
        $players = Player::all()->sortByDesc('nbButs');
        $recit = Recit::limit(4)->get();
        return view('front.stat', compact('players', 'recit'));

    }

    public function compet()
    {
        $allData = Compet::all();
        $recit = Recit::limit(4)->get();
        return view('front.compet', compact('allData', 'recit'));

    }

    public function teamSingle($id)
    {
       $players = Player::where('team_id', '=', $id)->get();
       $recit = Recit::limit(4)->get();

        return view('front.team_single', compact('players', 'recit'));

    }

    public function playerSingle($id)
    {
       $player = Player::find($id);
       $recit = Recit::limit(4)->get();

        return view('front.player_single', compact('player', 'recit'));

    }

    public function recitWriter($id)
    {
       $data = Writer::find($id);
       $recit = Recit::limit(4)->get();
       return view('front.recit.recit_writer', compact('data', 'recit'));
    }

    public function CustomProfile($id)
    {  
        $user = User::find($id);

        return view('front.profile.index', compact('user'));
    }

    public function CustomShow($id)
    {
        $user = User::find($id);

        return view('front.profile.show', compact('user'));

    }

    public function CustomEdit($id)
    {
       
        $user = User::find($id);

        return view('front.profile.edit', compact('user'));

    }

    public function CustomStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile= $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image'] = $filename;  
        }
        $data->save();

        $notif = array(
            'message' => 'Profil mis a jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('home')->with($notif);

    }

    public function CustomUpdate(Request $request, $id)
    {

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile= $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image'] = $filename;  
        }
        $data->save();

       

        return redirect()->back();
    }


     
}
