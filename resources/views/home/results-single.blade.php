@include('home.partials.header')

<div class="container-margin-top">
    {{-- <div class="container-promo-left"></div> --}}
    <div class="container-promo-center">
        <div class="promo-container-main">
            <div class="result-single-container blur-filter">
                <div class="result-single-container-row">
                    <div class="result-single-container-column-image">
                        <img src="{{url('images/promos/' . $promos->image)}}" alt="" class="img-fluid rounded">
                    </div>
                    <div class="result-single-container-column-details">
                        <div><h4>{{$promos->title}}</h4></div>
                        <div class="text-custom-secondary mt-1">
                            @foreach($promos->platforms as $platform)
                                {{__('Platform')}}: {{$platform->title}}
                            @endforeach
                        </div>
                        <div class="text-custom-secondary mt-0">
                            {{__('Promo type')}}: @if($promos->type == "click_to_join") {{__('Click to Join')}} @elseif($promos->type == "click_to_redeem") {{__('Click to redeem')}} @endif
                        </div>
                        <div class="text-custom-secondary mt-0">
                            {{__('Prize pool')}}: {{$promos->prize_pool}}
                        </div>
                        <div class="text-custom-secondary mt-0">
{{--                            {{__('Duration')}}: {{date('M j, Y',  strtotime($promos->start_date))}} - {{date('M j, Y',  strtotime($promos->end_date))}}--}}
                            {{__('Duration')}}: {{$promos->start_date ? $promos->start_date->translatedFormat('M j, Y') : ''}} - {{$promos->end_date ? $promos->end_date->translatedFormat('M j, Y') : ''}}
                        </div>
                        <div class="text-custom-secondary mt-3">
                            {{__('Total participants')}}:  @if($promos->type == "click_to_join" || $promos->type == "click_to_redeem") {{$promos->participants->count()}} @else {{__('N/A')}} @endif
                        </div>
                        <div class="text-custom-secondary mt-0">
                            {{__('Total Winners')}}: @if($promos->type == "click_to_join" || $promos->type == "click_to_redeem") {{$promos->participants->where('winner', 'Yes')->count()}} @else {{__('N/A')}} @endif
                        </div>
                    </div>
                </div>


                @if($promos->type == "click_to_join" || $promos->type == "click_to_redeem")
                    <div class="result-single-container-row" style="margin-top:30px">
                        <div class="result-single-container-column"  style="padding-right:10px">
                            {{__('Participants')}}
                            <table class="table mt-2" style="background:none;">
                                <thead>
                                    <tr>
{{--                                    <td class="text-white">{{__('No')}}.</td>--}}
                                        <td class="text-white px-0">{{__('Name/Username')}}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($promos->participants as $participant)
                                    <tr>
{{--                                        <td class="text-white p-0" scope="row" style="border-bottom-width:0">{{$loop->iteration}}</td>--}}
                                        <td class="text-white p-0" style="border-bottom-width:0">
                                            {{substr($participant->name, 0, -4) . "***"}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="result-single-container-column" style="padding-left:10px">
                            {{__('Winners')}}
                            <table class="table mt-2" style="">
                                <thead class="px-0">
                                    <tr>
{{--                                        <td class="text-white">{{__('No')}}.</td>--}}
                                        <td class="text-white px-0">{{__('Name/Username')}}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($promos->participants->where('winner', 'Yes') as $participant)
                                    <tr>
{{--                                        <td class="text-white p-0" scope="row" style="border-bottom-width:0">{{$loop->iteration}}</td>--}}
                                        <td class="text-white p-0" style="border-bottom-width:0">
                                            {{substr($participant->name, 0, -4) . "***"}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>


            <div class="related-promo-cont">
                <h4 style="padding-bottom:10px">{{__('Other promos that might interest you!')}}</h4>
                <div class="container-promo-list">

                    @foreach($related_promo as $promo)
                        <a class="blur-filter" href="
                            @if($promo->end_date <= Carbon\Carbon::now()->format('Y-m-d'))
                                /promo/{{$promo->slug}}/{{$promo->url_id}}/promo_ended
                            @else
                                {{$promo->link}}
                            @endif
                            ">
                            <div class="promo-container">
                                <div class="promo-image">
                                    <div class="promo-prize_pool">
                                        <div class="container-prize_pool"></div>
                                    </div>
                                    <img src="{{url('images/promos/' . $promo->image)}}" alt="">
                                </div>
                                <div class="promo-details-container">
                                    <h5>{{$promo->title}}</h5>
                                    <small>{{__('Prize pool')}}: {{$promo->prize_pool}}</small><br>
                                    <small>{{__('Duration')}}: {{$promo->start_date ? $promo->start_date->translatedFormat('M j, Y') : ''}}  - {{$promo->end_date ? $promo->end_date->translatedFormat('M j, Y') : ''}}</small>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    {{-- <div class="container-promo-right"></div> --}}
</div>













@include('home.partials.footer')
