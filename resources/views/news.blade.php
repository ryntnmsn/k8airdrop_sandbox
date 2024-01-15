@extends('layouts.app')
@section('title') @stop

@section('content')

    <div class="mt-12">
        <div class="flex-none lg:flex md:flex-none">
            <div class="flex-0 lg:w-4/5 md:w-full lg:pe-8 md:pe-0">
                {{-- news banner carousel --}}
                <section id="news-carousel" class="splide rounded-xl">
                    <div class="splide__track rounded-xl">
                        <div class="splide__list rounded-xl">
                            @foreach ($blog_banners as $blog)
                                @if($blog->language->code == app()->getLocale())
                                    <div class="lg:flex md:flex-none border-solid splide__slide rounded-xl ease-in-out duration-300 bg-gray-900">
                                        <div class="flex-0 lg:w-3/5 md:w-full"><img class="rounded-tl-xl w-full" src="{{ url('images/' . $blog->image) }}" alt=""></div>
                                        <div class="flex-0 lg:w-2/5 md:w-full bg-gray-900 p-6 rounded-r-xl">
                                            <div class="flex mb-2 text-gray-500">
                                                <div class="flex-0">
                                                    <small>{{__($blog->category->title)}}</small>
                                                </div>
                                                <div class="flex-0 px-2">
                                                    <small>•</small>
                                                </div>
                                                <div class="flex-0">
                                                    <small>{{$blog->created_at->diffForHumans()}}</small>
                                                </div>
                                            </div>
                                            <div class="mb-4"><h1 class="text-2xl text-blue-100">{{$blog->title}}</h1></div>
                                            <div class="text-blue-100">
                                                <p>{!! Str::limit($blog->short_description, 100) !!}</p>
                                                <div class="mt-4 hover:-translate-y-1 ease-in-out duration-200">
                                                    <a href="/news/{{ $blog->slug }}" class=" hover:bg-indigo-500 bg-indigo-600 text-blue-100 rounded-md px-3 py-2">{{__('Read more')}}</a>
                                                </div>
                                            </div>
                                            <div class="text-blue-100">
                                            
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </section>

                <div>
                    @include('layouts.news-category-mobile')
                </div>

                {{-- news --}}
                <section class="mt-12">

                    <div class="pb-5 flex">
                        <div class="flex-1"><h1 class="text-blue-100 text-2xl">{{__('News')}}</h1></div>
                        <div class="flex items-center">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                        @foreach ($blogs as $blog)
                            @if($blog->language->code == app()->getLocale() && $blog->where('status', 'active'))
                                <div class="bg-gray-900 rounded-xl hover:-translate-y-2 hover:shadow-xl ease-in-out duration-200 relative">
                                    <a href="/news/{{ $blog->slug }}" class="w-full absolute h-full bg-transparent"></a>
                                    <div class="mb-2"><img class="w-full rounded-t-xl" src="{{url('images/' . $blog->image)}}" alt="{{$blog->title}}"></div>
                                    <div class="bg-gray-900 pb-4 px-4 rounded-b-xl">
                                        <div class="flex mb-2 text-gray-500">
                                            <div class="flex-0">
                                                <small>{{__($blog->category->title)}}</small>
                                            </div>
                                            <div class="flex-0 px-2">
                                                <small>•</small>
                                            </div>
                                            <div class="flex-0">
                                                <small>{{$blog->created_at->diffForHumans()}}</small>
                                            </div>
                                        </div>
                                        <div class="mb-2"><h1 class="text-blue-100 text-md font-bold mb-4 leading-6">{{$blog->title}}</h1></div>
                                        <div class="mb-2">
                                            <span class="text-blue-100">{!! Str::limit($blog->short_description, 80) !!}</span>
                                            <span><a href="/blog/{{ $blog->slug }}" class="text-gray-500 hover:text-gray-400 ease-in-out duration-200">{{__('Read more')}}</a></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div>
                        {{$blogs->links('pagination::tailwind')}}
                    </div>
                </section>
                @include('layouts.feature-game')
            </div>

            <div class="flex-0 lg:w-1/5 md:w-100 lg:pt-0 md:pt-12">
                @include('layouts.news-sidebar')
            </div>
        </div>
        
    </div>

@endsection