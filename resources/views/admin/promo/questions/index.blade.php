@include('admin.partials.header')
@include('admin.partials.nav')
@include('admin.promo.questions.delete')



<div class="row">
    <div class="col">
        <div><h3>{{$promos->title}}</h3></div>
    </div>
    <div class="col text-end">
        {{-- <button type="button" class="btn text-white bg-primary fw-bold" data-bs-toggle="modal" data-bs-target="#createQuestionModal">
            Add new
        </button> --}}
    </div>
</div>
<x-error/>
<div class="row pt-3">
    <div class="col">
        <div class="p-3"  style="border-left: 5px solid #5f6982; padding:10px; background:#fff; border:1px solid #eaeaea">
            <h6>Create Question</h6>
            <div class="row">
                <div id="question">
                    <div id="question_section">

                        {{-- CREATE QUESTION --}}
                        <form action="/admin/airdrop/promo/manage_question/store" method="post">
                            @csrf
                            <div class="d-flex justify-end">
                                <div class="me-2 w-100">
                                    <input type="hidden" name="promo_url_id" value="{{$promos->url_id}}">
                                    <input type="hidden" name="promo_id" value="{{$promos->id}}">
                                    <input type="hidden" name="language_id" value="{{$promos->language_id}}">
                                    <input name="question"
                                    required
                                    type="text"
                                    class="form-control me-2 mb-2 p-2 questionaire-input"
                                    placeholder="Question title*">
                                </div>
                                <div class="px-4">
                                    <select name="type" id="" class="p-2" style="border:1px solid #c6c6c6; border-radius:4px">
                                        <option value="single_select">Single Select</option>
                                        <option value="multiple_select">Multiple Select</option>
                                        <option value="comment">Comment</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <span id="extend" class="questionaire-add-option">+ Add options</span>
                                </div>
                            </div>
                            <div>
                                <div id="extend-field"></div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="questionaire-save-btn">Save Question</button>
                            </div>
                        </form>

                    </div>
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
                    <td>Question</td>
                    <td>Type</td>
                    <td>Date Created</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if($questions->count() == 0)
                    <tr>
                        <td colspan="4">
                            No questions available.
                        </td>
                    </tr>
                @else
                    @foreach($questions as $question)
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td>{{$question->question}}</td>
                            <td>{{$question->type}}</td>
                            <td>{{$question->created_at}}</td>
                            <td>
                                <span>
                                    <a href="/admin/airdrop/promo/manage_question/{{$question->id}}/edit" class="btn bg-transparent">
                                        <i class="text-dark-2 fa-solid fa-pen-to-square"></i>
                                    </a>
                                </span>
                                <span>
                                    
                                    <button class="btn bg-transparent" data-bs-toggle="modal" data-bs-id="{{$question->id}}" data-bs-promo_id="{{$promos->id}}" data-bs-target="#deleteQuestionModal">
                                        <i class="text-dark-2 fa-solid fa-trash-can"></i>
                                    </button>
                                    
                                </span>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@include('admin.partials.footer')


<script>
    $(document).ready(function(){
	
	$("#extend").click(function(e){
		e.preventDefault();
		$("#extend-field").append('<div id="choice_container" class="d-flex mb-2"><input required name="choices[]" placeholder="Add option here..." class="form-control me-2 choice-input" type="text"><a class="add-text-field"><span class="option-btn">+</span></a><a class="remove-extend-field"><span class="option-btn">-</span></a></div>');
	});

	$("#extend-field").on("click",".add-text-field",function(e){
		e.preventDefault();
		$("#extend-field").append('<div id="choice_container" class="d-flex mb-2"><input required name="choices[]" placeholder="Add option here..." class="form-control me-2 choice-input" type="text"><a class="add-text-field"><span class="option-btn">+</span></a><a class="remove-extend-field"><span class="option-btn">-</span></a></div>')
	});

	$("#extend-field").on("click",".remove-extend-field",function(e){
		e.preventDefault();
		$(this).parent('div').remove();
	});
});
</script>