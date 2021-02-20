
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
                     <h4 class="box-title text-center mb-5"> <strong> STATISTIQUES JOUEURS</strong></h4>
                   </div>
                   <!-- /.box-header -->
                   <table id="example1"  class="table table-bordered table-dark" >
                    <thead>
                      <tr>
                        <th>No</th>
                        
                        <th>Joueur</th>
                        <th>Portrait</th>
                        <th>Buts</th>
                        <th>Assistances</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($players as $p)
                     
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                           
                            <td>{{ $p->fname }} {{ $p->lname }} </td>
                            <td><img src="{{ asset('upload/player_image/'.$p->image )}}" style="width: 60px;" class="img-fluid"></td>
                            <td>{{ $p->Nbbuts }}</td>
                            <td>{{ $p->NbAssist}}</td>
                            
                            
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