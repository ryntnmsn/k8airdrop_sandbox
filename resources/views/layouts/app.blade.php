<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{url('images/logo/K8.png')}}">

    <title>K8Airdrop Promo Giveaways @yield('title')</title>

    <meta property="og:title" content="K8Airdrop Promo Giveaways @yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:url" content="https://k8airdrop.com/" />
    <meta property="og:image" content="@yield('image')" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="200" />
    <meta property="og:type" content="website" />
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.17/dist/css/splide.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2db2c8ea40.js" crossorigin="anonymous"></script>

    <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
     <script src="https://demos.codexworld.com/includes/js/jquery.min.js"></script>

     <script src="https://kit.fontawesome.com/6011d22640.js" crossorigin="anonymous"></script>
    
     <script src="http://kit.fontawesome.com/6011d22640.js" crossorigin="anonymous" defer></script>


     <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
     <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>



     <script>
         $(document).ready(function(){

            $(".participants_list").slice(0, 10).show();
            $("#loadMore").on("click", function(e){
            e.preventDefault();
            $(".participants_list:hidden").slice(0, 10).slideDown();
                if($(".participants_list:hidden").length == 0) {
                    $("#loadMore").text("{{__('Load more')}}").addClass("noContent");
                }
            });  
        })
     </script>


    <script>
        $(document).ready(function(){
            $(".tag_list").slice(0, 20).show();
            $("#loadMore").on("click", function(e){
            e.preventDefault();
            $(".tag_list:hidden").slice(0, 20).slideDown();
                if($(".tag_list:hidden").length == 0) {
                    $("#loadMore").text("{{__('Load more')}}").addClass("noContent");
                }
            });  
        })
    </script>
    {{-- <script>
        $(document).ready(function(){
            $(".participants_list").slice(0, 10).show();
            $("#loadMore").on("click", function(e){
            e.preventDefault();
            $(".participants_list:hidden").slice(0, 10).slideDown();
                if($(".participants_list:hidden").length == 0) {
                    $("#loadMore").text("Load More").addClass("noContent");
                }
            });  
        })
    </script> --}}

    <script>
        document.addEventListener( 'DOMContentLoaded', function () {
            var splide = new Splide( '#promo-banner', {
                type: 'loop',
                autoplay: 'true',
            } );

            splide.mount();
        });

        document.addEventListener( 'DOMContentLoaded', function () {
            new Splide( '#promo-carousel', {
                type: 'loop',
                drag: 'free',
                autoScroll: {
                    speed:.5
                },
                perPage: 3,
                breakpoints: {
                    640: {
                        perPage: 2,
                    },
                },
            }).mount(window.splide.Extensions);
        });

        document.addEventListener( 'DOMContentLoaded', function () {
            new Splide( '#social-carousel', {
                type: 'loop',
                drag: 'free',
                autoScroll: {
                    speed:.5
                },
                perPage: 8,
                breakpoints: {
                    640: {
                        perPage: 4,
                    },
                },
            }).mount(window.splide.Extensions);
        });

        document.addEventListener( 'DOMContentLoaded', function () {
            new Splide( '#news-carousel', {
                type: 'loop',
                autoplay: true,
                autoScroll: {
                    speed:.5
                },
                perPage: 1,
                breakpoints: {
                    640: {
                        perPage: 1,
                    },
                },
            }).mount();
        });

        document.addEventListener( 'DOMContentLoaded', function () {
            new Splide( '#latest-news-carousel', {
                type: 'loop',
                autoplay: true,
                gap: 26,
                autoScroll: {
                    speed:.5
                },
                perPage: 3,
                breakpoints: {
                    640: {
                        perPage: 1,
                    },
                    768: {
                        perPage: 2,
                    },
                    1080: {
                        perPage: 3,
                    }
                },
            }).mount();
        });
    </script>
    
    <!-- Matomo -->
    <script>
      var _paq = window._paq = window._paq || [];
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
      _paq.push(["setCookieDomain", "*.k8airdrop.com"]);
      _paq.push(["setExcludedQueryParams", ["*.sarduse.com"]]);
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="https://k8.matomo.cloud/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '5']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.async=true; g.src='//cdn.matomo.cloud/k8.matomo.cloud/matomo.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <!-- End Matomo Code -->
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K45S4ZY0RP" defer></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-K45S4ZY0RP');
    </script>
    <meta name="google-site-verification" content="T9N027FUfIL4UY1BNx-srcGB6sQOg8oQYqJQDLY3MBM" />

    @vite('resources/css/app.css')
</head>

