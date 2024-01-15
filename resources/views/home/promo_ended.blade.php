
@include('home.partials.header')


<div class="container-margin-top">
    {{-- <div class="container-promo-left"></div> --}}
    <div class="container-promo-center">
        <div class="promo-container-main">
            <div class="promo-frame blur-filter p-3">
               
                <!-- promo image -->
                <div class="promo-frame-image">
                    <img src="{{url('images/promos/' . $promos->image)}}" alt="">
                </div>
                <!-- bottom details -->
                <div class="promo-frame-details-bottom">
                
                    <!--Title-->
                    <div class="mb-3">
                        <small>@if($promos->is_long_term_post != "yes")
                            {{__('Duration')}}: {{$promos->start_date ? $promos->start_date->translatedFormat('F j, Y') : ''}}  - {{$promos->end_date ? $promos->end_date->translatedFormat('F j, Y') : ''}}
                            @endif
                        </small>
                        <h2 class="fw-bold">{{$promos->title}}</h2>
                    </div>
                                        
                    <!--Other details-->
                    <div class="mb-4 promo-frame-details-top"  style="border:1px solid rgba(255, 255, 255, 0.13)">
                        @if($promos->type == "click_to_join")
                            <div class="promo-frame-details-top-column" style="">
                                {{__('Participants')}}
                                <h2>{{$promos->participants->count()}}</h2>
                            </div>
                        @endif
                        
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
                                <small>{{__('Status')}}</small>
                                <h5 class="fw-bold mt-1">
                                    @if($promos->status == "Inactive")
                                    {{__('Upcoming')}}
                                    @else
                                    {{__('ENDED')}}
                                    @endif
                                </h5>
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
                    <div class="mb-3">
                        <small>Social Links</small>
                        <div>
                            <a href="https://k8airdrop.com/links">Click here to know more!</a>
                        </div>
                    </div>



                    
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
