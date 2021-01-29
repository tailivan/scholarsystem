@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
           
            <section class="content">

                <!-- Basic Forms -->
                 <div class="box">
                   <div class="box-header with-border">
                     <h4 class="box-title">Ajouter un utilisateur</h4>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                     <div class="row">
                       <div class="col">
                           <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                             <div class="row">
                               <div class="col-12">	
                                   
                                <div class="row">

                                    <div class="col-md-6">
    
                                        <div class="form-group">
                                            <h5>Role <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="usertype" id="select" required="" class="form-control">
                                                    <option value="" disabled="" selected="">Role</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Utilisateur">Utilisateur</option>
                                                    
                                                </select>
                                            
                                        </div> 
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Nom <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required=""></div></div>
                                            
                                        </div>
                                </div>
                                        
                                    </div>
                                  </div>
                                   
                                  <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Mot de passe  <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control"> </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Password  <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password" class="form-control" required=""> </div>
                                        </div>
                                    </div>
                                  </div>
                                   
                                   
                                   
                                   
                             
                                   
                                   
                                   
                                   <div class="text-xs-right"></div>
                                   <input type="submit" class="btn btn-rounded btn-info" value="Ajouter">
                               </div>
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
