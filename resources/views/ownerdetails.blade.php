@extends('layouts.appmain')

@section('content')
<div class="jumbotron jumbotron-fluid p-0 pt-3 pb-2">
    <div class="container pl-0">
        <h2>Owner Name will display here</h2>
    </div>
    <div class="container bg-white">
        <div class="row pt-5 pb-2">
            <div class="col-sm-10"><h4>Owner's Contact List</h4></div>
            <div class="col-sm-2 text-right"><button type="button" class="btn bg-yellow text-white" data-toggle="modal" data-target="#addcontactModal">Add Contact&nbsp;<i title="Add Task" class="fa fa-plus "></i></button></div>            
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Relationship</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>ZIP</th>
                    <th>Cell</th>
                    <th>Work</th>
                    <th>Home</th>
                    <th>Status</th>
                    <th>Detail Status</th>
                    <th>Actions</th>
                </tr>
          </thead>
          <tbody>
            <tr>
                <td>Mr. xyz</td>
                <td>Boss</td>
                <td>H-90 B-A</td>
                <td>abc</td>
                <td>LN</td>
                <td>45000</td>
                <td>888 777 9999</td>
                <td>888 777 9999</td>
                <td>888 777 9999</td>
                <td>Active</td>
                <td>Active</td>
                <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
            </tr>
            <tr>
                <td>Mr. xyz</td>
                <td>Boss</td>
                <td>H-90 B-A</td>
                <td>abc</td>
                <td>LN</td>
                <td>45000</td>
                <td>888 777 9999</td>
                <td>888 777 9999</td>
                <td>888 777 9999</td>
                <td>Active</td>
                <td>Active</td>
                <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
            </tr>
            <tr>
                <td>Mr. xyz</td>
                <td>Boss</td>
                <td>H-90 B-A</td>
                <td>abc</td>
                <td>LN</td>
                <td>45000</td>
                <td>888 777 9999</td>
                <td>888 777 9999</td>
                <td>888 777 9999</td>
                <td>Active</td>
                <td>Active</td>
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
    
    <div class="container bg-white">
        <div class="row pt-5 pb-2">
            <div class="col-sm-10"><h4>Owner's Notes List</h4></div>
            <div class="col-sm-2 text-right"><button type="button" class="btn bg-yellow text-white" data-toggle="modal" data-target="#addnotesModal">Add Notes&nbsp;<i title="Add Task" class="fa fa-plus "></i></button></div>            
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Note Type</th>
              <th>Details</th>
              <th>Issue Resolved</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>abc</td>
              <td>abc xyz</td>
              <td>Yes</td>
              <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
            </tr>
            <tr>
                <td>abc</td>
                <td>abc xyz</td>
                <td>Yes</td>
                <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
            </tr>
            <tr>
                <td>abc</td>
                <td>abc xyz</td>
                <td>Yes</td>
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
    

    <div class="container bg-white">
        <div class="row pt-5 pb-2">
            <div class="col-sm-10"><h4>Owner's Document List</h4></div>
            <div class="col-sm-2 text-right"><button type="button" class="btn bg-yellow text-white" data-toggle="modal" data-target="#adddocModal">Add Documents&nbsp;<i title="Add Documnets" class="fa fa-plus "></i></button></div>            
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>County Name</th>
              <th>Document Type</th>
              <th>Document Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>abc</td>
              <td>Type 1</td>
              <td><a href="#">test.doc</a></td>
              <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
            </tr>
            <tr>
                <td>abc</td>
                <td>Type 1</td>
                <td><a href="#">test.doc</a></td>
                <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
              </tr>
              <tr>
                <td>abc</td>
                <td>Type 1</td>
                <td><a href="#">test.doc</a></td>
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
</div>
<!--  Contacts modal ---->
<div class="modal " id="addcontactModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/action_page.php" class="needs-validation" novalidate>
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Record Number | New Contact</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="cont-name">Contact Full Name:</label>
                        <input type="text" class="form-control" id="cont-name" name="cont-name" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="relation">Relationship:</label>
                        <select class="form-control" id="relation" name="relation">
                            <option value="1">Brother</option>
                            <option value="2">Boss</option>
                        </select>
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
                        <label for="address-type">Address Type:</label>
                        <select class="form-control" name="address-type" id="address-type">
                            <option value="1">Type 1</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="cell">Cell Number:</label>
                        <input type="text" class="form-control" id="cell" name="cell" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="wphone">Work Phone:</label>
                        <input type="text" class="form-control" id="wphone" name="wphone" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="hphone">Home Phone:</label>
                        <input type="text" class="form-control" id="hphone" name="hphone" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="status">Contact Status:</label>
                        <input type="text" class="form-control" id="status" name="status" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="detail-status">Contact Detail Status:</label>
                        <input type="text" class="form-control" id="detail-status" name="detail-status" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group form-check">
                        <label class="form-check-label">Skip Tracing Source: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" class="form-check-input" id="is-skip">
                        </label>
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
<!--  Document modal ---->
<div class="modal " id="adddocModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/action_page.php" class="needs-validation" novalidate>
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Record Number</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="notes-type">County:</label>
                        <select class="form-control" id="notes-type" name="notes-type">
                            <option value="0">Filled from DB</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="issue-resolved">Document Type:</label>
                        <select class="form-control" id="issue-resolved" name="issue-resolved">
                            <option value="0">Type 1</option>
                            <option value="1">Type 2</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="doctype">Document Name:</label>
                        <input type="text" class="form-control" id="doctype" name="doctype" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="docdir">Document Directory:</label>
                        <input type="text" class="form-control" id="docdir" name="docdir" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 form-group">
                        <input type="file" class="custom-file-input" id="docFile" required>
                        <label class="custom-file-label" for="docFile">Choose file</label>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
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
<!--  Notes modal ---->
<div class="modal" id="addnotesModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/action_page.php" class="needs-validation" novalidate>
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Record Number</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="notes-type">Notes Type:</label>
                        <select class="form-control" id="notes-type" name="notes-type">
                            <option value="0">Type - 1</option>
                            <option value="1">Type - 2</option>
                            <option value="2">Type - 3</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="issue-resolved">Issue Resolved:</label>
                        <select class="form-control" id="issue-resolved" name="issue-resolved">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 form-group">
                        <label for="ownernotes">Notes:</label>
                        <textarea class="form-control rounded-1" id="ownernotes" name="ownernotes" rows="3"></textarea>
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
