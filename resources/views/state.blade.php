@extends('layouts.appmain')

@section('content')
<div class="jumbotron jumbotron-fluid p-0 pt-3 pb-2">
    <div class="container pl-0 pt-1 pb-3">
        <form class="form-inline" method="post" action="{{ url('/searchState') }}">
            @csrf
            <input type="hidden" value="searchForm" name="searchForm">
            <input type="search" class="form-control mdb-autocomplete mb-2 mr-sm-2 " id="state" name="state" placeholder="State Name">           
            <button type="submit" class="btn bg-yellow mb-2 mr-sm-2 text-white">Search&nbsp;<i class="fa fa-search text-white"></i></button>
        </form>
    </div>
    <div class="container bg-white pb-5 mb-4">
        <h2 class="float-left">State List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>State Name</th>
                    <th>Notes/ Documents</th>
                    <th>Workables</th>
                </tr>
            </thead>
            <tbody>
                @if ($state == null OR count($state) == 0)
                    <tr><td colspan="3" class="text-center">No Record Exists.</td></tr>
                @else
                    
                @foreach ($state as $s)
                <tr>
                    <td>{{ $s->state_name}}</td>
                    <td><a href="{{ url('/getStateDetails') }}?id={{$s->state_code}}">Click here to view details.</a></td>
                    @if (($s->timeframe_before_finders_fee == '') AND ($s->where_list_is_located == ''))
                        <td>Not Available</td>
                    @else
                        <td><a href="#" onclick="openWorkableDetails('{{$s->state_code}}')">Click here to view workables.</a></td>
                    @endif
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

<!--  workable modal ---->
<div class="modal" id="workableModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Workables</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-12 form-group">
                        <h5>Timeframe before finders fee:</h5>
                        <p id="timeframe"></p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 form-group validate-input" data-validate = "Please fill out this field.">
                        <h5>List located at:</h5>
                        <p id="listlocation"></p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    function openWorkableDetails($id){
        $('#timeframe').text('');
        $('#listlocation').text('');
        $.ajax({
            type: "GET",
            url: "{{ url('/getWorkableDetails') }}",
            dataType: "json",
            cache: false,
            data: {
                id: $id
            },
            success: function(data) {
                
                var obj=JSON.parse(JSON.stringify(data));
                $('#timeframe').text(obj[0].timeframe_before_finders_fee);
                $('#listlocation').text(obj[0].where_list_is_located);                    
            }
        });
        $('#workableModal').modal('show');
    }
</script>

@endsection
