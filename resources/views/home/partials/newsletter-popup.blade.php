<div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
      <img src="{{ url('images/giveaways-banner.jpeg') }}" alt="">
      <form method="post" id="form">
        <div class="modal-body">
          <div class="container py-4">
              <div class="mb-4">
                <h4 class="russo">{{ __('Get k8 Airdrop updates!') }}</h4>
                <p>{{__('Join our subscribers list to get latest news and updates about our promos delivered directly to your inbox')}}.</p>
              </div>

              <div class="input-group">
                <input
                        required
                        oninvalid="this.setCustomValidity(`{{ __('This Field is required.') }}`)"
                        oninput="this.setCustomValidity('')"
                        type="email" class="form-control"
                        placeholder="{{__('Enter email address')}}..."
                        name="email">
                <div class="input-group-append">
                  <button class="btn" type="submit">{{__('SUBSCRIBE')}}</button>
                </div>
              </div>
            <span class="error-msg" id="subscriptionMsg"></span>

          </div>
        </div>
      </form>
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
