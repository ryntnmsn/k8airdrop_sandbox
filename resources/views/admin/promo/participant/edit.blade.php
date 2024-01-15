@include('admin.partials.header')
@include('admin.partials.nav')

<form action="/admin/airdrop/promo/participant/update/{{$participant->id}}" method="post">
    @csrf
    @method('PUT')
<div class="row">
    <div class="col">
        <div><h5>Participant Data</h5></div>
    </div>
    <div class="col text-end">
        <button type="submit" class="btn text-white bg-primary fw-bold">
            Save
        </button>
    </div>
</div>

<div class="row pt-3  mb-4">
    <div class="col">
        <div class="p-3"  style="border-left: 5px solid #5f6982; padding:10px; background:#fff; border:1px solid #eaeaea">
           
           
            
            @if($participant->name != "")
                <div class="form-group mb-4">
                    <label for="">Name</label>
                    <input readonly type="text" class="form-control" value="{{$participant->name}}">
                </div>
            @endif

            @if($participant->email != "")
                <div class="form-group mb-4">
                    <label for="">Email</label>
                    <input readonly type="text" class="form-control" value="{{$participant->email}}">
                </div>
            @endif

            @if($participant->k8_username != "")
                <div class="form-group mb-4">
                    <label for="">K8 Username</label>
                    <input readonly type="text" class="form-control" value="{{$participant->k8_username}}">
                </div>
            @endif

            @if($participant->preferred_platform != "")
                <div class="form-group mb-4">
                    <label for="">SNS ID</label>
                    <input readonly type="text" class="form-control" value="{{$participant->preferred_platform}}">
                </div>
            @endif

            @if($participant->winner != "")
                <div class="form-group mb-4">
                    <label for="">Winner</label>
                    Winner?
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input value="No" class="form-check-input" type="radio" name="winner" id="flexRadioDefault1" @if($participant->winner == "No") checked @endif>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input value="Yes" class="form-check-input" type="radio" name="winner" id="flexRadioDefault2"  @if($participant->winner == "Yes") checked @endif>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input value="Never" class="form-check-input" type="radio" name="winner" id="flexRadioDefault2" @if($participant->winner == "Never") checked @endif>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Never
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if($participant->retweet_url != "")
                <div class="form-group mb-4">
                    <label for="">Retweet URL</label>
                    <input readonly type="text" class="form-control" value="{{$participant->retweet_url}}">
                </div>
            @endif

            @if($participant->comment != "")
                <div class="form-group mb-4">
                    <label for="">Comment</label>
                    <div>{{$participant->comment}}</div>
                </div>
            @endif

            @if($participant->image != "")
                <div class="form-group mb-4">
                    <label for="">Uploaded Image</label>
                    <div><img style="width:250px" src="{{url('images/participants/'. $participant->image)}}" /></div>
                </div>
            @endif

            @if($participant->created_at != "")
                <div class="form-group mb-4">
                    <label for="">Joined Date</label>
                    <input readonly type="text" class="form-control" value="{{$participant->created_at}}">
                </div>
            @endif

        </div>
    </div>
</div>
</form>



