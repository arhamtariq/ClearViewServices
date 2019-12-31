@extends('layouts.appmain')

@section('content')
<div class="jumbotron jumbotron-fluid p-0 pt-3 pb-2">
    <div class="container pl-0 pt-1 pb-3">
        <form class="form-inline" method="post" action="">
            <input type="search" class="form-control mdb-autocomplete mb-2 mr-sm-2 " id="state" name="state" placeholder="State Name">           
            <button type="submit" class="btn bg-yellow mb-2 mr-sm-2 text-white">Search&nbsp;<i title="Search Task" class="fa fa-search text-white"></i></button>
        </form>
    </div>
    <div class="container bg-white pb-5 mb-4">
        <h2 class="float-left">County List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>County Name</th>
                    <th>Population</th>
                    <th>Contacts</th>
                    <th>Documents</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>Greene</td>
                    <td>8,744</td>
                    <td><a href="#contacts" data-toggle="collapse">0</a></td>
                    <td><a href="#documents" data-toggle="collapse">0</a></td>
                    <td><a href="#notes" data-toggle="collapse">0</a></td>
                </tr>
                <tr>
                    <td>Greene</td>
                    <td>8,744</td>
                    <td><a href="#contacts" data-toggle="collapse">2</a></td>
                    <td><a href="#documents" data-toggle="collapse">0</a></td>
                    <td><a href="#notes" data-toggle="collapse">0</a></td>
                </tr>
                <tr>
                    <td>Greene</td>
                    <td>8,744</td>
                    <td><a href="#contacts" data-toggle="collapse">5</a></td>
                    <td><a href="#documents" data-toggle="collapse">0</a></td>
                    <td><a href="#notes" data-toggle="collapse">0</a></td>
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

    <!-- County's Document List -->
    <div id="documents" class="container bg-white pb-5 mb-4 collapse">
        <p class="float-right pt-2 pr-5"><button type="button" class="btn bg-yellow mb-2 text-white" data-toggle="modal" data-target="#adddocumentModal">Add Document&nbsp;<i title="Add Document" class="fa fa-plus text-white"></i></button></p>            
        <h2 class="float-left">Greene's Documents List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Documnet Type</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Excel</td>
                    <td>abc.xls</td>
                    <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
                </tr>
                <tr>
                    <td>Document</td>
                    <td>test.doc</td>
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
      
    <!-- County's Contact List -->
    <div id="contacts" class="container bg-white pb-5 mb-4 collapse">
        <h2 class="float-left">Greene's Contact List</h2>
        <p class="float-right pt-2 pr-5"><button type="button" class="btn bg-yellow mb-2 text-white" data-toggle="modal" data-target="#addcontactModal">Add Contact&nbsp;<i title="Add Contact" class="fa fa-plus text-white"></i></button></p>            
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Contact Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>ZIP</th>
                    <th>Phone 1</th>
                    <th>Extension 1</th>
                    <th>Phone 2</th>
                    <th>Extension 2</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>abc</td>
                    <td>abc@gmail.com</td>
                    <td>h-4 block12</td>
                    <td>abc</td>
                    <td>Albama</td>
                    <td>42000</td>
                    <td>888 777 9999</td>
                    <td>112</td>
                    <td>888 777 9999</td>
                    <td>112</td>
                    <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
                </tr>
                <tr>
                    <td>abc</td>
                    <td>abc@gmail.com</td>
                    <td>h-4 block12</td>
                    <td>abc</td>
                    <td>Albama</td>
                    <td>42000</td>
                    <td>888 777 9999</td>
                    <td>112</td>
                    <td>888 777 9999</td>
                    <td>112</td>
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

    <!-- County's Notes List -->
    <div id="notes" class="container bg-white pb-5 mb-4 collapse">
        <h2 class="float-left">Greene's Notes List</h2>
        <p class="float-right pt-2 pr-5"><button type="button" class="btn bg-yellow mb-2 text-white" data-toggle="modal" data-target="#addnotesModal">Add Notes&nbsp;<i title="Add Notes" class="fa fa-plus text-white"></i></button></p>            
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Details</th>
                    <th>Added By</th>
                    <th>Added On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>abc</td>
                    <td>abc xyz test notes</td>
                    <td>Mr. asdf</td>
                    <td>12/11/2019</td>
                    <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
                </tr>
                <tr>
                    <td>abc</td>
                    <td>abc xyz test notes</td>
                    <td>Mr. asdf</td>
                    <td>12/11/2019</td>
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
<!--  Contacts modal ---->
<div class="modal " id="addcontactModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/action_page.php" class="needs-validation" novalidate>
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">New Contact</h4>
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
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" required>
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
                        <label for="phone1">Phone (1):</label>
                        <input type="text" class="form-control" name="phone1" id="phone1" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="ext1">Extension Phone 1:</label>
                        <input type="text" class="form-control" id="ext1" name="ext1">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="phone2">Phone (2):</label>
                        <input type="text" class="form-control" id="phone2" name="phone2">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="ext2">Extension Phone 2:</label>
                        <input type="text" class="form-control" id="ext2" name="ext2">
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
<div class="modal " id="adddocumentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/action_page.php" class="needs-validation" novalidate>
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">County Name | New Document</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-row">
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
                <h4 class="modal-title">County Name | New Notes</h4>
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
