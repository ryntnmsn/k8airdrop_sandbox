@include('admin.partials.header')
@include('admin.partials.nav')

<form action="/admin/links/update/{{ $links->id }}" method="post" enctype="multipart/form-data" class="pb-5">
    @method('PUT')
    @csrf
    <div class="row">
      <div class="col"><h3>Edit Link</h3></div>
      <div class="col text-end">
        <button type="submit" class="btn text-white bg-primary fw-bold">
          Save changes
        </button>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
          <label for="name" class="input-title">Name</label>
          <input required type="text" class="form-control" id="name" name="name" value="{{ $links->name }}">
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
          <label for="url" class="input-title">URL</label>
          <input required type="text" class="form-control" id="url" name="url" value="{{ $links->url }}">
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
          <label for="status" class="input-title">status</label>
          <select name="status" id="status" class="form-control">
            <option value="{{ $links->status }}">{{ $links->status }}</option>
            <option value="active">active</option>
            <option value="inactive">inactive</option>
          </select>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
        <div>
          <label for="icon" class="input-title">Icon</label><br><br>
          <img src="{{ url('images/ads/'. $links->icon) }}" alt="" style="width:100px"><br><br>
          <input type="file" class="form-control" id="icon" name="icon">
        </div>
      </div>
    </div>
</form>



@include('admin.partials.footer')