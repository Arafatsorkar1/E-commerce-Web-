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
                            <th>Category Name</th>
                            <th>Sub-Category Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($subCategories as $subCategory)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$subCategory->category->name}}</td>
                                <td>{{$subCategory->name}}</td>
                                <td>{{$subCategory->description}}</td>
                                <td>
                                    <img src="{{asset($subCategory->image)}}" alt="{{$subCategory->name}}" height="50px" width="80px">
                                </td>
                                 <td>{{$subCategory->status == 1 ? "Published" : "Unpublished"}}</td>
                                <td>
                                    <a href="{{route('subCategory.edit',['id'=>$subCategory->id])}}" class="btn btn-success"> <i class="fa fa-edit"></i> </a>
                                    <a href="{{route('subCategory.delete',['id'=>$subCategory->id])}}" class="btn btn-danger"> <i class="fa fa-trash"> </i> </a>
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