<body>
    <!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "107884791679949");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v18.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    @include('layouts.navbar')
    @include('layouts.newsletter-popup')
    <div class="max-w-screen-xl mx-auto h-full p-5 relative">
        @yield('content')
    </div>
    @include('layouts.footer')


    <script>
        (function($, window, document, undefined) {
        "use strict";
          
          var el= $('.readmore'),
              clone= el.clone(),
              originalHtml= clone.html(),
              originalHeight= el.outerHeight(),
              Trunc = {
            moreLink: '<a href="#" class="readmore-toggle px-2 py-1 rounded-md text-sm bg-indigo-600" data-read="more">{{__("Read more")}}<span class="icon-arrow-bottom"</span></a>',
            lessLink: '<a href="#" class="readmore-toggle px-2 py-1 rounded-md text-sm bg-indigo-600" data-read="less">{{__("Read less")}}<span class="icon-arrow-top"></span></a>',
            addTrigger : function(){
              $('.article-readmore').append(this.moreLink); 
            },
            truncateText : function( textBlock ) {            
              while (textBlock.text().length > 190 ) {
                textBlock.text(function(index, text) {
                  return text.replace(/\W*\s(\S)*$/, '...');
                });
              }
            },     
            replaceText: function ( textBlock, original ){
              return textBlock.html(original).height(originalHeight);      
            }  
            
          };
          Trunc.addTrigger();
          Trunc.truncateText(el);
          
          $(document).on('click', '[data-read]', function(e){
            e.preventDefault();
          
            if ($(this).data('read') == 'more'){
              Trunc.replaceText(el, originalHtml);
              $(this).replaceWith(Trunc.lessLink);
              
            } else if ($(this).data('read') == 'less') {
              Trunc.truncateText(el);
              $(this).replaceWith(Trunc.moreLink);
              el.css('height', '100%');
            }
            
          });
        
        })(jQuery, window, document, undefined);
     </script>
     
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<script>
    function subscriptionPopup(){
        var mpopup = $('#mpopupBox');
        
        mpopup.show();
        
        $(".close").on('click',function(){
            mpopup.hide();
        });
        
        $(window).on('click', function(e) {
            if(e.target == mpopup[0]){
                mpopup.hide();
            }
        });
    }
    
    $(document).ready(function() {
        var popDisplayed = $.cookie('popDisplayed');
        if(popDisplayed == '1'){
            return false;
        }else{
            setTimeout( function() {
                subscriptionPopup();
            },3000);
            $.cookie('popDisplayed', '1', { expires: 7 });
        }
    });
</script>

<script>
    function showNewsletter() {
        document.getElementById('mpopupBox_newsletter').style.display = "block";
    }

    function hideNewsletter() {
        document.getElementById('mpopupBox_newsletter').style.display = "none";
    }
</script>

{{-- <script>
    $("p").attr('id', 'linkGenerate');
 </script> --}}

<script>
  function linkWords(elem,words,links) {
  
    elem.innerHTML=elem.innerHTML.replace(
     
        RegExp('('+words.join(')|(')+')','gi'),
      
        function(){
      
            for (var i=1;i<arguments.length-2;i++)
         
            if (arguments[i])
            
                return '<a class="link" href="'+links[i-1]+'">'+arguments[0]+'</a>';
        }
    );
    }
    document.addEventListener("DOMContentLoaded", linkWords(document.getElementById("blog_description"),
        [
            "Relax Gaming",
            "Yggdrasil Gaming",
            "Booming Games",
            "3 Oaks Gaming",
            "Play'n GO",
            "Net Entertainment",
            "Pragmatic Play",
            "Push Gaming",
            "Nolimit City",
            "Hacksaw Gaming"
        ],
        [
            "https://k8airdrop.com/news/relax-gaming",
            "https://k8airdrop.com/news/yggdrasil-gaming",
            "https://k8airdrop.com/news/booming-games",
            "https://k8airdrop.com/news/3-oaks-gaming",
            "https://k8airdrop.com/news/playn-go",
            "https://k8airdrop.com/news/net-entertainment",
            "https://k8airdrop.com/news/pragmatic-play",
            "https://k8airdrop.com/news/push-gaming",
            "https://k8airdrop.com/news/nolimit-city",
            "https://k8airdrop.com/news/hacksaw-gaming"
        ]
    ));
</script>


<script>
    var pageLink = window.location.href;
    var pageTitle = String(document.title).replace(/\&/g, '%26');

    function fbs_click() { window.open(`http://www.facebook.com/sharer.php?u=${pageLink}&quote=${pageTitle}`,'sharer','toolbar=0,status=0,width=626,height=436');return false; }
        
    function tbs_click() { window.open(`https://twitter.com/intent/tweet?text=${pageTitle}&url=${pageLink}`,'sharer','toolbar=0,status=0,width=626,height=436');return false; }

    function lbs_click() { window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${pageLink}`,'sharer','toolbar=0,status=0,width=626,height=436');return false; }

    function rbs_click() { window.open(`https://www.reddit.com/submit?url=${pageLink}`,'sharer','toolbar=0,status=0,width=626,height=436');return false; }

    function pbs_click() { window.open(`https://www.pinterest.com/pin/create/button/?&text=${pageTitle}&url=${pageLink}&description=${pageTitle}`,'sharer','toolbar=0,status=0,width=626,height=436');return false; }

</script>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.17/dist/js/splide.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    
    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
</script>


</body>
</html>
