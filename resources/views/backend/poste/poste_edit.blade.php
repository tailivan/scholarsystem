@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Mettre a jour un poste</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('poste.update',$editData->id ) }}">
                                    @csrf


                                   

                                       
                                            <div class="form-group">
                                                <h5>Nom<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" value="{{ $editData->name }}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                       

                                       


                                   





                                    <div class="text-xs-right"></div>
                                    <input type="submit" class="btn btn-rounded btn-info" value="Mettre a jour">
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
