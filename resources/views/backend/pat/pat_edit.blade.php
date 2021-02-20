@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Mettre a jour une patinoire</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('pat.update',$editData->id ) }}" enctype="multipart/form-data">
                                    @csrf


                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Nom<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" value="{{ $editData->name }}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Adresse<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="address" value="{{ $editData->address }}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>ZIP<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="zip" value="{{ $editData->zip }}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Avatar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="image" id="image" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">

                                                <div class="controls">
                                                    <img id="showImage"
                                                        src="{{ !empty($editData->image) ? url('upload/pat_image/' . $editData->image) : url('upload/no_image.jpg') }}"
                                                        style="width: 100px; height: 100px; border: 2px solid #000"
                                                        alt="User Avatar">
                                                </div>
                                            </div>

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

    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

        });

    </script>
@endsection
