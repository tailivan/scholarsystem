<?php

namespace App\Http\Controllers\Backend\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function ViewSubcat()
    {

        $data['allData']=Subcategory::all();
        return view('backend.shop.subcat.subcat_view', $data);
    }

    public function AddSubcat()

    {
        $data['cats']= Category::all();
        return view('backend.shop.subcat.subcat_add',$data);
    }

    public function StoreSubcat(Request $request)
    {
        $data = new Subcategory();
       
        $data->name = $request->name;
        $data->category_id = $request->category_id;
       
        $data->save();

        $notif = array(
            'message' => 'sous-catégorie ajoutée avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('subcat.view')->with($notif);

    }

    public function EditSubcat($id)
    {
        $editData = Subcategory::find($id);
        $cats = Category::all();

        return view('backend.shop.subcat.subcat_edit', compact('editData', 'cats'));
    }

    public function UpdateSubcat(Request $request, $id)
    {
        $data = Subcategory::find($id);
       
        $data->name = $request->name;
        $data->category_id = $request->category_id;
       
        $data->save();

        $notif = array(
            'message' => 'sous-catégorie mise à jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('subcat.view')->with($notif);

    }

    public function DeleteSubcat($id)
    {
        $data = Subcategory::find($id);
        $data->delete();
        $notif = array(
            'message' => 'sous-catégorie supprimée avec succès',
            'alert-type' => 'danger'
        );

        return redirect()->route('subcat.view')->with($notif);
    }

}
