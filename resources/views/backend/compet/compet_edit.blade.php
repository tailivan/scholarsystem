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
                           <form method="POST" action="{{ route('compet.update',$editData->id) }}">
                            @csrf
                            
                                   
                                  <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Date<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="date" value="{{ $editData->date}}" class="form-control"> 
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
                                                <input type="text" name="heure"  value="{{ $editData->heure}}" class="form-control"> 
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
                                            <select name="team_2" id="select" required="" class="form-control">

                                                <option value=""></option>
                                                <option value="{{ $editData->team1_id}}" {{ $editData->team1_id == $editData->team1_id ? "selected" :"" }} >{{ $editData->team1->name}}</option>
                                            
                                                
                                                
                                                
                                            </select>
                                        
                                    </div> 
                                    </div> 
                                    </div>
                                
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Equipe 2 <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="team_2" id="select" required="" class="form-control">
                                                <option value=""></option>
                                                <option value="{{ $editData->team2_id}}" disabled="" selected="">{{ $editData->team2->name}}</option>
                                                
                                                
                                                
                                                
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
                                                <input type="text" name="score_1" value="{{ $editData->score_1}}" class="form-control"> 
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
                                                <input type="text" name="score_2" value="{{ $editData->score_2}}" class="form-control"> 
                                            @error('score_2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        
                                    </div>

                                  </div>

                                  

                                    
                                        
                                        

                                        

   
                                        
                                   <div class="text-xs-right"></div>
                                   <input type="submit" class="btn btn-rounded btn-info" value="Mettre a jour">
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
