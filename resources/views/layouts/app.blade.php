<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Clearview Services</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/images/favicon.png')}}" type="image/gif" sizes="16x16">

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
    
    @stack('scripts')
    <script src="{{ asset('js/core.js') }}"></script>
</head>
<body id="app-layout">
    <nav class="navbar navbar-expand-sm navbar-dark bg-grey navbar-static-top mb-0">
        <div class="container pl-0">
            <div class="collapse navbar-collapse ml-0  w-100 " id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav w-75 ml-0 mr-5 pr-5">
                    <li class="nav-item text-white mr-5"><div class="fa fa-envelope"></div>&nbsp;info@clearviewservices.com</a></li>
                    <li class="nav-item text-white mr-5"><div class="fa fa-phone"></div>&nbsp;+1 888 999 7777 </li>
                </ul>
                
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right pl-5">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="nav-item pl-5"><a class="nav-link text-white pl-5" href="{{ url('/login') }}"><i class="fa fa-user"></i></a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ url('/register') }}"><i class="fa fa-user-plus"></i></a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-item" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li class="nav-item"><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-xl bg-yellow navbar-static-top navbar-light sticky-top "  >
        <!-- Brand -->
        <a class="navbar-brand d-flex justify-content-between w-75" href="#" style="margin-left:80px;">
            <img src="images/logo-white.png"  alt="Property Investment" width="150" height="25" class="img-fluid"/>
        </a>
        <button type="button" class="navbar-toggler bg-danger" id="navbtn" data-toggle="collapse" onclick="changetheme();" data-target="#nav" style="margin-right:80px;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse justify-content-around w-75 ml-5" id="nav">
            <ul class="navbar-nav navbar-brand nav" style="font-size:18px;height:100%;">
                <li class="nav-item border-right border-secondary">
                    <a class="nav-link ml-5" href="{{ url('/') }}"><b>Home</b></a>
                </li>
                <li class="nav-item dropdown border-right border-secondary" >
                    <a class="nav-link ml-2" href="#aboutus"><b>About Us</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ml-2" href="#contact"><b>Contact</b></a>
                </li>
            </ul>
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
