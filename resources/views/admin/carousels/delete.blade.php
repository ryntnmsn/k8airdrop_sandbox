<div class="modal fade" id="deleteCarouselModal" tabindex="-1" aria-labelledby="deleteBCarouselLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            
            <div class="modal-header bg-custom-dark">
                <h5 class="modal-title fw-bold">Are you sure you want to delete?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/carousels/delete" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <input type="hidden" name="id" value="" id="id"> 
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
    var deleteCarouselModal = document.getElementById('deleteCarouselModal')
    deleteCarouselModal.addEventListener('show.bs.modal', function (event) {

    var button = event.relatedTarget

    var id = button.getAttribute('data-bs-id')
   
    var modalBodyID = deleteCarouselModal.querySelector('.modal-body #id')

    modalBodyID.value = id
  
    });

</script>