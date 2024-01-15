@include('admin.partials.header')
@include('admin.partials.nav')
@include('admin.blog.delete')


<div class="row">
    <div class="col"><h3>Blogs</h3></div>
    <div class="col text-end">
        <a href="{{ route('admin.blog.create') }}" class="btn text-white bg-primary fw-bold test">Add New</a>
    </div>
</div>

<div class="row mt-3">
    <div class="col">
        <div class="row">
            <div class="col">
                <div>
                    <form action="{{ route('blog.search') }}" method="get" class="position-relative">
                        <input type="text" name="q" class="form-control" placeholder="Search here ...">
                        <input type="submit" value="Search" class="bg-primary border position-absolute top-0 end-0 h-100">
                    </form>
                </div>
                <div class="pt-2">
                    <a href="{{ route('admin.blog') }}" class="text-primary ">View all</a>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="row pt-5 mb-3">
    <div class="col">
        <table class="table table-bordered rounded mb-0 align-middle">
            <thead class="fw-bold ">
                <tr>
                    <td width="1%">No.</td>
                    <td>Title</td>
                    <td>Image</td>
                    <td>Category</td>
                    <td>Language</td>
                    <td>Created at</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $blog->title }}</td>
                        <td><img src="{{url('images/'. $blog->image)}}" style="width:60px"/></td>
                        <td>{{ $blog->category->title ?? 'Not set'}}</td>
                        <td>{{ $blog->language->name ?? 'Not set' }}</td>
                        <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                        <td>{{ $blog->status }}</td>
                        
                        <td>
                            <span>
                                <a href="/admin/blog/edit/{{ $blog->id }}" class="btn bg-transparent">
                                    <i class="text-dark-2 fa-solid fa-pen-to-square"></i>
                                </a>
                            </span>
                            <span>
                                <button class="btn bg-transparent" data-bs-toggle="modal" data-bs-id="{{$blog->id}}" data-bs-target="#deleteBlogModal">
                                    <i class="text-dark-2 fa-solid fa-trash-can"></i>
                                </button>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{$blogs->links()}}</div>
    </div>
</div>

@include('admin.partials.footer')


