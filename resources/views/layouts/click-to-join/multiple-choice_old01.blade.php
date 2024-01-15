<form action="/promo/{{$promos->slug}}/{{$promos->url_id}}/store_register" method="post" class="roboto" enctype="multipart/form-data">
    @csrf
   <section class="mt-12 text-blue-100 bg-gray-900 p-7 rounded-xl">
        <div class="mb-4 text-xl">{{__('Fill out the form below to participate')}}</div>
        <x-messages/>

        
        <div class="mb-4">
            <div class="mb-2">
                <label for="name">{{__('Twitter ID')}}</label>
            </div>
            <div>
                <input class="w-full rounded-md bg-gray-800 border border-gray-700"  type="text" name="preferred_platform" id="preferred_platform" value="{{old('preferred_platform')}}">
            </div>
        </div>

        <div class="mb-10">
            <div class="mb-2">
                <label for="k8_username">{{__('K8 username')}}</label>
            </div>
            <div>
                <input class="w-full rounded-md bg-gray-800 border border-gray-700"  type="text" name="k8_username" id="k8_username" value="{{old('k8_username')}}">
            </div>
        </div>

        @foreach($questions as $question)
            <div class="mb-14">
                <div class="mb-2">
                    <span  scope="row">{{$loop->iteration}}. </span><label for="name">{{$question->question}}</label>
                </div>
                <div class="choice-container">
                    <div class="mb-4">
                       
                        <div class="flex items-center">
                            <div class="w-full">
                                <div>
                                    <select name="choices[{{$question->id}}]"  class="archive text-gray-900 select_option">
                                        <option value="0">{{__('Choose one')}}</option>
                                        @foreach($question->choices as $choice)
                                           
                                            <option value=" {{$choice->id}} " {{ (collect(old('choices'))->contains($choice->id)) ? 'selected':'' }}>{{ $choice->choice }}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        @endforeach

        <div class="mb-4">
            <div class="mb-2">
                <label for="k8_username">{{__('Comments')}}</label>
            </div>
            <div>
                <textarea class="w-full rounded-md bg-gray-800 border border-gray-700 h-64"  name="comment" id="comment">{{old('comment')}}</textarea>
            </div>
        </div>

        <div class="text-right">
            <button class="bg-indigo-600 px-4 py-2 rounded-md hover:-translate-y-1 ease-in-out duration-500 hover:shadow-xl" type="submit">{{__('Submit')}}</button>
        </div>
    </section>

</form>