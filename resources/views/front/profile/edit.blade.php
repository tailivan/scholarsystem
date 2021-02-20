
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

                <div class="box-header with-border">
                    <h4 class="box-title text-center mb-5"> <strong>{{ $user->name }}  </strong></h4>
                  </div>
                  
                  <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('customer.update', $user->id) }}" enctype="multipart/form-data">
                                @csrf
                                

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Nom<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ $user->name }}"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Email<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" value="{{ $user->email }}"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>N° Mobile<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" value="{{ $user->mobile }}"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Adresse<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" value="{{ $user->address }}"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Sexe <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" id="gender" required=""
                                                            class="form-control">
                                                            <option value="" disabled="" selected="">Sexe</option>
                                                            <option value="Homme"
                                                                    {{ $user->gender == 'Homme' ? 'selected' : '' }}>
                                                                    Homme</option>
                                                                <option value="Femme"
                                                                    {{ $user->gender == 'Femme' ? 'selected' : '' }}>
                                                                    Femme</option>

                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Avatar <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="image" id="image" class="form-control">
                                                    </div>
                                                </div>

                                                

                                            </div>
                                        </div>

                                    </div>
                                </div>





                                <div class="text-xs-right"></div>
                                <input type="submit" class="btn btn-rounded btn-info" value="Mettre a jour">
                        </div>

                        
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                  
        
       
      
  </section><!-- End Blog Section -->
       
        </div>
    
       
    </div>
</div><!-- End blog entries list -->
    
</section>
   

 

  @endsection