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
                                <h3 class="box-title">Liste des Matchs</h3>
                                <a href="{{ route('compet.add') }}" style="float:right" class="btn btn-rounded btn-success mb-5">Ajouter un
                                 match</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Date</th>
                                                <th>Heure</th>
                                                <th>Match</th>
                                                <th>Score</th>
                                     
                                                <th width="20%">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                         
                                            @foreach ($allData as $key => $compet)

                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>{{ $compet->date }}</td>
                                                    <td>{{ $compet->heure }} H</td>
                                                   
                                                    <td>{{ $compet->team1->name}} VS {{ $compet->team2->name}}</td>
                                                    
                                                   
                                                    <td>{{ $compet->score_1 }} / {{ $compet->score_2 }}</td>
                                                    
                                                    
                                                    <td>
                                                        <a href="{{ route('compet.edit', $compet->id) }}" onclick="return false;" class="btn btn-info mr-5">Edition</a>
                                                       
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
