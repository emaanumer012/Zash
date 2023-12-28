
    @extends('layouts.main2')
    @push('title')
    <title>About Us</title>
    @endpush
    @push('css')
    <link rel="stylesheet" href="css/AboutUs.css">
    <link rel="stylesheet" href="css/navbar.css">
    @endpush

    @section('main-section')

   <x-NavBar></x-NavBar>

    <section class="section1">
        @foreach($infos as $info)
        <div class="div1">
            <h1 >
                {{$info["heading"]}}
            </h1>
            <p >
                {{$info["info"]}}
            </p>

        </div>
        @endforeach
        
    </section>


<section >

        <div class="pro_div" style="background-color: #1d4a85; " >
            <div style="float: left;">
            <img src="images\emaan.jpeg" alt="" class="pic img-responsive">
             </div>
             <div style="float: left;">
            <p><b>Name:</b>Emaan Umer</p>
            <p><b>Profession:</b>Software Engineer</p>
            <p><b>Instagram:</b> <a href=""> localEmaan</a></p>
        </div>
        </div>
        <div class="pro_div" style="background-color:#082142;" >
            <div style="float: left;">
            <img src="images\umair.jpeg" alt="" class="pic img-responsive">
             </div>
             <div style="float: left;">
            <p><b>Name:</b>Umair Asim</p>
            <p><b>Profession:</b>Software Engineer</p>
            <p><b>Instagram:</b><a href="" > umairAsim </a></p>
        </div>
        </div>
        <div class="pro_div" style="background-color:#082142; " >
            <div style="float: left;">
            <img src="images\fahd.jpeg" alt=""  class="pic img-responsive">
             </div>
             <div style="float: left;">
            <p><b>Name:</b>Fahd Ahmed</p>
            <p><b>Profession:</b>Software Engineer</p>
            <p><b>Instagram:</b> <a href=""> OyeFadh</a></p>
        </div>
        </div>
        <div class="pro_div" style="background-color: #1d4a85; ">
            <div style="float: left;">
            <img src="images\Ahmed.jpeg" alt=""class="pic img-responsive">
             </div>
             <div style="float: left;">
            <p><b>Name:</b>Ahmed Abdullah</p>
            <p><b>Profession:</b>Software Engineer</p>
            <p><b>Instagram:</b> <a href=""> Ded</a></p>
        </div>
        </div>

    </section>
    <x-Foot />
    @endsection
