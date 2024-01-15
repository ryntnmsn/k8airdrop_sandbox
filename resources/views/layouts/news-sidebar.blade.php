{{-- categories --}}
<div class="p-4 hidden lg:block bg-gray-900 rounded-xl text-blue-100">
    <h1 class="text-xl pb-4">{{__('Categories')}}</h1>
    <ul class="">
    @foreach ($categories as $category)
        <li class="pb-2 hover:-translate-y-1 ease-in-out duration-200 hover:text-indigo-400">
            <a href="/news/category/{{$category->slug}}">{{__($category->title)}}</a>
        </li>
    @endforeach
    </ul>
</div>

{{-- most read --}}
<div class="p-4 bg-gray-900 rounded-xl text-blue-100 mt-8">
    <h1 class="text-xl pb-4">{{__('Most read')}}</h1>
    <ul class="">   
    @foreach ($blog_most_read as $blog)
        @if($blog->language->code == app()->getLocale())
            <li class="pb-4 hover:-translate-y-1 ease-in-out duration-200 hover:text-indigo-400 leading-5">
                <a href="/news/{{$blog->slug}}">
                    {{$blog->title}}
                </a>
                <div class="flex text-gray-500">
                    <div class="flex-0">
                        <small>{{__($blog->category->title)}}</small>
                    </div>
                    <div class="flex-0 px-1">
                        <small>•</small>
                    </div>
                    <div class="flex-0">
                        <small>{{$blog->created_at->diffForHumans()}}</small>
                    </div>
                </div>
            </li>
        @endif
    @endforeach
    </ul>
</div>

{{-- tags --}}
<div class="p-4 bg-gray-900 rounded-xl text-blue-100 mt-8">
    <h1 class="text-xl pb-4">{{__('Tags')}}</h1>
    <div class="flex flex-wrap">
        @foreach ($tags as $tag)
            @if($tag->language->code == app()->getLocale())
                @if($tag->slug != null)
                    <div class="tag_list mb-2 hover:-translate-y-1 ease-in-out duration-200 hover:text-indigo-400">
                        <small class="border p-1 rounded-md border-gray-700"><a class="inline-block"href="/news/tag/{{$tag->slug}}">{{__($tag->name)}}</a></small>
                    </div>
                @endif
            @endif
        @endforeach
    </div>
    <small><a href="#" id="loadMore" class="text-gray-500 hover:text-gray-400 ease-in-out duration-200">{{__('Read more')}}</a></small>
</div>
