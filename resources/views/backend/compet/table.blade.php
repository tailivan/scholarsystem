@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="container-full">
       
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Ajouter un joueur</h4>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">

                <table class="table">
                    <tr>
                        <th>No</th>
                        
                        <th>Equipe</th>
                        <th>Joués</th>
                        <th>Gagnés</th>
                        <th>Nuls</th>
                        <th>Perdus</th>
                        <th>Points</th>
                        
                    </tr>
                    @forelse($teams as $team)
                 
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                           
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->won + $team->tied + $team->lost  }}</td>
                            <td>{{ $team->won }}</td>
                            <td>{{ $team->tied }}</td>
                            <td>{{ $team->lost }}</td>
                            <td>{{ $team->points }}</td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No teams.</td>
                        </tr>
                    @endforelse
                </table>
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
