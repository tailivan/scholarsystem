<?php

namespace App\Http\Controllers\Backend\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ViewCat()
    {

        $data['allData']=Category::all();
        return view('backend.shop.category.cat_view', $data);
    }

    public function AddCat()
    {
        return view('backend.shop.category.cat_add');
    }

    public function StoreCat(Request $request)
    {
        $data = new Category();
       
        $data->name = $request->name;
        $data->desc = $request->desc;
       
       

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/category_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/category_image'), $filename);
            $data['image'] = $filename;  
        }
        

        

        $data->save();

        $notif = array(
            'message' => 'catégorie ajoutée avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('cat.view')->with($notif);

    }

    public function EditCat($id)
    {
        $editData = Category::find($id);
       

        return view('backend.shop.category.cat_edit', compact('editData'));
    }

    public function UpdateCat(Request $request, $id)
    {
        $data = Category::find($id);
        $data->name = $request->name;
        $data->desc = $request->desc;
       
        
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/category_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/category_image'), $filename);
            $data['image'] = $filename;  
        }

   
        $data->save();

        $notif = array(
            'message' => 'Catégorie mise a jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('cat.view')->with($notif);
    }

    public function DeleteCat($id)
    {
        $data = Category::find($id);
        $data->delete();
        $notif = array(
            'message' => 'Catégorie supprimée avec succès',
            'alert-type' => 'danger'
        );

        return redirect()->route('cat.view')->with($notif);
    }
}