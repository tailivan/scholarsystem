
@extends('front.front_master')

@section('body')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Boutique</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Boutique</li>
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
    <div class="row">
<aside class="col-md-5 border-right">

    <img src="{{ asset('upload/product_image/'.$prod->image) }}" style="width: 400px;">
</aside>

<aside class="col-md-7">
<section class="card-body p-5">
    <h2>{{ $prod->name }}</h2>
    <p class="price-detail-wrap">
        <span class="price h3 text-danger">
        <span class="currency">{{ $prod->price }} €</span></span>
    </p>
    <h3>Description</h3>
    <p>{!! $prod->description !!}</p>
    <h3>Information</h3>
    <p><em>{!! $prod->additional_info !!}</em></p>
    <hr>


    <a href="{{ route('add.cart', $prod->id) }}" > <span class="btn btn-sm btn-outline-primary mr-2" > Ajouter au panier</span></a> 
</section>
</aside>
</div>
</main>
@if ($prodSameCat->count()>0)
    

<div class="jumbotron">
    <h3 class="mb-3">Produits similaires</h3>
    <div class="row ">
       
    @foreach ($prodSameCat as $p)
       
  
    <div class="col-md-4">
      <div class="card shadow-sm mb-5" style="height:540px;">
        <img src="{{ asset('upload/product_image/'.$p->image) }}" class="img-fluid" style="height: 300px;" >
        <div class="card-body">
            <p class="text-center" style="text-transform: uppercase;" ><b>{{ $p->category->name }}</b></p>
            <div>
                <p>{{ $p->name }}
                <span class="badge badge-success" style="float: right"> {{ $p->price }} €</span></p>
            </div>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
            <a href="{{ route('show.product', $p->id) }}" > <span class="btn btn-sm btn-outline-primary mr-2" > Détails</span></a>
            <a href="{{ route('add.cart', $p->id) }}" > <span class="btn btn-sm btn-outline-primary mr-2" > Ajouter au panier</span></a> 
            </div>
            
          </div>
        </div>
      </div>
    
</div>
 
    @endforeach
  </div>
  </div>         
    
  @endif
            </section>
        </div><!-- End blog entries list -->

       

      </div>
      
    </div>
      

    
  </section><!-- End Blog Section -->

  @endsection