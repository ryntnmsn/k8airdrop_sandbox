<form action="/promo/{{$promos->slug}}/{{$promos->url_id}}/store_register" method="post" class="roboto" enctype="multipart/form-data">
    @csrf
   <section class="mt-12 text-blue-100 bg-gray-900 p-7 rounded-xl">
        <div class="mb-4 text-xl">{{__('Fill out the form below to participate and claim your rewards')}}.</div>



        <div class="mb-4">
            <div class="mb-2">
                <label for="name">{{__('Name')}}</label>
            </div>
            <div>
                <input class="w-full rounded-md bg-gray-800 border border-gray-700" required type="text" name="name" id="name" value="{{old('name')}}">
            </div>
            <div>
                @error('name')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <div class="mb-2">
                <label for="email">{{__('Email Address')}}</label>
            </div>
            <div>
                <input class="w-full rounded-md bg-gray-800 border border-gray-700" required type="email" name="email" id="email" value="{{old('email')}}">
            </div>
            <div>
                @error('email')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <div class="mb-2">
                <label for="preferred_platform">{{__('Preferred Messaging Platform')}}</label>
            </div>
            <div class="mb-4">
                <select class="w-full rounded-md bg-gray-800 border border-gray-700" name="social_platform">
                    <!--<option value="facebook">Facebook</option>-->
                    <option value="instagram">Instagram</option>
                    <option value="twitter">Twitter</option>
                </select>
            </div>
            <div>
                <input class="w-full rounded-md bg-gray-800 border border-gray-700" required type="text" name="preferred_platform" id="preferred_platform" value="{{old('preferred_platform')}}" placeholder="{{__('Enter username')}}">
            </div>
            <div>
                @error('preferred_platform')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
        </div>
        
        <div class="mb-4">
            <div class="mb-2">
                <label for="k8_username">{{__('k8 username')}}</label>
            </div>
            <div>
                <input class="w-full rounded-md bg-gray-800 border border-gray-700" required type="text" name="k8_username" id="k8_username" value="{{old('k8_username')}}">
            </div>
            <div>
                @error('k8_username')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <div class="mb-2">
                <label for="image">{{__('Upload image')}}</label>
            </div>
            <div><input class="w-full rounded-md bg-gray-800 border border-gray-700" type="file" name="image" id="image"></div>
            <div>
                @error('image')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="text-right">
            <button class="bg-indigo-600 px-4 py-2 rounded-md hover:-translate-y-1 ease-in-out duration-500 hover:shadow-xl" type="submit">{{__('Submit')}}</button>
        </div>
    </section>

</form>