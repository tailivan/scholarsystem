<?php

namespace App\Http\Controllers\Backend\Setup;


use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Unique;

class StudentClassController extends Controller
{
    public function ViewStudent()
    {

        $data['allData'] = StudentClass::all();

        return view('backend.setup.student_class.view_class', $data);
    }

    public function StudantClassAdd()
    {

        return view('backend.setup.student_class.add_class');
    }

    public function StudantClassStore(Request $request)
    {

        $validateData= $request->validate([
            
            'name' => 'required|Unique:student_classes',

        ]);

            $data = new StudentClass();
            $data->name = $request->name;
            $data->save();
            $notif = array(
                'message' => 'Classe ajoutée avec succès',
                'alert-type' => 'success'
            );
    
            return redirect()->route('student.class.view')->with($notif);
    }

    public function StudantClassEdit($id)
    {
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class', compact('editData'));
    }

    public function StudantClassUpdate(Request $request, $id)
    {
        $data = StudentClass::find($id);

        $data->name = $request->name;
            $data->save();
            $notif = array(
                'message' => 'Classe mise a jour avec succès',
                'alert-type' => 'success'
            );
    
            return redirect()->route('student.class.view')->with($notif);

    }

    public function StudantClassDelete($id)
    {
        $user = StudentClass::find($id);

        $user->delete();
        $notif = array(
            'message' => 'Classe supprimée avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notif);
    }

    
}
