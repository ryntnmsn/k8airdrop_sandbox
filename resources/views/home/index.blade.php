
@include('home.partials.header')

<div class="container-margin-top" style="margin-top:30px">

    
        
        
       
	    @include('home.partials.banner')
 		@include('home.partials.carousel')

        
         <div class="row" style="padding-top:68px">
            <div class="col sort-menu-container">
                <ul class="sort-menu">
                    
                    <li><a class="sort-list {{ (request()->is('active')) ? 'active-sort-menu' : '' }}" href="/active">{{__('Active')}}</a></li>
                    <li><a class="sort-list {{ (request()->is('/')) ? 'active-sort-menu' : '' }}" href="/">{{__('All')}}</a></li>
                    <li><a class="sort-list {{ (request()->is('ended')) ? 'active-sort-menu' : '' }}" href="/ended">{{__('Ended')}}</a></li>
                </ul>
            </div>
        </div>

        <div class="container-margin-top-body" style="margin-bottom:100px; margin-top:20px">
            <div class="container-promo-center">
                <div class="container-main">
                    <div class="container-promo-list">
                        @foreach($promos as $promo)
                        @if($promo->language->code == app()->getLocale() && $promo->is_long_term_post != 'yes')
                            <a href="
                                @if($promo->end_date <= Carbon\Carbon::now()->format('Y-m-d'))
                                    promo/{{$promo->slug}}/{{$promo->url_id}}/promo_ended
                                @elseif($promo->end_date > Carbon\Carbon::now()->format('Y-m-d') && $promo->platform_id == 4)
                                    promo/{{$promo->slug}}/{{$promo->url_id}}/
                                @elseif($promo->end_date > Carbon\Carbon::now()->format('Y-m-d') && $promo->platform_id == 5)
                                    promo/{{$promo->slug}}/{{$promo->url_id}}/
                                @else
                                    {{$promo->link}}
                                @endif
                                " class="blur-filter">
                                <div class="promo-container">
                                    <div class="promo-image">
                                        <div class="promo-list-status" style="font-size:12px; font-weight:bold; @if($promo->end_date <= Carbon\Carbon::now()->format('Y-m-d')) background:#b52115 @else background:#009307 @endif">
                                            @if($promo->end_date <= Carbon\Carbon::now()->format('Y-m-d'))
                                            {{ __('ENDED') }}
                                            @else
                                            {{ __('ACTIVE') }}
                                            @endif
                                        </div>
                                        <img src="{{url('images/promos/' . $promo->image)}}" alt="">

                                    </div>
                                    <div class="promo-details-container">
                                        <span class="promo-title fw-bold">{{$promo->title}}</span>
                                        <div class="promo-prize mt-2"><small>{{__('Prize Pool:')}}</small>  <b>{{ $promo->prize_pool }}</b></div>
                                        <div>
                                            @if($promo->is_long_term_post == "yes")
                                                <small style="background:#2c344f; border:1px solid #2c344f; padding: 2px 5px; border-radius:5px ">{{ __('Long Term Promotion') }}</small>
                                            @else
                                                <small>{{__('Duration')}}: {{$promo->start_date ? $promo->start_date->translatedFormat('M j, Y') : ''}}  - {{$promo->end_date ? $promo->end_date->translatedFormat('M j, Y') : ''}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @else
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>




    </div>

</div>





@include('home.partials.footer')


<script>
    $(function() {
        if (localStorage.getItem('sort')) {
            $("#sort option").eq(localStorage.getItem('sort')).prop('selected', true);
        }
        $("#sort").on('change', function() {
            localStorage.setItem('sort', $('option:selected', this).index());
        });

        function onSubscribe() {
            alert('subscribe')
        }
    });
</script>


