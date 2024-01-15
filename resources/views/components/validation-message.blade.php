<div style="color:#ff0000">
    @if ($errors->any())
        <div class="bg-red-700 text-red-200 p-3 rounded-md mb-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  </div>