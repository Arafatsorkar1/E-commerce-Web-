@extends('website.master')
@section('title')
    Complete-Order
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
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
               @if (Session::get('msg'))
               <h4 class="text-center text-success">{{Session::get('msg')}}</h4>
                {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('msg')}}</strong> 
                </div> --}}
               @endif
            </div>
        </div>
    </section>
@endsection
