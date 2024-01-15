<form action="/promo/{{$promos->slug}}/{{$promos->url_id}}/store_register" method="post" class="roboto" enctype="multipart/form-data">
    @csrf
   <section class="mt-12 text-indigo-100 bg-gray-900 p-7 rounded-xl">
        <div class="mb-4 text-xl">{{__('Fill out the form below to participate')}}</div>
        <x-messages/>

        
        <div class="mb-4">
            <div class="mb-2">
                <label for="name">{{__('Twitter ID')}}</label>
            </div>
            <div>
                <input class="w-full rounded-md bg-gray-800 border-gray-700"  type="text" name="preferred_platform" id="preferred_platform" value="{{old('preferred_platform')}}">
            </div>
        </div>

        <div class="mb-10">
            <div class="mb-2">
                <label for="k8_username">{{__('K8 username')}}</label>
            </div>
            <div>
                <input class="w-full rounded-md bg-gray-800 border-gray-700"  type="text" name="k8_username" id="k8_username" value="{{old('k8_username')}}">
            </div>
        </div>

        @foreach($questions as $question)
            <div class="mb-14" data="{{ $question->id }}">
                <div class="mb-2">
                    <span  scope="row">{{$loop->iteration}}. </span><label for="name">{{$question->question}}</label>
                </div>
                <div class="choice-container">
                    <div class="mb-4">
                        <div class="flex items-center">
                            <div class="w-full">
                                <div>
                                    @if($question->type == 'single_select')
                                        <div class="flex flex-wrap items-center ps-4 rounded gap-4">
                                            @foreach($question->choices as $choice)
                                                <div class="flex-none border border-slate-700 px-4 py-2">
                                                    <input required id="choices_{{$question->id}}" type="radio" value="{{$choice->id}}" name="choices[{{$question->id}}]" class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 focus:ring-2">
                                                    <label for="choices_{{$question->id}}" class="w-full py-4 ms-2 text-sm font-medium text-gray-200">{{ $choice->choice }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @elseif($question->type == 'multiple_select')
                                        <div class="flex flex-col gap-4 items-center ps-4 rounded ">
                                            @foreach($question->choices as $choice)
                                                <div class="flex-1 w-full border border-slate-700 px-4 py-2">
                                                    <input id="choices_{{$question->id}}" type="checkbox" value="{{$choice->id}}" name="choices[{{$question->id}}][]" class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2">
                                                    <label for="choices_{{$question->id}}" class="w-full py-4 ms-2 text-sm font-medium text-gray-200">{{$choice->choice}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div>
                                            <div>
                                                <textarea class="w-full rounded-md bg-gray-800 border-gray-700 h-64"  name="question_comment[]?" id="question_comment">{{old('question_comment')}}</textarea>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        @endforeach

        {{-- <div class="mb-4">
            <div class="mb-2">
                <label for="k8_username">{{__('Comments')}}</label>
            </div>
            <div>
                <textarea class="w-full rounded-md bg-gray-800 border-gray-700 h-64"  name="comment" id="comment">{{old('comment')}}</textarea>
            </div>
        </div> --}}

        <div class="text-right">
            <button class="bg-indigo-600 px-4 py-2 rounded-md hover:-translate-y-1 ease-in-out duration-500 hover:shadow-xl" type="submit">{{__('Submit')}}</button>
        </div>
    </section>

</form>
