<form action="/promo/{{$promos->slug}}/{{$promos->url_id}}/subscribe_newsletter" method="post" class="roboto" enctype="multipart/form-data">
    @csrf
   <section class="mt-12 text-blue-100 bg-gray-900 p-7 rounded-xl">
        <div class="mb-4 text-xl">{{__('Subscribe to our Newsletter')}}</div>
        <x-messages />

        @if ($errors->any())
            <div class="bg-red-700 text-red-200 p-3 rounded-md mb-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4">
            <div>
                <input class="w-full rounded-md bg-gray-800 border border-gray-700"  type="text" name="email" id="email" value="{{old('email')}}" placeholder="Enter email here...">
            </div>
        </div>

        <div class="text-right">
            <button class="bg-indigo-600 px-4 py-2 rounded-md hover:-translate-y-1 ease-in-out duration-500 hover:shadow-xl" type="submit">{{__('Submit')}}</button>
        </div>
    </section>
</form>