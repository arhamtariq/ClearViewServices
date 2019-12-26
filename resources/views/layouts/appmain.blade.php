<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Clearview Services</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/stylemain.css')}}">
    @stack('styles')
    
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.steps.js') }}"></script>
    @stack('scripts')
    <script src="{{ asset('js/core.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
</head>
<body id="app-layout">
    <nav class="navbar navbar-expand-sm navbar-dark bg-yellow navbar-static-top mb-0 ">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand  w-75 mr-0" href="#">
                <img src="images/logo-white.png"  alt="Clear View Services" width="150" height="25" class="img-fluid"/>
            </a>
            <div class="collapse navbar-collapse w-100" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav w-50 ml-0 text-center">
                    <li class="nav-item text-white"><b>Hello! Patrick Jean Paul</b></a></li>
                </ul>
                
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right pl-5">
                    <li class="nav-item"><a title="Profile" class="nav-link text-white pl-5 ml-5" href="{{ url('/profile') }}"><i class="fa fa-user"></i></a></li>
                    <li class="nav-item"><a title="Logoff" class="nav-link text-white" href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i></a></li>
                    <li class="nav-item"><a title="Help" class="nav-link text-white" href="{{ url('/help') }}"><i class="fa fa-question"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-xl bg-grey navbar-static-top navbar-light sticky-top "  >
        <div class="container">
            <button type="button" class="navbar-toggler bg-danger" id="navbtn" data-toggle="collapse" data-target="#nav" style="margin-right:80px;">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Links -->
            <div class="collapse navbar-collapse justify-content-left w-75" id="nav">
                <ul class="navbar-nav navbar-brand nav" style="font-size:18px;height:100%;">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link ml-0 text-white" href="{{ url('/') }}"><b>Task</b></a>
                    </li>
                    <li class="nav-item border-right border-secondary" >
                        <a class="nav-link ml-2 text-white" href="#aboutus"><b>List</b></a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link ml-2 text-white" href="#contact"><b>County</b></a>
                    </li>
                    <li class="nav-item border-right border-secondary" >
                        <a class="nav-link ml-2 text-white" href="#aboutus"><b>States</b></a>
                    </li>
                    <li class="nav-item border-right border-secondary" >
                        <a class="nav-link ml-2 text-white" href="#aboutus"><b>Documents</b></a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link ml-2 text-white" href="#aboutus"><b>Administration</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation Bar Ends here -->
    <!-- Header Bar Ends -->
    

    @yield('content')

    <nav class="navbar navbar-expand-sm navbar-dark bg-grey navbar-static-top mb-0">
        <div class="container">
            <div class="collapse navbar-collapse w-100 text-center">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav w-25">
                    <li class="nav-item text-white mr-5"><div class="fa fa-copyright"></div>&nbsp;2020</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
