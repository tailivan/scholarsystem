<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function ProductList()
    {
        $products = Product::limit(9)->get();
        $cats = Category::all();
        return view('shop.product_list', compact('products', 'cats'));
    }

    public function ProductShow($id)
    {
        $prod = Product::find($id);
        $prodSameCat = Product::inRandomOrder()
            ->where('category_id', '=', $prod->category_id)
            ->where('id', '!=', $prod->id)
            ->limit(3)
            ->get();
        return view('shop.show_product', compact('prod', 'prodSameCat'));
    }

    public function CategoryListe($name, Request $request)
    {
        $filterdSubCat=[];
        $category = Category::where('name', '=', $name)->first();
        $categoryId = $category->id;
        if ($request->subcategory) {
            $prods = $this->filterProducts($request);
            $filterdSubCat = $this->getSubcategoriesId($request);
           
        }elseif($request->min || $request->max){
            $prods = $this->filterByPrice($request);
        } else {
            $prods = Product::where('category_id', '=', $category->id)->get();
        }
   
        $subcats = Subcategory::where('category_id', '=', $category->id)->get();
        $slug = $name;
        return view('shop.productbycat', compact('prods', 'subcats', 'slug', 'filterdSubCat', 'categoryId'));
    }

    public function filterProducts(Request $request)
    {
        $subId = [];
        $subcat = Subcategory::whereIn('id', $request->subcategory)->get();
        foreach($subcat as $sub){
            array_push($subId, $sub->id);

        }
        $products = Product::whereIn('subcategory_id', $subId)->get();
        return $products;
    }

    public function getSubcategoriesId(Request $request)
    {
        $subId = [];
        $subcat = Subcategory::whereIn('id', $request->subcategory)->get();
        foreach($subcat as $sub){
            array_push($subId, $sub->id);

        }
       
        return $subId;
    }

    public function filterByPrice(Request $request)
    {
        $categoryId = $request->categoryId;
        $product = Product::whereBetween('price', [$request->min, $request->max])->where('Category_id', $categoryId)->get();
        return $product;
    }

    public function MoreProduct(Request $request)
    {
        if($request->search){
            $products = Product::where('name', 'like', '%'.$request->search.'%')
            ->orWhere('description', 'like', '%'.$request->search.'%')
            ->orWhere('additional_info', 'like', '%'.$request->search.'%')
            ->paginate(9);
            return view('shop.all', compact('products'));
        }

        $products = Product::latest()->paginate(6);

        return view('shop.all', compact('products'));
    }
}