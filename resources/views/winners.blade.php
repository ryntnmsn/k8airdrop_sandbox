 {{-- winners --}}
 <div class="bg-gray-900 p-4 rounded-xl mb-6">
    <div class="mb-4">
        <h1 class="text-blue-100 text-xl">{{__('Winners')}}</h1>
    </div>
    <div class="text-blue-100">
        @if($promos->participants->where('winner', 'Yes')->count() != 0)
            @foreach ($promos->participants->where('winner', 'Yes') as $participant)
                <div class="p-2 w-full border-gray-800 border rounded-md">{{substr($participant->name, 0, -2) . "***"}}</div>
            @endforeach
        @else
            --
        @endif
    </div>
</div>

{{-- participants --}}
<div class="bg-gray-900 p-4 rounded-xl">
    <div class="mb-4">
        <h1 class="text-blue-100 text-xl">{{__('Participants')}}</h1>
    </div>
    <div class="text-blue-100">
        @if($promos->participants->count() != 0)
            @foreach ($promos->participants as $participant)
                <div class="participants_list hidden border-gray-800 border p-2">{{substr($participant->name, 0, -2) . "***"}}</div>
            @endforeach
        @else
            --
        @endif
    </div>
    <div class="pt-2">
        <a href="#" id="loadMore" class="text-gray-500 hover:text-gray-400 ease-in-out duration-200">Load More</a>
    </div>
</div>