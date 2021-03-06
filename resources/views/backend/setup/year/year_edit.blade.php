@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
           
            <section class="content">

                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Modifier une Année</h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form method="POST" action="{{ route('update.year', $editData->id) }}">
                            @csrf
                            
                                   
                                  

                                    
                                        <div class="form-group">
                                            <h5>Nom de l'année'<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name"  value="{{ $editData->name }}" class="form-control"> 
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>

   
                                        
                                   <div class="text-xs-right"></div>
                                   <input type="submit" class="btn btn-rounded btn-info" value="Modifier">
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
