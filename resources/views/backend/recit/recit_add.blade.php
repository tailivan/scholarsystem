@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
           
            <section class="content">
               
                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Ajouter un compte-rendu</h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form method="POST" action="{{ route('recit.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                                   <div class="row">
                                       
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Match<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="compet_id" id="select" required="" class="form-control">
                                                    <option value="" disabled="" selected="">Match</option>
                                                    @foreach($compet as $key => $p)
                                                    <option value="{{ $p->id }}">{{ $p->team1->name}} VS {{ $p->team2->name}} - Score: {{ $p->score_1}} / {{ $p->score_2}} du {{ $p->date}}</option>
                                                    @endforeach
                                                    
                                                    
                                                    
                                                </select>
                                            
                                        </div> 
                                        </div> 

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Auteur<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="writer_id" id="select" required="" class="form-control">
                                                    <option value="" disabled="" selected="">Auteur</option>
                                                    @foreach($writer as $key => $p)
                                                    <option value="{{ $p->id }}">{{ $p->fname}} {{ $p->name}}  correspondant de : {{ $p->team->name }}</option>
                                                    @endforeach
                                                    
                                                    
                                                    
                                                </select>
                                            
                                        </div> 
                                        </div> 

                                    </div>
                                
                                </div>
                                  <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Titre<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="title"  class="form-control"> 
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Contenu<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <div class="form-group">
                                                    
                                                    <textarea class="form-control ckeditor" name="body" rows="6"></textarea>
                                                  </div>
                                            
                                            </div>
                                        </div>
                                        
                                    </div>

                                  </div>

                                  <div class="row">
                                   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Photo<span class="text-danger">*</span></h5>
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

@endsection
