@extends('layouts.appmain')

@section('content')
<div class="jumbotron jumbotron-fluid p-0 pt-3 pb-2">
    <div class="container pl-0">
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
        <form class="form-inline" method="post" action="{{ url('/searchDocument') }}">
            @csrf
            <input type="hidden" value="searchForm" name="searchForm">
            <input type="search" class="form-control mb-2 mr-sm-2" id="state" name="state" placeholder="State Name">
            <input type="search" class="form-control mb-2 mr-sm-2 typeahead" id="county" name="county" placeholder="County Name">
            <input type="hidden" id="cc" name="cc">
            <select class="form-control mb-2 mr-sm-2" id="doctype" name="doctype">
                <option value="0">Document Type</option>
                <option value="County form">County form</option>
                <option value="Agreement">Agreement</option>
                <option value="Copy of check">Copy of check</option>
                <option value="Remote notary">Remote notary</option>
            </select>
            <button type="submit" class="btn bg-yellow mb-2 mr-sm-2 text-white">Search&nbsp;<i title="Search Task" class="fa fa-search text-white"></i></button>
        </form>
    </div>
    
    <div class="container bg-white pb-5 mb-4">
        <h2 class="float-left">Document List</h2>
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
                @if ($docs == null OR count($docs) == 0)
                    <tr><td colspan="4" class="text-center">No Record Exists.</td></tr>
                @else
                    
                @foreach ($docs as $d)
                <tr>
                    <td>{{ $d->county_name }}</td>
                    <td>{{ $d->document_type }}</td>
                    <td><a href="{{ url('/viewfile') }}?path={{ $d->document_link}}" target="_blank">{{ $d->document_name }}</a></td>
                    <td><i title="Delete" class="fa fa-eye"></i>&nbsp;&nbsp;<i title="Edit" class="fa fa-edit"></i></td>
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
            $('#cc').val(this.map[item],item);
            return item;
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
