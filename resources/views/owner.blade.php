@extends('layouts.appmain')

@section('content')
<div class="jumbotron jumbotron-fluid p-0 pt-3 pb-2">
    <div class="container pl-0">
        <form class="form-inline" method="post" action="">
            <input type="text" class="form-control mb-2 mr-sm-2" id="county-record-srch" name="county-record-srch" placeholder="County Record Number">
            <input type="text" class="form-control mb-2 mr-sm-2" id="owner-name" name="owner-name" placeholder="Owner Name">
            <button type="submit" class="btn bg-yellow mb-2 mr-sm-2 text-white">Search&nbsp;<i title="Search" class="fa fa-search "></i></button>
            
        </form>
    </div>
    <div class="container bg-white pb-5 mb-4">
        <h2 class="float-left">Owners List</h2>
        <p class="float-right pt-2 pr-5"><button type="button" class="btn bg-yellow mb-2 text-white" data-toggle="modal" data-target="#addownerModal">Add Owner&nbsp;<i title="Add Task" class="fa fa-plus "></i></button></p>            
        <table class="table table-striped">
          <thead>
            <tr>
              <th>County Record No.</th>
              <th>Full Name</th>
              <th>Property Address</th>
              <th>Parcel Number</th>
              <th>Sale Date</th>
              <th>Overage Amount</th>
              <th>Available Funds</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><a href="#">County Record No.</a></td>
              <td>Mr. xyz</td>
              <td>Mon, 11 Dec 2019</td>
              <td>Mon, 11 Dec 2019</td>
              <td>Mr. lmn</td>
              <td>New</td>
              <td>500,000</td>
              <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
            </tr>
            <tr>
                <td><a href="#">County Record No.</a></td>
                <td>Mr. xyz</td>
                <td>Mon, 11 Dec 2019</td>
                <td>Mon, 11 Dec 2019</td>
                <td>Mr. lmn</td>
                <td>New</td>
                <td>500,000</td>
                <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
            </tr>
            <tr>
                <td><a href="#">County Record No.</a></td>
                <td>Mr. xyz</td>
                <td>Mon, 11 Dec 2019</td>
                <td>Mon, 11 Dec 2019</td>
                <td>Mr. lmn</td>
                <td>New</td>
                <td>500,000</td>
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
      
    <div class="modal " id="addownerModal">
        <div class="modal-dialog mw-100 w-75">
            <div class="modal-content">
                <form action="/action_page.php" class="needs-validation" novalidate>
                <!-- Modal Header -->
                <div class="modal-header bg-yellow">
                    <h4 class="modal-title">Add New Owner</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 border-right">
                            <fieldset>
                                <legend>Owner's Information</legend>
                                <div class="form-row">
                                    <div class="col-sm-6 form-group">
                                        <label for="taskname">County Record Number:</label>
                                        <input type="text" class="form-control" id="county-record-no" name="county-record-no" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="taskname">County:</label>
                                        <input type="text" class="form-control" id="county-code" name="county-code" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-5 form-group">
                                        <label for="taskname">First Name:</label>
                                        <input type="text" class="form-control" id="first-name" name="first-name" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="col-sm-2 form-group">
                                        <label for="createdby">Mid Name</label>
                                        <input type="text" class="form-control" id="middle-name" name="middle-name" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="col-sm-5 form-group">
                                        <label for="createdon">Last Name:</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 form-group">
                                        <label for="assignedto">Property Address:</label>
                                        <input type="text" class="form-control" id="property-address" name="property-address" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-4 form-group">
                                        <label for="status">City:</label>
                                        <input type="text" class="form-control" id="city" name="city" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="status">State:</label>
                                        <input type="text" class="form-control" id="state" name="state" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="status">ZIP:</label>
                                        <input type="text" class="form-control" id="zip" name="zip" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-6 form-group">
                                        <label for="duedate">Parcel Number:</label>
                                        <input type="type" class="form-control" id="parcel-no" name="parcel-no" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="status">Sale Date:</label>
                                        <input type="text" class="form-control" id="sale-date" name="sale-date" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>
                                
                            </fieldset>
                        </div>
                        <div class="col-sm-6">
                            <fieldset>
                                <legend>Other Information</legend>
                            </fieldset>
                            <div class="form-row">
                                <div class="col-sm-6 form-group">
                                    <label for="status">Overage Amount Collected:</label>
                                    <input type="text" class="form-control" id="overage-amount" name="overage-amount" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="status">Overage Amount Owned:</label>
                                    <input type="text" class="form-control" id="overage-amount-owned" name="overage-amount-owned" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6 form-group">
                                    <label for="taskname">Contacted Owner:</label>
                                    <select class="form-control" id="contacted-owner" name="contacted-owner">
                                        <option value="0">No</option>
                                        <option value="1">Yes - On Phone</option>
                                        <option value="2">Yes - On Mail</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="taskname">Contacted County:</label>
                                    <select class="form-control" id="contacted-county" name="contacted-county">
                                        <option value="0">No</option>
                                        <option value="1">Yes - On Phone</option>
                                        <option value="2">Yes - On Mail</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="taskname">Available Funds:</label>
                                    <input type="text" class="form-control" id="avlbl-funds" name="avlbl-funds" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="col form-group">
                                    <label for="taskname">Contacted County:</label>
                                    <input type="text" class="form-control" id="contacted-county" name="contacted-county" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>
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
