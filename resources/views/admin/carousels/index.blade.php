@include('admin.partials.header')
@include('admin.partials.nav')
@include('admin.carousels.delete')

<div class="row">
    <div class="col"><h3>Carousel</h3></div>
    <div class="col text-end">
        <a href="{{ route('admin.carousels.create') }}" class="btn text-white bg-primary fw-bold test">Add New</a>
    </div>
</div>


<div class="row pt-5 mb-3">
    <div class="col">
        <table class="table table-bordered rounded mb-0 align-middle">
            <thead class="fw-bold ">
                <tr>
                    <td width="1%">No.</td>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Language</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($carousels as $carousel)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td><img src="{{ url('images/ads/' . $carousel->image) }}" alt="" style="width:32px"></td>
                        <td>{{ $carousel->title }}</td>
                        <td>{{ $carousel->language->name ?? 'Not set' }}</td>
                        <td>{{ $carousel->status }}</td>
                        <td>
                            <span>
                                <a href="/admin/carousels/edit/{{ $carousel->id }}" class="btn bg-transparent">
                                    <i class="text-dark-2 fa-solid fa-pen-to-square"></i>
                                </a>
                            </span>
                            <span>
                                <button class="btn bg-transparent" data-bs-toggle="modal" data-bs-id="{{$carousel->id}}" data-bs-target="#deleteCarouselModal">
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


