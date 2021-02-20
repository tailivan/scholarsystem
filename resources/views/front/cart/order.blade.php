
@extends('front.front_master')

@section('body')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Mes commandes</h2>
        <ol>
          <li><a href="index.html">Boutique</a></li>
          <li>Mes commandes</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->
<section id="blog" class="blog">
    <div class="container">

       
        <div class="row">
      

        <div class="col-lg-12 entries">
            <section class="content">

<main>

  <div class="row justify-content-center">
    <div class="col-md-8">
      @foreach($carts as $cart)
      
      <div class="card mb-3">
        <div class="card-body">
          @foreach($cart->items as $item)
       
          <span class="float-right">
            <img src="{{asset('upload/product_image/'.$item['image'])}}" width="100">
          </span>

          <p>Nom:{{$item['name']}}</p>
          <p>Prix:{{$item['price']}}</p>
          <p>Qty:{{$item['qty']}}</p>

          @endforeach
          
        </div>

      </div>
      <p>
        <button type="button" class="btm btn-info" style="color: #fff;">
          <span class="">
            Total:{{$cart->totalPrice}}  €
          </span>
        </button>
      </p>
      <hr>
      @endforeach
    </div>
  </div>

</main>

                
    
      
            </section>
        </div><!-- End blog entries list -->

       

      </div>
    </div>
      

    
  </section><!-- End Blog Section -->

  @endsection