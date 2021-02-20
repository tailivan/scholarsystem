@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
           
            <section class="content">
               
                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Ajouter une sous-catégorie</h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form method="POST" action="{{ route('subcat.store') }}" >
                            @csrf
                            
                           
                                  <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Nom<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name"  class="form-control"> 
                                            
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Description<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" >
                                                    <option value="" selected= "">catégorie</option>
                                                    @foreach ($cats as $p)
                                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endforeach

                                                </select>
                                            
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
