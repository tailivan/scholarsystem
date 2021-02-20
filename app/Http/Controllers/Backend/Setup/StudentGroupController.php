<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\StudentGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentGroupController extends Controller
{
    public function ViewGroup()
    {

        $data['allData'] = StudentGroup::all();

        return view('backend.setup.group.view_group', $data);
    }

    public function GroupAdd()
    {

        return view('backend.setup.group.add_group');
    }

    public function GroupStore(Request $request)
    {

        $validateData= $request->validate([
            
            'name' => 'required|Unique:student_groups',

        ]);

            $data = new StudentGroup();
            $data->name = $request->name;
            $data->save();
            $notif = array(
                'message' => 'Groupe ajouté avec succès',
                'alert-type' => 'success'
            );
    
            return redirect()->route('student.group.view')->with($notif);
    }

    public function GroupEdit($id)
    {
        $editData = StudentGroup::find($id);
        return view('backend.setup.group.edit_group', compact('editData'));
    }

    public function GroupUpdate(Request $request, $id)
    {
        $data = StudentGroup::find($id);

        $data->name = $request->name;
            $data->save();
            $notif = array(
                'message' => 'Groupe mis a jour avec succès',
                'alert-type' => 'success'
            );
    
            return redirect()->route('student.group.view')->with($notif);

    }

    public function GroupDelete($id)
    {
        $user = StudentGroup::find($id);

        $user->delete();
        $notif = array(
            'message' => 'Groupe supprimé avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notif);
    }
}
