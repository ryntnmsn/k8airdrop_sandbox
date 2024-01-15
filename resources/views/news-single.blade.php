@extends('layouts.app')
@section('title') {{$blogs->title}} @stop
@section('description') {{ $blogs->short_description }} @stop
@section('image') {{ url('images/' . $blogs->image) }} @stop

@section('content')

    <div class="mt-12">
        <div class="flex-none lg:flex md:flex-none">
            <div class="flex-0 lg:w-4/5 md:w-full lg:pe-8 md:pe-0">
                <div class="w-full rounded-xl">
                    {{-- image --}}
                    <div class="w-full"><img class="object-cover rounded-t-xl w-full" src="{{ url('images/' . $blogs->image) }}" alt=""></div>

                    <div class="bg-gray-900 p-6 rounded-b-xl">
                        {{-- title --}}
                        <div class="mb-4"><h1 class="text-blue-100 text-3xl font-semibold" id="blog_title">{{$blogs->title}}</h1></div>

                        {{-- details --}}
                        <div class="text-gray-500 flex pb-6 mb-6 border-b border-gray-700">
                            <div class="flex-auto">
                                <div>{{__('Category')}}: <a href="{{'/news/category/' . $blogs->category->slug}}" class="hover:text-gray-300 ease-in-out duration-300">{{__($blogs->category->title)}}</a></div>
                                <div>{{__('Created')}}: {{$blogs->created_at->diffForHumans()}}</div>
                            </div>
                            <div class="flex-auto text-right align-bottom">
                                <div>{{__('By: K8 Team')}}</div>
                            </div>
                        </div>
                        
                        {{-- demo_link --}}
                        @if($blogs->demo_link != "")
                        <div class="mb-4">
                            <iframe src="{{$blogs->demo_link}}" frameborder="0" style="width:100%; height:450px"></iframe>
                        </div>
                        @endif

                        {{-- content --}}
                        <div class="mb-4">
                            <div id="blog_description" class="text-blue-100 blog-description">
                                {!! $blogs->description !!}
                            </div>
                        </div>

                        {{-- tags --}}
                        <div class="pt-4">
                            <div class="text-blue-100 flex">
                                <div class="flex-0 pe-2">{{__('Tags')}}:</div>
                                <div class="flex-0">
                                    <ul>
                                        @foreach ($blogs->tags as $tag)
                                        <li class="inline-block hover:-translate-y-1 ease-in-out duration-200">
                                            <small class="border border-gray-700 px-2 py-1 rounded-md">
                                                <a href="{{'/news/tag/' . $tag->slug}}" class="hover:text-indigo-400">{{__($tag->name)}}</a>
                                            </small>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            {{-- share to social media --}}
             @include('layouts.share-buttons')

             <div class="pb-5">
                @include('layouts.news-category-mobile')
            </div>

               @include('layouts.news-recommended')


            </div>

            <div class="flex-0 lg:w-1/5 md:w-100 lg:pt-0 md:pt-12">
                @include('layouts.news-sidebar')
            </div>
        </div>
        
    </div>

@endsection