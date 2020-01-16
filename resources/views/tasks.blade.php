@extends('layouts.appmain')

@section('content')
<div class="jumbotron jumbotron-fluid p-0 pt-3 pb-0">
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
        <form class="form-inline" method="post" action="{{ url('/task') }}">
            @csrf
            <input type="hidden" value="searchForm" name="searchForm">
            <input type="text" class="form-control mb-2 mr-sm-2" id="task-name" name="task-name" placeholder="Task Name">
            <input type="text" class="form-control mb-2 mr-sm-2" id="created-by" name="created-by" placeholder="Created By" readonly="true" value="{{auth()->user()->username}}">
            <input type="text" class="form-control mb-2 mr-sm-2" id="created-on" name="created-on" placeholder="Created On">
            <button type="submit" class="btn bg-yellow mb-2 mr-sm-2 text-white">Search&nbsp;<i title="Search Task" class="fa fa-search text-white"></i></button>
            
        </form>
    </div>
    <div class="container bg-white pb-5 mb-4">
        <h2 class="float-left">Task List</h2>
        <p class="float-right pt-2 pr-5"><button type="button" class="btn bg-yellow mb-2 text-white" data-toggle="modal" data-target="#addtaskModal">Add Task&nbsp;<i title="Add Task" class="fa fa-plus text-white"></i></button></p>            
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Task Name</th>
              <th>Created By</th>
              <th>Created On</th>
              <th>Due Date</th>
              <th>Assigned To</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
           @inject('Obj','App\Http\Controllers\WelcomeController')

            @foreach($tasks as $task)  
            <tr>
               <td>{{$task->task_name}}</td>
                <td>{{$Obj::getTaskCreaterName($task->task_creator)}}</td>
                <td>{{$task->time_stamp_for_record_creation}}</td>
                <td>{{$task->due_date}}</td>
                <td>{{$Obj::getTaskAssigneeName($task->user_code)}}</td>
                <td>{{$task->task_status}}</td>
                <td><i title="Edit" class="fa fa-edit" onclick="updateTask({{$task->task_code}})"></i>&nbsp;&nbsp;<i title="Cancel" class="fa fa-ban"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash" onclick="deleteTask({{$task->task_code}})"></i></td>  
            </tr>
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
                            <label for="assignedto">Esculate Task:</label>
                            <select class="form-control" id="esculate_staskUpdate" name="esculate_staskUpdate">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                        <div class="col form-group">
                            <label for="status">Esculate Task:</label>
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
                <form action="{{ url('/updateTask') }}" class="needs-validation" novalidate method="post">
                @csrf
                <input type="hidden" name="task_id" id="task_id">
                <!-- Modal Header -->
                <div class="modal-header bg-yellow">
                    <h4 class="modal-title">Update Task</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="taskname">Task Name:</label>
                            <input type="text" class="form-control" id="tasknameUpdate" name="tasknameUpdate" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="col form-group">
                            <label for="createdby">Created By:</label>
                            <input type="text" class="form-control" id="createdbyUpdate" name="createdbyUpdate" readonly="true" value="{{auth()->user()->username}}">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="col form-group">
                            <label for="createdon">Created On:</label>
                            <input type="date" class="form-control" id="createdonUpdate" name="createdonUpdate"  >
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="col form-group">
                            <label for="duedate">Due Date:</label>
                            <input type="date" class="form-control" id="duedateUpdate" name="duedateUpdate" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col">
                            <label for="assignedto">Assigned To:</label>
                            <input type="text" class="form-control typeahead" id="assignedtoUpdate" name="assignedtoUpdate" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="col form-group">
                            <label for="status">Status:</label>
                            <input type="text" class="form-control" id="statusUpdate" name="statusUpdate" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col">
                            <label for="assignedto">Escalate Task:</label>
                            <select class="form-control" id="esculate_staskUpdate" name="esculate_staskUpdate">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                        <div class="col form-group">
                            <label for="status">Escalate Task:</label>
                            <input type="text" class="form-control" id="esculate_taskUpdate" name="esculate_taskUpdate" >
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col">
                            <label for="tasksnotes">Notes:</label>
                            <textarea class="form-control rounded-1" id="tasksnotesUpdate" name="tasksnotesUpdate" rows="3"></textarea>
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
                    $('#createdonUpdate').val(obj[0].time_stamp_for_record_creation);
                    var date = obj[0].due_date;
                    var newdate = convert(date);
        
                    getAssigneeName(obj[0].user_code);
         
                    $('#duedateUpdate').val(obj[0].due_date);
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

@endsection
