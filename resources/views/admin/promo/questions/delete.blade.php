<div class="modal fade" id="deleteQuestionModal" tabindex="-1" aria-labelledby="deleteQuestionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            
            <div class="modal-header bg-custom-dark">
                <h5 class="modal-title fw-bold">Are you sure you want to delete?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/airdrop/promo/manage_question/delete" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <input type="hidden" name="question_id" value="" id="id"> 
                    <input type="hidden" name="promo_id" value="" id="promo_id"> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close-modal"  data-bs-dismiss="modal" aria-label="Close">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    var deleteQuestionModal = document.getElementById('deleteQuestionModal')
    deleteQuestionModal.addEventListener('show.bs.modal', function (event) {

    var button = event.relatedTarget
    var id = button.getAttribute('data-bs-id')
    var promo_id = button.getAttribute('data-bs-promo_id')
   
    var modalBodyID = deleteQuestionModal.querySelector('.modal-body #id')
    var modalBodyPromoID = deleteQuestionModal.querySelector('.modal-body #promo_id')

    modalBodyID.value = id
    modalBodyPromoID.value = promo_id
  
    });

</script>