@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fliud m-0 p-0">
    <!-- Banner -->
    <div id="demo" class="carousel slide text-center" data-ride="carousel" >
        <!-- The Slide Show -->
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" >
                <img class="img img-fluid" src="images/slider1.jpg" alt="..." />
                
                <div class="carousel-caption jumbotron-fluid text-left">
                    <h3>PRIME <b>UK</b></h3>
                    <h1><B>PROPERTY</B></h1>
                    <p>INVESTMENTS</p>
                </div>
            
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="images/slider2.jpg" alt="..."/>
                <div class="carousel-caption jumbotron-fluid text-left">
                    <h3>FOR SUITABLY</h3>
                    <h1><B>QUALLIFIED INVESTORS</B></h1>
                </div>
            </div>
        </div>
        
    </div>
    <!--	Banner Ends -->
    <section class="bg-white pt-5 pb-5" id="home">
	    <div class="container">
            <h1 class="text-left">Introduction</h1>
            <p class="pt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>
    </section>

    <section class="bg-white pt-5 pb-5" id="aboutus">
	    <div id="section1" class="container">
            <div class="row text-left">
                
                <div class="col-lg-6 text-left" style="margin-bottom:10px;">
                    <h2 class="text-left">About Us</h2>
                    
                    <p class="text-sm-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
        
                    <p class="text-left">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
        
                </div>
                <div class="col-lg-6 text-right">
                    <img class="img-fluid" src="images/aboutus.jpg" />
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white pt-5 pb-5" id="contact">
	    <div id="section1" class="container">
            <h2 class="text-left pb-3">Contact</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3321.032111052666!2d72.85129321454374!3d33.65632984593844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfa28733e813ef%3A0x46b712701cb0cc77!2s6%20Street%2031%2C%20Block%20D%20Margalla%20View%20Block%20D%20D-17%2C%20Islamabad%2C%20Rawalpindi%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1576692169935!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </section>
</div>
@endsection
