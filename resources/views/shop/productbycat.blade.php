
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
    <div class="col-md-2">
        <h4>Filtrer </h4>
        <form action="{{ route('show.category', $slug) }}" method="GET">
       <!--foreach subcategories-->
       @if ($subcats->count() > 0)
       @foreach ($subcats as $item)
          
     
       <p><input type="checkbox" class="mr-3" name="subcategory[]" value="{{ $item->id }}"
        @if (isset($filterdSubCat))
        {{ in_array($item->id, $filterdSubCat) ? 'checked = "checked"' : ''}} 
            
        @endif
        >{{ $item->name }}</p>
       @endforeach
       @else
           <p>Il n'a pas de sous catégorie!</p>
       @endif
      
      <!--end foreach-->
     <input type="submit" value="Filtrer" class="btn btn-success">
    </form>

    <hr>
    <h4>Filtre par prix</h4>
    <form action="{{ route('show.category', $slug) }}" method="GET">
        <!--foreach subcategories-->
       <input type="text" class="mr-3 form-control" name="min"
         placeholder="prix mini" required="">
        <br>
         <input type="text" class="mr-3 form-control" name="max"
         placeholder="prix mini" required=""> 
         <input type="hidden" class="mr-3 form-control" name="categoryId"
        value="{{ $categoryId }}"> 
        
       <br>
       <!--end foreach-->
      <input type="submit" value="Filtrer" class="btn btn-success">
     </form>
<hr>

<a href="{{ route('show.category', $slug) }}">Retour</a>
   </div>
   
 <div class="col-md-10 border-left">
   <div class="row">
 <!--foreach products-->
 @foreach ($prods as $item)
     
 

   <div class="col-md-4">
     <div class="card mb-4 shadow-sm" style="height:440px;">
       <img src="{{ asset('upload/product_image/'.$item->image) }}" class="img-fluid" style="height: 300px;">
       <div class="card-body">
           <p><b>{{ $item->name }} </b></p>
         
         <div class="d-flex justify-content-between align-items-center">
           <div class="btn-group">
            <a href="{{ route('show.product', $item->id) }}" > <span class="btn btn-sm btn-outline-primary mr-2" > Détails</span></a>
            <a href="{{ route('add.cart', $item->id) }}" > <span class="btn btn-sm btn-outline-primary mr-2" > Ajouter au panier</span></a> 
           </div>
           <small class="text-muted">{{ $item->price }} €</small>
         </div>
       </div>
     </div>
   </div>
<!--endforeach-->
@endforeach
</div>
</div>   
</div>
</main>

            </section>
        </div><!-- End blog entries list -->

       

      </div>
      
    </div>
      

    
  </section><!-- End Blog Section -->

  @endsection