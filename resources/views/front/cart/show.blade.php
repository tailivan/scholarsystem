
@extends('front.front_master')

@section('body')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Equipes</h2>
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
              @if($errors->any())

              @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{$error}}</div>
              @endforeach
              @endif
            <table id="cart" class="table table-hover ">
    	

        <thead>
          <tr>
            <th class="text-center" >#</th>
            <th class="text-center" >Image</th>
            <th class="text-center" >Produit</th>
            <th class="text-center">Prix</th>
            <th class="text-center" >Quantité</th>
            <th class="text-center" >Supprimer</th>
          </tr>
        </thead>
        <tbody>

          @if($cart)
          @php $i=1 @endphp
          @foreach ($cart->items as $prod)
              
          
          <tr>
            <th class="text-center" scope="row">{{ $i++ }}</th>
            <td class="text-center"><img src="{{ asset('upload/product_image/'.$prod['image']) }}" width="100"></td>
            <td class="text-center">{{ $prod['name'] }}</td>
            <td class="text-center">{{ $prod['price'] }}  €</td>
            <td class="text-center">
              <form action="{{ route('update.cart', $prod['id']) }}" method="POST">
                @csrf
                <input type="number" name="qty" style="width: 10%;" value="{{  $prod['qty']}}">
                <input type="submit"  class="btn btn-secondary btn-sm" value="Actualiser">
              </form>
            </td>
            <form action="{{ route('remove.cart', $prod['id']) }}" method="POST">
              @csrf
            <td class="text-center"><input type="submit"  class="btn btn-danger btn-sm" value="Supprimer">
            </form>
          </td>
          </tr>
          @endforeach
      
        </tbody>
      </table>	
      <hr>
      <div class="card-footer">
          <button class="btn btn-warning">Continuez vos achats</button>
          <span style="margin-left:300px;">Prix Total: {{ $cart->totalPrice}} €</span>
          <a href="{{ route('checkout.cart', $cart->totalPrice) }}" class="btn btn-info float-right">Payer</a>
      </div>			

      @else
      <td>Votre panier est vide</td>
      @endif  
    
        </section>

        </div><!-- End blog entries list -->

       

      </div>
    </div>
      

    
  </section><!-- End Blog Section -->

  @endsection