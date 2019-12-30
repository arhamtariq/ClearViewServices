@extends('layouts.appmain')

@section('content')
<div class="jumbotron jumbotron-fluid p-0 pt-3 pb-2">
    <div class="container bg-white mb-4 pb-3 pt-3">
        <h4>Patrick Jean Paul,</h4><h6> (Manager of Company XYZ)</h6>
        <br>
        <h6>
            Your subscription for this month has been started on <b>12/12/2019</b>. It will be expired on <b>1/12/2020</b>.

            <a href="#">Click here to renew your subscription</a> for the next month.
            <br><br>
            Currently you have 2 users registered with you, you can add more users by paying $9.99 per user per month.

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
                <tr>
                    <td>Patrick Jean Paul</td>
                    <td>pjp@gmail.com</td>
                    <td>pjp</td>
                    <td>777 888 9999</td>
                    <td>Manager</td>
                    <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
                </tr>
                <tr>
                    <td>Patrick Jean Paul</td>
                    <td>pjp@gmail.com</td>
                    <td>pjp</td>
                    <td>777 888 9999</td>
                    <td>Manager</td>
                    <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
                </tr>
            </tbody>
        </table>
        <ul class="pagination justify-content-end " style="margin:20px 0">
            <li class="page-item"><a class="page-link text-black" href="#"><<</a></li>
            <li class="page-item"><a class="page-link text-black" href="#">1</a></li>
            <li class="page-item"><a class="page-link text-black" href="#">2</a></li>
            <li class="page-item"><a class="page-link text-black" href="#">3</a></li>
            <li class="page-item"><a class="page-link text-black" href="#">>></a></li>
        </ul>
    </div>
</div>
<!--  User modal ---->
<div class="modal " id="adduserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/action_page.php" class="needs-validation" novalidate>
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">New User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
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
                        <input type="text" class="form-control" id="uname" name="uname" required>
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

@endsection