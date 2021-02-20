@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @foreach($carts as $cart)
           
                        <div class="card mb-5">
                            <div class="card-body mb-5">
                                @foreach($cart->items as $item)
                                <span class="float-right">
                                    <img src="{{asset('upload/product_image/'.$item['image'])}}"  width="100">
                                </span>
           
                                <p>Nom:{{$item['name']}}</p>
                                <p>Prix:{{$item['price']}}</p>
                                <p>Qty:{{$item['qty']}}</p>
           
           
                                @endforeach
                                
                            </div>
           
                        </div>
           
                        <p>
                            <button type="button" class="btm btn-success">
                                <span class="">
                                    Total price:${{$cart->totalPrice}}
                                </span>
                            </button>
                        </p>
                        
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- /.content -->

        </div>
    </div>


@endsection
