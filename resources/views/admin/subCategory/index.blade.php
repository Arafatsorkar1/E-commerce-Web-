@extends('admin.master')


@section('body')
    <div class="row">
        <div class="col-lg-12 mt-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Sub-Category Form</h4>
                    <hr>
                    @if (Session::get('msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('msg') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form class="form-horizontal p-t-20" action="{{route('subCategory.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name<span
                                    class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <select name="category_id" id="" class="form-control">
                                    <option value="" disabled selected>-- Select Category --</option>
                                   @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                   @endforeach
                                </select>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Sub-Category Name<span
                                    class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="" value="{{old('name')}}" placeholder="Sub-Category Name">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Sub-Category Description<span
                                class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" placeholder="Sub-Category Description">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Sub-Category Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="input-file-now" class="dropify" value="{{old('image')}}" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" class="me-1" name="status" value="1" checked>Published</label>
                                <label><input type="radio" class="me-1" name="status" value="2">Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create New Sub-Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
