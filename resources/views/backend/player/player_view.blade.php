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
                                <h3 class="box-title">Liste des Joueurs</h3>
                                <a href="{{ route('player.add') }}" style="float:right" class="btn btn-rounded btn-success mb-5">Ajouter un
                                 joueur</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Poste</th>
                                                <th>Equipe</th>
                                                <th>Nom</th>
                                                <th>Niveau</th>
                                                <th>Age</th>
                                                <th>Taille</th>
                                                <th>Portrait</th>
                                                
                                                
                                                <th width="20%">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            
                                            @foreach ($allData as $key => $player)

                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>{{ $player->poste->name }}</td>
                                                    <td>{{ $player->team->name }}</td>
                                                    <td>{{ $player->fname }}  {{ $player->lname }}</td>
                                                    <td>{{ $player->cat }}</td>
                                                    <td>{{ $player->age }}</td>
                                                    <td>{{ $player->taille/100 }} m</td>
                                                    <td><img  src="{{ (!empty($player->image))? url('upload/player_image/'.$player->image):url('upload/no_image.jpg') }}" style="width: 80px;" ></td>
                                                    
                                                    <td>
                                                        <a href="{{ route('player.edit', $player->id) }}" class="btn btn-info mr-5">Edition</a>
                                                        <a href="{{ route('player.delete', $player->id) }}" class="btn btn-danger" id="delete">Suppression</a>
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
