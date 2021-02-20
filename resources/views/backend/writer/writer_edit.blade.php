@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Mettre a jour un auteur</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('writer.update', $editData->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    
                                           
                                          <div class="row">
                                            <div class="col-md-6">
        
                                                <div class="form-group">
                                                    <h5>Prénom<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="fname" value="{{ $editData->fname }}" class="form-control"> 
                                                    
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Nom<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="lname" value="{{ $editData->lname }}" class="form-control"> 
                                                    
                                                    </div>
                                                </div>
                                                
                                            </div>
        
                                          </div>
        
                                          <div class="row">
                                            <div class="col-md-6">
                                                

                                                <div class="form-group">
                                                    <h5>Equipe <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="team_id" id="select" required="" class="form-control">
                                                            <option value="" disabled="" selected="">Equipe</option>
                                                            @foreach($team as $key => $p)
                                                            <option value="{{ $p->id }}" {{ $p->id == $editData->team_id ? "selected" :"" }}>{{ $p->name}}</option>
                                                            @endforeach
                                                            
                                                            
                                                            
                                                        </select>
                                                    
                                                </div> 
                                                </div> 
                                               
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Portrait <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="image" id="image" class="form-control">
                                                    </div>
                                                </div>
                                            
        
                                          <div class="form-group">

                                            <div class="controls">
                                                <img id="showImage"
                                                    src="{{ !empty($editData->image) ? url('upload/writer_image/' . $editData->image) : url('upload/no_image.jpg') }}"
                                                    style="width: 100px; "
                                                    alt="User Avatar">
                                            </div>
                                        </div>
                                    </div>
                                </div>

        
                                          
        
                                            
        
                                            
                                                
                                                
        
                                                
        
           
                                                
                                           <div class="text-xs-right"></div>
                                           <input type="submit" class="btn btn-rounded btn-info" value="Ajouter">
                                    </form>
                                        
                                            

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
        </div>
        <!-- /.box -->

        </section>


    </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

        });

    </script>
@endsection
