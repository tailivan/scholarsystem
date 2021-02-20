
@extends('front.front_master')

@section('body')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Compte-Rendu</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Compte-Rendu</li>
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
                <h4 class="box-title text-center mb-5"> <strong> {{ $data->title }}</strong></h4>
              </div>
              <!-- /.box-header -->
           
            <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body text-center">
                      <h5 class="card-title text-center">{{ $data->compet->team1->name }} </h5>
                      <p class="card-text text-center" style="font-size: 28px"><strong>{{ $data->compet->score_1}}</strong></p>
                      <img src="{{ asset('upload/team_image/'.$data->compet->team1->image ) }}" style="width: 100px;">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body text-center">
                      <h5 class="card-title text-center">{{ $data->compet->team2->name }} </h5>
                      <p class="card-text text-center" style="font-size: 28px"><strong>{{ $data->compet->score_2}}</strong></p>
                      <img src="{{ asset('upload/team_image/'.$data->compet->team2->image ) }}" style="width: 100px;">
                    </div>
                  </div>
                </div>
              </div>

           <hr>

           

           <div class="box-header with-border">
            <h4 class="box-title text-center mb-5"> <strong> Table de marque</strong></h4>
          </div>
          <!-- /.box-header -->
          <table class="table table-bordered table-dark">
           <thead>
             <tr>
              <th scope="col">Equipe</th>
               <th scope="col">Buts</th>
               <th scope="col">Assistance</th>
               <th scope="col">Minutes</th>
               
               
             </tr>
           </thead>
           <tbody>
             
                  
              @foreach ($data->compet->goals as $item)
                  
              
            
               <tr>
                   
                  
                <td>{{$item->player->team->name }}  </td>
                <td>{{$item->player->fname}}   {{$item->player->lname }} </td>
              
                <td>{{$item->assist->fname }}   {{$item->assist->lname }} </td>
                <td>{{$item->marktime   }}  </td>
                   
                   
               </tr>
               @endforeach
              </tbody>
            </table>
            
            <hr>
           
          <article class="entry" data-aos="fade-up">

            <div class="entry-img">
              <img src="{{ asset('upload/recit_image/'.$data->image )}}" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              {{ $data->title }} 
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><img src="{{ asset('upload/writer_image/'.$data->writer->image) }}" style="width: 80px;" > <a href="{{ route('rw', $data->writer->id) }}">{{ $data->writer->fname }}  {{ $data->writer->lname }}</a></li>
                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{ $data->created_at->format('d-m-Y')}}</time></a></li>
                <li class="d-flex align-items-center"><i class="icofont-hockey"></i> {{ $data->writer->team->name }}</li>
              </ul>
            </div>

            <div class="entry-content">
              <p>
                {!! $data->body !!}
              </p>
              
            </div>

          </article><!-- End blog entry -->

         

         

        
        

          


        </section>

         

        </div><!-- End blog entries list -->

        @include('front.partials.sidebar')

      </div>

    </div>
  </section><!-- End Blog Section -->

  @endsection