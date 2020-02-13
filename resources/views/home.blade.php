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
                    <h3>TAX OVERAGE</h3>
                    <h1><B>MANAGEMENT</B></h1>
                    <p>SOFTWARE</p>
                </div>
            
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="images/slider2.jpg" alt="..."/>
                <div class="carousel-caption jumbotron-fluid text-left">
                    <h3>SAY GOODBYE TO PAPERWORK</h3>
                    <h1><B>DESIGNED TO MANAGE</B></h1>
                    <P>TAX OVERAGE BUSINESS</P>
                </div>
            </div>
        </div>
        
    </div>
    <!--	Banner Ends -->
    <section class="bg-white pt-5 pb-3" id="home">
	    <div class="container">
            <h1 class="text-left">Introduction</h1>
            <p class="pt-3">Clearview Services LLC has developed an application that is specifically designed to manage your tax overage business.
                The application was design by an independent tax overage collector, who wanted an easier way to track the overage
                process from end-2-end. This is version 1.0 of the application, which has been designed to manage all aspects of tracking
                your tax overage business.</p>
		</div>
    </section>

    <section class="bg-white pt-5 pb-3" id="aboutus">
	    <div id="section1" class="container">
            <div class="row text-left">
                
                <div class="col-lg-6 text-left" style="margin-bottom:10px;">
                    <h2 class="text-left">About Us</h2>
                    
                    <p class="text-sm-justify">Clearview Services LLC is a startup tax overage collection company. The founder has over 25 years of IT experience and
                        grew frustrated with tracking the paperwork, and the management tools that were not designed for tax overage
                        collection. Having built many applications for fortune 100 banks, to reduce complexity and paperwork, he embarked on
                        developing an application to manage his tax overage business.</p>
        
                    <p class="text-left">After using the software, Mr. Jean-Paul decided to revamp the software to create an online subscription-based
                        application, which can be used by other tax overage seekers to manage their business. Clearview Services recognize
                        there may be scenarios that we may have not accounted for, and are dedicated to supporting and improving the
                        application, which is why we call this version 1.0 to leave room for improvements. This means that there will be future
                        releases to add new and improve existing features of this application.
                    </p>
        
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
            Clearview Services LLC
            <br>
            455 Concord Pkwy N.
            <br>
            Unit 7885
            <br>
            Concord, NC 28027
            <br><br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3251.863963103112!2d-80.6141218854033!3d35.40862235248306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88540f981338f14b%3A0xfa6b058a2c6990f9!2s455%20Concord%20Pkwy%20N%20%237885%2C%20Concord%2C%20NC%2028025%2C%20USA!5e0!3m2!1sen!2s!4v1581574109817!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </section>
</div>
@endsection
