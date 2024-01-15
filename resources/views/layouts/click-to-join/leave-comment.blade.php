<form action="/promo/{{$promos->slug}}/{{$promos->url_id}}/store_register" method="post" class="roboto" enctype="multipart/form-data">
    @csrf
   <section class="mt-12 text-blue-100 bg-gray-900 p-7 rounded-xl">
        <div class="mb-4 text-xl">{{__('Fill out the form below to participate')}}</div>
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
            <div class="mb-2">
                <label for="name">{{__('Line ID')}}</label>
            </div>
            <div>
                <input class="w-full rounded-md bg-gray-800 border border-gray-700"  type="text" name="preferred_platform" id="preferred_platform" value="{{old('preferred_platform')}}">
            </div>
        </div>

        <div class="mb-4">
            <div class="mb-2">
                <label for="k8_username"> {{__('K8 username')}}  <span class="text-xs">({{ __('Dont have an account?') }} <a href='https://playk8.io/?invite=K8Twitter' target="_blank" class="text-indigo-500">{{ __('Register here') }}</a>)</span> </label>
            </div>
            <div>
                <input class="w-full rounded-md bg-gray-800 border border-gray-700"  type="text" name="k8_username" id="k8_username" value="{{old('k8_username')}}">
            </div>
        </div>

        <div class="mb-4">
            <div class="mb-2">
                <label for="k8_username">{{__('Comments')}} </label>
            </div>
            <div>
                <textarea required class="w-full rounded-md bg-gray-800 border border-gray-700 h-64"  name="comment" id="comment" value="{{old('comment')}}"></textarea>
            </div>
        </div>

        <div class="text-right">
            <button class="bg-indigo-600 px-4 py-2 rounded-md hover:-translate-y-1 ease-in-out duration-500 hover:shadow-xl" type="submit">{{__('Submit')}}</button>
        </div>
    </section>

</form>