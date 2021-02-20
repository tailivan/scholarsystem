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
                        
                        <th>Joueur</th>
                        <th>Buts</th>
                        <th>Assistances</th>
                        
                        
                    </tr>
                    @forelse($players as $p)
                 
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                           
                            <td>{{ $p->fname }} {{ $p->lname }} </td>
                            <td>{{ $p->Nbbuts }}</td>
                            <td>{{ $p->NbAssist}}</td>
                            
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
