@extends('admin.master')


@section('body')
    <div class="row">
        <div class="col-lg-12 mt-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Unit Form</h4>
                    <hr>
                    @if (Session::get('msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('msg') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form class="form-horizontal p-t-20" action="{{route('unit.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Name<span
                                    class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="exampleInputuname3" value="{{old('name')}}" placeholder="Unit Name">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Code<span
                                    class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="code" id="exampleInputuname3" value="{{old('code')}}" placeholder="Unit Code">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Unit Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" placeholder="Unit Description">{{old('description')}}</textarea>
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
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create New Unit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
