<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\StudentYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentYearController extends Controller
{
    public function ViewYear()
    {
        $data['allData'] = StudentYear::all();

        return view('backend.setup.year.view_year', $data);
    }

    public function YearAdd()
    {

        return view('backend.setup.year.year_add');
    }

    public function YearEdit($id)
    {
        $editData = StudentYear::find($id);
        return view('backend.setup.year.year_edit', compact('editData'));
    }

    public function YearStore(Request $request)
    {

        $validateData= $request->validate([
            
            'name' => 'required|Unique:student_years',

        ]);

            $data = new StudentYear();
            $data->name = $request->name;
            $data->save();
            $notif = array(
                'message' => 'Annéeajoutée avec succès',
                'alert-type' => 'success'
            );
    
            return redirect()->route('student.year.view')->with($notif);
    }
    public function YearUpdate(Request $request, $id)
    {
        $data = StudentYear::find($id);

        $data->name = $request->name;
            $data->save();
            $notif = array(
                'message' => 'Année mise a jour avec succès',
                'alert-type' => 'success'
            );
    
            return redirect()->route('student.year.view')->with($notif);

    }

    public function YearDelete($id)
    {
        $user = StudentYear::find($id);

        $user->delete();
        $notif = array(
            'message' => 'Année supprimée avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notif);
    }

    
   

}
