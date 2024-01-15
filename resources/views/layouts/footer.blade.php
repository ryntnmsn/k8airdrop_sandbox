<div class="bg-gray-900 py-14 w-full mt-24">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 text-blue-100 gap-4 max-w-screen-xl mx-auto px-5 gap-5">

        {{-- first col --}}
        <div>
            <p class="text-lg font-bold">{{__('USEFUL LINKS')}}</p>
            <ul class="mt-5">
                <li class="pb-2 hover:-translate-y-1 ease-in-out duration-200"><a class="hover:text-indigo-400" href="/">{{__('Home')}}</a> </li>
                <li class="pb-2 hover:-translate-y-1 ease-in-out duration-200"><a class="hover:text-indigo-400" href="/news">{{__('News')}}</a></li>
                <li class="pb-2 hover:-translate-y-1 ease-in-out duration-200"><a class="hover:text-indigo-400" href="/links">{{__('Media')}}</a></li>
                <li class="pb-2 hover:-translate-y-1 ease-in-out duration-200"><a class="hover:text-indigo-400" href="/promo/results">{{__('Results')}}</a></li>
                <li class="pb-2 hover:-translate-y-1 ease-in-out duration-200"><a class="hover:text-indigo-400" href="https://www.k8forum.io/" target="_blank">{{__('Forum')}}</a></li>
            </ul>
        </div>

        <div>
            <p class="text-lg font-bold">{{__('ENTERTAINMENT')}}</p>
            <ul class="mt-5">
                <li class="pb-2 hover:-translate-y-1 ease-in-out duration-200"><a class="hover:text-indigo-400" href="https://playk8.io/" target="_blank">{{__('Games Lobby')}}</a> </li>
                <li class="pb-2 hover:-translate-y-1 ease-in-out duration-200"><a class="hover:text-indigo-400" href="https://playk8.io/promotions" target="_blank">{{__('Promotions')}}</a></li>
                <li class="pb-2 hover:-translate-y-1 ease-in-out duration-200"><a class="hover:text-indigo-400" href="https://playk8.io/member/affiliate/overview" target="_blank">{{__('Affiliate Program')}}</a></li>
                <li class="pb-2 hover:-translate-y-1 ease-in-out duration-200"><a class="hover:text-indigo-400" href="https://playk8.io/member/vip" target="_blank">{{__('VIP')}}</a></li>
            </ul>
        </div>

        {{-- second col --}}
       
      
        <div>
            <p class="text-lg font-bold">{{__('FOLLOW US ON')}}</p>
             {{-- japanese --}}
            @if(app()->getLocale() == 'jp')
            <div class="mt-5">
                <div class="flex items-center pb-2 hover:-translate-y-1 ease-in-out duration-200">
                    <div class="flex-0 pe-2">
                        <img class="w-4 rounded-md" src="{{url('images/instagram.png')}}" alt="">
                    </div>
                    <div class="flex-auto">
                        <a href="{{ route('jpInstagram') }}" target="_blank" class="hover:text-indigo-400">Instagram</a> 
                    </div>
                </div>
                <div class="flex items-center pb-2 hover:-translate-y-1 ease-in-out duration-200">
                    <div class="flex-0 pe-2">
                        <img class="w-4 rounded-md" src="{{url('images/twitter.png')}}" alt="">
                    </div>
                    <div class="flex-auto">
                        <a href="{{ route('jpTwitter') }}" target="_blank" class="hover:text-indigo-400">Twitter</a> 
                    </div>
                </div>
                <div class="flex items-center pb-2 hover:-translate-y-1 ease-in-out duration-200">
                    <div class="flex-0 pe-2">
                        <img class="w-4 rounded-md" src="{{url('images/telegram.png')}}" alt="">
                    </div>
                    <div class="flex-auto">
                        <a href="{{ route('jpTelegram') }}" target="_blank" class="hover:text-indigo-400">Telegram</a> 
                    </div>
                </div>
                <div class="flex items-center pb-2 hover:-translate-y-1 ease-in-out duration-200">
                    <div class="flex-0 pe-2">
                        <img class="w-4 rounded-md" src="{{url('images/line.png')}}" alt="">
                    </div>
                    <div class="flex-auto">
                        <a href="{{ route('jpLine') }}" target="_blank" class="hover:text-indigo-400">Line</a> 
                    </div>
                </div>
                <div class="flex items-center pb-2 hover:-translate-y-1 ease-in-out duration-200">
                    <div class="flex-0 pe-2">
                        <img class="w-4 rounded-md" src="{{url('images/twitch.png')}}" alt="">
                    </div>
                    <div class="flex-auto">
                        <a href="{{ route('jpTwitch') }}" target="_blank" class="hover:text-indigo-400">Twitch</a> 
                    </div>
                </div>
                <div class="flex items-center pb-2 hover:-translate-y-1 ease-in-out duration-200">
                    <div class="flex-0 pe-2">
                        <img class="w-4 rounded-md" src="{{url('images/youtube.png')}}" alt="">
                    </div>
                    <div class="flex-auto">
                        <a href="{{ route('enYoutube') }}" target="_blank" class="hover:text-indigo-400">Youtube</a>
                    </div>
                </div>
            </div>
            
             {{-- english --}}
            @else
            <div class="mt-5">
                <div class="flex items-center pb-2 hover:-translate-y-1 ease-in-out duration-200">
                    <div class="flex-0 pe-2">
                        <img class="w-4 rounded-md" src="{{url('images/facebook.png')}}" alt="">
                    </div>
                    <div class="flex-auto">
                        <a href="{{ route('enFacebook') }}" target="_blank" class="hover:text-indigo-400">Facebook</a> 
                    </div>
                </div>
                <div class="flex items-center pb-2 hover:-translate-y-1 ease-in-out duration-200">
                    <div class="flex-0 pe-2">
                        <img class="w-4 rounded-md" src="{{url('images/instagram.png')}}" alt="">
                    </div>
                    <div class="flex-auto">
                        <a href="{{ route('enInstagram') }}" target="_blank" class="hover:text-indigo-400">Instagram</a>
                    </div>  
                </div>
                <div class="flex items-center pb-2 hover:-translate-y-1 ease-in-out duration-200">
                    <div class="flex-0 pe-2">
                        <img class="w-4 rounded-md" src="{{url('images/twitter.png')}}" alt="">
                    </div>
                    <div class="flex-auto">
                        <a href="{{ route('enTwitter') }}" target="_blank" class="hover:text-indigo-400">Twitter</a>
                    </div>
                </div>
                <div class="flex items-center pb-2 hover:-translate-y-1 ease-in-out duration-200">
                    <div class="flex-0 pe-2">
                        <img class="w-4 rounded-md" src="{{url('images/telegram.png')}}" alt="">
                    </div>
                    <div class="flex-auto">
                        <a href="{{ route('enTelegram') }}" target="_blank" class="hover:text-indigo-400">Telegram</a>
                    </div>
                </div>
                <div class="flex items-center pb-2 hover:-translate-y-1 ease-in-out duration-200">
                    <div class="flex-0 pe-2">
                        <img class="w-4 rounded-md" src="{{url('images/discord.png')}}" alt="">
                    </div>
                    <div class="flex-auto">
                        <a href="{{ route('enDiscord') }}" target="_blank" class="hover:text-indigo-400">Discord</a>
                    </div>
                </div>
                <div class="flex items-center pb-2 hover:-translate-y-1 ease-in-out duration-200">
                    <div class="flex-0 pe-2">
                        <img class="w-4 rounded-md" src="{{url('images/tiktok.png')}}" alt="">
                    </div>
                    <div class="flex-auto">
                        <a href="{{ route('enTiktok') }}" target="_blank" class="hover:text-indigo-400">Tiktok</a>
                    </div>
                </div>
                <div class="flex items-center pb-2 hover:-translate-y-1 ease-in-out duration-200">
                    <div class="flex-0 pe-2">
                        <img class="w-4 rounded-md" src="{{url('images/youtube.png')}}" alt="">
                    </div>
                    <div class="flex-auto">
                        <a href="{{ route('enYoutube') }}" target="_blank" class="hover:text-indigo-400">Youtube</a>
                    </div>
                </div>
            </div>
           @endif
        </div>
       
        {{-- fourth col --}}
        <div class="w-38">
            <p class="text-lg font-bold">{{__('THE AMBASSADORS')}}</p>
            <div class="mt-5">
               
                <div class="mt-2">
                    <img style="width:230px" src="https://k8.io/cdn/34dtfrFM/static/img/sponsor.231d2b26.png" alt="">
                    <div class="text-blue-200">
                        <small>Yaya Touré</small> | <small>Wesley Sneijder</small>
                        
                    </div>
                    {{-- <p>{{__('Subscribe to our Newsletter')}}</p> --}}
                    {{-- <form action="">
                        <input class="rounded-md w-full bg-gray-800 text-blue-100 border border-gray-700" type="text" placeholder="{{__('Enter email here...')}}">
                        <div class="text-right">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 px-3 py-2 rounded-md mt-3 hover:-translate-y-1 hover:shadow-xl duration-200 ease-in-out">{{__('Subscribe')}}</button>
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>