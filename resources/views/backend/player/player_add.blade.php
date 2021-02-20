@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
           
            <section class="content">
               
                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Ajouter un joueur</h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form method="POST" action="{{ route('player.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                                   
                                  <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Prénom<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="fname"  class="form-control"> 
                                            @error('fname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Nom<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="lname"  class="form-control"> 
                                            @error('lname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        
                                    </div>

                                  </div>

                                  <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Poste <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="poste_id" id="select" required="" class="form-control">
                                                    <option value="" disabled="" selected="">Poste</option>
                                                    @foreach($poste as $key => $p)
                                                    <option value="{{ $p->id }}">{{ $p->name}}</option>
                                                    @endforeach
                                                    
                                                    
                                                    
                                                </select>
                                            
                                        </div> 
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Equipe <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="team_id" id="select" required="" class="form-control">
                                                <option value="" disabled="" selected="">Equipe</option>
                                                @foreach($team as $key => $p)
                                                <option value="{{ $p->id }}">{{ $p->name}}</option>
                                                @endforeach
                                                
                                                
                                                
                                            </select>
                                        
                                    </div> 
                                    </div> 
                                    </div>
                                  </div>
                                 

                                  <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Niveau<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="cat"  class="form-control"> 
                                            @error('cat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Age<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="age"  class="form-control"> 
                                            @error('age')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        
                                    </div>

                                  </div>

                                  <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Taille<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="taille"  class="form-control"> 
                                            @error('taille')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Portrait<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image"  class="form-control"> 
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
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
