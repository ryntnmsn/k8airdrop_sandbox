@include('admin.partials.header')
@include('admin.partials.nav')

<form action="/admin/carousels/update/{{ $carousels->id }}" method="post" enctype="multipart/form-data" class="pb-5">
    @method('PUT')
    @csrf
    <div class="row">
      <div class="col"><h3>Edit Carousel</h3></div>
      <div class="col text-end">
        <button type="submit" class="btn text-white bg-primary fw-bold">
          Save changes
        </button>
      </div>
    </div>

    @include('components.validation-message')

    <div class="row mt-5">
      <div class="col">
          <label for="title" class="input-title">Title</label>
          <input required type="text" class="form-control" id="title" name="title" value="{{ $carousels->title }}">
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
          <label for="link" class="input-title">Link</label>
          <input required type="text" class="form-control" id="link" name="link" value="{{ $carousels->link }}">
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
          <label for="language" class="input-title">Language</label>
          <select name="language" id="" class="form-control">
            @foreach ($languages as $language)
                <option value="{{ $language->id }}" {{ $carousels->language_id == $language->id ? 'selected' : '' }}>{{ $language->name }}</option>
            @endforeach
          </select>
      </div>
    </div> 	


    <div class="row mt-5">
      <div class="col">
          <label for="status" class="input-title">Status</label>
          <select name="status" id="status" class="form-control">
            <option value="{{ $carousels->status }}">{{ $carousels->status }}</option>
            <option value="active">active</option>
            <option value="inactive">inactive</option>
          </select>
      </div>
    </div>
    
    <div class="row mt-5">
      <div class="col">
        <div>
          <label for="image" class="input-title">Image</label><br><br>
          <img src="{{ url('images/ads/'. $carousels->image) }}" alt="" style="width:100px"><br><br>
          <input type="file" class="form-control" id="image" name="image">
        </div>
      </div>
    </div>
</form>

@include('admin.partials.footer')