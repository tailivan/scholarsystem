
@extends('front.front_master')

@section('body')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Matches</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Matches</li>
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
                     <h4 class="box-title text-center mb-5"> <strong> LISTE DES MATCHES</strong></h4>
                   </div>
                   <!-- /.box-header -->
                   <table class="table table-bordered table-dark">
                    <thead>
                      <tr>
                        <th width="5%">SL</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Match</th>
                        <th>Score</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $key => $compet)

                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>{{ $compet->date }}</td>
                                                    <td>{{ $compet->heure }} H</td>
                                                   
                                                    <td>{{ $compet->team1->name}} VS {{ $compet->team2->name}}</td>
                                                    
                                                   
                                                    <td>{{ $compet->score_1 }} / {{ $compet->score_2 }}</td>
                                                    
                                                    
                                                    


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