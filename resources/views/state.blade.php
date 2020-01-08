@extends('layouts.appmain')

@section('content')
<div class="jumbotron jumbotron-fluid p-0 pt-3 pb-2">
    <div class="container pl-0 pt-1 pb-3">
        <form class="form-inline" method="post" action="/searchState">
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
                    <th>View Details</th>
                    
                </tr>
            </thead>
            <tbody>
                @if ($state == null OR count($state) == 0)
                    <tr><td colspan="2" class="text-center">No Record Exists.</td></tr>
                @else
                    
                @foreach ($state as $s)
                <tr>
                    <td>{{ $s->state_name}}</td>
                    <td><a href="/getStateDetails?id={{$s->state_code}}">Click here to view details.</a></td>
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
