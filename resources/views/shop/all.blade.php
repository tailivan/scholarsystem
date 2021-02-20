@extends('front.front_master')

@section('body')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Classement</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Classement</li>
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

  
       

        <h2 class="mb-2 mt-5">PRODUITS</h2>
  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
      
       @foreach ($products as $p)
           
      
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
                <a href="{{ route('add.cart', $p->id) }}" > <span class="btn btn-sm btn-outline-primary mr-2" > Ajouter au panier</span></a>                </div>
                
              </div>
            </div>
          </div>
        
    </div>
     
        @endforeach
      </div>
      {{ $products->links() }}
    </div>
  </div>
  
</main>


    
      
            </section>

            
        </div><!-- End blog entries list -->

       

      </div>
    </div>
      

    
  </section><!-- End Blog Section -->

  @endsection