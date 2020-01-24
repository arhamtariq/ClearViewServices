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
        <form class="form-inline" method="post" action="{{ url('/searchOwner') }}">
            @csrf
            <input type="hidden" value="searchForm" name="searchForm">
            <input type="text" class="form-control mb-2 mr-sm-2" id="countyrecordsrch" name="countyrecordsrch" placeholder="County Record Number">
            <input type="text" class="form-control mb-2 mr-sm-2" id="ownername" name="ownername" placeholder="Owner Name">
            <button type="submit" class="btn bg-yellow mb-2 mr-sm-2 text-white">Search&nbsp;<i title="Search" class="fa fa-search "></i></button>
        </form>
    </div>
    <div class="container bg-white pb-5 mb-4 pt-3">
        <h4 class="float-left">Owners List</h4>
        <p class="float-right pt-2 pr-5"><button id="btnAddOwner" type="button" class="btn bg-yellow mb-2 text-white">Add Owner&nbsp;<i title="Add Task" class="fa fa-plus "></i></button></p>            
        <br><br>
        <p class="float-left">Note: Click on the "County Record Number" to view further details of owner.</p>
        <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>County Record No.</th>
              <th>Full Name</th>
              <th>Property Address</th>
              <th>County</th>
              <th>Parcel Number</th>
              <th>Sale Date</th>
              <!--<th>O/A Amount</th>
              <th>O/A Owned</th>-->
              <th>Avlbl Funds</th>
              <!--<th>Cont. Owner</th>
              <th>Cont. County</th>-->
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            
                @if($owner == null or count($owner) == 0)
                    <tr><td class="text-center" colspan="10">No Record Exists.</td></tr>
                @else
                    @foreach($owner as $o)
                    <tr>
                        <td><a href="{{ url('/ownerdetails') }}?id={{ $o->record_number}}">{{ $o->county_record_number}}</a></td>
                        <td><a href="{{ url('/ownerdetails') }}?id={{ $o->record_number}}">{{$o->first_name . ' ' . $o->middle_name . ' ' . $o->last_name}}</a></td>
                        <td><a href="{{ url('/ownerdetails') }}?id={{ $o->record_number}}">{{$o->property_address . ' ' . $o->city . ' ' . $o->state . ' ' . $o->zip_code}}</a></td>
                        <td><a href="{{ url('/ownerdetails') }}?id={{ $o->record_number}}">{{$o->county_name}}</a></td>
                        <td><a href="{{ url('/ownerdetails') }}?id={{ $o->record_number}}">{{$o->parcel_number}}</a></td>
                        <td><a href="{{ url('/ownerdetails') }}?id={{ $o->record_number}}">{{$o->sale_date}}</a></td>
                        <!--<td><a href="{{ url('/ownerdetails') }}?id={{ $o->record_number}}">{{$o->overage_amount_collected}}</a></td> -->
                        <td><a href="{{ url('/ownerdetails') }}?id={{ $o->record_number}}">{{$o->available_funds}}</a></td>
                        <!-- <td>{{$o->overage_amount_owned_to_owner}}</td> -->
                        <!--<td><a href="{{ url('/ownerdetails') }}?id={{ $o->record_number}}">{{$o->contacted_owner}}</a></td>-->
                        <!--<td><a href="{{ url('/ownerdetails') }}?id={{ $o->record_number}}">{{$o->contacted_county}}</a></td>-->
                        <td><i title="Edit" class="fa fa-edit" onclick="updateOwner({{$o->record_number}})"></i>&nbsp;&nbsp;<i title="Delete" class="fa fa-trash" onclick="deleteOwner({{$o->record_number}})"></i></td>
                    </tr>
                    @endforeach
                @endif            
          </tbody>
        </table>
        </div>
        <ul class="pagination justify-content-end " style="margin:20px 0">
            <li class="page-item"><a class="page-link text-black" href="javascript:void(0)" onclick="previous()"><<</a></li>
            <li class="page-item"><a class="page-link text-black" href="#" onclick="page(1)">1</a></li>
            <li class="page-item"><a class="page-link text-black" href="#" onclick="page(2)">2</a></li>
            <li class="page-item"><a class="page-link text-black" href="#" onclick="page(3)">3</a></li>
            <li class="page-item"><a class="page-link text-black" href="javascript:void(0)" onclick="Next()">>></a></li>
        </ul>
      </div>
    
</div>

