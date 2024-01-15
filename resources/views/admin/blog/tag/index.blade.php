@include('admin.partials.header')
@include('admin.partials.nav')


<div class="row">
    <div class="col"><h3>Blog Tags</h3></div>
    <div class="col text-end">
        <a href="{{ route('admin.tag.create') }}" class="btn text-white bg-primary fw-bold test">Add New</a>
    </div>
</div>


<div class="row pt-5 mb-3">
    <div class="col">
        <table class="table table-bordered rounded mb-0 align-middle">
            <thead class="fw-bold ">
                <tr>
                    <td width="1%">No.</td>
                    <td>Title</td>
                    <td>Language</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->language->name ?? 'Not set' }}</td>
                        <td>
                            <span>
                                <a href="/admin/tag/edit/{{ $tag->id }}" class="btn bg-transparent">
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


