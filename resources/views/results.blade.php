@extends('layouts.app')
@section('title') @stop


@section('content')
@include('layouts.newsletter-popup')
<div class="mt-12 ">
    <div class="mb-6"><h1 class="text-blue-100 text-2xl">{{__('Promo Results')}}</h1></div>
    <div class="w-100 rounded-xl overflow-hidden">
        @foreach ($promos as $promo)
            @if($promo->language->code == app()->getLocale())
                <div class="bg-gray-900 flex p-3 border-b border-gray-800 hover:bg-gray-800 relative hover:-translate-y-1 ease-in-out duration-300 hover:shadow-xl">
                    <a href="/promo/result/{{$promo->slug}}/{{$promo->url_id}}" class="block absolute h-full w-full top-0 left-0"></a>
                    <div class="flex-0 w-40 pe-4 min-w-40 h-24">
                        <img class="rounded-xl h-24 w-full object-cover" src="{{url('images/promos/' . $promo->image)}}" alt="{{$promo->title}}">
                    </div>
                    <div class="flex-1">
                        <div><h1 class="text-blue-100">{{$promo->title}}</h1></div>

                        @if($promo->prize_pool != "")
                            <div><small class="text-blue-100">{{__('Prize Pool')}}: {{$promo->prize_pool}}</small></div>
                        @endif

                        @if($promo->start_date != "")
                            <div><small class="text-gray-600">{{ __('Duration') }}: {{$promo->start_date ? $promo->start_date->translatedFormat('M j, Y') : ''}}  - {{$promo->end_date ? $promo->end_date->translatedFormat('M j, Y') : ''}}</small></div>
                        @endif

                    </div>
                    {{-- <div class="flex-1 text-right">
                        <div class="flex items-center h-full float-right pe-3">
                            <a href="" class="bg-indigo-600 text-blue-100 px-4 py-1 rounded-md block ">View</a>
                        </div>
                    </div> --}}
                </div>
            @endif
        @endforeach
    </div>
    <div>
        {{$promos->links('pagination::tailwind')}}
   </div>
   {{-- @include('layouts.feature-game')
   @include('layouts.call-to-action') --}}
</div>

@endsection