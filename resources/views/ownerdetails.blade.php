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
        @if ($owner_contact != null AND count($owner_contact) >0)
            <h2>{{$owner_contact[0]->first_name}} {{$owner_contact[0]->middle_name}} {{$owner_contact[0]->last_name}}</h2>
            <input type="hidden" name="recordnumber" id="recordnumber" value={{$owner_contact[0]->rn}}>
        @endif
    </div>
    <div class="container bg-white">
        <div class="row pt-5 pb-2">
            <div class="col-sm-10"><h4>Contact List</h4></div>
            <div class="col-sm-2 text-right"><button id="btnAddOwnerCont" type="button" class="btn bg-yellow text-white">Add Contact&nbsp;<i title="Add Task" class="fa fa-plus "></i></button></div>            
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
            @if ($owner_contact == null OR count($owner_contact) == 0 OR $owner_contact[0]->contact_record_number == null)
                <tr><td class="text-center" colspan="12">No Record Exists.</td></tr>
            @else
                @foreach($owner_contact as $oc)
                <tr>   
                    <td>{{$oc->contact_name}}</td>
                    <td>{{$oc->relationship}}</td>
                    <td>{{$oc->address}}</td>
                    <td>{{$oc->city}}</td>
                    <td>{{$oc->state}}</td>
                    <td>{{$oc->zip_code}}</td>
                    <td>{{$oc->cell_phone}}</td>
                    <td>{{$oc->work_phone}}</td>
                    <td>{{$oc->home_phone}}</td>
                    <td>{{$oc->contact_status}}</td>
                    <td>{{$oc->contact_detail_status}}</td>
                    <td><i title="Edit" class="fa fa-edit" onclick="updateOwnerContact({{$oc->contact_record_number}})"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash" onclick="deleteOwnerContact({{$oc->contact_record_number}})"></i></td>
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
            <div class="col-sm-10"><h4>Notes List</h4></div>
            <div class="col-sm-2 text-right"><button id="addOwnerNotes" type="button" class="btn bg-yellow text-white">Add Notes&nbsp;<i title="Add Task" class="fa fa-plus "></i></button></div>            
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
            @if ($owner_notes == null OR count($owner_notes) == 0)
                <tr><td colspan="4" class="text-center">No Record Exists.</td></tr>
            @else
                @foreach($owner_notes as $on)
                <tr>
                    <td>{{$on->note_type}}</td>
                    <td>{{$on->note_details}}</td>
                    <td>{{$on->issue_resolved}}</td>
                    <td><i title="Edit" class="fa fa-edit" onclick="updateOwnerNotes({{$on->notes_record_number}})"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash" onclick="deleteOwnerNotes({{$on->notes_record_number}})"></i></td>
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
            <div class="col-sm-2 text-right"><button id="btnAddOwnerDoc" type="button" class="btn bg-yellow text-white">Add Documents&nbsp;<i title="Add Documnets" class="fa fa-plus " ></i></button></div>            
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
                @if ($owner_document == null OR count($owner_document) == 0)
                    <tr><td colspan="4" class="text-center">No Record Exists.</td></tr>
                @else
                    @foreach($owner_document as $od)
                        <tr>
                            <td>{{ $od->county_name }}</td>
                            <td>{{ $od->document_type }}</td>
                            <td><a href="/viewfile?path={{ $od->document_link}}" target="_blank">{{ $od->document_name }}</a></td>
                            <td><i title="Edit" class="fa fa-edit" onclick="updateOwnerDoc({{$od->document_record_number}})"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash" onclick="deleteOwnerDoc({{$od->document_record_number}})"></i></td>
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

    <!-- Overage -->
    <div class="container bg-white">
        <div class="row pt-5 pb-2">
            <div class="col-sm-8"><h4>Overage Request Tracking</h4></div>
            <div class="col-sm-4 text-right"><button id="btnAddTracking" type="button" class="btn bg-yellow text-white">Add Overage Tracking Request&nbsp;<i title="Add Documnets" class="fa fa-plus " ></i></button></div>            
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Document Sent</th>
              <th>Document Recieved</th>
              <th>Status</th>
              <th>Check Recieved</th>
              <th>Recieved On</th>
              <th>Check Cleared</th>
              <th>Check Sent to Owner</th>
              <th>Sent On</th>
              <th>Record Closed</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
                @if ($owner_track == null OR count($owner_track) == 0)
                    <tr><td colspan="10" class="text-center">No Record Exists.</td></tr>
                @else
                    @foreach($owner_track as $ot)
                        <tr>
                            <td>{{ $ot->county_document_sent}}</td>
                            <td>{{ $ot->county_receive_document }}</td>
                            <td>{{ $ot->document_accept_reject }}</td>
                            <td>{{ $ot->receive_check_from_county }}</td>
                            <td>{{ $ot->date_check_receive }}</td>
                            <td>{{ $ot->check_cleared }}</td>
                            <td>{{ $ot->send_check_to_owner }}</td>
                            <td>{{ $ot->date_check_sent }}</td>
                            <td>{{ $ot->record_close }}</td>
                            <td><i title="Edit" class="fa fa-edit" onclick="updateOwnerTrack({{$ot->tracking_record_number}})"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash" onclick="deleteOwnerTrack({{$ot->tracking_record_number}})"></i></td>
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
            <form id="frm-owner-cont" action="/createOwnerContact" class="validate-form" method="post">
            @csrf
            <input type="hidden" name="contactrecordnumber" id="contactrecordnumber">
            <input type="hidden" name="recno" id="recno">
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Owner's Contact</h4>
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
                        <label for="relation">Relationship:</label>
                        <select class="form-control" id="relation" name="relation">
                            <option value="Mother">Mother</option>
                            <option value="Father">Father</option>
                            <option value="Brother">Brother</option>
                            <option value="Sister">Sister</option>
                            <option value="Wife">Wife</option>
                            <option value="Other">Other</option>
                        </select>
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
                        <label for="addresstype">Address Type:</label>
                        <select class="form-control" name="addresstype" id="addresstype">
                            <option value="Dwelling">Dwelling</option>
                            <option value="Business">Business</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="cell">Cell Number:</label>
                        <input type="text" class="form-control" id="cell" name="cell">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="wphone">Work Phone:</label>
                        <input type="text" class="form-control" id="wphone" name="wphone">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="hphone">Home Phone:</label>
                        <input type="text" class="form-control" id="hphone" name="hphone">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="status">Contact Status:</label>
                        <select class="form-control" name="status" id="status">
                            <option value="Found">Found</option>
                            <option value="Not Found">Not Found</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="detailstatus">Contact Detail Status:</label>
                        <select class="form-control" name="detailstatus" id="detailstatus">
                            <option value="Valid">Valid</option>
                            <option value="In-Valid">In-Valid</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group form-check">
                        <label class="form-check-label">Skip Tracing Source: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" class="form-check-input" id="isskip" name="isskip">
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
            <form id="frm-owner-doc" class="validate-form" action="/createOwnerDoc" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="documentrecordnumber" id="documentrecordnumber">
            <input type="hidden" name="recno1" id="recno1">
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Owner's Document</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-6 form-group validate-input" data-validate = "Please fill out this field.">
                        <label for="countycode">County:</label>
                        <input type="text" class="form-control typeahead" id="countycode" name="countycode">
                        <input type="hidden" id="cc" name="cc">
                    </div>
                    <div class="col-sm-6 form-group">
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
<!--  Track modal ---->
<div class="modal " id="addtrackModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frm-owner-track" class="validate-form" action="/createOwnerTrack" method="post">
            @csrf
            <input type="hidden" name="trackingrecordnumber" id="trackingrecordnumber">
            <input type="hidden" name="recno3" id="recno3">
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Overage Request Tracking</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="documentsent">County Document Sent:</label>
                        <select class="form-control" id="documentsent" name="documentsent">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="documentreceived">County Receive Document:</label>
                        <select class="form-control" id="documentreceived" name="documentreceived">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 form-group">
                        <label for="documentstatus">Document Status:</label>
                        <select class="form-control" id="documentstatus" name="documentstatus">
                            <option value="Accept">Accept</option>
                            <option value="Reject">Reject</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="checkreceived">Check Recieved From County:</label>
                        <input type="text" class="form-control" id="checkreceived" name="checkreceived">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="checkreceivedon">Check Recieved On:</label>
                        <input type="text" class="form-control" id="checkreceivedon" name="checkreceivedon">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="checkcleared">Check Cleared:</label>
                        <select class="form-control" id="checkcleared" name="checkcleared">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="checksent">Check Sent to Owner:</label>
                        <select class="form-control" id="checksent" name="checksent">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 form-group">
                        <label for="checksenton">Check Sent On:</label>
                        <input type="text" class="form-control" id="checksenton" name="checksenton">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="recordclosed">Record Closed:</label>
                        <select class="form-control" id="recordclosed" name="recordclosed">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
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
            <form id="frm-owner-notes" action="/createOwnerNotes" class="validate-form" method="post">
            @csrf
            <input type="hidden" name="notesrecordnumber" id="notesrecordnumber">
            <input type="hidden" name="recno2" id="recno2">
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Owner's Notes</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-6 form-group">
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
                    <div class="col-sm-6 form-group">
                        <label for="issueresolved">Issue Resolved:</label>
                        <select class="form-control" id="issueresolved" name="issueresolved">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 form-group validate-input" data-validate = "Please fill out this field.">
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
<script>
    //For county autocomplete
    var path = "/getCounties";
    var map;
    $('input.typeahead').typeahead({
        source:  function (query, process) {
            var $this = this;
            return $.get(path,{ query: query }, function(data){
                //alert(data)
                var options = [];
                $this["map"]={};
                $.each(data,function(i,val){
                    //console.log(val.name);
                    options.push(val.name);
                    $this.map[val.name] = val.id;
                });
               // alert(process(options))
                return process(options);
            });
        },
        updater: function(item){
            //$('#countycode').val(item);
            $('#cc').val(this.map[item],item);
            return item;
        }
    });
    //for track form reset
    $('#btnAddTracking').click(function(){
        $('#frm-owner-track')[0].reset();
        $('#recno3').val($('#recordnumber').val());
        $('#trackingrecordnumber').val('0');
        $('#addtrackModal').modal('show');
    })
    //for notes form reset
    $('#addOwnerNotes').click(function(){
        //alert('sfdsf');
        $('#frm-owner-notes')[0].reset();
        $('#recno2').val($('#recordnumber').val());
        $('#notesrecordnumber').val('0');
        $('#addnotesModal').modal('show');
    })
    //for document form reset
    $('#btnAddOwnerDoc').click(function(){
        $('#frm-owner-doc')[0].reset();
        $('#recno1').val($('#recordnumber').val());
        $('#documentrecordnumber').val('0');
        $('#adddocModal').modal('show');
    })
    // For form reset
    $('#btnAddOwnerCont').click(function(){
        $('#frm-owner-cont')[0].reset();
        $('#recno').val($('#recordnumber').val());
        $('#contactrecordnumber').val('0');
        $('#addcontactModal').modal('show');
    })
    //For deletion of owner track
    function deleteOwnerTrack($id){
        if(confirm('Are You Sure You want to delete Overage Request Tracking?'))
        {
            window.location.href="/deleteOwnerTrack?id="+$id+"";
        }
    }
    //For deletion of owner notes
    function  deleteOwnerNotes($id)
    {
        if(confirm('Are You Sure You want to delete Owner Notes?'))
        {
            window.location.href="/deleteOwnerNotes?id="+$id+"";
        }
    }
    //For deletion of owner contact
    function  deleteOwnerContact($id)
    {
        if(confirm('Are You Sure You want to delete Owner Contact?'))
        {
            window.location.href="/deleteOwnerContact?id="+$id+"";
        }
    }
    //For deletion of owner documents
    function  deleteOwnerDoc($id)
    {
        if(confirm('Are You Sure You want to delete Owner Document?'))
        {
            window.location.href="/deleteOwnerDoc?id="+$id+"";
        }
    }
    function updateOwnerTrack($id){
        $('#recno3').val($('#recordnumber').val());
        $('#trackingrecordnumber').val($id);

        $.ajax({
            type: "GET",
            url: "/getOwnerTrackData",
            dataType: "json",
            cache: false,
            data: {
                id: $id
            },
            success: function(data) {
                
                var obj=JSON.parse(JSON.stringify(data));
                $('#documentsent').val(obj[0].county_document_sent);
                $('#documentreceived').val(obj[0].county_receive_document);
                $('#documentstatus').val(obj[0].document_accept_reject);  
                $('#checkreceived').val(obj[0].receive_check_from_county); 
                $('#checkcleared').val(obj[0].check_cleared); 
                $('#checksent').val(obj[0].send_check_to_owner); 
                $('#checkreceivedon').val(obj[0].date_check_receive); 
                $('#checksenton').val(obj[0].date_check_sent); 
                $('#recordclosed').val(obj[0].record_close);              
            }
        });
        $('#addtrackModal').modal('show');
    }
    //for update owner notes
    function updateOwnerNotes($id){
        $('#recno2').val($('#recordnumber').val());
        $('#notesrecordnumber').val($id);

        $.ajax({
            type: "GET",
            url: "/getOwnerNotesData",
            dataType: "json",
            cache: false,
            data: {
                id: $id
            },
            success: function(data) {
                
                var obj=JSON.parse(JSON.stringify(data));
                $('#notestype').val(obj[0].note_type);
                $('#ownernotes').text(obj[0].note_details);
                $('#issueresolved').val(obj[0].issue_resolved);                 
            }
        });
        $('#addnotesModal').modal('show');
    }
    //for update owner document
    function updateOwnerDoc($id){
        $('#recno1').val($('#recordnumber').val());
        $('#documentrecordnumber').val($id);

        $.ajax({
            type: "GET",
            url: "/getOwnerDocData",
            dataType: "json",
            cache: false,
            data: {
                id: $id
            },
            success: function(data) {
                
                var obj=JSON.parse(JSON.stringify(data));
                //alert(obj[0].skip_tracing_source);
                $('#countycode').val(obj[0].county_name);
                $('#cc').val(obj[0].county_code);
                $('#doctype').val(obj[0].document_type);
                $('#docname').val(obj[0].document_name);
                $('#docFile').val(obj[0].document_link);                    
            }
        });
        $('#adddocModal').modal('show');
    }
    //for updation of owner contact
    function updateOwnerContact($id)
    {
        $('#recno').val($('#recordnumber').val());

        $('#contactrecordnumber').val($id);
        $.ajax({
            type: "GET",
            url: "/getOwnerContactData",
            dataType: "json",
            cache: false,
            data: {
                id: $id
            },
            success: function(data) {
                
                var obj=JSON.parse(JSON.stringify(data));
                //alert(obj[0].skip_tracing_source);
                $('#contname').val(obj[0].contact_name);
                $('#relation').val(obj[0].relationship);
                $('#address').val(obj[0].address);
                $('#city').val(obj[0].city);
                $('#state').val(obj[0].state);
                $('#zip').val(obj[0].zip_code);
                $('#addresstype').val(obj[0].address_type);
                $('#cell').val(obj[0].cell_phone);
                $('#wphone').val(obj[0].work_phone);
                $('#hphone').val(obj[0].home_phone);
                $('#status').val(obj[0].contact_status);
                $('#detailstatus').val(obj[0].contact_detail_status);
                if (obj[0].skip_tracing_source == '1')
                    $('#isskip').attr('checked', true);
                else
                    $('#isskip').removeAttr('checked');
                    
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
