<div class="modal fade" id="deleteBlogModal" tabindex="-1" aria-labelledby="deleteBannerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            
            <div class="modal-header bg-custom-dark">
                <h5 class="modal-title fw-bold">Are you sure you want to delete?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/blog/delete" method="post">
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
    var deleteBlogModal = document.getElementById('deleteBlogModal')
    deleteBlogModal.addEventListener('show.bs.modal', function (event) {

    var button = event.relatedTarget

    var id = button.getAttribute('data-bs-id')
   
    var modalBodyID = deleteBlogModal.querySelector('.modal-body #id')

    modalBodyID.value = id
  
    });

</script>