@include('admin.partials.header')
@include('admin.partials.nav')
@include('admin.promo.questions.delete')

<div class="row">
    <div class="col">
        <div><h3>Edit Question</h3></div>
      
    </div>
    <div class="col text-end">
        {{-- <button type="button" class="btn text-white bg-primary fw-bold" data-bs-toggle="modal" data-bs-target="#createQuestionModal">
            Add new
        </button> --}}
    </div>
</div>
<x-messages/>
<div class="row pt-3">
    <div class="col">
        <div class="p-3"  style="border-left: 5px solid #5f6982; padding:10px; background:#fff; border:1px solid #eaeaea">
            <h6>Create Question</h6>
            <div class="row">
                <div id="question">
                    <div id="question_section">

                        {{-- EDIT QUESTION --}}
                        <form action="/admin/airdrop/promo/manage_question/{{$question->id}}/update" method="post">
                            @csrf
                            @method('PUT')
                            <div class="d-flex justify-end">
                                <div class="w-100 me-2">
                                 
                                    <input name="question"
                                    required
                                    type="text"
                                    class="form-control me-2 mb-2 p-2 questionaire-input"
                                    placeholder="Question title*"
                                    value="{{$question->question}}">
                                </div>
                                <div class="px-4">
                                    <select name="type" id="" class="p-2" style="border:1px solid #c6c6c6; border-radius:4px">
                                        <option value="single_select" @if($question->type == 'single_select') selected @endif>Single Select</option>
                                        <option value="multiple_select" @if($question->type == 'multiple_select') selected @endif>Multiple Select</option>
                                        <option value="comment" @if($question->type == 'comment') selected @endif>Comment</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <span id="extend" class="questionaire-add-option">+ Add options</span>
                                </div>
                            </div>
                            <div>
                                <div id="extend-field">
                                    @foreach($question->choices as $choice)
                                        <div id="choice_container" class="d-flex mb-2">
                                            <input required name="choices[]" placeholder="Add option here..." class="form-control me-2 choice-input" type="text" value="{{$choice->choice}}">
                                            <a class="add-text-field"><span class="option-btn">+</span></a>
                                            <a class="remove-extend-field"><span class="option-btn">-</span></a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="questionaire-save-btn">Save changes</button>
                            </div>
                            </form>
                            <div class="mt-2">
                                <button type="submit" class="questionaire-save-btn"  data-bs-toggle="modal" data-bs-id="{{$question->id}}" data-bs-promo_id="{{$question->promo_id}}" data-bs-target="#deleteQuestionModal">Delete</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
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