<!-- Main modal Auto pop up-->
<div id="mpopupBox" class="mpopup fixed h-full top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 max-h-full grid items-center">
    <div class="relative w-full max-w-2xl max-h-full h-full grid items-center mx-auto">
      <!-- Modal content -->
        <div class="sm:flex flex-none bg-indigo-100 rounded-xl px-5 items-center relative">
          <div class="lg:flex-1">
            <img src="{{url('images/newsletter-img.png')}}" alt="">
          </div>
          <div class="lg:flex-1">
            <div class="rounded-lg border-0">
              <button onclick="closeModal()" type="button" class="close absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="md:px-6 sm:px-0 py-6 lg:px-8">
                  <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{__('Get K8 Airdrop update!')}}</h3>
                  <p class="text-sm mb-5 text-gray-400">{{__('Join our subscribers list to get latest news and updates about our promos delivered directly to your inbox')}}.</p>
                  <form class="space-y-6" method="post" id="form">
                      <div>
                          <input
                          required
                          oninvalid="this.setCustomValidity(`{{ __('This Field is required.') }}`)"
                          oninput="this.setCustomValidity('')"
                          type="email" name="email" id="email" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-4 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="{{__('Enter email here..')}}" required>
                      </div>
                      
                      <button type="submit" class="w-full text-white bg-indigo-600 hover:bg-indigo-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{__('SUBSCRIBE')}}</button>
                    
                  </form>
                  <span class="error-msg text-sm" id="subscriptionMsg"></span>
              </div>
          </div>
          </div>
        </div>
    </div>
</div>


<script>
  $(document).ready(function () {
    $("#subscriptionMsg").html('');
    $('#form').submit(function() {
      const msg = $("#subscriptionMsg");
      let msgText=''
      let msgClass=''
      $.ajax({
        type: "POST",
        url: "{{route('api.subscribe')}}",
        data: $("#form").serialize(), // serializes the form's elements.
        success: function(res)
        {
          if(res.success) {
            msgText = `{{__('Congratulations!! You will be updated with the promotions everyday.')}}`;
            msgClass = 'error-msg';
            msg.removeClass('error-msg').addClass('success-msg');
          } else {
            msgText = `{{__('Please try again later.')}}`;
            msg.removeClass('success-msg').addClass('error-msg');
          }
          msg.html(msgText);
        },
        error: function (xhr, status, error) {
          const res = JSON.parse(xhr.responseText);
          const resMsg = res.message;
          if(resMsg.includes('taken')) {
            msgText = `{{__('Email is already taken')}}`;
          } else if(resMsg.includes('required')) {
            msgText = `{{__('This Field is required.')}}`;
          } else {
            msgText = `{{__('Please try again later.')}}`;
          }
          msg.html(msgText);
          msg.removeClass('success-msg').addClass('error-msg');
        }
      });
      return false;
    });
  });
  function closeModal () {
    document.cookie = "UserSubscriptionCookie=YES; expires =Fri, 31 Dec 9999 23:59:59 GMT";
  }
</script>
