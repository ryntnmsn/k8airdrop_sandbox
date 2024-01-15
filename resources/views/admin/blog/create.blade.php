@include('admin.partials.header')
@include('admin.partials.nav')



<form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data" class="pb-5">
    @csrf
    <div class="row">
      <div class="col"><h3>Create Blog</h3></div>
      <div class="col text-end">
        <button type="submit" class="btn text-white bg-primary fw-bold">
          Save blog
        </button>
      </div>
    </div>

    @include('components.validation-message')

    <div class="row mt-4">
      <div class="col">
          <label for="title" class="input-title">Title</label>
          <input  type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
      </div>
    </div>

    <div class="row mt-4">
      <div class="col">
          <label for="languange" class="input-title">Languange</label>
          <select class="form-control" name="language" id="language" value="{{old('language')}}">
            @foreach ($languages as $language)
                <option value="{{ $language->id }}" @selected(old('language') == $language->id)>{{ $language->name }}</option>
            @endforeach
          </select>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col">
        <label for="" class="input-title">Category</label>
        <select name="category" id="" class="form-control" value="{{old('category')}}">
          @foreach ($categories as $category)
              <option value="{{ $category->id }}" @selected(old('category') == $category->id)> {{ $category->title }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div  class="row mt-4">
      <div class="col">
        <label for="description" class="input-title">Short Description</label>
        <input  tyle="text" class="form-control" name="short_description" value="{{old('short_description')}}">
      </div>
    </div>

    <div  class="row mt-4">
      <div class="col">
        <label for="description" class="input-title">Description</label>
        <textarea style="height:250px" class="form-control" id="description" name="description">{{old('description')}}</textarea>
      </div>
    </div>

     <div  class="row mt-4">
      <div class="col">
        <label for="demo_link" class="input-title">Demo URL(Optional)</label>
        <input tyle="text" class="form-control" name="demo_link" value="{{old('demo_link')}}">
      </div>
    </div>

    <div class="row mt-4">
      <div class="col">
          <label for="status" class="input-title">Status</label>
          <select name="status" id="status" class="form-control" value="{{old('status')}}">
            <option value="active" @if(old('status') == 'active') selected @endif>active</option>
            <option value="inactive" @if(old('status') == 'inactive') selected @endif>inactive</option>
          </select>
      </div>
    </div>
    
    <div class="row mt-4">
      <div class="col">
          <label for="" class="input-title">Add tags</label>
          <input type="text" name="tag" class="form-control">
          <small>Put comma(,) followed by tag if you wish to add more. (ex. Tag01, Tag02)</small>
          {{-- <select name="tag" id="" class="form-control">
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
          </select> --}}
      </div>
    </div>

    <div class="row mt-4">
      <div class="col">
        <div>
          <label for="image" class="input-title">Image</label>
          <input  type="file" class="form-control" id="image" name="image">
        </div>
      </div>
    </div>
  </form>


@include('admin.partials.footer')