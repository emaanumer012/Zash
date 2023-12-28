@extends('layouts.main')
@push('title')
    <title>Login</title>
@endpush
@section('content')
<body>
    <main>
        <!-- Login-->
        <section>
            <div class="container-fluid ">
                <div class="row">
                    <div class="login-form col-lg-12 col-md-6 admin">
                        <h1>ZASH</h1>
                        <H2>SIGN IN AS ADMIN</H2>
                        <br>
                        @php
                        if (!isset($errorStatus))
                            $errorStatus=1;
                        @endphp
                        <form action="{{url('/login')}}" method='post' >
                            @csrf
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Email: " name="email" id="email"
                                    aria-describedby="emailHelpId">
                                <!-- <small id="emailHelpId" class="form-text text-muted">Help text</small> -->
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Password: " name="password"
                                    id="password" placeholder="">
                            </div>
                            <button type="submit" class="product-add">Login</button>
                            <a href="/homepage" class="product-add">Continue Buying!</a>
                            <!--@if (session('alert'))
                                <div class="alert alert-success">
                                    {{ session('alert') }}
                                </div>                            @endif -->

                            <h5 style="color:red; text-align:center;"> Incorrect Credentials, Log in Again!</h5>



                        </form>

                    </div>
                </div>
            </div>
        </section>
    </main>

    @endsection
