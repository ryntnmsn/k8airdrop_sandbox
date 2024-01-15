@include('admin.partials.header')
@include('admin.partials.nav')

<form action="/admin/airdrop/promo/store" method="post" enctype="multipart/form-data" class="pb-5">
    @csrf
<div class="row">
    <div class="col"><h3>Create Airdrop Promo</h3></div>
    <div class="col text-end">
        <button type="submit" class="btn text-white bg-primary fw-bold">
            Save promo
        </button>
    </div>
</div>

@include('components.validation-message')

<div class="row mt-2">
    <div class="col">
        @if(Auth::user()->isSuperAdmin())
        <div class="mb-3">
            <label for="name">Assign Admin</label>
            <div class="mt-2" style="display:flex; flex-wrap:wrap">
                @foreach($users as $user)
                <div style="margin-right:10px; margin-bottom:10px">
                    <div style="display: flex; padding:10px; border:1px solid #c9c7c7; border-radius:5px">
                        <input
                        type="checkbox"
                        class="form-check-input"
                        name="users_check[]"
                        value="{{$user->id}}"
                        style="border:1px solid #000; margin-right:5px" />
                    <label for="name" class="form-check-label">{{$user->name}}</label>
                </div>
                </div>
            @endforeach
            </div>
        </div>
        @endif

        <div class="mb-3 mt-5 promo-container">
            <label for="title" class="promo-container-title">Promo Details</label>
            <div class="mb-4">
                <label for="title" class="input-title">TITLE</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            </div>

            <div class="mb-4">
                <label for="slug" class="input-title">SLUG (optional)</label>
                <div><small><label for="">Leave it blank for automatic generate.</label></small></div>
                <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
            </div>

            <div  class="mb-4">
                <label for="description" class="input-title">DESCRIPTION</label>
                <textarea style="height:150px" class="form-control" id="description" name="description">{{old('description')}}</textarea>
            </div>

            <div  class="mb-4">
                <label for="terms_and_conidtions" class="input-title">TERMS AND CONDITIONS</label>
                <textarea style="height:150px" class="form-control" id="terms_and_conditions" name="terms_and_conditions">{{old('terms_and_conditions')}}</textarea>
            </div>

            <div  class="mb-4">
                <label for="article" class="input-title">ARTICLE</label>
                <textarea style="height:150px" class="form-control" id="article" name="article">{{old('article')}}</textarea>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label for="prize_pool" class="input-title">Prize Pool</label>
                        <input type="text" class="form-control" id="prize_pool" name="prize_pool" value="{{old('prize_pool')}}">
                    </div>
                    <div class="col">
                        <label for="end_date" class="input-title">Status</label>
                        <select class="form-control" name="status" id="status" value="{{old('status')}}">
                            <option value="Inactive" @if(old('status') == "Inactive") selected @endif>Inactive</option>
                            <option value="Active" @if(old('status') == "Active") selected @endif>Active</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <div class="mb-3 mt-5 promo-container">
            <label for="platform" class="promo-container-title">Promo language</label>
            <div class="mb-3">
                <label for="platform" class="input-title">Language</label>
                <select required class="form-control" name="langauge" id="langauge" value="{{old('language')}}">
                    @foreach($languages as $langauge)
                        <option value="{{$langauge->id}}" @selected(old('langauge') == $langauge->id)>{{$langauge->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 mt-5 promo-container">
            <label for="" class="promo-container-title">Redirection Link (Button Settings)</label>
            <div class="mb-3">
                <label for="platform" class="input-title">Button name</label>
                <input type="text" name="button_name" class="form-control" value="{{old('button_name')}}">
            </div>
            <div class="mb-3">
                <label for="platform" class="input-title">Button link</label>
                <input type="text" name="button_link" class="form-control" value="{{old('button_link')}}">
            </div>
        </div>

        <div class="mb-3 mt-5 promo-container">
            <label for="platform" class="promo-container-title">Platform</label>
            <div class="mb-3">
                <label for="platform" class="input-title">Platform</label>
                    <select required class="form-control" name="platform" id="platform">
                @if(Auth::user()->isSuperAdmin())
                    @foreach($platforms as $platform)
                        <option value="{{$platform->id}}" @selected(old('platform') == $platform->id)>{{$platform->title}}</option>
                    @endforeach
                @else
                    @foreach($user_platforms->platforms as $platform)
                        <option value="{{$platform->id}}" @selected(old('platform') == $platform->id)>{{$platform->title}}</option>
                    @endforeach
                @endif
                </select>
            </div>

            <div class="mb-3">
                <label for="promo_type" class="input-title">Promo type</label>
                <select required class="form-control" name="type" id="promo_type" value="{{old('type')}}">
                    <option value="click_to_redirect" @if(old('type') == "click_to_redirect") selected @endif>Click to redirect</option>
                    <option value="click_to_redeem" @if(old('type') == "click_to_redeem") selected @endif>Click to redeem</option>
                    <option value="click_to_join" @if(old('type') == "click_to_join") selected @endif>Click to join</option> 
                </select>
            </div>

            <div class="mb-3" id="click_to_join" style="display:none">
                <label for="game_type" class="input-title">Game type</label>
                <select class="form-control" name="game_type" id="game_type" value="{{old('game_type')}}">
                    <option value="">Select Game type</option>
                    <option value="upload_image" @if(old('game_type') == "upload_image") selected @endif>Upload Image</option>
                    <option value="paste_retweet_url" @if(old('game_type') == "paste_retweet_url") selected @endif>Paste Retweet URL</option>
                    <option value="subscribe_newsletter" @if(old('game_type') == "subscribe_newsletter") selected @endif>Subscribe Newsletter</option>
                    <option value="multiple_choice" @if(old('game_type') == "multiple_choice") selected @endif>Multiple Choice</option>
                    <option value="leave_comment" @if(old('game_type') == "leave_comment") selected @endif>Leave Comment</option>
                </select>
            </div>
            
            <div id="click_to_redeem" class="mb-3" style="display:none;">
                <label for="" class="input-title"> <span class="input-sub-title">Youtube settings for click to redeem code</span></label>
                <div class="row">
                    <div class="col">
                        <label for="embedded_code" class="input-title">Embedded code link</label>
                        <input type="text" class="form-control" id="embedded_code" name="embedded_code">
                    </div>
                    <div class="col">
                        <label for="code_time_minutes" class="input-title">Time for code appearance</label>
                        <div class="row" style="width:300px;">
                            <div class="col">
                                <input type="text" placeholder="00" class="form-control" id="code_time_minutes" name="code_time_minutes" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" />
                                <label for="" class="input-title"><span class="input-sub-title">Mins</span></label>
                            </div>
                            <div class="col">
                                <input type="text" placeholder="00" class="form-control" id="code_time_seconds" name="code_time_seconds" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" /></span>
                                <label for="" class="input-title"><span class="input-sub-title">Secs</span></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3 mt-5 promo-container">
            <label for="promo_dates" class="promo-container-title">Promo Dates</label>
                    	
            <!--<div class="row mb-3">
            	<div class="col">
            		<label for="is_long_term_post" class="input-title">Is long term post?</label>
            		<select class="form-control" name="is_long_term_post" id="is_long_term_post" value="{{old('is_long_term_post')}}">
                    	<option value="no" @if(old('is_long_term_post') == "no") selected @endif>No</option>
                    	<option value="yes" @if(old('is_long_term_post') == "yes") selected @endif>Yes</option>
                	</select>
                </div>
            </div>-->
            <div class="row">
                <div class="col">
                    <label for="start_date" class="input-title">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{old('start_date')}}">
                </div>
                <div class="col">
                    <label for="end_date" class="input-title">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{old('end_date')}}">
                </div>
            </div>
        </div>
       
        <div class="mb-3 mt-5 promo-container">
            <label for="promo_image" class="promo-container-title">Promo Image</label>
            <div>
                <label for="image" class="input-title">Thumbnail</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
        </div>
    </div>
