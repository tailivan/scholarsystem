@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">



                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Liste des Patinoires</h3>
                                <a href="{{ route('pat.add') }}" style="float:right" class="btn btn-rounded btn-success mb-5">Ajouter un
                                  Groupe</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Nom</th>
                                                <th>Adresse</th>
                                                <th>ZIP</th>
                                                <th>Image</th>
                                                <th width="20%">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $pat)

                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>{{ $pat->name }}</td>
                                                    <td>{{ $pat->address }}</td>
                                                    <td>{{ $pat->zip }}</td>
                                                    <td><img src="{{ (!empty($pat->image))? url('upload/pat_image/'.$pat->image):url('upload/no_image.jpg')  }}" style="width: 100px;"></td>
                                                    <td>
                                                        <a href="{{ route('pat.edit', $pat->id) }}" class="btn btn-info mr-5">Edition</a>
                                                        <a href="{{ route('pat.delete', $pat->id) }}" class="btn btn-danger" id="delete">Suppression</a>
                                                    </td>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>


@endsection
