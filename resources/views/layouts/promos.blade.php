<div class="flex text-center text-blue-100 w-64 mx-auto rounded-full border border-indigo-600">
    <div class="w-full py-2 px-4 {{ (request()->is('active')) ? 'bg-indigo-600' : '' }} rounded-full"><a href="/active">{{__('Active')}}</a></div>
    <div class="w-full py-2 px-4 {{ (request()->is('/')) ? 'bg-indigo-600' : '' }} rounded-full"><a href="/">{{__('All')}}</a></div>
    <div class="w-full py-2 px-4 {{ (request()->is('ended')) ? 'bg-indigo-600' : '' }} rounded-full"><a href="/ended">{{__('Ended')}}</a></div>
</div>

<div class="pt-5 grid grid-cols-1 gap-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2">
 
    @foreach ($promos as $promo)
        @if($promo->is_long_term_post != 'yes')
            <div class="hover:cursor-pointer hover:shadow-xl bg-gray-900 rounded-xl duration-500 ease-in-out hover:-translate-y-2 relative overflow-hidden">
                <a clas="" href="{{$promo->link}}">
                    <div style="@if($promo->end_date <= Carbon\Carbon::now()->format('Y-m-d')) background:#b52115 @else background:#009307 @endif" class="shadow text-xs pt-3 pe-3 ps-5 pb-3 font-bold text-blue-100 absolute top-0 right-0 rounded-bl-full rounded-tr-xl">
                        @if($promo->end_date <= Carbon\Carbon::now()->format('Y-m-d'))
                            {{ __('ENDED') }}
                        @else
                            {{ __('ACTIVE') }}
                        @endif
                    </div>
                    <div class=""><img class="rounded-t-lg h-full w-full" src="{{url('images/promos/' . $promo->image)}}" alt="" /></div>
                    <div class="p-5">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-blue-100">{{$promo->title}}</h5>
                        <p class="text-blue-100">{{ __('Prize Pool') }}: {{$promo->prize_pool}}</p>
                        <p class="text-blue-100">{{ __('Duration') }}: {{$promo->start_date ? $promo->start_date->translatedFormat('M j, Y') : ''}}  - {{$promo->end_date ? $promo->end_date->translatedFormat('M j, Y') : ''}}</p>
                        <p><span class="text-blue-100">{{ __('Platform') }}:</span>
                            <span>
                                @foreach ($promo->platforms as $platform)
                                    <small class="capitalize font-bold px-2 py-1 rounded-xl text-blue-100" style="background-color: {{$platform->color}}">{{$platform->title}}</small>
                                @endforeach
                            </span>
                        </p>
                    </div>
                </a>
            </div>
        @endif
    @endforeach
</div>

<div class="text-white">{{$promos->links('pagination::tailwind')}}</div>