
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
      

        <div class="col-lg-8 entries">
            <section class="content">



                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title text-center mb-5"> <strong> CLASSEMENT U13</strong></h4>
                   </div>
                   <!-- /.box-header -->
                   <table class="table table-bordered table-dark">
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
            
    
        </section>

        </div><!-- End blog entries list -->

        @include('front.partials.sidebar')

      </div>
    </div>
      

    
  </section><!-- End Blog Section -->

  @endsection