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
        @if ($state_notes != null AND count($state_notes) >0)
            <h2>{{$state_notes[0]->state_name}}</h2>
            <input type="hidden" name="statecode" id="statecode" value={{$state_notes[0]->state_code}}>
        @endif
    </div>
    
    <!-- State's Notes List -->
   
    <div class="container bg-white">
        <div class="row pt-5 pb-2">
            <div class="col-sm-10"><h4>Notes List</h4></div>
            <div class="col-sm-2 text-right"><button id="btnaddStateNotes" type="button" class="btn bg-yellow text-white">Add Notes&nbsp;<i title="Add Notes" class="fa fa-plus text-white"></i></button></div>            
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Note Type</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($state_notes == null OR count($state_notes) == 0 OR $state_notes[0]->note_number == null)
                    <tr><td colspan="3" class="text-center">No Record Exists.</td></tr>
                @else
                    @foreach($state_notes as $sn)
                    <tr>
                        <td>{{$sn->note_type}}</td>
                        <td>{{$sn->note_details}}</td>
                        <td><i title="Edit" class="fa fa-edit" onclick="updateStateNotes({{$sn->note_number}})"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash" onclick="deleteStateNotes({{$sn->note_number}})"></i></td>
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
            <div class="col-sm-2 text-right"><button id="btnAddStateDoc" type="button" class="btn bg-yellow text-white">Add Documents&nbsp;<i title="Add Documnets" class="fa fa-plus " ></i></button></div>            
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
                @if ($state_document == null OR count($state_document) == 0 OR $state_document[0]->document_number == null)
                    <tr><td colspan="3" class="text-center">No Record Exists.</td></tr>
                @else
                    @foreach($state_document as $sd)
                        <tr>
                            <td>{{ $sd->document_type }}</td>
                            <td><a href="/viewfile?path={{ $sd->document_link}}" target="_blank">{{ $sd->document_name }}</a></td>
                            <td><i title="Edit" class="fa fa-edit" onclick="updateStateDoc({{$sd->document_number}})"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash" onclick="deleteStateDoc({{$sd->document_number}})"></i></td>
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


<!--  Document modal ---->
<div class="modal " id="adddocModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frm-state-doc" class="validate-form" action="/createStateDoc" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="docid" id="docid">
            <input type="hidden" name="docsc" id="docsc">
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">State's Document</h4>
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
            <form id="frm-state-notes" action="/createStateNotes" class="validate-form" method="post">
            @csrf
            <input type="hidden" name="notenumber" id="notenumber">
            <input type="hidden" name="notesc" id="notesc">
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">State's Notes</h4>
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
                        <label for="statenotes">Notes:</label>
                        <textarea class="form-control rounded-1" id="statenotes" name="statenotes" rows="3"></textarea>
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
    $('#btnaddStateNotes').click(function(){
        
        $('#frm-state-notes')[0].reset();
        $('#notesc').val($('#statecode').val());
        $('#notenumber').val('0');
        $('#addnotesModal').modal('show');
    })
    //for document form reset
    $('#btnAddStateDoc').click(function(){
        $('#frm-state-doc')[0].reset();
        $('#docsc').val($('#statecode').val());
        $('#documentnumber').val('0');
        $('#adddocModal').modal('show');
    })
    
    
    //For deletion of state notes
    function  deleteStateNotes($id)
    {
        if(confirm('Are You Sure You want to delete State Notes?'))
        {
            window.location.href="/deleteStateNotes?id="+$id+"";
        }
    }
    
    //For deletion of state documents
    function  deleteStateDoc($id)
    {
        if(confirm('Are You Sure You want to delete State Document?'))
        {
            window.location.href="/deleteStateDoc?id="+$id+"";
        }
    }
    
    
    //for update state notes
    function updateStateNotes($id){
        
        $('#notesc').val($('#statecode').val());
        $('#notenumber').val($id);

        $.ajax({
            type: "GET",
            url: "/getStateNotesData",
            dataType: "json",
            cache: false,
            data: {
                id: $id
            },
            success: function(data) {
                var obj=JSON.parse(JSON.stringify(data));
                $('#notestype').val(obj[0].note_type);
                $('#statenotes').text(obj[0].note_details);               
            }
        });
        $('#addnotesModal').modal('show');
    }
    //for update state document
    function updateStateDoc($id){
        $('#docsc').val($('#statecode').val());
        $('#docid').val($id);

        $.ajax({
            type: "GET",
            url: "/getStateDocData",
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
