@include('admin.partials.header')
@include('admin.partials.nav')
@include('admin.promo.delete')

<div class="row">
    <div class="col"><h3>Airdrop Promos</h3></div>
    <div class="col text-end">
        <a href="/admin/airdrop/promo/create" class="btn text-white bg-primary fw-bold test">
            Add new
        </a>
    </div>
</div>

<div class="row pt-4">
    <div class="col">
        <form action="/admin/airdrop/promo" method="get">
            <div class="input-group">
                <input required name="search" class="form-control border-end-0 border" type="text" placeholder="Search promo here...">
                <span class="input-group-append">
                    <button type="submit" class="btn border-start-0 ms-n3" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                <span><a id="reset_button" class="ms-2 fw-bold btn bg-primary text-white" href="/admin/airdrop/promo">Refresh</a></span>
             </div>
        </form>
    </div>
</div>


<div class="row">
    <div class="col">
        <table class="table table-bordered mt-3 align-middle">
            <thead class="fw-bold">
                <tr>
                    <td>No.</td>
                    <td>Promo</td>
                    <td>Language</td>
                    <td>Platform</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if(Auth::user()->isSuperAdmin())
                    @foreach($promos as $promo)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>
                            <div>
                                
                                <div style="display:flex">
                                    {{-- <div style="">
                                       <img style="width:80px; border-radius:5px" src="{{url('images/promos/' . $promo->image)}}" alt="">
                                    </div> --}}
                                    
                                    <div class="me-3">
                                        <img src="{{ url('images/promos/' . $promo->image) }}" alt="" style="width:90px; border-radius:5px">
                                    </div>

                                    <div style="">
                                        <div><b>{{$promo->title}}</b></div>
                                        <div style="color:#808080; ">
                                            <div>
                                                @if($promo->prize_pool != null)
                                                    <div><small>Prize Pool: {{$promo->prize_pool}}</small></div>
                                                @endif
                                            </div>
                                            <div>
                                                <small>Duration: {{date('M j, Y',  strtotime($promo->start_date))}} to {{date('M j, Y',  strtotime($promo->end_date))}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{$promo->language->name}}</td>
                        <td>
                            @foreach($promo->platforms as $platform)
                                <small class="text-white fw-bold rounded-pill px-2 py-1" style="background:{{$platform->color}}">{{$platform->title}}</small>
                            @endforeach
                        </td>
                       
                        <td><small class="@if($promo->status == 'Active') text-success @else text-danger  @endif fw-bold px-2 py-1 rounded-pill">{{$promo->status}}</small></td>
                        <td>
                            <span>
                                <a href="/admin/airdrop/promo/edit/{{$promo->id}}" class="btn bg-transparent">
                                    <i class="text-dark-2 fa-solid fa-pen-to-square"></i>
                                </a>
                            </span>
                            <span>
                                <a href="/admin/airdrop/promo/view/{{$promo->id}}" class="btn bg-transparent">
                                    <i class="text-dark-2 fa-solid fa-eye"></i>
                                </a>
                            </span>
                            <span>
                                    
                                <button class="btn bg-transparent" data-bs-toggle="modal" data-bs-promo_id="{{$promo->id}}" data-bs-target="#deleteModalModal">
                                    <i class="text-dark-2 fa-solid fa-trash-can"></i>
                                </button>
                                
                            </span>
                        </td>
                    </tr>
                    @endforeach
                @else
                    @if($promos->count() > 0)
                    @foreach($promos as $promo)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$promo->title}}</td>
                            <td>
                                @foreach($promo->platforms as $platform)
                                    <small class="text-white fw-bold rounded-pill px-2 py-1" style="background:{{$platform->color}}">{{$platform->title}}</small>
                                @endforeach
                            </td>
                            <td>{{$promo->prize_pool}}</td>
                            <td>{{$promo->start_date}}</td>
                            <td>{{$promo->end_date}}</td>
                            <td><small class="@if($promo->status == 'Active') bg-success @else bg-danger @endif fw-bold text-white px-2 py-1 rounded-pill">{{$promo->status}}</small></td>
                            <td>
                                <div style="display: flex">
                                    <div>
                                        <a href="/admin/airdrop/promo/edit/{{$promo->id}}" class="btn bg-transparent">
                                            <i class="text-dark-2 fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="/admin/airdrop/promo/view/{{$promo->id}}" class="btn bg-transparent">
                                            <i class="text-dark-2 fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <span>
                                    
                                            <button class="btn bg-transparent" data-bs-toggle="modal" data-bs-promo_id="{{$promo->id}}" data-bs-target="#deleteModalModal">
                                                <i class="text-dark-2 fa-solid fa-trash-can"></i>
                                            </button>
                                            
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    @else
                        <tr>
                            <td>No promos available</td>
                        </tr>
                    @endif
                @endif
            </tbody>
        </table>

        <div>
            {{ $promos->links() }}
        </div>

        <div>
            
        </div>

    </div>
</div>

@include('admin.partials.footer')


<script>
$(function() {
    if (localStorage.getItem('status')) {
        $("#status option").eq(localStorage.getItem('status')).prop('selected', true);
    }
    $("#status").on('change', function() {
        localStorage.setItem('status', $('option:selected', this).index());
    });
});
</script>

<script>
$(function() {
    if (localStorage.getItem('platform')) {
        $("#platform option").eq(localStorage.getItem('platform')).prop('selected', true);
    }
    $("#platform").on('change', function() {
        localStorage.setItem('platform', $('option:selected', this).index());
    });
});
</script>

<script>
$("#reset_button").click(function() {
    $('select').prop('selectedIndex', 0);
});
</script>

<style lang="scss" scoped>
.test{
background-color: black;
}
</style>
