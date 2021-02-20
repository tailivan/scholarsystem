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
                                <h3 class="box-title">Carrousel</h3>
                                <a href="{{ route('carou.add') }}" style="float:right" class="btn btn-rounded btn-success mb-5">Ajouter un
                                 slide</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Titre</th>
                                                <th>Texte</th>
                                                <th>Image</th>
                                                
                                                
                                                
                                                <th width="20%">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            
                                            @foreach ($allData as $key => $p)

                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>{{ $p->title }}</td>
                                                    <td>{{ $p->body}}</td>
                                                    
                                                    <td><img  src="{{ (!empty($p->image))? url('upload/carou_image/'.$p->image):url('upload/no_image.jpg') }}" style="width: 80px;" ></td>
                                                    
                                                    <td>
                                                        <a href="{{ route('carou.edit', $p->id) }}" class="btn btn-info mr-5">Edition</a>
                                                        <a href="{{ route('carou.delete', $p->id) }}" class="btn btn-danger" id="delete">Suppression</a>
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