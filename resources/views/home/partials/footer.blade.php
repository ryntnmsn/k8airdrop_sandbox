<div class="container-main">


    <div class="footer">
       <h5></h5>


        <div id="dock-container">
            <div id="dock">
            <ul>
              <li><a href="https://prelink.co/k8fbeng/" target="_blank"><img src="{{url('images/logo/facebook.png')}}" alt="K8 Airdrop Promo Facebook"></a></li>
              <li><a href="https://prelink.co/k8instaeng" target="_blank"><img src="{{url('images/logo/instagram.png')}}" alt="K8 Airdrop Promo Instagram"></a></li>
              <li><a href="https://prelink.co/k8twen" target="_blank"><img src="{{url('images/logo/twitter.png')}}" alt="K8 Airdrop Promo Twitter"></a></li>
              <li><a href="https://prelink.co/k8yteng" target="_blank"><img src="{{url('images/logo/youtube.png')}}" alt="K8 Airdrop Promo Youtube"></a></li>
              <li><a href="https://prelink.co/k8tiktokeng" target="_blank"><img src="{{url('images/logo/tiktok.png')}}" alt="K8 Airdrop Promo Tiktok"></a></li>
              <li><a href="https://prelink.co/k8tgen" target="_blank"><img src="{{url('images/logo/telegram.png')}}" alt="K8 Airdrop Promo Telegram"></a></li>
              <li><a href="https://prelink.co/k8discord" target="_blank"><img src="{{url('images/logo/discord.png')}}" alt="K8 Airdrop Promo Discord"></a></li>
            </ul>
            <div class="base"></div>
            </div>
          </div>


    </div>
</div>
</div>
</div>
</body>
</html>

<script>
    $(function() {
        $(".preload").fadeOut(2000, function() {
            $(".content").fadeIn(1000);        
        });
    });
</script>



<script>
    function addPrevClass (e) {
  var target = e.target;
    if(target.getAttribute('src')) { // check if it is img
      var li = target.parentNode.parentNode;
      var prevLi = li.previousElementSibling;
      if(prevLi) {
        prevLi.className = 'prev';
      }
	
      target.addEventListener('mouseout', function() { 
        prevLi.removeAttribute('class');
      }, false);
  }
}
if (window.addEventListener) {
  document.getElementById("dock").addEventListener('mouseover', addPrevClass, false);
}
</script>

<script>
    $('.blog-description').each(function() {
        $(this).text($(this).text().substr(0, 80) + '...');
    });
</script>

<script>
    let icons = document.querySelectorAll(".ico");
let length = icons.length;

icons.forEach((item, index) => {
  item.addEventListener("mouseover", (e) => {
    focus(e.target, index);
  });
  item.addEventListener("mouseleave", (e) => {
    icons.forEach((item) => {
      item.style.transform = "scale(1)  translateY(0px)";
    });
  });
});

const focus = (elem, index) => {
  let previous = index - 1;
  let previous1 = index - 2;
  let next = index + 1;
  let next2 = index + 2;

  if (previous == -1) {
    console.log("first element");
    elem.style.transform = "scale(1.5)  translateY(-10px)";
  } else if (next == icons.length) {
    elem.style.transform = "scale(1.5)  translateY(-10px)";
    console.log("last element");
  } else {
    elem.style.transform = "scale(1.5)  translateY(-10px)";
    icons[previous].style.transform = "scale(1.2) translateY(-6px)";
    icons[previous1].style.transform = "scale(1.1)";
    icons[next].style.transform = "scale(1.2) translateY(-6px)";
    icons[next2].style.transform = "scale(1.1)";
  }
};

</script>

<script>
    $(document).ready(function () {
        $('#submitForm').submit(function() {
            const msg = $("#subMsg");
            let msgText=''
            let msgClass=''
            $.ajax({
                type: "POST",
                url: "{{route('api.subscribe')}}",
                data: $("#submitForm").serialize(), // serializes the form's elements.
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

        var fixmeTop = $('.fixme').offset().top;
        $(window).scroll(function () {
            var currentScroll = $(window).scrollTop();
            if (currentScroll >= fixmeTop) {
                $('.fixme').css({
                    position: 'fixed',
                    top: '0',
                });
            } else {
                $('.fixme').css({
                    position: 'static'
                });
            }
        });
    });
</script>







