@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
           
            <section class="content">
               
                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Ajouter une catégorie</h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form method="POST" action="{{ route('cat.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                           
                                  <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name"  class="form-control"> 
                                            
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Description<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="desc" class="form-control"  rows="6"></textarea>
                                            
                                            </div>
                                        </div>
                                        
                                    </div>

                                  </div>

                                  <div class="row">
                                    
                                    <div class="col-md-6">
                                        
                                            <div class="form-group">
                                                <h5>Image<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="image"  class="form-control"> 
                                               
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


@endsection
