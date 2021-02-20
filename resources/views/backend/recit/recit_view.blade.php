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
                                <h3 class="box-title">Liste des comptes-rendus</h3>
                                <a href="{{ route('recit.add') }}" style="float:right" class="btn btn-rounded btn-success mb-5">Ajouter un
                                 compte-rendu</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Match</th>
                                                <th>Auteur</th>
                                                <th>Titre</th>
                                                <th>Photo</th>
                                                
                                                
                                                <th width="20%">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            
                                            @foreach ($allData as $key => $recit)

                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    
                                                    <td>{{ $recit->compet->team1->name }}  VS  {{ $recit->compet->team2->name }}</td>
                                                 
                                                    
                                                    <td>{{  $recit->writer->fname }} {{  $recit->writer->lname }}     Correspondant de: {{  $recit->writer->team->name }} </td>

                                                    <td>{{ $recit->title }}</td>
                                                    <td><img  src="{{ (!empty($recit->image))? url('upload/recit_image/'.$recit->image):url('upload/no_image.jpg') }}" style="width: 80px;" ></td>
                                                    
                                                    <td>
                                                        <a href="{{ route('recit.edit', $recit->id) }}" class="btn btn-info mr-5">Edition</a>
                                                        <a href="{{ route('recit.delete', $recit->id) }}" class="btn btn-danger" id="delete">Suppression</a>
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