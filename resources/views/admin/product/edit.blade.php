@extends('admin.master')


@section('body')
    <div class="row">
        <div class="col-lg-12 mt-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Product Form</h4>
                    <hr>
                    @if (Session::get('msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('msg') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form class="form-horizontal p-t-20" action="{{ route('product.update',['id' => $product->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name<span
                                    class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <select name="category_id" id="categoryId" class="form-control">
                                    <option value="" disabled selected>-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{$category->id == $product->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Sub-Category Name<span
                                    class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <select name="sub_category_id" id="subCategoryId" class="form-control">
                                    <option value="" disabled selected>-- Select Sub-Category --</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}" {{ $subCategory->id == $product->sub_category_id ? 'selected' : ''}}>{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Brand Name<span
                                    class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <select name="brand_id" id="" class="form-control">
                                    <option value="" disabled selected>-- Select Brand --</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : ''}}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Name<span
                                    class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <select name="unit_id" id="" class="form-control">
                                    <option value="" disabled selected>-- Select Unit --</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}" {{ $unit->id == $product->unit_id ? 'selected' : ''}}>{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Name<span
                                    class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id=""
                                    value="{{ $product->name }}" placeholder="Product Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Code<span
                                    class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="code" id=""
                                    value="{{ $product->code }}" placeholder="Product Code">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Model</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="model" id=""
                                    value="{{ $product->model }}" placeholder="Product Model">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Stock Amount<span
                                    class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="stock_amount" id=""
                                    value="{{ $product->stock_amount }}" placeholder="Stock Amount">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Price<span
                                    class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="regular_price" id=""
                                        value="{{ $product->regular_price }}" placeholder="Regular Price">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <input type="text" class="form-control" name="selling_price" id=""
                                        value="{{ $product->selling_price }}" placeholder="Selling Price">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Short Description<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="short_description" placeholder="Short Description">{{ $product->short_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Long Description<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote" name="long_description" placeholder="Long Description">{{ $product->long_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Feature Image<span
                                class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="input-file-now" class="dropify" accept="image/*">
                                <img src="{{asset('/')}}{{$product->image}}" alt="" height="50px" width="80px">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Other Image<span
                                class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="file" name="other_image[]" id="input-file-now" multiple class="dropify" accept="image/*">
                                @foreach ($product->otherImages as $otherImage)
                                <img src="{{asset('/')}}{{$otherImage->other_image}}" alt="" height="50px" width="80px">
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" class="me-1" name="status" value="1" {{$product->status == 1 ? 'checked' : ''}}>Published</label>
                                <label><input type="radio" class="me-1" name="status" value="2" {{$product->status == 2 ? 'checked' : ''}}>Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
