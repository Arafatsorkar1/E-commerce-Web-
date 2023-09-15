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
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>Brand Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($brands as $brand)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->description}}</td>
                                <td>
                                    <img src="{{asset('/')}}{{$brand->image}}" alt="{{$brand->name}}" height="50px" width="80px">
                                </td>
                                <td>{{$brand->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    <a href="{{route('brand.edit',['id'=>$brand->id])}}" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="{{route('brand.delete',['id'=>$brand->id])}}" class="btn btn-danger">
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

