@include('admin.partials.header')
@include('admin.partials.nav')

<form action="{{ route('admin.carousels.store') }}" method="post" enctype="multipart/form-data" class="pb-5">
    @csrf
    <div class="row">
      <div class="col"><h3>Create Carousel</h3></div>
      <div class="col text-end">
        <button type="submit" class="btn text-white bg-primary fw-bold">
          Save
        </button>
      </div>
    </div>


    @include('components.validation-message')

    <div class="row mt-3">
      <div class="col">
          <label for="title" class="input-title">Title</label>
          <input  type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
      </div>
    </div>
    
    <div class="row mt-5">
      <div class="col">
          <label for="language" class="input-title">Language</label>
          <select name="language" id="language" class="form-control" value="{{old('language')}}">
            @foreach ($languages as $language)
              <option value="{{ $language->id }}" @selected(old('language') == $language->id)>{{ $language->name }}</option>
            @endforeach
          </select>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
          <label for="link" class="input-title">Link</label>
          <input  type="text" class="form-control" id="link" name="link" value="{{old('link')}}">
      </div>
    </div>
    

    <div class="row mt-5">
      <div class="col">
          <label for="status" class="input-title">Status</label>
          <select name="status" id="status" class="form-control" value="{{old('status')}}">
            <option value="active" @if(old('status') == 'active') selected @endif>active</option>
            <option value="inactive" @if(old('status') == 'inactive') selected @endif>inactive</option>
          </select>
      </div>
    </div>
    
    <div class="row mt-5">
      <div class="col">
        <div>
          <label for="image" class="input-title">Image</label>
          <input  type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
        </div>
      </div>
    </div>
  </form>


@include('admin.partials.footer')