
@extends('front.front_master')

@section('body')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Equipe</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Equipe</li>
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
                    <h4 class="box-title text-center mb-5"> <strong> LISTE DES JOUEURS</strong></h4>
                  </div>
                  
               <div class="row">
                @foreach ($players as $player)
                    <div class="col-md-4">
                        <div class="card mb-5">
                            <img class="card-img-top" src="{{ asset('upload/player_image/'.$player->image) }}" style="height: 220px;">
                            <div class="card-body">
                              <h5 class="card-title">{{ $player->fname }} {{ $player->lname }} </h5>
                              <p class="card-text">{{ $player->team->name }}</p>
                              <a href="{{ route('player.single', $player->id) }}" class="btn btn-primary">Détails</a>
                            </div>
                          </div>
                        </div>
               
                @endforeach
            </div> 
            
    
        
       
      
  </section><!-- End Blog Section -->
       
        </div>
    
        @include('front.partials.sidebar')
    </div>
</div><!-- End blog entries list -->
    
</section>
   

 

  @endsection