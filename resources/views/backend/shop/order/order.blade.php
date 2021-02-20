@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                      <!-- Simple Tables -->
                      <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">All Orders</h6>
                        </div>
                        <div class="table-responsive">
                          <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                              <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>View</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              @if(count($orders)>0)
                              @foreach($orders as $key=> $order)
                              <tr>
        
                                <td><a href="#">{{$key+1}}</a></td>
                               
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->user->email}}</td>
                                <td>{{date('d-M-y',strtotime($order->created_at))}}</td>
                                <td>{{$order->status}}</td>
                                <td>
                                    <a href="{{route('userorders',[$order->user_id,$order->id])}}" class="btn btn-info">
                                        View Order
                                    </a>
                                </td>
                                
                               
                              </tr>
                              @endforeach
        
                              @else
                              <td>No any orders to show</td>
                              @endif
                              
                              
                              
                            </tbody>
                          </table>
                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>
                  </div>
            </section>
            <!-- /.content -->

        </div>
    </div>


@endsection
