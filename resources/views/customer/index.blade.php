@extends('website.master')
@section('title')
    Login | Register
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Login / Register</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li>Complete Order</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Login Form</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('customer.login')}}" method="POST">
                                @csrf
                                <p class="text-danger text-center">{{Session::get('msg')}}</p>
                                <div class="row mb-3">
                                    <label class="col-md-3">Email Address</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-primary" value="Login">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Register Form</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('customer.register')}}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-3">Full Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" value="{{old("name")}}">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Email Address</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email" value="{{old("email")}}">
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                                <div class="row mb-3">
                                    <label class="col-md-3">Mobile Number</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="mobile" value="{{old("mobile")}}">
                                        @error('mobile')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password">
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-primary" value="Register">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection