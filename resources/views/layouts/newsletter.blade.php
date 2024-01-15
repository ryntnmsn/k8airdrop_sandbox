@extends('layouts.app')
@section('title') @stop

@section('content')
    <div class="mt-12 flex-none md:flex">
      
        <div class="md:flex-1 flex-none mb-12">
            <div class="text-blue-100 mb-8">
                <div class="flex-1 mb-3"><h1 class="text-2xl font-bold">{{__('Get K8 Airdrop Update!')}}</h1></div>
                <div>
                    <p class="text-gray-500">{{__('Join our subscribers list to get latest news and updates about our promos delivered directly to your inbox')}}</p>
                </div>
            </div>
            <div class="text-blue-100">
                <x-messages />
            </div>
            <div>
                <form action="/subscribe-newsletter/store">
                    @csrf
                    @if ($errors->any())
                        <div class="bg-red-700 text-red-200 p-3 rounded-md mb-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
    
                    <div class="mb-4 flex">
                        <div class="w-full">
                            <input class="w-full rounded-s-md rounded-l-md bg-gray-800 border border-gray-700 text-white" type="text" name="email" id="email" value="{{old('email')}}" placeholder="{{__('Enter email here...')}}">
                        </div>
                        <div class="text-right">
                            <button class="bg-indigo-600 text-white px-4 py-2 rounded-s-0 border border-indigo-600 rounded-r-md whitespace-nowrap" type="submit">{{__('Submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="md:flex-1 flex-none text-center">
            <div class="flex items-center justify-center">
                <img class="md:w-1/2 w-3/4" src="{{url('images/newsletter-banner.png')}}" alt="K8 Aidrop Newsletter">
            </div>
        </div>
      
    </div>
    
    <div class="mt-12">
        @include('layouts.feature-game')
    </div>
@stop
