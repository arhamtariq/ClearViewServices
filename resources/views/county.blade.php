@extends('layouts.appmain')

@section('content')
<div class="jumbotron jumbotron-fluid p-0 pt-3 pb-2">
    <div class="container pl-0 pt-1 pb-3">
        <form class="form-inline" method="post" action="{{ url('/searchCounty') }}">
            @csrf
            <input type="hidden" value="searchForm" name="searchForm">
            <input type="search" class="form-control mdb-autocomplete mb-2 mr-sm-2 " id="state" name="state" placeholder="State Name">           
            <input type="search" class="form-control mdb-autocomplete mb-2 mr-sm-2 typeahead" id="county" name="county" placeholder="County Name">
            <button type="submit" class="btn bg-yellow mb-2 mr-sm-2 text-white">Search&nbsp;<i class="fa fa-search text-white"></i></button>
        </form>
    </div>
    <div class="container bg-white pb-5 mb-4">
        <h2 class="float-left">County List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>State Name</th>
                    <th>County Name</th>
                    <th>View Details</th>
                    
                </tr>
            </thead>
            <tbody>
                @if ($county == null OR count($county) == 0)
                    <tr><td colspan="3" class="text-center">No Record Exists.</td></tr>
                @else
                    
                @foreach ($county as $c)
                <tr>
                    <td>{{ $c->state_name}}</td>
                    <td>{{ $c->county_name}}</td>
                    <td><a href="{{ url('/getCountyDetails') }}?id={{$c->county_code}}">Click here to view details.</a></td>
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
            //$('#cc').val(this.map[item],item);
            return item;
        }
    });
</script>
@endsection
