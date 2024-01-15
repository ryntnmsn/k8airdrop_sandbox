@extends('layouts.app')
@section('title') @stop

@section('content')
<div class="mt-12 sm:flex-wrap md:flex">
    <div class="flex-0 md:w-3/5 sm:w-full mb-12">
        <div class="w-full">
            <div>
                <img class="rounded-xl w-full" src="{{url('images/promos/' . $promos->image)}}" alt="">
            </div>
            <div class="mt-5 text-blue-100">
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
                            <div>{{__('Day/s Left')}}</div>
                            <div>
                                <h2 class="text-xl">{{__('Ended')}}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- promo description --}}
                <div class="mt-10">
                    <div class="text-gray-500">{{__('Promo Description')}}</div>
                    <div class="mt-3 text-blue-100 promo-description">
                        {!! $promos->description !!}
                    </div>
                </div>

                {{-- promo terms and conditions --}}
                @if($promos->terms_and_conditions != "")
                <div class="mt-10 bg-gray-900 p-5 rounded-xl">
                    <div class="text-gray-500">{{(__('Terms and Conditions'))}}</div>
                    <div class="mt-3 text-blue-100 max-h-96 overflow-y-scroll promo-terms">
                        {!! $promos->terms_and_conditions !!}
                    </div>
                </div>
                @endif

                {{-- promo article --}}
                @if($promos->article != "")
                <div class="mt-10">
                    <div class="text-gray-500">{{(__('Article'))}}</div>
                    <div id="my_text" class="w-full mt-3 text-blue-100 max-h-96 overflow-y-scroll ellipsis promo-article">
                        {!! $promos->article !!}
                    </div>
                    <div id="read_more" class="bg-indigo-600 w-24 px-2 py-1 rounded-md mt-3">{{__('Read more')}}</div>
                </div>
                @endif

            </div>
        </div>
    </div>


    <div class="flex-0 md:w-2/5 sm:w-full md:ps-12 sm:ps-0">
        {{-- promo details --}}
        <div class="bg-gray-900 p-4 mb-6 rounded-xl">
            <div class="mb-4">
                <h1 class="text-blue-100 text-xl">{{__('Overview')}}</h1>
            </div>
            <div class="flex text-blue-100 border-l border-t border-r border-gray-800 rounded-t-md">
                <div class="flex-1 p-2">{{__('Total Participants')}}</small></div>
                <div class="flex-1 p-2 border-l border-gray-800">
                    @if($promos->participants->count() == 0)
                        --
                    @else
                        {{$promos->participants->count()}}
                    @endif
                </div>
            </div>  
            <div class="flex text-blue-100 border border-gray-800 rounded-b-md">
                <div class="flex-1 p-2">{{__('Total Winners')}}</small></div>
                <div class="flex-1 p-2 border-l border-gray-800">
                    @if($promos->participants->where('winner', 'Yes')->count() == 0)
                        --
                    @else
                        {{$promos->participants->where('winner', 'Yes')->count()}}
                    @endif
                </div>
            </div>
        </div>

        {{-- winners --}}
        <div class="bg-gray-900 p-4 rounded-xl mb-6">
            <div class="mb-4">
                <h1 class="text-blue-100 text-xl">{{__('Winners')}}</h1>
            </div>
            <div class="text-blue-100">
                @if($promos->participants->where('winner', 'Yes')->count() != 0)
                    @foreach ($promos->participants->where('winner', 'Yes') as $participant)
                        <div class="p-2 w-full border-gray-800 border rounded-md">{{substr($participant->name, 0, -2) . "***"}}</div>
                    @endforeach
                @else
                    --
                @endif
            </div>
        </div>

        {{-- participants --}}
        <div class="bg-gray-900 p-4 rounded-xl">
            <div class="mb-4">
                <h1 class="text-blue-100 text-xl">{{__('Participants')}}</h1>
            </div>
            <div class="text-blue-100">
                @if($promos->participants->count() != 0)
                    @foreach ($promos->participants as $participant)
                        <div class="participants_list hidden border-gray-800 border p-2">{{substr($participant->name, 0, -2) . "***"}}</div>
                    @endforeach
                @else
                    --
                @endif
            </div>
            <div class="pt-2">
                <a href="#" id="loadMore" class="text-gray-500 hover:text-gray-400 ease-in-out duration-200">Load More</a>
            </div>
        </div>

    </div>
</div>
@endsection