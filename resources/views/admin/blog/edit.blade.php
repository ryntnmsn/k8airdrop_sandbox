@include('admin.partials.header')
@include('admin.partials.nav')

<form action="{{ route('admin.blog.update', $blogs->id) }}" method="post" enctype="multipart/form-data" class="pb-5">
    @method('PUT')
    @csrf

    <div class="row">
      <div class="col"><h3>Edit Blog</h3></div>
      <div class="col text-end">
        <button type="submit" class="btn text-white bg-primary fw-bold">
          Update blog
        </button>
      </div>
    </div>


    @include('components.validation-message')

    <div class="row mt-4">
      <div class="col">
          <label for="title" class="input-title">Title</label>
          <input required type="text" class="form-control" id="title" name="title" value="{{ $blogs->title }}">
      </div>
    </div>

    <div class="row mt-4">
      <div class="col">
          <label for="languange" class="input-title">Languange</label>
          <select class="form-control" name="language" id="language">
            @foreach ($languages as $language )
              <option value="{{ $language->id }}" {{ $blogs->language_id == $language->id ? 'selected' : ''}}>{{ $language->name }}</option>
            @endforeach
          </select>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col">
        <label for="" class="input-title">Category</label>
        <select name="category" id="" class="form-control">
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $blogs->category_id == $category->id ? 'selected' : ''}}>{{ $category->title }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div  class="row mt-4">
      <div class="col">
        <label for="description" class="input-title">Short Description</label>
        <input required tyle="text" class="form-control" name="short_description" value="{{ $blogs->short_description }}">
      </div>
    </div>

    <div  class="row mt-4">
      <div class="col">
        <label for="description" class="input-title">Description</label>
        <textarea style="height:250px" class="form-control" id="description" name="description">{{ $blogs->description }}</textarea>
      </div>
    </div>
    
    <div  class="row mt-4">
      <div class="col">
        <label for="demo_link" class="input-title">Demo URL(Optional)</label>
        <input tyle="text" class="form-control" name="demo_link" value="{{ $blogs->demo_link }}">
      </div>
    </div>

    <div class="row mt-4">
      <div class="col">
          <label for="status" class="input-title">Status</label>
          <select name="status" id="status" class="form-control">
            <option value="{{ $blogs->status }}">{{ $blogs->status }}</option>
            <option value="active">active</option>
            <option value="inactive">inactive</option>
          </select>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col">
          <label for="" class="input-title">Add tags</label>
          <input type="text" name="tag" class="form-control">
            <small>Put comma(,) followed by tag if you wish to add more. (ex. Tag01, Tag02)</small>
        <table class="table w-25 mt-4">
            <tr style="border-bottom:2px">
              <td colspan="2">Tags attched</td>
            </tr>
          @foreach ($blogs->tags as $tag)
            @if($blogs->tags()->count() > 0)
              <tr>
                <td>{{ $tag->name }}</td>
                <!--<td> <a href="{{ route('admin.blog.edit.detach_tag', $blogs->id) }}">Remove</a></td>-->
              </tr>
            @else
              <tr>
                <td>No tag/s attach to this blog.</td>
              </tr>
            @endif
          @endforeach
        </table>
      </div>
    </div>
    
    <div class="row mt-4">
      <div class="col">
        <div>
          <label for="image" class="input-title">Image</label>
          <input type="file" class="form-control" id="image" name="image">
          <img class="mt-4 w-25" src="{{ url('images/' . $blogs->image) }}" alt="">
        </div>
      </div>
    </div>
  </form>

@include('admin.partials.footer')