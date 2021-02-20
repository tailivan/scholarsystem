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
                                <h3 class="box-title">Liste des Equipes</h3>
                                <a href="{{ route('team.add') }}" style="float:right" class="btn btn-rounded btn-success mb-5">Ajouter une
                                 équipe</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Equipe</th>
                                                <th>Ville</th>
                                                
                                                <th>Image</th>
                                                <th width="20%">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $team)
                                            
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>{{ $team->name }}</td>
                                                    <td>{{ $team->pat->name }}</td>
                                                    
                                                    <td><img src="{{ (!empty($team->image))? url('upload/team_image/'.$team->image):url('upload/no_image.jpg')  }}" style="width: 100px;"></td>
                                                    <td>
                                                        <a href="{{ route('team.edit', $team->id) }}" class="btn btn-info mr-5">Edition</a>
                                                        <a href="{{ route('team.delete', $team->id) }}" class="btn btn-danger" id="delete">Suppression</a>
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
