<div class="block lg:hidden p-4 bg-gray-900 rounded-xl text-blue-100 mt-10">
    <h1 class="text-xl pb-4">{{__('Categories')}}</h1>
    <ul class="flex flex-row space-x-8 whitespace-nowrap overflow-scroll">
    @foreach ($categories as $category)
        <li class="py-4 hover:-translate-y-1 ease-in-out duration-200 hover:text-indigo-400">
            <a href="/news/category/{{$category->slug}}">{{__($category->title)}}</a>
        </li>
    @endforeach
    </ul>
</div>