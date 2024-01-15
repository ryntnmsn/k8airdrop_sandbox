@extends('layouts.app')
@section('title') {{$promos->title}} @stop
@section('description') {{ Str::words(strip_tags($promos->description), 35) }} @stop
@section('image') {{url('images/promos/' . $promos->image)}} @stop

@section('content')
<div class="mt-12">
    <div class="flex-none lg:flex">
        <div class="text-blue-100 w-full lg:w-3/4 pe-0 lg:pe-10 mb-10">
            {{-- image --}}
            <div>
                <img class="rounded-lg aspect-video" src="{{url('images/promos/' . $promos->image)}}" alt="">
            </div>

            {{-- duration --}}
            <div>
                <small class="">{{__('Duration')}}: {{$promos->start_date->translatedFormat('F j, Y')}} {{__('to')}} {{$promos->end_date->translatedFormat('F j, Y') }}</small>
            </div>
            
            {{-- promo title --}}
                <div class="mt-3">
                    <h1 class="text-3xl sm:text-xl md:text-2xl font-bold">{{$promos->title}}</h1>
                </div>
            
            {{-- promo details --}}
            <div class="mt-5">
                <div class="flex">
                    <div class="flex-auto text-center border border-gray-800 p-3">
                        <div>{{__('Prize Pool')}}</div>
                        <div>
                            <h2 class="text-xl">{{$promos->prize_pool}}</h2>
                        </div>
                    </div>
                    <div class="flex-auto text-center border border-s-0 border-gray-800 p-3">
                        <div>{{__('Promo type')}}</div>
                        <div>
                            <h2 class="text-xl">{{__('Interactive')}}</h2>
                        </div>
                    </div>
                    <div class="flex-auto text-center border border-s-0 border-gray-800 p-3">
                        <div>{{__('Days Left')}}</div>
                        <div>
                            @if($promos->end_date < Carbon\Carbon::now()->format('Y-m-d'))
                                <h2 class="">{{__('Ended')}}</h2>
                            @else
                                <h2 class="text-xl">{{$days_left}}</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- promo description --}}
            <div class="mt-10">
                <div class="text-gray-500">{{__('Promo Description')}}</div>
                <div class="mt-3 text-blue-100 promo-description">
                    <div class="promo_description">
                        {!! $promos->description !!}
                    </div>
                </div>
            </div>

            {{-- redirection link --}}
            @if($promos->button_name != "" && $promos->button_link != "")
                <div class="mt-10">
                    <div class="mt-3 text-blue-100">
                        <div class="hover:-translate-y-1 duration-300">
                            <a class="bg-indigo-600 p-2 rounded-lg" href="{{$promos->button_link}}" target="_blank">{{$promos->button_name}}</a>
                        </div>
                    </div>
                </div>
            @endif

            {{-- promo terms and conditions --}}
            @if($promos->terms_and_conditions != "")
            <div class="mt-10 bg-gray-900 p-5 rounded-xl">
                <div class="text-gray-500">{{(__('Terms and Conditions'))}}</div>
                <div class="mt-3 text-blue-100 promo-terms">
                    <div class="terms_condition">
                        {!! $promos->terms_and_conditions !!}
                    </div>
                </div>
            </div>
            @endif

            {{-- promo article --}}
            @if($promos->article != "")
            <div class="mt-10">
                <div class="text-gray-500">{{(__('Article'))}}</div>
                <article class="article-readmore">
                <div class="readmore">
                    {!! $promos->article !!}
                </div>
                </article>
            </div>
            @endif

            {{-- promo type --}}
            @if($promos->end_date >= Carbon\Carbon::now()->format('Y-m-d'))
                @if($promos->type == 'click_to_join' && $promos->game_type == 'upload_image')
                    @include('layouts.click-to-join.upload-image')
                @elseif($promos->type == 'click_to_join' && $promos->game_type == 'paste_retweet_url')
                    @include('layouts.click-to-join.paste-retweet-url')
                @elseif($promos->type == 'click_to_join' && $promos->game_type == 'subscribe_newsletter')
                    @include('layouts.click-to-join.subscribe-newsletter')
                @elseif($promos->type == 'click_to_join' && $promos->game_type == 'multiple_choice')
                    @include('layouts.click-to-join.multiple-choice')
                @elseif($promos->type == 'click_to_join' && $promos->game_type == 'leave_comment')
                    @include('layouts.click-to-join.leave-comment')
                @endif
            @endif


            {{-- share to social media --}}
            <div>
                @include('layouts.share-buttons')
            </div>

            
            <div class="mt-10">
                {{-- winners --}}
                @if($promos->participants->where('winner', 'Yes')->count() != 0)
                    <div class="bg-gray-900 p-4 rounded-xl mb-10">
                        <div class="mb-4">
                            <h1 class="text-blue-100 fw-bold">{{__('Winners')}}</h1>
                        </div>
                        <div class="text-blue-100">
                            
                            @foreach ($promos->participants->where('winner', 'Yes') as $participant)
                                <div class="border-gray-800 border p-2 hover:cursor-pointer">
                                    <div>
                                        @if($participant->k8_username != "")
                                            <div class="w-full">{{substr($participant->k8_username, 0, -2) . "***"}}</div>
                                        @else
                                            <div class="w-full">{{substr($participant->name, 0, -2) . "***"}}</div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        
                        </div>
                    </div>
                @endif

                
                {{-- participants --}}
              

                    @if($promos->participants->count() != 0)
                        <div class="bg-gray-900 p-4 rounded-xl">
                            <div class="mb-4">
                                <h1 class="text-blue-100 fw-bold">{{__('Participants of this promo')}}</h1>
                            </div>
                            <div class="text-blue-100">

                                @foreach ($promos->participants as $participant)
                                        <div class="accordion participants_list hidden border-gray-800 border p-2 hover:cursor-pointer">
                                            <div class="flex">
                                                @if($participant->k8_username != "")
                                                    <div class="w-full">{{substr($participant->k8_username, 0, -3) . "***"}}</div>
                                                @else
                                                    <div class="w-full">{{substr($participant->name, 0, -2) . "***"}}</div>
                                                @endif
                                                
                                                <div>
                                                    <div id="accordion_icon_down">
                                                        <i class="fa-solid fa-chevron-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel p-4 bg-gray-800">
                                            <div class="flex w-full border border-gray-800">
                                                @if($participant->comment == null)
                                                    <p>No comment.</p>
                                                @else
                                                    {{$participant->comment}}
                                                @endif
                                            </div>
                                        </div>
                                @endforeach
                            </div>
                            <div class="pt-2">
                                <a href="#" id="loadMore" class="text-gray-500 hover:text-gray-400 ease-in-out duration-200">{{__('Load more')}}</a>
                            </div>
                        </div>
                    @endif
            </div> 

        </div>

        <div class="lg:w-1/4 w-full text-blue-100">
            {{-- Other promos --}}
            <div class="bg-gray-900 p-4 rounded-xl">
                <div class="mb-6"><h1 class="text-2xl">{{__('Latest Promos')}}</h1></div>
                @foreach($promoSidebar as $promo)
                    @if($promo->language->code == app()->getLocale() && $promo->status == "Active")
                        <div class="mb-10 hover:-translate-y-2 duration-700 relative">
                            <a href="{{$promo->link}}" class="block w-full h-full absolute"></a>
                           
                            <div class="">
                                <div><h5 class="mb-1 tracking-tight text-blue-100">{{$promo->title}}</h5></div>
                                <div>{{ __('Prize Pool') }}: {{$promo->prize_pool}}</div>
                                <div class="text-gray-500"><small>{{ __('Duration') }}: {{$promo->start_date ? $promo->start_date->translatedFormat('M j, Y') : ''}}  - {{$promo->end_date ? $promo->end_date->translatedFormat('M j, Y') : ''}}</small></div>
                                <div class="text-gray-500">
                                    <small>
                                    <span>{{ __('Platform') }}:</span>
                                    @foreach ($promo->platforms as $platform)
                                        <span  class="capitalize  px-1 rounded-xl text-blue-100" style="background-color: {{$platform->color}}">
                                            {{$platform->title}}
                                        </span>
                                    @endforeach
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