<!-- Add owner -->
<div class="modal " id="addownerModal">
    <div class="modal-dialog mw-100 w-75">
        <div class="modal-content">
            <form id="frm-owner" class="validate-form" action="{{ url('/createowner') }}" method="post">
            @csrf
            <input type="hidden" name="recordnumber" id="recordnumber">
            <!-- Modal Header -->
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Owner</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <fieldset>
                            <legend>Owner's Information</legend>
                            <div class="form-row">
                                <div class="col-sm-6 form-group validate-input" data-validate = "Please fill out this field.">
                                    <label for="countyrecno">County Record Number:</label>
                                    <input type="text" class="form-control" id="countyrecno" name="countyrecno">
                                </div>
                                <div class="col-sm-6 form-group validate-input" data-validate = "Please fill out this field.">
                                    <label for="countycode">County:</label>
                                    <input type="text" class="form-control typeahead" id="countycode" name="countycode">
                                    <input type="hidden" id="cc" name="cc">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-4 form-group validate-input" data-validate = "Please fill out this field.">
                                    <label for="firstname">First Name:</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname">
                                    
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="middlename">Mid Name</label>
                                    <input type="text" class="form-control" id="middlename" name="middlename">
                                   
                                </div>
                                <div class="col-sm-4 form-group validate-input" data-validate = "Please fill out this field.">
                                    <label for="lastname">Last Name:</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname">
                                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 form-group validate-input" data-validate = "Please fill out this field.">
                                    <label for="propertyaddress">Property Address:</label>
                                    <input type="text" class="form-control" id="propertyaddress" name="propertyaddress">
                                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-4 form-group validate-input" data-validate = "Please fill out this field.">
                                    <label for="city">City:</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                    
                                </div>
                                <div class="col-sm-4 form-group validate-input" data-validate = "Please fill out this field.">
                                    <label for="state">State:</label>
                                    <input type="search" class="form-control" id="state" name="state">
                                </div>
                                <div class="col-sm-4 form-group validate-input" data-validate = "Please fill out this field.">
                                    <label for="zip">ZIP:</label>
                                    <input type="text" class="form-control" id="zip" name="zip">
                                    
                                </div>
                            </div>
                            <div class="form-row ">
                                <div class="col-sm-6 form-group">
                                    <label for="parcelno">Parcel Number:</label>
                                    <input type="type" class="form-control" id="parcelno" name="parcelno">
                                    
                                </div>
                                <div class="col-sm-6 form-group validate-input" data-validate = "Please fill out this field.">
                                    <label for="saledate">Sale Date:</label>
                                    <input type="text" class="form-control" id="saledate" name="saledate">
                        
                                </div>
                            </div>
                            
                        </fieldset>
                    </div>
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>Other Information</legend>
                            <div class="form-row">
                                <div class="col-sm-6 form-group">
                                    <label for="overageamount">Overage Amount Collected:</label>
                                    <input type="text" class="form-control" id="overageamount" name="overageamount">
                                    
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="overageamountowned">Overage Amount Owned:</label>
                                    <input type="text" class="form-control" id="overageamountowned" name="overageamountowned" >
                                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6 form-group">
                                    <label for="contactedowner">Contacted Owner:</label>
                                    <select class="form-control" id="contactedowner" name="contactedowner">
                                        <option value="0">No</option>
                                        <option value="1">Yes - On Phone</option>
                                        <option value="2">Yes - On Mail</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="contactedcounty">Contacted County:</label>
                                    <select class="form-control" id="contactedcounty" name="contactedcounty">
                                        <option value="0">No</option>
                                        <option value="1">Yes - On Phone</option>
                                        <option value="2">Yes - On Mail</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="avlblfunds">Available Funds:</label>
                                    <input type="text" class="form-control" id="avlblfunds" name="avlblfunds">
                                    
                                </div>
                                <!--<div class="col form-group">
                                    <label for="contacted-county">Contacted County:</label>
                                    <input type="text" class="form-control" id="contacted-county" name="contacted-county">
                                </div>-->
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn bg-yellow text-white">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    //For county autocomplete
    var path = "{{ url('/getCounties') }}";
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

    //for pagination
    function page($page_id)
    {
        var page =$page_id;
        //page=page-1;
        var url = window.location.origin + window.location.pathname;
        window.location.href=url+"?page="+page+"";
    }

    //For deletion of owner
    function  deleteOwner($id)
    {
        if(confirm('Are You Sure You want to delete Owner?'))
        {
            window.location.href="{{ url('/deleteOwner') }}?id="+$id+"";
        }
    }
    $('#btnAddOwner').click(function(){
        $('#frm-owner')[0].reset();
        
        $('#recordnumber').val('0');
        $('#addownerModal').modal('show');
    })
    
    //for updation of owner
    function updateOwner($id)
    {
        $('#recordnumber').val($id);
        $.ajax({
            type: "GET",
            url: "{{ url('/getOwnerData') }}",
            dataType: "json",
            cache: false,
            data: {
                id: $id
            },
            success: function(data) {
                
                var obj=JSON.parse(JSON.stringify(data));
                
                $('#countyrecno').val(obj[0].county_record_number);
                $('#countycode').val(obj[0].county_name);
                $('#cc').val(obj[0].county_code);
                $('#firstname').val(obj[0].first_name);
                $('#middlename').val(obj[0].middle_name);
                $('#lastname').val(obj[0].last_name);
                $('#propertyaddress').val(obj[0].property_address);
                $('#city').val(obj[0].city);
                $('#state').val(obj[0].state);
                $('#zip').val(obj[0].zip_code);
                $('#parcelno').val(obj[0].parcel_number);
                $('#saledate').val(obj[0].sale_date);
                $('#overageamount').val(obj[0].overage_amount_collected);
                $('#overageamountowned').val(obj[0].overage_amount_owned_to_owner);
                $('#avlblfunds').val(obj[0].available_funds);
                $('#contactedowner').val(obj[0].contacted_owner);
                $('#contactedcounty').val(obj[0].contacted_county);
               
            }
        });
        $('#addownerModal').modal('show');
    }
</script>
@endsection
