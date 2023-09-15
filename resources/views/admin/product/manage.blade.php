@extends('admin.master')


@section('body')
<div class="row mt-3">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Table</h4>
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
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Stock Amount</th>
                            <th>Category Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->code}}</td>
                                <td>{{$product->stock_amount}}</td>
                                <td>
                                    <img src="{{asset('/')}}{{$product->image}}" alt="{{$product->name}}" height="50px" width="80px">
                                </td>
                                <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td style="width: 150px">
                                    <a href="{{route('product.details',['id'=>$product->id])}}" class="btn btn-info" title="Details">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>

                                    <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-success" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="{{route('product.delete',['id'=>$product->id])}}" class="btn btn-danger" title="Delete">
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

