@extends('layouts.appmain')

@section('content')
<div class="jumbotron jumbotron-fluid p-0 pt-3 pb-2">
    <div class="container bg-white mb-4 pb-3 pt-3">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
        @endif 
        <h4>{{auth()->user()->username}},</h4><h6> ({{auth()->user()->role}} of Company XYZ)</h6>
        <br>
        <h6>
            Your subscription for this month has been started on <b>{{\Carbon\Carbon::parse(auth()->user()->time_stamp_for_record_creation)->format('Y/m/d')}}</b>. It will be expired on <b>{{\Carbon\Carbon::parse(auth()->user()->time_stamp_for_record_creation)->addDays(30)->format('Y/m/d')}}</b>.

            <a href="javascript:void(0)" onclick="submitPaymentForm()">Click here to renew your subscription</a> for the next month.
            <br><br>
            Currently you have {{$userObj->getSubUsers()}} users registered with you, you can add more users by paying <a href="javascript:void(0)" onclick="payForUsers()"> $9.99</a> per user per month.

        </h6>            
    </div>
    <div class="container bg-white pb-5 mb-4">
        <h2 class="float-left">Users List</h2>
        <p class="float-right pt-2 pr-5"><button type="button" class="btn bg-yellow mb-2 text-white" data-toggle="modal" data-target="#adduserModal">Add User&nbsp;<i title="Add User" class="fa fa-plus "></i></button></p>            
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Phone Number</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)    
                <tr>
                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user->role}}</td>
                    <td><i title="Edit" class="fa fa-edit" onclick="updateModal({{$user->id}})"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash" onclick="confirmDelete({{$user->id}})"></i></td>
                </tr>
             @endforeach   
            <!--     <tr>
                    <td>Patrick Jean Paul</td>
                    <td>pjp@gmail.com</td>
                    <td>pjp</td>
                    <td>777 888 9999</td>
                    <td>Manager</td>
                    <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
                </tr> -->
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
</div>
<!--  User modal ---->
<div class="modal " id="adduserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/create_sub_user" class="needs-validation" novalidate method="post">
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">New User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
           
            @csrf 
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" class="form-control" id="fname" name="fname" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control" id="lname" name="lname" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="uname">User Name:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" id="password" name="password" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" name="phone" id="phone" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-4 form-group">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="state">State:</label>
                        <input type="text" class="form-control" id="state" name="state" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="zip">ZIP:</label>
                        <input type="text" class="form-control" id="zip" name="zip" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="role">Role:</label>
                        <select class="form-control" id="role" name="role">
                            <option value="0">Please Select role:</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Manager">Manager</option>
                            <option value="Full Access VA">Full Access VA</option>
                            <option value="Skip Trace">Skip Trace</option>
                            <option value="County Contact List">County Contact List</option>
                            <option value="Owner Contact VA">Owner Contact VA</option>
                            <option value="County Form Submission">County Form Submistion</option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="mname">Mother Madian Name</label>
                        <input type="text" class="form-control" id="mname" name="mname">
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
<!-- update modal  -->
<!--  User modal ---->
<div class="modal " id="updateModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/update_sub_user" class="needs-validation" novalidate method="post">
            <input type="hidden" name="user_id" id="user_id">
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">New User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
           
            @csrf 
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" class="form-control" id="fnameU" name="fnameU" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control" id="lnameU" name="lnameU" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="uname">User Name:</label>
                        <input type="text" class="form-control" id="usernameU" name="usernameU" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="emailU" name="emailU" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" id="passwordU" name="passwordU" required readonly>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" name="phoneU" id="phoneU" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="addressU" name="addressU" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-4 form-group">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" id="cityU" name="cityU" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="state">State:</label>
                        <input type="text" class="form-control" id="stateU" name="stateU" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="zip">ZIP:</label>
                        <input type="text" class="form-control" id="zipU" name="zipU" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="role">Role:</label>
                        <select class="form-control" id="roleU" name="roleU">
                            <option value="0">Please Select role:</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Manager">Manager</option>
                            <option value="Full Access VA">Full Access VA</option>
                            <option value="Skip Trace">Skip Trace</option>
                            <option value="County Contact List">County Contact List</option>
                            <option value="Owner Contact VA">Owner Contact VA</option>
                            <option value="County Form Submission">County Form Submistion</option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="mname">Mother Madian Name</label>
                        <input type="text" class="form-control" id="mnameU" name="mnameU">
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
<!-- modal -->
<script type="text/javascript">
function payForUsers()
{
  $('#amount').val(9.99);
  $('#payment-form').submit();

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
        window.location.href="/deleteTask?id="+$id+"";
    }
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
 function confirmDelete($id)
 {
   var status= confirm('Are you want to remove user');
   if(status)
   {
    window.location.href="/removeUser?id="+$id+"";
   // alert($id);
   }
   else
   {

   }
 }
 function updateModal($id)
 {
    $('#user_id').val($id);
    //alert($id);
     $.ajax({
            type: "GET",
            url: "/adminUsers",
            dataType: "json",
            cache: false,
            data: {
                id: $id
            },
            success: function(data) {
                //console.log(data);
                var obj=JSON.parse(JSON.stringify(data));
               console.log(obj);
               $('#emailU').val(obj[0].email);
               $('#fnameU').val(obj[0].first_name);
               $('#lnameU').val(obj[0].last_name);
               $('#usernameU').val(obj[0].username);
                $('#phoneU').val(obj[0].phone_number);
                   $('#addressU').val(obj[0].address);
                 $('#cityU').val(obj[0].city);
                  $('#stateU').val(obj[0].state);
                  $('#zipU').val(obj[0].zip_code);
                  $('#roleU').val(obj[0].role).trigger("chosen:updated");
                $('#updateModal').modal('show');                    
            }
        });
 }
 /*  'username' => 'required|string|unique:users',
         'email' => 'required|unique:users',
         'fname' => 'required|string',
         'lname' => 'required|string',
         'role' => 'required|string',
         'phone' =>'required',
         'address'=> 'required|string',
         'city'=> 'required|string',
         'state' => 'required|string',
         'zip' => 'required|integer',
         'password' => 'required|string',*/
</script>
@endsection
