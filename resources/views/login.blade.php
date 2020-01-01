<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta http-equiv="Refresh" content="0; url=https://www.w3docs.com" /> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Clearview Services</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    
</head>
<body>
<div class="jumbotron jumbotron-fluid mb-0 bg-grey">
 
   <div class="row d-flex justify-content-center">

  @include('error')
  @include('success')
   </div>
    <div class="container-login">
        <div class="wrapper-login p-2">
            <div class="login-form-title">
                <img class="img-fluid" src="/images/logo-white.png">
            </div>
        </div>
        <div class="wrapper-login-lower">
            <form class="login-form validate-form needs-validation" action="/dologin" method="post" novalidate>
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <div class="form-input validate-input m-b-26" data-validate="Username is required">
                    <span class="form-label">Username</span>
                    <input class="form-text" type="text" name="username" placeholder="Enter username">
                    <span class="focus-input"></span>
                </div>

                <div class="form-input validate-input m-b-18" data-validate = "Password is required">
                    <span class="form-label">Password</span>
                    <input class="form-text" type="password" name="password" placeholder="Enter password" required>
                    <span class="focus-input"></span>
                </div>
                   <div class="flex-sb-m w-full p-b-30 mt-2">
                    <a href="/forgotPasswordRequest">Forgot Password</a>
                </div>
                <div class="flex-sb-m w-full p-b-30 mt-2">
                    <a href="{{ url('/terms') }}">Click here to Register</a>
                </div>

                <div class="container-btn mt-4">
                    <button class="form-btn"><i class = "fa fa-arrow-right" style="color:white;"> </i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('js/jslogin.js') }}"></script>
</body>
</html>