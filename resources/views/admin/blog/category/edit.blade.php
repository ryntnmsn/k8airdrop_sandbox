@include('admin.partials.header')
@include('admin.partials.nav')

<form action="{{ route('admin.category.update', $categories->id) }}" method="post" enctype="multipart/form-data" class="pb-5">
  @method('PUT')
    @csrf
    <div class="row">
      <div class="col"><h3>Edit Blog Category</h3></div>
      <div class="col text-end">
        <button type="submit" class="btn text-white bg-primary fw-bold">
          Update category
        </button>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
          <label for="title" class="input-title">Title</label>
          <input required type="text" class="form-control" id="title" name="title" value="{{ $categories->title }}">
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
        <label for="language" class="input-title">Language</label>
        <select name="language" id="" class="form-control">
          @foreach ($languages as $language)
            <option value="{{ $language->id }}" {{ $categories->language_id == $language->id ? 'selected' : ''}}>{{ $language->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </form>

@include('admin.partials.footer')