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
                    <tr>
                        <th>Product Id</th>
                        <td>{{$product->id}}</td>
                    </tr>
                    <tr>
                        <th>Product Name</th>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Code</th>
                        <td>{{$product->code}}</td>
                    </tr>
                    <tr>
                        <th>Product Model</th>
                        <td>{{$product->model}}</td>
                    </tr>
                    <tr>
                        <th>Product Category</th>
                        <td>{{$product->category->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Sub-Category</th>
                        <td>{{$product->subCategory->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Brand</th>
                        <td>{{$product->brand->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Unit</th>
                        <td>{{$product->unit->name}}</td>
                    </tr>
                    <tr>
                        <th>Stock Amount</th>
                        <td>{{$product->stock_amount}}</td>
                    </tr>
                    <tr>
                        <th>Regular Price</th>
                        <td>{{$product->regular_price}}</td>
                    </tr>
                    <tr>
                        <th>Selling Price</th>
                        <td>{{$product->selling_price}}</td>
                    </tr>
                    <tr>
                        <th>Feature Image</th>
                        <td>
                            <img src="{{asset($product->image)}}" alt="" height="50px" width="80px">
                        </td>
                    </tr>
                    <tr>
                        <th>Other Image</th>
                        <td>
                            @foreach ($product->otherImages as $otherImage)
                            <img src="{{asset($otherImage->other_image)}}" alt="" height="50px" width="80px">
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Product Hit Count</th>
                        <td>{{$product->hit_count}}</td>
                    </tr>
                    <tr>
                        <th>Product Sales Count</th>
                        <td>{{$product->sales_count}}</td>
                    </tr>
                    <tr>
                        <th>Product Feature Status</th>
                        <td>{{$product->feature_satus}}</td>
                    </tr>
                    <tr>
                        <th>Publication Status</th>
                        <td>{{$product->status}}</td>
                    </tr>
                    <tr>
                        <th>Action</th>
                        <td style ="width:"80px">
                            <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-success" title="Edit">
                               Edit
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

