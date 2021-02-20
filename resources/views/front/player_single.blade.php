
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

        <div class="col-lg-8 entries">
            <section class="content">

                <div class="box-header with-border">
                    <h4 class="box-title text-center mb-5"> <strong>{{ $player->fname }}  {{ $player->lname }}</strong></h4>
                  </div>
                  
               
                  <div class="row">

                    <div class="col-md-6">
                      <div class="card"style="height: 360px;" >
                        <img src="{{ asset('upload/player_image/'.$player->image) }}" style="width: 300px;">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card" style="height: 360px;">
                        <ul style="list-style: square inside;">
                        <li class="mb-3 mt-4"> <strong>Son équipe:</strong>    {{ $player->team->name }}</li>
                        <li class="mb-3"> <strong>Sa ville:</strong>    {{ $player->team->pat->name }}</li>
                        <li class="mb-3"> <strong>Sa catégorie:</strong>    U13</li>
                        <li class="mb-3"> <strong>Son poste:</strong>    {{ $player->poste->name }}</li>
                        <li class="mb-3"> <strong>Son âge:</strong>    {{ $player->age }} ans</li>
                        <li class="mb-3"> <strong>Sa taille:</strong>    {{ $player->taille/100 }} M</li>
                        <li class="mb-3"> <strong>Ses buts:</strong>      {{ $player->nbButs }}</li>
                        <li class="mb-3"> <strong>Ses assistances:</strong>      {{ $player->nbAssist }}</li>
                       
                    </ul>
                    </div>
                    </div>
                  </div>
        
       
      
  </section><!-- End Blog Section -->
       
        </div>
    
        @include('front.partials.sidebar')
    </div>
</div><!-- End blog entries list -->
    
</section>
   

 

  @endsection