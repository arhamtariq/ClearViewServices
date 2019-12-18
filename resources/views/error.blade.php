<!--Error Div-->
  <div class="col-md-6">
   @if(session()->has('error'))
   <div class="alert alert-danger">
    {{session()->get('error')}}
   </div>
   @endif
  </div>
  <!--Error Div-->