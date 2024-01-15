@include('admin.partials.header')
@include('admin.partials.nav')



<div class="row">
    <div class="col"><h3>K8 Links</h3></div>
    <div class="col text-end">
        <a href="/admin/links/create" class="btn text-white bg-primary fw-bold test">Add New</a>
    </div>
</div>



<div class="row pt-5 mb-3">
    <div class="col">
        <table class="table table-bordered rounded mb-0 align-middle">
            <thead class="fw-bold ">
                <tr>
                    <td width="1%">No.</td>
                    <td>Name</td>
                    <td>URL</td>
                    <td>Icon</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
               @foreach($links as $link)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{ $link->name }}</td>
                    <td>{{ $link->url }}</td>
                    <td><img src="{{ url('images/ads/' . $link->icon) }}" alt="" style="width:32px"></td>
                    <td>{{ $link->status }}</td>
                    <td>
                        <span>
                            <a href="/admin/links/edit/{{ $link->id }}" class="btn bg-transparent">
                                <i class="text-dark-2 fa-solid fa-pen-to-square"></i>
                            </a>
                        </span>
                        <span>
                            <button class="btn bg-transparent">
                                <i class="text-dark-2 fa-solid fa-trash-can"></i>
                            </button>
                        </span>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.partials.footer')


