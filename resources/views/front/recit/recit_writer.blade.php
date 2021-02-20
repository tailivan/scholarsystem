
@extends('front.front_master')

@section('body')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Comptes-Rendus</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Comptes-Rendus</li>
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
                <h4 class="box-title text-center mb-5"> <strong> {{ $data->name }}</strong></h4>
              </div>
              <!-- /.box-header -->
           
            
           <hr>

           

           <div class="box-header with-border">
            <h4 class="box-title text-center mb-5"> <strong> Table de marque</strong></h4>
          </div>
          <!-- /.box-header -->
          
            
            <hr>
           @foreach ($data->recits as $data)
               
          
          <article class="entry" data-aos="fade-up">

            <div class="entry-img">
              <img src="{{ asset('upload/recit_image/'.$data->image )}}" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              {{ $data->title }}
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><img src="{{ asset('upload/writer_image/'.$data->writer->image) }}" style="width: 80px;" > {{ $data->writer->fname }}  {{ $data->writer->lname }}</li>
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

          @endforeach

         

        
        

          


        </section>

         

        </div><!-- End blog entries list -->

        @include('front.partials.sidebar')

      </div>

    </div>
  </section><!-- End Blog Section -->

  @endsection