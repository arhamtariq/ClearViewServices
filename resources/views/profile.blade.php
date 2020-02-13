@extends('layouts.appmain')

@section('content')
<div class="jumbotron jumbotron-fluid p-0 pt-3 pb-2">
    <div class="container pl-0">
        <h2>Manage your personal information</h2>
    </div>
    <div class="container bg-white mb-4 pb-5 pt-4">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
        @endif 
        @if(!empty($user_detail))
            <p>hello</p>
           
        @endif
        <form action="{{ url('/updateuserdetails') }}" class="needs-validation" novalidate method="post">
            {{ csrf_field() }}
            <h4>Account Information</h4>
            <hr>
            
            <div class="form-row mt-4">
                <div class="col-sm-6 form-group">
                    <label for="username">User Name:</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{$userinfo[0]->username}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{$userinfo[0]->email}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>
            <div class="form-row">
                <a class="pl-2" href="#" onclick="changepassword({{$userinfo[0]->id}})">Change Password</a>                
            </div>
            
            <h4 class="mt-3">Personal Information</h4>
            <hr>
            
            <div class="form-row mt-4">
                <div class="col-sm-6 form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control" id="fname" name="fname" value="{{ucfirst($userinfo[0]->first_name)}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" class="form-control" id="lname" name="lname" value="{{ucfirst($userinfo[0]->last_name)}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-6 form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{$userinfo[0]->phone_number}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12 form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$userinfo[0]->address}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-4 form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{$userinfo[0]->city}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="state">State:</label>
                    <input type="text" class="form-control" id="state" name="state" value="{{$userinfo[0]->state}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="zip">ZIP:</label>
                    <input type="text" class="form-control" id="zip" name="zip" value="{{$userinfo[0]->zip_code}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>
            


            <h4 class="mt-3">Company Information</h4>
            <hr>

            <div class="form-row mt-4">
                <div class="col-sm-6 form-group">
                    <label for="company_name">Company Name:</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" value=" {{strtoupper($userinfo[0]->company_name)}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                
            </div>
            <div class="form-row">
                <div class="col-sm-12 form-group">
                    <label for="caddress">Address:</label>
                    <input type="text" class="form-control" id="caddress" name="caddress" value="{{$userinfo[0]->ca}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-4 form-group">
                    <label for="ccity">City:</label>
                    <input type="text" class="form-control" id="ccity" name="ccity" value="{{$userinfo[0]->cc}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="cstate">State:</label>
                    <input type="text" class="form-control" id="cstate" name="cstate" value="{{$userinfo[0]->cs}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="czip">ZIP:</label>
                    <input type="text" class="form-control" id="czip" name="czip" value="{{$userinfo[0]->cz}}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-6 form-group">
                    <label for="role">Role:</label>
                    <input type="text" class="form-control" id="role" name="role" value="{{strtoupper($userinfo[0]->role)}}" disabled>
                </div>
            </div>
            <button type="submit" class="btn bg-yellow float-right" >Update Info</button>
            
        </form>
        @if ($userinfo[0]->role == 'manager') 
            <h4 class="mt-5">Subscription Information</h4>
            <hr>
            <h6 class="mt-4">
                Your subscription for this month has been started on <b>{{\Carbon\Carbon::parse(auth()->user()->time_stamp_for_record_creation)->format('Y/m/d')}}</b>. It will be expired on <b>{{\Carbon\Carbon::parse(auth()->user()->time_stamp_for_record_creation)->addDays(30)->format('Y/m/d')}}</b>.

                <a href="javascript:void(0)" onclick="submitPaymentForm()">Click here to renew your subscription</a> for the next month.
                <br><br>
                Currently you have  users registered with you, you can add more users by paying <a href="javascript:void(0)" onclick="payForUsers()"> $9.99</a> per user per month.
            </h6>
            
            @if($users[0]->package_status==1)
                <button class="btn btn-danger float-right" onclick="changeStatus({{$users[0]->id}},2)">Change Status</button>
            @else
                <button class="btn btn-success float-right" onclick="changeStatus({{$users[0]->id}},1)">Change Status</button>
            @endif
        @endif
    </div>
</div>
<!-- Change password-->
<div class="modal " id="changepasswordModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="login-form validate-form" action="{{ url('/changePassword') }}" method="post">
            @csrf
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Change Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <div class="form-row">
                    <div class="col-sm-12 form-group">
                        <label for="password">Old Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 form-group">
                        <label for="newpassword">New Password:</label>
                        <input type="password" class="form-control" name="newpassword" id="newpassword" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 form-group">
                        <label for="cpassword">Confirm New Password:</label>
                        <input type="password" class="form-control" name="cpassword" id="cpassword" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn bg-yellow text-white">Change Password</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Cancel Subscriiption modal -->
<div class="modal" id="cancelModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/updatePackageStatus" class="needs-validation" novalidate method="post">
            @csrf
            <input type="hidden" name="task_id" id="task_id">
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Subscribe/Un Subscribe Package</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-row">
                    <p><b>Once you un-subscribe the package you will not be able to login after it expires</b></p>             
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn bg-yellow">Submit</button>
            </div>
            <input type="hidden" name="package_id" id="package_id">
            <input type="hidden" name="P_Status" id="P_Status">   
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function changeStatus($package_id,$status)
    {
        $('#P_Status').val($status);
        $('#package_id').val($package_id);
        $('#cancelModal').modal('show');

        // alert($package_id);
    }
    function changepassword($id)
    {
        $('#password').val('');
        $('#newpassword').val('');
        $('#cpassword').val('');

        $('#changepasswordModal').modal('show');
    }
    function payForUsers()
    {
        $('#amount').val(9.99);
        $('#payment-form').submit();
    }   
    
    function  deleteTask($id)
    {
        if(confirm('Are You Sure You want to delete Task?'))
        {
            window.location.href="/deleteTask?id="+$id+"";
        }
    }
  
</script>
@endsection
