@include('admin.partials.header')
@include('admin.partials.nav')

<form action="{{ route('admin.links.store') }}" method="post" enctype="multipart/form-data" class="pb-5">
    @csrf
    <div class="row">
      <div class="col"><h3>Create Links</h3></div>
      <div class="col text-end">
        <button type="submit" class="btn text-white bg-primary fw-bold">
          Save
        </button>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
          <label for="name" class="input-title">Name</label>
          <input required type="text" class="form-control" id="name" name="name">
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
          <label for="url" class="input-title">URL</label>
          <input required type="text" class="form-control" id="url" name="url">
      </div>
    </div>


    <div class="row mt-5">
      <div class="col">
          <label for="status" class="input-title">Status</label>
          <select name="status" id="status" class="form-control">
            <option value="active">active</option>
            <option value="inactive">inactive</option>
          </select>
      </div>
    </div>
    
    <div class="row mt-5">
      <div class="col">
        <div>
          <label for="icon" class="input-title">Icon</label>
          <input type="file" class="form-control" id="icon" name="icon">
        </div>
      </div>
    </div>
</form>



@include('admin.partials.footer')