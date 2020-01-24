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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <script src="{{ asset('js/core.js') }}"></script>
</head>
<body>
<div class="jumbotron jumbotron-fluid mb-0 bg-grey">
 
   <div class="row d-flex justify-content-center">

  @include('error')
  @include('success')
   </div>
    <div class="container-login">
        <div class="wrapper-login p-2">
            <div class="login-form-title pt-3">
                <img class="img-fluid" width="600" src="/images/logo.png">
            </div>
        </div>
        <div class="wrapper-login-lower">
            <form class="login-form validate-form" action="{{ url('/setNewPassword') }}" method="post">
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <div class="form-input validate-input m-b-26" data-validate="Username is required">
                    <span class="form-label">New Password</span>
                    <input class="form-text" type="password" name="newPassword" placeholder="Enter your New Passsword">
                    <span class="focus-input"></span>
                </div>
                 <div class="form-input validate-input m-b-26" data-validate="Username is required">
                    <span class="form-label">Confirm Password</span>
                    <input class="form-text" type="password" name="oldPassword" placeholder="Enter your Password Again">
                    <input type="hidden" name="token" value={{$token}}>
                    <span class="focus-input"></span>
                </div>

                <div class="container-btn mt-4">
                    <button class="form-btn"><i class = "fa fa-arrow-right" style="color:white;"> </i></button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
