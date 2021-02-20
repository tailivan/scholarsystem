<?php

namespace App\Http\Controllers\Backend\Shop;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function ViewProduct()
    {

        $data['allData']=Product::all();
        return view('backend.shop.product.product_view', $data);
    }

    public function AddProduct()

    {
        $data['cat']= Category::all();
        $data['subcat']= Subcategory::all();
        return view('backend.shop.product.product_add', $data);
    }

    public function loadCategories(Request $request, $id)
    {
        $subcategory = Subcategory::where('category_id', $id)->pluck('name', 'id');
        return response()->json($subcategory);
    }

    public function StoreProduct(Request $request)
    {
        $data = new Product();
       
        $data->name = $request->name;
        $data->description = $request->description;
        $data->additional_info = $request->additional_info;
        $data->price = $request->price;
        $data->category_id = $request->category_id;
        $data->subcategory_id = $request->subcategory_id;
       

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/product_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/product_image'), $filename);
            $data['image'] = $filename;  
        }
        

        

        $data->save();

        $notif = array(
            'message' => 'produit ajouté avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('product.view')->with($notif);

    }

    public function EditProduct($id)
    {
        $editData = Product::find($id);
        $cat = Category::all();

        return view('backend.shop.product.product_edit', compact('editData', 'cat'));
    }

    public function UpdateProduct(Request $request, $id)
    {
        $data = Product::find($id);
       
        $data->name = $request->name;
        $data->description = $request->description;
        $data->additional_info = $request->additional_info;
        $data->price = $request->price;
        $data->category_id = $request->category_id;
        $data->subcategory_id = $request->subcategory_id;
       

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/product_image/'.$data->image)) ;
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/product_image'), $filename);
            $data['image'] = $filename;  
        }
        

        

        $data->save();

        $notif = array(
            'message' => 'produit mis à jour avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('product.view')->with($notif);
    }

    public function DeleteProduct($id)
    {
        $data = Product::find($id);
        $data->delete();
        $notif = array(
            'message' => 'produit supprimé avec succès',
            'alert-type' => 'danger'
        );

        return redirect()->route('product.view')->with($notif);
    }

     public function userOrder()
    {
        $orders = Order::latest()->get();
        return view('backend.shop.order.order', compact('orders') );
    }

    public function viewUserOrder($userid,$orderid){
        $user = User::find($userid);
        $orders = $user->orders->where('id',$orderid);
        $carts =$orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
        return view('backend.shop.order.show',compact('carts'));
    }

}
