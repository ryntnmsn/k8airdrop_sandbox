@include('admin.partials.header')
@include('admin.partials.nav')
@include('admin.promo.code.create')
@include('admin.promo.code.edit')
@include('admin.promo.participant.create')
{{-- @include('admin.promo.participant.edit') --}}
@include('admin.promo.participant.winner')
@include('admin.promo.participant.image_modal')

<div class="row">
    <div class="col"><h3>{{$promos->title}}</h3></div>
    <div class="col text-end">
        
        @if($promos->game_type == "multiple_choice")
            <a href="/admin/airdrop/promo/manage_question/{{$promos->id}}" class="btn text-white bg-primary fw-bold">
                Manage Question
            </a>
        @endif
        <a href="/admin/airdrop/promo/edit/{{$promos->id}}" class="btn text-white bg-primary fw-bold">
            Edit promo
        </a>
       
    </div>
</div>


<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header fw-bold">Promo Informations</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img src="{{url('images/promos/' . $promos->image)}}" alt="" class="img-thumbnail rounded">
                    </div>
                    <div class="col-9">
                        <table class="table">
                        <tr>
                            <td>Platform</td>
                            <td>
                                @foreach($promos->platforms as $platform)    
                                    <small style="background: {{$platform->color}}" class="fw-bold text-white px-2 py-1 rounded-pill">{{$platform->title}}</small>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            {{-- <td>Promo type</td>
                            <td>
                                @if($promos->type == "click_to_redeem")
                                    Click to redeem
                                @elseif($promos->type == "click_to_join")
                                    Click to Join
                                @endif
                            </td> --}}
                        </tr>
                        <tr>
                            <td>Prize pool</td>
                            <td>{{$promos->prize_pool}}</td>
                        </tr>
                        <tr>
                            <td>Duration</td>
                            <td>{{date('F j, Y', strtotime($promos->start_date))}} - {{date('F j, Y', strtotime($promos->end_date))}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td class="@if($promos->status == 'Active') text-success @else text-danger @endif">{{$promos->status}}</td>
                        </tr>
                        <tr>
                            <td>Link</td>
                            <td>{{$promos->link}}</td>
                        </tr>
                        <tr>
                            <td>Promo codes</td>
                            <td>{{$counts->codes->count()}}</td>
                        </tr>
                        <tr>
                            <td>Participants</td>
                            <td>{{$counts->participants->count()}}</td>
                        </tr>
                        {{-- <tr>
                            <td>Generate URL</td>
                            <td>
                                
                                @if($promos->url_register == "")
                                    <form action="/admin/airdrop/promo/view/{{$promos->id}}/generate_url" method="post">
                                        @method('PUT')
                                        @csrf
                                        <small><button type="submit" class="bg-primary border-0 rounded text-white px-2 py-1">Generate</button></small>
                                    </form>
                                @else
                                    {{$promos->url_register}}
                                @endif
                                
                            </td>
                        </tr> --}}
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- PROMO CODES -->
    <div class="col">
        <div class="card">
            <div class="card-header fw-bold">
                <div class="row">
                    <div class="col">Promo Codes ({{$counts->codes->count()}})</div>
                    <div class="col text-end">
                        <span>
                      
                            <small>
                                <a href="#" data-bs-toggle="modal" data-bs-id="{{$promos->id}}" data-bs-name="{{$promos->name}}" data-bs-target="#addCodeModal" class="bg-primary rounded text-white px-2 py-1">Add code</a>
                            </small>
                       
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered align-items-center">
                    <thead class="fw-bold">
                        <tr>
                            <td>Code</td>
                            <td>Date created</td>
                            <td>Status</td>
                         
                        </tr>
                    </thead>
                    <tbody>
                    @if($promos->codes->count() > 0)
                        @foreach($promos->codes as $code)
                            <tr class="align-middle">
                                <td>{{$code->name}}</td>
                                <td>{{date('M j, Y, g:i a',  strtotime($code->created_at))}}</td>
                                <td>Active</td>
                             
                                    <td class="text-end">
                                        <span>
                                            <a href="#" data-bs-toggle="modal" data-bs-id="{{$code->id}}" data-bs-promo_id="{{$promos->id}}" data-bs-name="{{$code->name}}" data-bs-target="#editCodeModal"class="btn bg-transparent">
                                                <i class="text-dark-2 fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </span>
                                        <button class="btn bg-transparent">
                                            <i class="text-dark-2 fa-solid fa-trash-can"></i>
                                        </button>   
                                    </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>No promo codes available.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <!-- PARTICIPANTS -->
<div class="row">
    <div class="col my-4">
        <div class="card">
            <div class="card-header fw-bold">
                <div class="row">
                    <div class="col">Promo Participants ({{$counts->participants->count()}})</div>
                 
                        <div class="col text-end">
                            <span>
                                <a class="bg-success rounded text-white px-2 py-1" href="/admin/airdrop/promo/participant/export/{{$promos->url_id}}">Export Data</a>
                            </span>
                            <span>
                                <small>
                                    <a href="#"
                                        data-bs-toggle="modal"
                                        data-bs-promo_id="{{$promos->id}}"
                                        class="bg-primary rounded text-white px-2 py-1 me-1"
                                        @foreach($generated_winners->participants as $participants)
                                            data-bs-id = "{{$participants->id}}"
                                            data-bs-name = "{{$participants->name}}"
                                        @endforeach

                                        data-bs-target="#winnerParticipantModal"
                                        >Generate winner
                                    </a>
                                </small>
                            </span>
                            <span><small><a class="bg-primary rounded text-white px-2 py-1" href="/admin/airdrop/promo/view/{{$promos->id}}">Refresh</a></small></span>
                            <span><small><a href="#" data-bs-toggle="modal" data-bs-id="{{$promos->id}}" data-bs-target="#addParticipantModal" class="bg-primary rounded text-white px-2 py-1">Add participant</a></small></span>
                        </div>
                  
                </div>
            </div>
            <div class="card-body">
                <form action="/admin/airdrop/promo/view/{{$promos->id}}" method="get" class="mb-3">
                    <div class="input-group">
                        <input required name="search" class="form-control border-end-0 border" type="text" placeholder="Search participant here...">
                        <span class="input-group-append">
                            <button type="submit" class="btn border-start-0 ms-n3" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <table class="table table-bordered align-items-center" style="overflow:scroll">
                    <thead class="fw-bold">
                        <tr>
                            <td>No.</td>
                            @if($promos->game_type == "upload_image")
                                <td>Name/Username</td>
                                <td>Email</td>
                            @endif

                            <td>K8 username</td>

                            <td>SNS ID</td>
                            
                            @if($promos->game_type == "paste_retweet_url")
                                <td>Retweet URL</td>
                            @endif
                            
                            @if($promos->game_type == "paste_retweet_url")
                                <td>Comment</td>
                            @endif

                            <td>IP</td>
                            
                            <td>Joined date</td>
                            
                            @if($promos->game_type == "upload_image")
                                <td>Image</td>
                            @endif
                            
                            <td>Winner</td>
                          

                            <td>Action</td>
                          
                        </tr>
                    </thead>
                        @if($promos->participants->count() > 0)
                            @foreach($promos->participants as $participant)
                                <tr @class(['duplicate-row' => in_array($participant->participant_ip, $duplicateIps)])>
                                	<th scope="row">{{ $loop->iteration }}</th>
                                    @if($promos->game_type == "upload_image")
                                        <td>{{$participant->name}}</td>
                                        <td>{{$participant->email}}</td>
                                    @endif
                                    <td>{{$participant->k8_username}}</td>

                                    <td>{{$participant->preferred_platform}}</td>
                                   
                                    @if($promos->game_type == "paste_retweet_url")
                                        <td><div style="width:250px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{$participant->retweet_url}}</div></td>
                                    @endif
                                    
                                     @if($promos->game_type == "paste_retweet_url")
                                        <td><div style="width:250px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{$participant->comment}}</div></td>
                                    @endif

                                    <td>{{$participant->participant_ip}}</td>
                                    <td>{{$participant->created_at->format('m/d/Y')}}</td>

                                    @if($promos->game_type == "upload_image")
                                        <td>
                                          
                                                <a href="#" class="pop">
                                                    <img class="img-fluid img-thumbnail rounded" src="{{url('images/participants/'. $participant->image)}}" style="width:100px; height:30px" alt="">
                                                </a>
                                           
                                        </td>
                                    @endif

                                    <td>
                                        <small class="@if($participant->winner == 'Yes') bg-success text-white @elseif($participant->winner == 'Never') bg-danger text-white @else '' @endif) fw-bold rounded-pill px-2 py-1">{{$participant->winner}}</small>
                                    </td>
                                
                                    <td>
                                        <div class="row">
                                            <div class="col d-flex">

                                            <div>
                                                <a href="/admin/airdrop/promo/participant/view/{{$participant->id}}" class="btn bg-transparent">
                                                    <i class="text-dark-2 fa-solid fa-pen-to-square"></i>
                                                </a>
                                            </div>
                                            
                                                {{-- <a href="#" 
                                            data-bs-toggle="modal"
                                            data-bs-image="{{$participant->image}}"
                                            data-bs-id="{{$participant->id}}"
                                            data-bs-promo_id="{{$promos->id}}"
                                            data-bs-email="{{$participant->email}}"
                                            data-bs-k8_username="{{$participant->k8_username}}"
                                            data-bs-name="{{$participant->name}}"
                                            data-bs-snsid="{{$participant->preferred_platform}}"
                                            data-bs-comment="{{$participant->comment}}"
                                            data-bs-retweet_url="{{$participant->retweet_url}}"
                                            data-bs-participant_ip="{{$participant->participant_ip}}"
                                            data-bs-created_at="{{$participant->created_at}}"
                                            data-bs-target="#editParticipantModal"
                                            class="btn bg-transparent">
                                                <i class="text-dark-2 fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </div> --}}
                                            <div class="col">
                                                <form action="/admin/airdrop/promo/participant/destroy/{{$participant->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn bg-transparent">
                                                        <i class="text-dark-2 fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                 
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>No participants available.</td>
                            </tr>
                        @endif
                    </table>
            </div>
        </div>
    </div>
</div>
</div>
@include('admin.partials.footer')


<script>
$(function() {
    $('.pop').on('click', function() {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#imagemodal').modal('show');   
    });		
});
</script>