</div>
</form>


<script>
    function addQuestion () {
        const boxes = $('.question-box').length;
        const id = boxes + 1
        $("#question-container").append('<div id="qb'+id+'" class="question-box"><div class="question mb-2" style="display:flex; margin-top:30px"><input type="text" name="question[]" type="text" class="form-control me-2"/><span onclick="addChoices(this)" class="btn bg-primary text-white">Add Choices</span></div><div class="choices"></div></div>')
    }

    function addChoices (e) {
       const parentId = $(e).parent().parent().attr('id');
       $('#'+parentId+' .choices').append('<input name="choices[]" class="form-control mb-2 w-50" type="text"/>')
    }
</script>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).on('change','#promo_type',function(){
        if($(this).val() === "click_to_join"){
            $("#click_to_join").show()
        } else {
            $("#click_to_join").hide()
        }
    });
</script>

<script>
    $(document).on('change','#promo_type',function(){
        if($(this).val() === "click_to_redeem"){
            $("#click_to_redeem").show()
        } else {
            $("#click_to_redeem").hide()
        }
    });
</script>

<script>
    $(document).on('change','#game_type',function(){
        if($(this).val() === "multiple_choice"){
            $("#multiple_choice").show()
        } else {
            $("#multiple_choice").hide()
        }
    });
</script>

<script>
    $(document).ready(function () {
        if($("#promo_type option:selected").val() == "click_to_join") {
            $("#click_to_join").show();
        }

        if($("#game_type option:selected").val() == "multiple_choice") {
            $("#multiple_choice").show();
        }
    });
</script>


<script>
    $(document).ready(function(){
	
	$("#extend").click(function(e){
		e.preventDefault();
		$("#extend-field").append('<div class="d-flex mb-2"><input name="choices[]" class="form-control me-2" type="text"><a class="add-text-field"><span class="btn text-white bg-primary fw-bold me-2">+</span></a><a class="remove-extend-field"><span class="btn text-white bg-danger fw-bold">-</span></a>');
	});

	$("#extend-field").on("click",".add-text-field",function(e){
		e.preventDefault();
		$("#extend-field").append('<div class="d-flex mb-2"><input name="choices[]" class="form-control me-2" type="text"><a class="add-text-field"><span class="btn text-white bg-primary fw-bold me-2">+</span></a><a class="remove-extend-field"><span class="btn text-white bg-danger fw-bold">-</span></a>')
	});

	$("#extend-field").on("click",".remove-extend-field",function(e){
		e.preventDefault();
		$(this).parent('div').remove();
	});
});
</script>



<!--Clone div-->
<script>
    document.getElementById("add_question").onclick = function() {
        var question = document.getElementById("question");
        var question_section = document.getElementById("question_section");
        question.appendChild(question_section.cloneNode(true));
    }
</script>


@include('admin.partials.footer')