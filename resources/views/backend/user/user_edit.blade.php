@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Mettre a jour un utilisateur</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('users.update', $editData->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row">

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Role <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="usertype" id="select" required=""
                                                                class="form-control">
                                                                <option value="" disabled="" selected="">Role</option>
                                                                <option value="Admin"
                                                                    {{ $editData->usertype == 'Admin' ? 'selected' : '' }}>
                                                                    Admin</option>
                                                                <option value="Utilisateur"
                                                                    {{ $editData->usertype == 'Utilisateur' ? 'selected' : '' }}>
                                                                    Utilisateur</option>

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Nom <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $editData->name }}" required="">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" value="{{ $editData->email }}"
                                                        class="form-control">
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


@endsection
