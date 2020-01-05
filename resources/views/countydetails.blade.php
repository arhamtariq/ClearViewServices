@extends('layouts.appmain')

@section('content')
<div class="jumbotron jumbotron-fluid p-0 pt-3 pb-2">
    <div class="container pl-0">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
        @endif
        @if ($county_notes != null AND count($county_notes) >0)
            <h2>{{$county_notes[0]->county_name}}</h2>
            <input type="hidden" name="countycode" id="countycode" value={{$county_notes[0]->county_code}}>
        @endif
    </div>
    <div class="container bg-white">
        <div class="row pt-5 pb-2">
            <div class="col-sm-10"><h4>Contact List</h4></div>
            <div class="col-sm-2 text-right"><button id="btnAddCountyCont" type="button" class="btn bg-yellow text-white">Add Contact&nbsp;<i title="Add Task" class="fa fa-plus "></i></button></div>            
        </div>
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
            @if ($county_contact == null OR count($county_contact) == 0 OR $county_contact[0]->contact_record_id == null)
                <tr><td class="text-center" colspan="11">No Record Exists.</td></tr>
            @else
                @foreach($county_contact as $cc)
                <tr>   
                    <td>{{$cc->contact_name}}</td>
                    <td>{{$cc->email}}</td>
                    <td>{{$cc->address}}</td>
                    <td>{{$cc->city}}</td>
                    <td>{{$cc->state}}</td>
                    <td>{{$cc->zip_code}}</td>
                    <td>{{$cc->phone_1}}</td>
                    <td>{{$cc->phone_extention_1}}</td>
                    <td>{{$cc->phone_2}}</td>
                    <td>{{$cc->phone_extention_2}}</td>
                    <td><i title="Edit" class="fa fa-edit" onclick="updateCountyContact({{$cc->contact_record_id}})"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash" onclick="deleteCountyContact({{$cc->contact_record_id}})"></i></td>
                </tr>
                @endforeach
            @endif
        </tbody>
        </table>
        <ul class="pagination justify-content-end pb-2" style="margin:20px 0">
            <li class="page-item"><a class="page-link text-black" href="javascript:void(0)" onclick="previous()"><<</a></li>
            <li class="page-item"><a class="page-link text-black" href="#"  onclick="page(1)">1</a></li>
            <li class="page-item"><a class="page-link text-black" href="#"  onclick="page(2)">2</a></li>
            <li class="page-item"><a class="page-link text-black" href="#"  onclick="page(3)">3</a></li>
            <li class="page-item"><a class="page-link text-black" href="javascript:void(0)" onclick="Next()">>></a></li>
        </ul>
    </div>
    <!-- County's Notes List -->
   
    <div class="container bg-white">
        <div class="row pt-5 pb-2">
            <div class="col-sm-10"><h4>Notes List</h4></div>
            <div class="col-sm-2 text-right"><button id="btnaddCountyNotes" type="button" class="btn bg-yellow text-white">Add Notes&nbsp;<i title="Add Notes" class="fa fa-plus text-white"></i></button></div>            
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Note Type</th>
                    <th>Details</th>
                    <th>Added By</th>
                    <th>Added On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($county_notes == null OR count($county_notes) == 0 OR $county_notes[0]->note_number == null)
                    <tr><td colspan="5" class="text-center">No Record Exists.</td></tr>
                @else
                    @foreach($county_notes as $cn)
                    <tr>
                        <td>{{$cn->note_type}}</td>
                        <td>{{$cn->note_details}}</td>
                        <td>{{$cn->user_code}}</td>
                        <td>{{$cn->time_stamp_for_record_creation}}</td>
                        <td><i title="Edit" class="fa fa-edit" onclick="updateCountyNotes({{$cn->note_number}})"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash" onclick="deleteCountyNotes({{$cn->note_number}})"></i></td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <ul class="pagination justify-content-end pb-2" style="margin:20px 0">
            <li class="page-item"><a class="page-link text-black" href="javascript:void(0)" onclick="previous()"><<</a></li>
            <li class="page-item"><a class="page-link text-black" href="#"  onclick="page(1)">1</a></li>
            <li class="page-item"><a class="page-link text-black" href="#"  onclick="page(2)">2</a></li>
            <li class="page-item"><a class="page-link text-black" href="#"  onclick="page(3)">3</a></li>
            <li class="page-item"><a class="page-link text-black" href="javascript:void(0)" onclick="Next()">>></a></li>
        </ul>
    </div>
    
    <div class="container bg-white">
        <div class="row pt-5 pb-2">
            <div class="col-sm-10"><h4>Document List</h4></div>
            <div class="col-sm-2 text-right"><button id="btnAddCountyDoc" type="button" class="btn bg-yellow text-white">Add Documents&nbsp;<i title="Add Documnets" class="fa fa-plus " ></i></button></div>            
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Document Type</th>
              <th>Document Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
                @if ($county_document == null OR count($county_document) == 0 OR $county_document[0]->document_number == null)
                    <tr><td colspan="3" class="text-center">No Record Exists.</td></tr>
                @else
                    @foreach($county_document as $cd)
                        <tr>
                            <td>{{ $cd->document_type }}</td>
                            <td><a href="/viewfile?path={{ $cd->document_link}}" target="_blank">{{ $cd->document_name }}</a></td>
                            <td><i title="Edit" class="fa fa-edit" onclick="updateCountyDoc({{$cd->document_number}})"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash" onclick="deleteCountyDoc({{$cd->document_number}})"></i></td>
                        </tr>
                    @endforeach
                @endif
          </tbody>
        </table>
        <ul class="pagination justify-content-end pb-2" style="margin:20px 0">
            <li class="page-item"><a class="page-link text-black" href="javascript:void(0)" onclick="previous()"><<</a></li>
            <li class="page-item"><a class="page-link text-black" href="#"  onclick="page(1)">1</a></li>
            <li class="page-item"><a class="page-link text-black" href="#"  onclick="page(2)">2</a></li>
            <li class="page-item"><a class="page-link text-black" href="#"  onclick="page(3)">3</a></li>
            <li class="page-item"><a class="page-link text-black" href="javascript:void(0)" onclick="Next()">>></a></li>
        </ul>
    </div>
