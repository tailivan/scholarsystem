
@extends('front.front_master')

@section('body')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Joueur</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Joueur</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->
<section id="blog" class="blog">
    <div class="container">

       
       
        <div class="row">

        <div class="col-lg-12 entries">
            <section class="content">

                <div class="row">

                    <div class="col-md-4">
                        <div class="widget-user-image">
                            <img class="rounded-circle" 
                            src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg')  }}" style="width:300px; "alt="User Avatar">
                          </div>
                    </div>
                    <div class="col-md-8 border-left">
                        <h3 class="widget-user-username">Nom: {{ $user->name }}</h3>
                      <a href="{{ route('customer.edit', $user->id) }}" style="float:right" class="btn btn-rounded btn-success mb-5">Editer
                        l'Utilisateur</a>
                      <h6 class="widget-user-desc">Role: {{ $user->usertype }}</h6>
                      <h6 class="widget-user-desc">Email: {{ $user->email }}</h6>
                      <div class="description-block">
                        <h5 class="description-header">N° Mobile</h5>
                        <span class="description-text">{{ $user->mobile }}</span>
                      </div>
                      <div class="description-block">
                        <h5 class="description-header">Adresse</h5>
                        <span class="description-text">{{ $user->address }}</span>
                      </div>
                      <div class="description-block">
                        <h5 class="description-header">Sexe</h5>
                        <span class="description-text">{{ $user->gender }}</span>
                      </div>

                    </div>
                </div>
                  
                 
                  
        
       
      
  </section><!-- End Blog Section -->
       
        </div>
    
       
    </div>
</div><!-- End blog entries list -->
    
</section>
   

 

  @endsection