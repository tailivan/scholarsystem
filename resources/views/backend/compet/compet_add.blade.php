@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
           
            <section class="content">

                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Ajouter un Match</h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form method="POST" action="{{ route('compet.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                                   
                                  <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Date<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="date" value="{{ date('dd-mm-YYYY')}}" class="form-control"> 
                                            @error('date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Heure<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="heure"  class="form-control"> 
                                            @error('heure')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        
                                    </div>

                                  </div>

                                  <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Equipe 1 <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="team_1" id="select" required="" class="form-control">
                                                <option value="" disabled="" selected="">Equipe</option>
                                                @foreach($team as $key => $p)
                                                <option value="{{ $p->id }}">{{ $p->name}}</option>
                                                @endforeach
                                                
                                                
                                                
                                            </select>
                                        
                                    </div> 
                                    </div> 
                                    </div>
                                
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Equipe 2 <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="team_2" id="select" required="" class="form-control">
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
                                            <h5>Score 1<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="score_1"  class="form-control"> 
                                            @error('score_1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Score 2<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="score_2"  class="form-control"> 
                                            @error('score_2')
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
