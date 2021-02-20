
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
      

        <div class="col-lg-8 entries">
            <section class="content">



                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title text-center mb-5"> <strong> LISTE DES EQUIPES</strong></h4>
                   </div>
                   <!-- /.box-header -->
                   <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Equipe</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Nombre de Joueurs</th>
                        <
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
            
    
        </section>

        </div><!-- End blog entries list -->

        @include('front.partials.sidebar')

      </div>
    </div>
      

    
  </section><!-- End Blog Section -->

  @endsection