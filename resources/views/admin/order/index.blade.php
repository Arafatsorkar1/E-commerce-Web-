@extends('admin.master')


@section('body')
<div class="row mt-3">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All Orders Information</h4>
            <hr>

            @if (Session::get('noti'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('noti') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            @if (Session::get('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('msg') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-striped border">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Order NO</th>
                            <th>Order Date</th>
                            <th>Customer Info</th>
                            <th>Order Total</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->customer->name.' '.'('.$order->customer->mobile.')'}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td style="width: 220px">
                                    <a href="{{route('admin.order-detail',['id'=>$order->id])}}" class="btn btn-info" title="View Order Detail">
                                        <i class="fa fa-info"></i>
                                    </a>

                                    <a href="{{route('admin.order-edit',['id'=>$order->id])}}" class="btn btn-success {{$order->order_status == 'Complete' ? 'disabled' : ''}}" title="Order Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="{{route('admin.order-invoice',['id'=>$order->id])}}" class="btn btn-primary" title="View Order Invoice">
                                        <i class="fa fa-file-invoice"></i>
                                    </a>

                                    <a href="{{route('admin.print-invoice',['id'=>$order->id])}}" class="btn btn-dark" target="_blank" title="Print Order Invoice">
                                        <i class="fa fa-print"></i>
                                    </a>

                                    <a href="{{route('admin.order-delete',['id'=>$order->id])}}" class="btn btn-danger {{$order->order_status == 'Cancel' ? '' : 'disabled'}}" title="Delete Order">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

