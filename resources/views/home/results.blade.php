@include('home.partials.header')

<div class="container-margin-top">
    {{-- <div class="container-promo-left"></div> --}}
    <div class="container-promo-center">
        <div class="promo-container-main">
            <h4 class="mb-3">{{ __('List of promos') }}</h4>
            @foreach($promos as $promo)
                <div class="promo-container-results blur-filter" style="border-left:5px solid @foreach($promo->platforms as $platform) {{$platform->color}} @endforeach">
                    <a href="/promo/result/{{$promo->slug}}/{{$promo->url_id}}">
                        <div class="promo-container-results-row">
                       
                            <div class="promo-container-results-column-image">
                                <img src="{{url('images/promos/' . $promo->image)}}" alt="">
                            </div>
                            <div class="promo-container-results-column-details">
                                <div><h5>{{$promo->title}}</h5></div>
                                <div>
                                     <small>
                                        {{$promo->start_date ? $promo->start_date->translatedFormat('F j, Y') : ''}}  - {{$promo->end_date ? $promo->end_date->translatedFormat('F j, Y') : ''}}
                                    </small>
                                </div>
                                <div class="text-custom-secondary"><small>{{__('Prize pool')}}: {{$promo->prize_pool}}</small></div>
                            </div>
                            <div class="promo-container-results-column-icon"><i class="fa-solid fa-arrow-right"></i></div>
                        </div>
                    </a>
                </div>
            @endforeach
            
        </div>
    </div>
    {{-- <div class="container-promo-right"></div> --}}
</div>
@include('home.partials.footer')
