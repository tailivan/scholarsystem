@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                           <form method="POST" action="{{ route('goal.store') }}">
                            @csrf

                                   <div class="add_item">
                                  <div class="row">
                                    <div class="col-md-12">

                               
                                    
                                        <div class="form-group">
                                            <h5>Match <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="compet_id" id="select" required="" class="form-control">
                                                    <option value="" disabled="" selected="">Match</option>
                                                    @foreach($compet as $key => $p)
                                                    <option value="{{ $p->id }}">{{ $p->team1->name}} VS {{ $p->team2->name}} | {{ $p->score_1}} / {{ $p->score_2}}</option>
                                                    @endforeach
                                                    
                                                    
                                                    
                                                </select>
                                            
                                        </div> 
                                        </div> 
                                        
                                    

                                  </div>

                                  </div>

                                  <div class="row">
                                      <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Buteur <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="player_id[]" id="select" required="" class="form-control">
                                                    <option value="" disabled="" selected="">Buteur</option>
                                                    @foreach($player as $key => $p)
                                                    <option value="{{ $p->id }}">{{ $p->team->name }} - {{ $p->fname }}  {{ $p->lname }}</option>
                                                    @endforeach
                                                    
                                                    
                                                    
                                                </select>
                                            
                                        </div> 
                                        </div> 
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Assistance <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="assist_id[]" id="select" required="" class="form-control">
                                                    <option value="" disabled="" selected="">Assistance</option>
                                                    @foreach($player as $key => $p)
                                                    <option value="{{ $p->id }}"> {{ $p->team->name }} - {{ $p->fname }}  {{ $p->lname }}</option>
                                                    @endforeach
                                                    
                                                    
                                                    
                                                </select>
                                            
                                        </div> 
                                        </div> 
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Marqué à <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="marktime[]"  class="form-control"> 
                                            
                                        </div> 
                                        </div> 
                                    </div>
                                    <div class="col-md-3" style="padding-top: 25px;" >
                                         <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
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


    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">

                 
                        <div class="col-md-3">
                          <div class="form-group">
                              <h5>Buteur <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <select name="player_id[]" id="select" required="" class="form-control">
                                      <option value="" disabled="" selected="">Buteur</option>
                                      @foreach($player as $key => $p)
                                     
                                      <option value="{{ $p->id }}">{{ $p->team->name }} - {{ $p->fname }}  {{ $p->lname }}</option>
                                      @endforeach
                                      
                                      
                                      
                                  </select>
                              
                          </div> 
                          </div> 
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <h5>Assistance <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <select name="assist_id[]" id="select" required="" class="form-control">
                                      <option value="" disabled="" selected="">Assistance</option>
                                      @foreach($player as $key => $p)
                                      <option value="{{ $p->id }}">{{ $p->team->name }} - {{ $p->fname }}  {{ $p->lname }}</option>
                                      @endforeach
                                      
                                      
                                      
                                  </select>
                              
                          </div> 
                          </div> 
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <h5>Marqué à <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="text" name="marktime[]"  class="form-control"> 
                              
                          </div> 
                          </div> 
                      </div>
                      <div class="col-md-3" style="padding-top: 25px;" >
                           <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                           <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                      </div>
                     




        		
  			</div>  			
        </div>  		
    </div>  	
</div>


<script type="text/javascript">
   $(document).ready(function(){
       var counter = 0;
       $(document).on("click",".addeventmore",function(){
           var whole_extra_item_add = $('#whole_extra_item_add').html();
           $(this).closest(".add_item").append(whole_extra_item_add);
           counter++;
       });
       $(document).on("click",'.removeeventmore',function(event){
           $(this).closest(".delete_whole_extra_item_add").remove();
           counter -= 1
       });

   });
</script>

@endsection
