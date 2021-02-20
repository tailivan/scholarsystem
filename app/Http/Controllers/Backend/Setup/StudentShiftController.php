<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentShiftController extends Controller
{
    public function ViewSchift()
    {

        $data['allData'] = StudentShift::all();

        return view('backend.setup.shift.view_shift', $data);
    }

    public function ShiftAdd()
    {

        return view('backend.setup.shift.add_shift');
    }

    public function ShiftStore(Request $request)
    {

        $validateData= $request->validate([
            
            'name' => 'required|Unique:student_shifts',

        ]);

            $data = new StudentShift();
            $data->name = $request->name;
            $data->save();
            $notif = array(
                'message' => 'Equipe ajoutée avec succès',
                'alert-type' => 'success'
            );
    
            return redirect()->route('student.shift.view')->with($notif);
    }

    public function ShiftEdit($id)
    {
        $editData = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift', compact('editData'));
    }

    public function ShiftUpdate(Request $request, $id)
    {
        $data = StudentShift::find($id);

        $data->name = $request->name;
            $data->save();
            $notif = array(
                'message' => 'Equipe mise a jour avec succès',
                'alert-type' => 'success'
            );
    
            return redirect()->route('student.shift.view')->with($notif);

    }

    public function ShiftDelete($id)
    {
        $user = StudentShift::find($id);

        $user->delete();
        $notif = array(
            'message' => 'Equipe supprimée avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notif);
    }

}
