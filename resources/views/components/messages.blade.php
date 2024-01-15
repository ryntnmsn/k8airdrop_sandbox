@if(session()->has('message'))

  <div style="z-index:100" class="mb-3 me-3 position-fixed bottom-0 end-0 alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Alert Message!</strong><br> {{session('message')}}
  </div>
@endif



@if(session()->has('click-to-join-message-success'))
  <div class="p-3 bg-green-600 mb-4 rounded-md">
    {{__(session('click-to-join-message-success'))}}
  </div>
@endif

@if(session()->has('click-to-join-message-failed'))
  <div class="p-3 bg-red-700 mb-4 rounded-md text-red-200">
    {{__(session('click-to-join-message-failed'))}}
  </div>
@endif