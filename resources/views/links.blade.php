@extends('layouts.app')
@section('title') @stop

@section('content')
    <div class="mt-12">
       
        {{-- social icons --}}
        <div class="flex">
            <div class="flex-1"><h1 class="text-blue-100 text-2xl font-bold">{{__('Social Links')}}</h1></div>
            
        </div>

        <section class="rounded-xl pb-20">
            <div class="rounded-xl pt-5">
                
                <div class="rounded-xl flex" style="grid-template-columns:repeat(3, 1fr); gap:18px">
                    <div class="border-solid hover:-translate-y-2 hover:shadow-xl rounded-xl ease-in-out duration-500 p-2 bg-gray-900">
                        <a href="{{ route('enFacebook') }}" target="__blank"><img class="rounded-xl" src="{{url('images/facebook.png')}}" alt="K8 Facebook"></a>
                    </div>
                    <div class="border-solid hover:-translate-y-2 hover:shadow-xl rounded-xl ease-in-out duration-500 p-2 bg-gray-900">
                        <a href="{{ route('enInstagram') }}" target="__blank"><img class="rounded-xl" src="{{url('images/instagram.png')}}" alt="K8 Instagram"></a>
                    </div>
                    <div class="border-solid hover:-translate-y-2 hover:shadow-xl rounded-xl ease-in-out duration-500 p-2 bg-gray-900">
                        <a href="{{ route('enTwitter') }}" target="__blank"><img class="rounded-xl" src="{{url('images/twitter.png')}}" alt="K8 Twitter"></a>
                    </div>
                    <div class="border-solid hover:-translate-y-2 hover:shadow-xl rounded-xl ease-in-out duration-500 p-2 bg-gray-900">
                        <a href="{{ route('enYoutube') }}" target="__blank"><img class="rounded-xl" src="{{url('images/youtube.png')}}" alt="K8 Youtube"></a>
                    </div>
                    <div class="border-solid hover:-translate-y-2 hover:shadow-xl rounded-xl ease-in-out duration-500 p-2 bg-gray-900">
                        <a href="{{ route('enDiscord') }}" target="__blank"><img class="rounded-xl" src="{{url('images/discord.png')}}" alt="K8 Discord"></a>
                    </div>
                    <div class="border-solid hover:-translate-y-2 hover:shadow-xl rounded-xl ease-in-out duration-500 p-2 bg-gray-900">
                        <a href="{{ route('enTelegram') }}" target="__blank"><img class="rounded-xl" src="{{url('images/telegram.png')}}" alt="K8 Telegram"></a>
                    </div>
                    <div class="border-solid hover:-translate-y-2 hover:shadow-xl rounded-xl ease-in-out duration-500 p-2 bg-gray-900">
                        <a href="{{ route('enTiktok') }}" target="__blank"><img class="rounded-xl" src="{{url('images/tiktok.png')}}" alt="K8 Tiktok"></a>
                    </div>
                </div>
            </div>
        </section>

        {{-- youtube video eduk8--}}
        <div class="flex">
            <div class="flex-1"><h1 class="text-blue-100 text-2xl font-bold">eduK8</h1></div>
            <div class="flex items-center">
                <a class="text-blue-100 hover:text-blue-200 ease-in-out duration-500 block pe-1" href="https://www.youtube.com/playlist?list=PLjjxOB9mRodfkwmCSKicyCwLtoG4k6SgP" target="__blank">{{__('View more')}}</a>
                <svg class="w-2 h-2 text-blue-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                </svg>
                <svg class="w-2 h-2 text-blue-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                </svg>
            </div>
        </div>
       <section class="rounded-xl pb-20 pt-5">
            <div class="grid grid-cols-1 sm:grid-cols-1 gap-6 md:grid-cols-2">
               <div class="bg-gray-900 p-2 rounded-2xl hover:-translate-y-2 hover:shadow-xl ease-in-out duration-500">
                    <iframe
                        width="100%" 
                        height="325" 
                        src="https://www.youtube.com/embed/RsQunw1UwF4?autoplay=1&enablejsapi=1&rel=0&mute=1" 
                        title="YouTube video player" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen
                        allow="autoplay"
                        class="rounded-2xl">
                    </iframe>
               </div>
               <div class="bg-gray-900 p-2 rounded-2xl hover:-translate-y-2 hover:shadow-xl ease-in-out duration-500">
                    <iframe
                        width="100%" 
                        height="325" 
                        src="https://www.youtube.com/embed/4L2GYQFHemQ?autoplay=1&enablejsapi=1&rel=0&mute=1" 
                        title="YouTube video player" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen
                        class="rounded-2xl">
                    </iframe>
                </div>
            </div>
       </section>


        {{-- youtube video bigwins--}}
        <div class="flex">
            <div class="flex-1"><h1 class="text-blue-100 text-2xl font-bold">{{__('Big Wins')}}</h1></div>
            <div class="flex items-center">
                <a class="text-blue-100 hover:text-blue-200 ease-in-out duration-500 block pe-1" href="https://www.youtube.com/playlist?list=PLjjxOB9mRodcYUgClrUBM9wtg3E0zQg45" target="__blank">{{__('View more')}}</a>
                <svg class="w-2 h-2 text-blue-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                </svg>
                <svg class="w-2 h-2 text-blue-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                </svg>
            </div>
        </div>
        <section class="rounded-xl pb-20 pt-5">
            <div class="grid grid-cols-1 sm:grid-cols-1 gap-6 md:grid-cols-2">
                <div class="bg-gray-900 p-2 rounded-2xl hover:-translate-y-2 hover:shadow-xl ease-in-out duration-500">
                    <iframe
                        width="100%" 
                        height="325" 
                        src="https://www.youtube.com/embed/9j99_NVqBio?autoplay=1&enablejsapi=1&rel=0&mute=1" 
                        title="YouTube video player" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen
                        allow="autoplay"
                        class="rounded-2xl">
                    </iframe>
                </div>
                <div class="bg-gray-900 p-2 rounded-2xl hover:-translate-y-2 hover:shadow-xl ease-in-out duration-500">
                    <iframe
                        width="100%" 
                        height="325" 
                        src="https://www.youtube.com/embed/7OreuT3TSm4?autoplay=1&enablejsapi=1&rel=0&mute=1" 
                        title="YouTube video player" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen
                        class="rounded-2xl">
                    </iframe>
                </div>
            </div>
        </section>


       
        {{-- instagram feed --}}
        <div class="flex">
            <div class="flex-1"><h1 class="text-blue-100 text-2xl font-bold">{{__('Social Feeds')}}</h1></div>
            <div class="flex items-center">
                <a class="text-blue-100 hover:text-blue-200 ease-in-out duration-500 block pe-1" href="https://www.instagram.com/_k8gaming/" target="__blank">{{__('View more')}}</a>
                <svg class="w-2 h-2 text-blue-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                </svg>
                <svg class="w-2 h-2 text-blue-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                </svg>
            </div>
        </div>
        <section class="rounded-xl pb-10 pt-5">
            <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
            <div class="elfsight-app-a9e899f0-85ca-4220-8a28-77e59f321af6"></div>
        </section>
      
    </div>
@stop
