<?php

namespace App\Http\Controllers\Front;

use App\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Symfony\Component\HttpFoundation\RequestStack;

class CartController extends Controller
{
    public function addToCart(Product $product, Request $request)
   {
      if(session()->has('cart')){
          $cart = new Cart(session()->get('cart'));
      }else{
          $cart = new Cart();
      }

      $cart->add($product);
     
      session()->put('cart', $cart);
      return redirect()->back();
   }

    public function ShowCart()
   {
    if(session()->has('cart')){
        $cart = new Cart(session()->get('cart'));
    }else{
        $cart = null;
    }

    //dd($cart);
       return view('front.cart.show', compact('cart'));
   }

   public function UpdateCart(Request $request, Product $product){
    $request->validate([
        'qty'=>'required|numeric|min:1'
    ]);

    $cart  = new Cart(session()->get('cart'));
    $cart->updateQty($product->id,$request->qty);
    session()->put('cart',$cart);
    
    return redirect()->back();

}

    public function RemoveCart(Product $product){
    $cart = new Cart(session()->get('cart'));
    $cart->remove($product->id);
    if($cart->totalQty<=0){
        session()->forget('cart');
    }else{
        session()->put('cart',$cart);
        

    }
    
        return redirect()->back();
}

    public function Checkout($amount)
    {
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = null;
        }  

        return view('front.cart.checkout', compact('amount', 'cart'));
    }

    public function Charge(Request $request){
        $charge = Stripe::charges()->create([
            'currency'=>"EUR",
            'source'=>$request->stripeToken,
            'amount'=>$request->amount,
            'description'=>'Test'
        ]);

        $chargeId = $charge['id'];
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = null;
        } 
        //Mail::to(auth()->user()->email)->send(new Sendmail($cart));

      

       if($chargeId){
            auth()->user()->orders()->create([

                'cart'=>serialize(session()->get('cart'))
            ]);

            session()->forget('cart');
            
            return redirect()->route('shop.product');

        }else{
            return redirect()->back();
        }

    }

    public function Order(){
        $orders = auth()->user()->orders;
        $carts =$orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
        return view('front.cart.order',compact('carts'));

    }

    //for admin
    public function userOrder(){
        $orders = Order::latest()->get();
        return view('admin.order.index',compact('orders'));
    }
    public function viewUserOrder($userid,$orderid){
        $user = User::find($userid);
        $orders = $user->orders->where('id',$orderid);
        $carts =$orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
        return view('admin.order.show',compact('carts'));
    }


}
