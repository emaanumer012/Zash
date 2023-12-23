@extends('layouts.main')
@push('title')
<title>Admin Home Page</title>
@endpush
@section('content')

<body class="section-a">
    <x-nav-bar-admin></x-nav-bar-admin>
    <main>

        <div class="container-fluid" src="../images/signin.png">
            <div class="row admin">
                <div class="col-lg-12 col-md-6">
                    <a href="/addProduct" class="homepage-btn addCart btn ">Add Product</a>
                    <a href="/productTable" class="homepage-btn addCart btn ">View Products</a>
                    <a href="/orders" class="homepage-btn addCart btn ">View Orders</a>
                    <!-- <a href="/login" class="homepage-btn addCart btn ">Sign Out</a> -->
                </div>
            </div>
        </div>
    </main>
    <x-Foot />
    @endsection