</div>

<!--  Contacts modal ---->
<div class="modal " id="addcontactModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frm-county-cont" action="/createCountyContact" class="validate-form" method="post">
            @csrf
            <input type="hidden" name="contactid" id="contactid">
            <input type="hidden" name="contactcc" id="contactcc">
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">County's Contact</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-6 form-group validate-input" data-validate = "Please fill out this field.">
                        <label for="contname">Contact Full Name:</label>
                        <input type="text" class="form-control" id="contname" name="contname">
                        
                    </div>
                    <div class="col-sm-6 form-group validate-input" data-validate = "Please fill out this field.">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 form-group validate-input" data-validate = "Please fill out this field.">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address">
                        
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-4 form-group validate-input" data-validate = "Please fill out this field.">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="col-sm-4 form-group validate-input" data-validate = "Please fill out this field.">
                        <label for="state">State:</label>
                        <input type="text" class="form-control" id="state" name="state">
                    </div>
                    <div class="col-sm-4 form-group validate-input" data-validate = "Please fill out this field.">
                        <label for="zip">ZIP:</label>
                        <input type="text" class="form-control" id="zip" name="zip">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="phone1">Phone 1:</label>
                        <input type="text" class="form-control" id="phone1" name="phone1">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="ext1">Extension 1:</label>
                        <input type="text" class="form-control" id="ext1" name="ext1">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="phone2">Phone 2:</label>
                        <input type="text" class="form-control" id="phone2" name="phone2">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="ext2">Extension 2:</label>
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
<div class="modal " id="adddocModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frm-county-doc" class="validate-form" action="/createCountyDoc" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="docid" id="docid">
            <input type="hidden" name="doccc" id="doccc">
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">County's Document</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-12 form-group">
                        <label for="doctype">Document Type:</label>
                        <select class="form-control" id="doctype" name="doctype">
                            <option value="County form">County form</option>
                            <option value="Agreement">Agreement</option>
                            <option value="Copy of check">Copy of check</option>
                            <option value="Remote notary">Remote notary</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 form-group validate-input" data-validate = "Please fill out this field.">
                        <label for="docname">Document Name:</label>
                        <input type="text" class="form-control" id="docname" name="docname">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 form-group">
                        <input type="file" class="custom-file-input" id="docFile" name="docFile">
                        <label class="custom-file-label" for="docFile">Choose file</label>
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
            <form id="frm-county-notes" action="/createCountyNotes" class="validate-form" method="post">
            @csrf
            <input type="hidden" name="notenumber" id="notenumber">
            <input type="hidden" name="notecc" id="notecc">
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">County's Notes</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-12 form-group">
                        <label for="notestype">Notes Type:</label>
                        <select class="form-control" id="notestype" name="notestype">
                            <option value="Contacted Owner">Contacted Owner</option>
                            <option value="Contacted Other">Contacted Other</option>
                            <!--<option value="Contacted Other">additional information needed</option>
                            <option value="Remote Notary">Remote Notary</option>-->
                            <option value="Follow up">Follow up</option>
                            <!--<option value="Document Submission">Document Submission</option>-->
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 form-group validate-input" data-validate = "Please fill out this field.">
                        <label for="countynotes">Notes:</label>
                        <textarea class="form-control rounded-1" id="countynotes" name="countynotes" rows="3"></textarea>
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
<script>
    
    //for notes form reset
    $('#btnaddCountyNotes').click(function(){
        alert('sfdsf');
        $('#frm-county-notes')[0].reset();
        $('#notecc').val($('#countycode').val());
        $('#notenumber').val('0');
        $('#addnotesModal').modal('show');
    })
    //for document form reset
    $('#btnAddCountyDoc').click(function(){
        $('#frm-county-doc')[0].reset();
        $('#doccc').val($('#countycode').val());
        $('#documentnumber').val('0');
        $('#adddocModal').modal('show');
    })
    // For form reset
    $('#btnAddCountyCont').click(function(){
        $('#frm-county-cont')[0].reset();
        $('#contactcc').val($('#countycode').val());
        $('#contactid').val('0');
        $('#addcontactModal').modal('show');
    })
    
    //For deletion of county notes
    function  deleteCountyNotes($id)
    {
        if(confirm('Are You Sure You want to delete County Notes?'))
        {
            window.location.href="/deleteCountyNotes?id="+$id+"";
        }
    }
    //For deletion of county contact
    function  deleteCountyContact($id)
    {
        if(confirm('Are You Sure You want to delete County Contact?'))
        {
            window.location.href="/deleteCountyContact?id="+$id+"";
        }
    }
    //For deletion of county documents
    function  deleteCountyDoc($id)
    {
        if(confirm('Are You Sure You want to delete County Document?'))
        {
            window.location.href="/deleteCountyDoc?id="+$id+"";
        }
    }
    
    
    //for update county notes
    function updateCountyNotes($id){
        
        $('#notecc').val($('#countycode').val());
        $('#notenumber').val($id);

        $.ajax({
            type: "GET",
            url: "/getCountyNotesData",
            dataType: "json",
            cache: false,
            data: {
                id: $id
            },
            success: function(data) {
                alert('dfdsf');
                var obj=JSON.parse(JSON.stringify(data));
                $('#notestype').val(obj[0].note_type);
                $('#countynotes').text(obj[0].note_details);               
            }
        });
        $('#addnotesModal').modal('show');
    }
    //for update county document
    function updateCountyDoc($id){
        $('#doccc').val($('#countycode').val());
        $('#documentnumber').val($id);

        $.ajax({
            type: "GET",
            url: "/getCountyDocData",
            dataType: "json",
            cache: false,
            data: {
                id: $id
            },
            success: function(data) {
                
                var obj=JSON.parse(JSON.stringify(data));
                $('#doctype').val(obj[0].document_type);
                $('#docname').val(obj[0].document_name);
                $('#docFile').file(obj[0].document_link);                    
            }
        });
        $('#adddocModal').modal('show');
    }
    //for updation of county contact
    function updateCountyContact($id)
    {
        
        $('#contactcc').val($('#countycode').val());
        
        $('#contactid').val($id);
        $.ajax({
            type: "GET",
            url: "/getCountyContactData",
            dataType: "json",
            cache: false,
            data: {
                id: $id
            },
            success: function(data) {
               
                var obj=JSON.parse(JSON.stringify(data));
                //alert(obj[0].skip_tracing_source);
                $('#contname').val(obj[0].contact_name);
                $('#email').val(obj[0].email);
                $('#address').val(obj[0].address);
                $('#city').val(obj[0].city);
                $('#state').val(obj[0].state);
                $('#zip').val(obj[0].zip_code);
                $('#phone1').val(obj[0].phone_1);
                $('#ext1').val(obj[0].phone_extension_1);
                $('#phone2').val(obj[0].phone_2);
                $('#ext2').val(obj[0].phone_extension_2);
            }
        });
        $('#addcontactModal').modal('show');
    }
    //for pagination
    function page($page_id)
    {
        var page =$page_id;
        //page=page-1;
        var url = window.location.origin + window.location.pathname;
        window.location.href=url+"?page="+page+"";
    }
</script>
@endsection
