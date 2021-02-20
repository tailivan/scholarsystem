<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Goal;
use App\Models\Compet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Player;

class GoalController extends Controller
{
    public function ViewGoal()
    {
        $data['allData']=Goal::all();

       
        return view('backend.goal.goal_view',$data);
    }

    public function AddGoal()
    {
        
        $compet = Compet::orderBy('created_at', 'DESC')->get();
        $player = Player::orderBy('team_id', 'DESC')->get();
        
        return view('backend.goal.goal_add',compact('compet', 'player'));
    }

    public function StoreGoal(Request $request)
    {

        $countClass = count($request->player_id);
    	if ($countClass !=NULL) {
    		for ($i=0; $i <$countClass ; $i++) { 
    			$goal = new Goal();
    			$goal->compet_id = $request->compet_id;
    			$goal->player_id = $request->player_id[$i];
    			$goal->assist_id = $request->assist_id[$i];
                $goal->marktime = $request->marktime[$i];
    			$goal->save();

    		} // End For Loop
    	}// End If Condition

    	$notification = array(
    		'message' => 'Goals insérés avec succès',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('goal.view')->with($notification);
    }

    public function RangGoal()
    {
        $players = Player::all();

        return view('backend.goal.goal_rang', compact('players'));
    }

   /* public function getCompets($id)
    {
        $result = Goal::where('compet_id', '=', $id)->get();
        return $result;
    }*/

}
