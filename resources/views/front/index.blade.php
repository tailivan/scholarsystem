@extends('front.front_master')

@section('body')
    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Saison en cours U13</strong></h2>
          </div>
  
          <div class="row content">
            <div class="col-lg-6" data-aos="fade-right">
             



                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title text-center mb-5"> <strong> CLASSEMENT U13</strong></h4>
                   </div>
                   <!-- /.box-header -->
                   <table class="table table-bordered table-dark" style="height: 1121px;">
                    <thead>
                      <tr>
                        <th scope="col">Equipe</th>
                        <th scope="col">Joués</th>
                        <th scope="col">Gagnés</th>
                        <th scope="col">Nuls</th>
                        <th scope="col">Perdus</th>
                        <th scope="col">Points</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($teams as $team)
                     
                        <tr>
                            
                           
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->won + $team->tied + $team->lost  }}</td>
                            <td>{{ $team->won }}</td>
                            <td>{{ $team->tied }}</td>
                            <td>{{ $team->lost }}</td>
                            <td>{{ $team->points }}</td>
                            
                        </tr>
                   
                    @endforeach
                     
                    </tbody>
                  </table>
                 </div>
            
    
        
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title text-center mb-5"> <strong> LISTE DES EQUIPES</strong></h4>
                </div>
                <!-- /.box-header -->
                <table class="table table-bordered table-dark" style="height: 1120px;">
                 <thead>
                   <tr>
                     <th scope="col">N°</th>
                     <th scope="col">Equipe</th>
                     <th scope="col">Ville</th>
                     <th scope="col">Logo</th>
                     <th scope="col">Nombre de Joueurs</th>
                   
                   </tr>
                 </thead>
                 <tbody>
                     @foreach($teams as $team)
                  
                     <tr>
                         <td>{{ $loop->iteration }}</td>
                        
                         <td>{{ $team->name }}</td>
                         <td>{{ $team->pat->name }}</td>
                         <td><img src="{{ asset('upload/team_image/'.$team->image ) }}" style="width: 80px"></td>
                         <td><a href="{{ route('team.single', $team->id) }}">{{ $team->players->count() }}</a></td>
                         
                         
                     </tr>
                
                 @endforeach
                  
                 </tbody>
               </table>
              </div>
     
            </div>
          </div>
  
        </div>
      </section><!-- End About Us Section -->
  
      <!-- ======= Services Section ======= -->
      <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Derniers Comptes-rendus</strong></h2>
            <p>Les derniers comptes rendus de nos envoyés spéciaux...</p>
          </div>
          
      
  <div class="row">
    @foreach ($recit as $p)
            <div class="col-md-4">
              <div class="card"  >
                <img class="card-img-top" src="{{ asset('upload/recit_image/'.$p->image) }}" style="height:300px;" >
                <div class="card-body">
                  <h5 class="card-title"><a href="{{ route('blog.single', $p->id) }}">{{ $p->title }}</a></h5>
                  <p class="card-text" > {!! Str::limit($p->body,60) !!}  </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"> 
                  <div class="entry-meta text-center">
                  <img src="{{ asset('upload/writer_image/'.$p->writer->image) }}" style="width: 50px;height:50px" > 
                   <a href="{{ route('rw', $p->writer_id )  }}"> {{ $p->writer->fname }}  {{ $p->writer->lname }}</a> le: {{ $p->created_at->format('d-m-Y')}}
                  </div>
                </li>
                </ul>
                
              </div>
            </div>

              
  
           
          @endforeach
  </div>
        </div>
      </section><!-- End Services Section -->
  
      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio">
        <div class="container">
  
          <div class="section-title" data-aos="fade-up">
            <h2>Quelques Photos</h2>
          </div>
  
          <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                @foreach ($filter as $p)
               
                <li data-filter="{{ ('.filter-'.$p->cat) }}">{{ $p->cat }}</li>
                
                @endforeach
               
              </ul>
            </div>
          </div>
          
              
          
          <div class="row portfolio-container" data-aos="fade-up">
            @foreach ($filterall as $p)
            <div class=" col-md-6 portfolio-item filter-{{ $p->cat }}">
              <img src="{{ asset('upload/filter_image/'.$p->image) }}" class="img-fluid">
              
            

         <div class="portfolio-info">
              <h4>{{ $p->title }}</h4>
              <p>{{ $p->body }}</p>
              <a href="{{ asset('upload/filter_image/'.$p->image) }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
             
            </div>
          </div>
            @endforeach
            
          </div>
          
        </div>
       
      </section><!-- End Portfolio Section -->
  
      <!-- ======= Our Clients Section ======= -->
      <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>JOUEURS</h2>
          </div>
          <div class="row">
         
          <div class="row  clients-wrap clearfix" data-aos="fade-up">
            @foreach ($playerslimit as $item)
            <div class="col-md-3">
              <div class="card mb-5">
                <img class="card-img-top" src="{{ asset('upload/player_image/'.$item->image) }}"  >
                <div class="card-body">
                  <h5 class="card-title"><a href="{{ route('player.single', $item->id) }}">{{ $item->fname }}  {{ $item->lname }}</a></h5>
                  <p class="card-text">Equipe: <a href="{{ route('team.single', $item->team->id) }}">{{ $item->team->name }}</a></p>    <p> <img src="{{ asset('upload/team_image/'.$item->team->image) }}" style="height: 80px;margin-left:40px; "> </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Ville: {{ $item->team->pat->name }} </li>
                  <li class="list-group-item">Poste: {{ $item->poste->name }}</li>
                  <li class="list-group-item">Age: {{ $item->age }}  ans</li>
                  <li class="list-group-item">Taille: {{ $item->taille/100 }}  M</li>
                </ul>
                
              </div>
            
              </div>
          
          
      
          @endforeach
        </div>
       
        
      </section><!-- End Our Clients Section -->

      @endsection