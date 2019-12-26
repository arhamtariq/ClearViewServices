<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Clearview Services</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.png')}}" type="image/gif" sizes="16x16">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans|Oswald|Roboto&display=swap"">

    <!-- Styles -->
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/stylemain.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css')}}">

    @stack('styles')
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.steps.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

    @stack('scripts')
    <script src="{{ asset('js/core.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
</head>
<body id="app-layout">
    <nav class="navbar navbar-expand-sm navbar-dark bg-yellow navbar-static-top mb-0 ">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <img src="images/logo-white.png"  alt="Clear View Services" width="150" height="25" class="img-fluid"/>
        </a>
        <div class="collapse navbar-collapse w-100" id="app-navbar-collapse">
            
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item text-white"><a class="nav-link text-white " href="#"><b>Hello! Patrick Jean Paul</b></a></li>
                <li class="nav-item"><a title="Profile" class="nav-link text-white " href="{{ url('/profile') }}"><i class="fa fa-user"></i></a></li>
                <li class="nav-item"><a title="Logoff" class="nav-link text-white" href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i></a></li>
                <li class="nav-item"><a title="Help" class="nav-link text-white" href="{{ url('/help') }}"><i class="fa fa-question"></i></a></li>
            </ul>
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
                        <a class="nav-link ml-0 text-white" href="{{ url('/tasks') }}"><b>Task</b></a>
                    </li>
                    <li class="nav-item border-right border-secondary" >
                        <a class="nav-link ml-2 text-white" href="{{ url('/owner') }}"><b>Owners</b></a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link ml-2 text-white" href="{{ url('/county') }}"><b>County</b></a>
                    </li>
                    <li class="nav-item border-right border-secondary" >
                        <a class="nav-link ml-2 text-white" href="#aboutus"><b>States</b></a>
                    </li>
                    <li class="nav-item border-right border-secondary" >
                        <a class="nav-link ml-2 text-white" href="{{ url('/document') }}"><b>Documents</b></a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link ml-2 text-white" href="{{ url('/admin') }}"><b>Administration</b></a>
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
