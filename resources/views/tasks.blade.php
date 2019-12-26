@extends('layouts.appmain')

@section('content')
<div class="jumbotron jumbotron-fluid p-0 pt-3 pb-2">
    <div class="container pl-0">
        <form class="form-inline" method="post" action="">
            <input type="text" class="form-control mb-2 mr-sm-2" id="task-name" name="task-name" placeholder="Task Name">
            <input type="text" class="form-control mb-2 mr-sm-2" id="created-by" name="created-by" placeholder="Created By">
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
            <tr>
              <td>ABC</td>
              <td>Mr. xyz</td>
              <td>Mon, 11 Dec 2019</td>
              <td>Mon, 11 Dec 2019</td>
              <td>Mr. lmn</td>
              <td>New</td>
              <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Cancel" class="fa fa-ban"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
            </tr>
            <tr>
                <td>ABC</td>
                <td>Mr. xyz</td>
                <td>Mon, 11 Dec 2019</td>
                <td>Mon, 11 Dec 2019</td>
                <td>Mr. lmn</td>
                <td>New</td>
                <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Cancel" class="fa fa-ban"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
            </tr>
            <tr>
                <td>ABC</td>
                <td>Mr. xyz</td>
                <td>Mon, 11 Dec 2019</td>
                <td>Mon, 11 Dec 2019</td>
                <td>Mr. lmn</td>
                <td>New</td>
                <td><i title="Edit" class="fa fa-edit"></i>&nbsp;&nbsp;<i title="Cancel" class="fa fa-ban"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash"></i></td>
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
      
    <div class="modal" id="addtaskModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/action_page.php" class="needs-validation" novalidate>
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
                            <input type="text" class="form-control" id="createdby" name="createdby" required>
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
<script type="text/javascript">
    var path = "/getUsersForAssigning";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
            //console.log(data);
          //  data=data.toLowerCase();
          
                return process(data);
            });
        }
    });
</script>

@endsection
