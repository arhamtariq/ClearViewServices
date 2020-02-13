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
       
    <div class="container bg-white pb-5 mb-4">
        <h2 class="float-left">Packages List</h2>
        <p class="float-right pt-2 pr-5" style="display:none"><button type="button" class="btn bg-yellow mb-2 text-white" data-toggle="modal" data-target="#addtaskModal">Add Task&nbsp;<i title="Add Task" class="fa fa-plus text-white"></i></button></p>            
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Package ID</th>
              <th>Created By</th>
             <!--  <th>Created On</th> -->
              <th>Due Date</th>
              <!-- <th>Assigned To</th> -->
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @inject('Obj','App\Http\Controllers\userController')
            <?php $index=1;?>
           @foreach($users as $user)
            <tr>
               <td>{{$index}}</td>
                <td>{{$Obj::getNameById($user->created_by_code)}}</td>
                <td>{{\Carbon\Carbon::parse($user->time_stamp_for_record_creation)->diffForHumans()}}</td>
                
                <td>@if($user->package_status==1)
                {{'Active'}}
                @else
                {{'Un Active'}}
                @endif</td>
                
                <td>
                    @if($user->package_status==1)<button class="btn btn-danger" onclick="changeStatus({{$user->id}},2)">Change Status</button>
                    @else
                    <button class="btn btn-success" onclick="changeStatus({{$user->id}},1)">Change Status</button>
                    @endif
                </td>  
            </tr>
           <? $index=$index+1; ?>
            @endforeach
             
          </tbody>
        </table>
        <ul class="pagination justify-content-end " style="margin:20px 0">
            <li class="page-item"><a class="page-link text-black" href="javascript:void(0)" onclick="previous()"><<</a></li>
            <li class="page-item"><a class="page-link text-black" href="#" onclick="page(1)">1</a></li>
            <li class="page-item"><a class="page-link text-black" href="#" onclick="page(2)">2</a></li>
            <li class="page-item"><a class="page-link text-black" href="#" onclick="page(3)">3</a></li>
            <li class="page-item"><a class="page-link text-black" href="javascript:void(0)" onclick="Next()">>></a></li>
        </ul>
      </div>
      
    <div class="modal" id="addtaskModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/createTask') }}" class="needs-validation" novalidate method="post">
                @csrf
                <!-- Modal Header -->
                <div class="modal-header bg-yellow">
                    <h4 class="modal-title">Add New Task</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="taskname">Task Name:</label>
                            <input type="text" class="form-control" id="taskname" name="taskname" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="col form-group">
                            <label for="createdby">Created By:</label>
                            <input type="text" class="form-control" id="createdby" name="createdby" readonly="true" value="{{auth()->user()->username}}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="col form-group">
                            <label for="createdon">Created On:</label>
                            <input type="text" class="form-control" id="createdon" name="createdon" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="col form-group">
                            <label for="duedate">Due Date:</label>
                            <input type="type" class="form-control" id="duedate" name="duedate" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col">
                            <label for="assignedto">Assigned To:</label>
                            <input type="text" class="form-control typeahead" id="assignedto" name="assignedto" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="col form-group">
                            <label for="status">Status:</label>
                            <input type="text" class="form-control" id="status" name="status" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col">
                            <label for="assignedto">Esculate STask:</label>
                            <input type="text" class="form-control" id="esculate_stask" name="esculate_stask" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="col form-group">
                            <label for="status">Esculate_Task:</label>
                            <input type="text" class="form-control" id="esculate_task" name="esculate_task" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col">
                            <label for="tasksnotes">Notes:</label>
                            <textarea class="form-control rounded-1" id="tasksnotes" name="tasksnotes" rows="3"></textarea>
                        </div>
                        
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn bg-yellow">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- update modal -->
<div class="modal" id="updatetaskModal">
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
=======
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
        <a href="#" class="float-right">Cancel Subscription</a>
        @endif
    </div>
</div>
<!-- Add owner -->
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
<<<<<<< HEAD
<!-- end here -->
<script type="text/javascript">
    var path = "{{ url('/getUsersForAssigning') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
            //console.log(data);
          //  data=data.toLowerCase();
          
                return process(data);
            });
        }
    });
   function changeStatus($package_id,$status)
   {
    //alert($status);
   $('#P_Status').val($status);
   $('#package_id').val($package_id);
   $('#updatetaskModal').modal('show');

   // alert($package_id);
   }
    function page($page_id)
   {
    //alert($page_id);

    var page =$page_id;
    //page=page-1;
    var url = window.location.origin + window.location.pathname;
    window.location.href=url+"?page="+page+"";
   }
   function  deleteTask($id)
   {
    if(confirm('Are You Sure You want to delete Task?'))
    {
        window.location.href="{{ url('/deleteTask') }}?id="+$id+"";
    }
   }
   function updateTask($id)
   {
    $('#task_id').val($id);
     $.ajax({
        type: "GET",
        url: "{{ url('getTaskData') }}",
        dataType: "json",
        cache: false,
        data: {
            id: $id
        },
        success: function(data) {
          var obj=JSON.parse(JSON.stringify(data));
          
          $('#tasknameUpdate').val(obj[0].task_name);
          var con=obj[0].time_stamp_for_record_creation;
          var date =convert(con);  
          $('#createdonUpdate').val(date);
          var date = obj[0].due_date;
          var newdate = convert(date);
        
          getAssigneeName(obj[0].user_code);
         
          $('#duedateUpdate').val(newdate);
          $('#statusUpdate').val(obj[0].task_status);
          $('#esculate_staskUpdate').val(obj[0].esculate_stask);
          $('#esculate_taskUpdate').val(obj[0].esculate_task);
         
          $('#tasksnotesUpdate').val(obj[0].task_notes);
    
        }
    });
    $('#updatetaskModal').modal('show');
   }
function convert(dateTime)
        {
            
            var dateArr = dateTime.split("/");
            var date1= dateArr[2] + "-" + dateArr[0] + "-" + dateArr[1];
            return date1;
        
        }
   function getAssigneeName($id)
   {
    //var name;
    $.ajax({
        type: "GET",
        url: "{{ url('getAssigneeName') }}",
        dataType: "json",
        cache: false,
        data: {
            id: $id
        },
        success: function(data) {
             $('#assignedtoUpdate').val(data);
          //alert(data);
         // name=data;
      }
      });
//alert(name);
      //return name;
     
  }
  function previous()
  {
    var page=getUrlVars();


    if(page['page'])
    {
        page=page['page'];
    }
    else
    {
        page = 1;
    }
    if(page==1)
    {

    }
    else{
        page=--page;
        var url = window.location.origin + window.location.pathname;
        var queryString=getUrlVars();
                                       
                        
    window.location.href=url+"?page="+page+"";
    /*window.location.href=url+"?page="+page+"&box_type="+box_type+"";*/
    }
    //                                              window.location.href=url+"?page="+page+"&box_type="+box_type+"";
    }
    function Next()
    {
        var existing_page=4;
    //alert(existing_page);
    //return false;
    var page=getUrlVars();
    
    if(page['page'])
    {
        page=page['page'];
    }
    else
    {
        page = 0;
    }

    page=++page;
    if(page==existing_page)
    {

        return false;
    }

    var url = window.location.origin + window.location.pathname;
    
    window.location.href=url+"?page="+page+"";

}
    function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
    }

</script>

=======
<script type="text/javascript">
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
>>>>>>> b7684f6339e49f6a994859441a565e39753c4c8b
@endsection
