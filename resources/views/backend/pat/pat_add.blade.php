@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
           
            <section class="content">

                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Ajouter une patinoire</h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form method="POST" action="{{ route('pat.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                                   
                                  

                                    
                                        <div class="form-group">
                                            <h5>Nom de la patinoire'<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name"  class="form-control"> 
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Adresse'<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address"  class="form-control"> 
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>ZIP'<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="zip"  class="form-control"> 
                                            @error('zip')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Image'<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image"  class="form-control"> 
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
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


@endsection
