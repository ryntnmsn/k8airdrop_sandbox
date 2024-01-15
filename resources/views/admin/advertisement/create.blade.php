@include('admin.partials.header')
@include('admin.partials.nav')

<form action="{{ route('admin.ads.store')}}" method="post" enctype="multipart/form-data" class="pb-5">
    @csrf
    <div class="row">
      <div class="col"><h3>Create Advertisement</h3></div>
      <div class="col text-end">
        <button type="submit" class="btn text-white bg-primary fw-bold">
          Save Advertisement
        </button>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
          <label for="link" class="input-title">Name</label>
          <input type="text" class="form-control" id="name" name="name">
      </div>
    </div>
    <div class="row mt-5">
      <div class="col">
        <label for="platform" class="input-title">Language</label>
        <select required class="form-control" name="language_id" id="language_id">
          @foreach($languages as $langauge)
            <option value="{{$langauge->id}}">{{$langauge->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
  <div class="row mt-5">
    <div class="col">
      <label for="platform" class="input-title">Layout</label>
      <select required class="form-control" name="layout" id="layout">
          <option value="left">Left</option>
          <option value="right">Right</option>
      </select>
    </div>
  </div>

    <div class="row mt-5">
      <div class="col">
        <div>
          <label for="image" class="input-title">Image</label>
          <input required type="file" class="form-control" id="img_url" name="img_url">
        </div>
      </div>
      <div class="col">
        <div>
          <label for="link" class="input-title">Website For Image</label>
          <input type="text" class="form-control" id="img_website" name="img_website" required>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col">
        <div>
          <label for="video" class="input-title">Animated Video</label>
          <input type="file" class="form-control" id="video_url" name="video_url" required>
          <small>Video file should be less than 10mb file size and MP4 in format.</small>
        </div>
      </div>
      <div class="col">
        <div>
          <label for="link" class="input-title">Website For video</label>
          <input type="text" class="form-control" id="video_website" name="video_website" required>
        </div>
      </div>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(document).on('change','#platform',function(){
    if($(this).val()==="4" || $(this).val()==="5"){
      $("#interactive_container").show()
    } else {
      $("#interactive_container").hide()
    }
  });
</script>


<script>
  $(document).on('change','#is_interactive',function(){
    if($(this).val()==="yes"){
      $("#game_type_container").show()
    } else {
      $("#game_type_container").hide()
    }
  });
</script>


@include('admin.partials.footer')