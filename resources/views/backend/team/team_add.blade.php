@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
           
            <section class="content">

                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Ajouter une équipe</h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form method="POST" action="{{ route('team.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                                   
                                  

                                    
                                        <div class="form-group">
                                            <h5>Nom de l'équipe'<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name"  class="form-control"> 
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Patinoires <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="pat_id" id="select" required="" class="form-control">
                                                    <option value="" disabled="" selected="">Patinoire</option>
                                                    @foreach($allData as $key => $pat)
                                                    <option value="{{ $pat->id }}">{{ $pat->name}}</option>
                                                    @endforeach
                                                    
                                                    
                                                    
                                                </select>
                                            
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