<div style="width:100%; display:flex">
    <div style="width:80%">
        <div>
            <table class="table table-bordered align-items-center  bg-white">
                <thead>
                    <tr class="fw-bold">
                        <td>No</td>
                        <td>Question</td>
                    </tr>
                </thead>
                @foreach($questions as $question)
                    <tr>
                        <td row="scope">{{$loop->iteration}}</td>
                        <td>{{$question->question}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div style="width:20%;">
        <div>
            <table class="table table-bordered align-items-center bg-white">
                <thead>
                    <tr class="fw-bold">
                        <td>Answer</td>
                    </tr>
                </thead>
                @if($participant->choices->count() != null)
                    @foreach($participant->choices as $choice)
                        <tr>
                            <td>{{$choice->choice}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>
                            No answers available.
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
</div>





@include('admin.partials.footer')










{{-- <div class="modal fade" id="editParticipantModal" tabindex="-1" aria-labelledby="editParticipantLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content ">
            
            <div class="modal-header bg-custom-dark">
                <h5 class="modal-title fw-bold" id="editParticipantLabel">Edit Participant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form action="/admin/airdrop/promo/participant/update" method="post">
                            @csrf
                            <div class="mb-4">
                                <input readonly type="hidden" name="id" id="id">
                                <input readonly type="hidden" name="promo_id" id="promo_id">
                                <div class="mb-4">
                                    <label for="name">Name/Username</label>
                                    <input required type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="k8_username">k8 username</label>
                                    <input type="text" name="k8_username" id="k8_username" class="form-control">
                                </div>
                                 <div class="mb-4">
                                    <label for="k8_username">SNS ID</label>
                                    <input type="text" name="snsid" id="snsid" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="k8_username">Retweet URL</label>
                                    <input readonly type="text" name="retweet_url" id="retweet_url" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="k8_username">Comment</label>
                                  
                                    <input readonly type="text" name="comment" id="comment" class="form-control">
                                </div>
                                <div class="mb-4 border rounded p-3">
                                    Winner?
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check">
                                                <input value="No" class="form-check-input" type="radio" name="winner" id="flexRadioDefault1" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input value="Yes" class="form-check-input" type="radio" name="winner" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Yes
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input value="Never" class="form-check-input" type="radio" name="winner" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Never
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        
                            <div class="modal-footer border-0 p-0">
                                <button type="button" class="fw-bold  btn btn-danger" data-bs-dismiss="modal">Close</button>  
                                <button type="submit" class="fw-bold btn fw-bold bg-primary text-white">Save changes</button>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

<script>
    var editParticipantModal = document.getElementById('editParticipantModal')
    editParticipantModal.addEventListener('show.bs.modal', function (event) {

    var button = event.relatedTarget
    var id = button.getAttribute('data-bs-id')
    var promo_id = button.getAttribute('data-bs-promo_id')
    var name = button.getAttribute('data-bs-name')
    var email = button.getAttribute('data-bs-email')
    var k8_username = button.getAttribute('data-bs-k8_username')
    var snsid = button.getAttribute('data-bs-snsid')
    var comment = button.getAttribute('data-bs-comment')
    var retweet_url = button.getAttribute('data-bs-retweet_url')
    var participant_ip = button.getAttribute('data-bs-participant_ip')
    var created_at = button.getAttribute('data-bs-created_at')


    var modalBodyID = editParticipantModal.querySelector('.modal-body #id')
    var modalBodyPromoID = editParticipantModal.querySelector('.modal-body #promo_id')
    var modalBodyName = editParticipantModal.querySelector('.modal-body #name')
    var modalBodyEmail = editParticipantModal.querySelector('.modal-body #email')
    var modalBodyK8Username = editParticipantModal.querySelector('.modal-body #k8_username')
    var modalBodySNSID = editParticipantModal.querySelector('.modal-body #snsid')
    var modalBodyComment = editParticipantModal.querySelector('.modal-body #comment')
    var modalBodyRetweetURL = editParticipantModal.querySelector('.modal-body #retweet_url')
    var modalBodyParticipantIP = editParticipantModal.querySelector('.modal-body #participant_ip')
    var modalBodyCreatedAt = editParticipantModal.querySelector('.modal-body #created_at')
    
    


    modalBodyID.value = id
    modalBodyPromoID.value = promo_id
    modalBodyName.value = name
    modalBodyEmail.value = email
    modalBodyK8Username.value = k8_username
    modalBodySNSID.value = snsid
    modalBodyComment.value = comment
    modalBodyRetweetURL.value = retweet_url
    modalBodyParticipantIP.value = participant_ip
    modalBodyCreatedAt.value = created_at

    });
</script> --}}