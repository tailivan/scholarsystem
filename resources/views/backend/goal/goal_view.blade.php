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
                                <h3 class="box-title">Liste des Buts</h3>
                                <a href="{{ route('goal.add') }}" style="float:right" class="btn btn-rounded btn-success mb-5">Ajouter un
                                 but</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Match</th>
                                                <th>Résultat</th>
                                                <th>But</th>
                                                <th>Assistance</th>
                                                <th>Minutage</th>
                                              
                                               

                                            </tr>
                                        </thead>
                                        <tbody>

                                            
                                            @foreach ($allData as $key => $goal)
                                            
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>{{ $goal->match->team1->name }}  VS  {{ $goal->match->team2->name }}</td>
                                                    <td>{{ $goal->match->score_1 }} / {{ $goal->match->score_2}}</td>
                                                    <td>{{ $goal->player->fname }} </td>
                                                    <td>{{ $goal->assist->fname }} </td>
                                                    <td>{{ $goal->marktime }}</td>
                                                    
                                                    
                                                    


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
