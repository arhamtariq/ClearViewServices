<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Clearview Services</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('js/jquery.steps.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/style1.css') }}">
<script src="{{ asset('js/core.js') }}"></script>
<style>
/* The container */
.container_2 {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container_2 input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container_2:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container_2 input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container_2 input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container_2 .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>	
</head>
<div class="container-register jumbotron-fluid">

    <div class="container-form">
        <div class="wrapper-form">
            <form id="rform" class="register-form" action="/create" method="post"  id="register-form" onsubmit="showSuscriptions();return false;" >
            @csrf
                <div id="overall-form">
                    <!-- SECTION 1 -->
                    <h2>
                        <span class="step-text"><img class="img-fluid" src="/images/logo-white.png"/>
                        <hr>
                        Peronal Infomation
                        </span>
                    </h2>
                    <section>
                        <div class="inner">
                            @include('success')
                            <div class="section-header">
                                <h3 class="heading">Peronal Infomation</h3>
                                <p>Please enter your infomation and proceed to the next step so we can build your accounts.  </p>
                            </div>
                            <div class="form-row">
                                <div class="form-col form-col-2">
                                    <fieldset>
                                        <legend>User Name</legend>
                                        <input type="text" class="form-control" id="user-name" name="user-name" placeholder="User Name" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-col ">
                                    <fieldset>
                                        <legend>Email</legend>
                                        <input type="email" class="form-control" id="email" name="email" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="youremail@email.com" required>
                                    </fieldset>
                                </div>
                                <div class="form-col">
                                    <fieldset>
                                        <legend>Confirm Email</legend>
                                        <input type="email" name="confirm_email" id="confirm_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="confirmemail@email.com" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-col">
                                    <fieldset>
                                        <legend>Password</legend>
                                        <input type="password" class="form-control" id="password" name="password"  placeholder=".........." required>
                                    </fieldset>
                                </div>
                                <div class="form-col">
                                    <fieldset>
                                        <legend>Confirm Password</legend>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder=".........." required>
                                        
                                  </fieldset>
                                 
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- SECTION 2 -->
                    <h2><span class="step-text">Personal Information</span></h2>
                    <section>
                        <div class="inner">
                            <div class="section-header">
                                <h3 class="heading">Personal Information</h3>
                                <p>Please enter your Personal infomation and proceed to the next step so we can create your accounts.</p>
                            </div>
                            <div class="form-row">
                                <div class="form-col">
                                    <fieldset>
                                        <legend>First Name</legend>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                                    </fieldset>
                                </div>
                                <div class="form-col">
                                    <fieldset>
                                        <legend>Last Name</legend>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-col form-col-2">
                                    <fieldset>
                                        <legend>Phone Number</legend>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="+1 888-999-7777" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-col form-col-2">
                                    <fieldset>
                                        <legend>Address</legend>
                                        <textarea class="form-control" id="address" name="address" placeholder="Your Address" required></textarea>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-col form-col-3">
                                    <fieldset>
                                        <legend>City</legend>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                                    </fieldset>
                                </div>
                                <div class="form-col form-col-3">
                                    <fieldset>
                                        <legend>State</legend>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="State" required>
                                    </fieldset>
                                </div>
                                <div class="form-col form-col-3">
                                    <fieldset>
                                        <legend>ZIP</legend>
                                        <input type="text" class="form-control" id="zip" name="zip" placeholder="46000" required>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- SECTION 3 -->
                    <h2><span class="step-text">Company Information</span></h2>
                    <section>
                        <div class="inner">
                            <div class="section-header">
                                <h3 class="heading">Company Information</h3>
                                <p>Please enter your company's infomation and proceed to the next step so we can create your accounts.</p>
                            </div>
                            <div class="form-row">
                                <div class="form-col form-col-2">
                                    <fieldset>
                                        <legend>Company Name</legend>
                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-col form-col-2">
                                    <fieldset>
                                        <legend>Company Address</legend>
                                        <textarea class="form-control" id="company_address" name="company_address" placeholder="Company Address" required></textarea>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-col form-col-3">
                                    <fieldset>
                                        <legend>City</legend>
                                        <input type="text" class="form-control" id="company_city" name="company_city" placeholder="City" required>
                                    </fieldset>
                                </div>
                                <div class="form-col form-col-3">
                                    <fieldset>
                                        <legend>State</legend>
                                        <input type="text" class="form-control" id="company_state" name="company_state" placeholder="State" required>
                                    </fieldset>
                                </div>
                                <div class="form-col form-col-3">
                                    <fieldset>
                                        <legend>ZIP</legend>
                                        <input type="text" class="form-control" id="company_zip" name="company_zip" placeholder="46000" required>

                                    </fieldset>
                                </div>
                                <br><br><br>
                               
                                 <div class="form-col form-col-2">
                                 <fieldset>
                                      <label class="container_2">I Agree to the <b>terms and conditions</b>
                                          <input type="checkbox" checked="checked">
                                          <span class="checkmark"></span>
                                      </label>
                                  </fieldset>
                              </div>
                             
                         </div>
                        </div>
                    </section>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<script>
  function showSuscriptions()
  {
    //apply check to see that checkbox is clicked or not
    alert('apply check to see that checkbox is clicked or not');
  }  
</script>
</body>
</html>
