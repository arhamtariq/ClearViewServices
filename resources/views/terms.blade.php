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
        <div class="container-login">
            <div class="wrapper-login p-2">
                <div class="login-form-title">
                    <img class="img-fluid" src="/images/logo-white.png">
                </div>
            </div>
            <div class="wrapper-login-lower p-3">
                <h3>Terms and Conditions</h3>
                <p> 
                    <ol>
                        <li>The cost of Monthly subscription package will be $29.99 and it will  include the following: 
                            <ul>
                                <li>One Manager Account</li>
                                <li>Two Sub-Accounts for the company</li>
                            </ul>
                        </li>
                        <li>Every additional account for the company will be charged $9.99 per month.</li>
                        <li>You will be charged every 30-day for the service</li>
                        <li>You can cancel your plan and the plan will remain active until the end of the 30 days.</li>
                        <li>You can also remove the sub-accounts for $9.99 if you want.</li>
                    </ol>
                </p>
                <fieldset>
                    <label class="container_2">I Agree to the <b>terms and conditions</b>
                        <input id="isagreed" type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                </fieldset> 
                <button class="form-btn" onclick="showSuscriptions();"><i class = "fa fa-arrow-right" style="color:white;"> </i></button>           
            </div>
        </div>
    </div>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('js/alert.js') }}"></script>
<script>
    function showSuscriptions()
    {
        if ($('#isagreed').prop("checked"))
        {
            
            window.location.href = "{{ url('/register') }}";
        }
        else
        {
            $.alert("Sorry! You can not move further as you are not agree to our terms and conditions.",
            {
                autoClose:false,
                title:"Error",
                type:'danger'
            });

        }
        //alert('apply check to see that checkbox is clicked or not');
    }  
  </script>
</body>
</html>