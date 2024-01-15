<form action="/promo/{{$promos->slug}}/{{$promos->url_id}}/store_register" method="post" class="roboto" enctype="multipart/form-data">
    @csrf
    <div class="">

        <div class="mb-2 text-custom-secondary">{{__('Fill out the form below to participate and claim your rewards')}}.</div>

        @error('participant_exists')
            <p class="text-danger">{{$message}}</p>
        @enderror

        <div class="mb-4 text-custom-secondary">
            <label for="name">Name</label>
            <input required type="text" name="name" id="name" class="form-control mt-2 rounded px-2" value="{{old('name')}}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4 text-custom-secondary">
            <label for="email">{{__('Email Address')}}</label>
            <input required type="email" name="email" id="email" class="form-control mt-2 rounded px-2" value="{{old('email')}}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror   
        </div>
        <div class="mb-4 text-custom-secondary" style="border-radius:10px">
            <label for="preferred_platform">{{__('Preferred Messaging Platform')}} </label><br>
            <select name="social_platform" id="" style="width:100%" class="mt-2 rounded p-2">
                <!--<option value="Facebook">Facebook</option>-->
                <option value="instagram">Instagram</option>
                <option value="twitter">Twitter</option>
            </select>
            <input required type="text" name="preferred_platform" id="preferred_platform" class="form-control mt-2 rounded px-2" value="{{old('preferred_platform')}}" placeholder="Enter username">
        </div>
        
        <div class="mb-4 text-custom-secondary">
            <label for="k8_username">{{__('k8 username')}}</label>
            <input required type="text" name="k8_username" id="k8_username" class="form-control mt-2 rounded px-2" value="{{old('k8_username')}}">
            @error('k8_username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4 text-custom-secondary">
            <label for="image">{{__('Upload image')}}</label>
            <input type="file" name="image" id="image" class="form-control mt-2 rounded px-2">
            
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="text-end">
            <button class="a-btn" type="submit">{{__('Submit')}}</button>
        </div>
    </div>
</form>