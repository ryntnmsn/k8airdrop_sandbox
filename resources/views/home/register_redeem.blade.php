@include('home.partials.header')


<div class="container-margin-top">
    {{-- <div class="container-promo-left"> </div> --}}
    <div class="container-promo-center">
        <div class="promo-container-main">
            <div class="promo-frame blur-filter p-3">

                <!-- promo image -->
                <div class="promo-frame-image">
                    @if($promos->platform_id == "4" || $promos->platform_id == "5")
                        <iframe width="100%" height="500" src="{{$promos->embedded_code}}?autoplay=1&controls=1&loop=1&mute=1&rel=0" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                    @else
                    	<img src="{{url('images/promos/' . $promos->image)}}" alt="">
                    	<!--@if($promos->video != "")
                    		<video width="100%" height="auto" muted autoplay loop>
        						<source src="{{URL::asset('/images/promos/' . $promos->video )}}" type="video/mp4">
    						</video>
                    	@else
                        	<img src="{{url('images/promos/' . $promos->image)}}" alt="">
    					@endif-->
                    @endif
                </div>
                <!-- bottom details -->
                <div class="promo-frame-details-bottom">
                    <!--Title-->
                    <div class="mb-3">
                        <small>
                            @if($promos->is_long_term_post != "yes")
                            {{__('Duration')}}: {{$promos->start_date ? $promos->start_date->translatedFormat('F j, Y') : ''}}  - {{$promos->end_date ? $promos->end_date->translatedFormat('F j, Y') : ''}}
                            @endif
                        </small>
                        <h2 class="fw-bold">{{$promos->title}}</h2>
                    </div>
                                        
                   <!--Other details-->
                    <div class="mb-4 promo-frame-details-top"  style="border:1px solid rgba(255, 255, 255, 0.13)">
                       
                        
                        @if($promos->is_long_term_post == "yes")
                            <div class="promo-frame-details-top-column">
                                {{ __('Long Term Promotion') }}
                            </div>
                        @else
                            <div class="promo-frame-details-top-column" style="border-right:1px solid rgba(255, 255, 255, 0.13)">
                                <small>{{__('Prize pool')}}</small>
                                <h5 class="fw-bold mt-1">{{$promos->prize_pool}}</h5>
                            </div>
                            <div class="promo-frame-details-top-column" style="border-right:1px solid rgba(255, 255, 255, 0.13)">
                                <small>{{__('Promo type')}}</small>
                                <h5 class="fw-bold mt-1">{{__('Interactive')}}</h5>
                            </div>
                            <div class="promo-frame-details-top-column">
                                <small>{{__('Days left')}}</small>
                                <h5 class="fw-bold mt-1">{{$days_left}}</h5>
                            </div>
                        @endif
                    </div>

                    <!--Description-->
                   <div class="mb-3">
                        <small>Promo Description</small>
                        {!! $promos->description !!}
                   </div>
                    
                    
                   <!--Terms and Conditions-->
                    @if($promos->terms_and_conditions != "")
                        <div class="mb-3 tc_container">
                            <small>Terms and Conditions</small>
                            {!! $promos->terms_and_conditions !!}
                        </div>
                    @endif

                    <!--Article-->
                    @if($promos->article != "")
                        <div class="mb-3">
                            <small>Article</small>
                            <article>
                                <input id="read-more-toggle-1" class="read-more-toggle" type="checkbox">
                                    <div class="read-more-content">
                                        {!! $promos->article !!}
                                    </div>
                                <label class="read-more-toggle-label" for="read-more-toggle-1">Read </label>
                            </article>
                        </div>
                    @endif

                    <!--Social Links-->
                    {{-- @if($promos->social_links != "")
                    <div class="mb-3">
                        <small>Social Links</small>
                    {!! $promos->social_links !!}
                    </div>
                    @endif --}}
                    
                    <div class="mb-3">
                        <small>Social Links</small>
                        <div>
                            <a href="https://k8airdrop.com/links">Click here to know more!</a>
                        </div>
                    </div>

                   
                    @if($promos->type == "click_to_join")<p>{{__('Announcement date')}}: {{$promos->winners_announcement}}<br>@endif

                    @if($promos->type == "click_to_join")
                        <form action="/promo/{{$promos->slug}}/{{$promos->url_id}}/store_register" method="post" class="roboto">
                            @csrf
                            <div class="">
                                <div class="mb-2 text-custom-secondary">{{__('Fill up the form below to join this promo')}}.</div>
                                <div class="mb-4 text-custom-secondary">
                                    <label for="name">{{__('Name/Username')}}</label>
                                    <input required type="text" name="name" id="name" class="form-control mt-2 rounded px-2">
                                </div>
                                <div class="mb-4 text-custom-secondary">
                                    <label for="email">{{__('Email Address')}}</label>
                                    <input required type="email" name="email" id="email" class="form-control mt-2 rounded px-2">
                                </div>
                                <div class="mb-4 text-custom-secondary">
                                    <label for="k8_username">{{__('k8 username')}}</label>
                                    <input required type="text" name="k8_username" id="k8_username" class="form-control mt-2 rounded px-2">
                                </div>
                                <div>
                                    <button class="a-btn" type="submit">{{__('Join this promo')}}</button>
                                </div>
                            </div>
                        </form>
                    @elseif($promos->type == "click_to_redeem")

                        <!--NOT INTERACTIVE-->
                        @if($promos->is_interactive == "no")
                            @include('home.games.click_to_redeem.not_interactive.index')
                        @endif

                        <!--INTERACTIVE-->
                        @if($promos->is_interactive == "yes")
                            
                                @include('home.games.click_to_redeem.interactive.upload_image')
                        @endif

                    @else
                        <div>{{__('No promo codes yet. Please stay tuned for this promo')}}.</div>
                    @endif
                    
                      <div class="text-end btn-top-border">
                    	<a href="/" class="a-btn d-inline-block mt-3">{{__('Return to promos')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container-promo-right"></div> --}}
</div>

@include('home.partials.footer')


<script>
    window.onload = function(){
        document.getElementById('btnct').click();
    }
</script>

<script type="text/javascript">
var ctmnts = 0;
var ctsecs = 0;
var startchr = 0;

function countdownTimer() {

  if(startchr == 0 && document.getElementById('mns') && document.getElementById('scs')) {

    ctmnts = parseInt(document.getElementById('mns').value) + 0;
    ctsecs = parseInt(document.getElementById('scs').value) * 1;

    if(isNaN(ctmnts)) ctmnts = 0;
    if(isNaN(ctsecs)) ctsecs = 0;

    document.getElementById('mns').value = ctmnts;
    document.getElementById('scs').value = ctsecs;
    startchr = 1;
    document.getElementById('btnct').setAttribute('disabled', 'disabled');

  }

  if(ctmnts==0 && ctsecs==0) {
    startchr = 0;
    document.getElementById('btnct').removeAttribute('disabled');
    document.getElementById('code-timer').style.display = 'none';
    document.getElementById('code-container').style.display = 'initial';

    return false;
  }
  else {
    ctsecs--;
    if(ctsecs < 0) {
      if(ctmnts > 0) {
        ctsecs = 59;
        ctmnts--;
      }
      else {
        ctsecs = 0;
        ctmnts = 0;
      }
    }
  }

  document.getElementById('showmns').innerHTML = ctmnts;
  document.getElementById('showscs').innerHTML = ctsecs;
  setTimeout('countdownTimer()', 1000);
}
</script>



<script>
    function copyToClipboard(elementId) {

        var aux = document.createElement("input");

        aux.setAttribute("value", document.getElementById(elementId).innerHTML);

        document.body.appendChild(aux);

        aux.select();

        document.execCommand("copy");

        document.body.removeChild(aux);

    }
</script>
