 <!-- Delete Modal -->
 <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center">
          <h5 class="modal-title" id="exampleModalLongTitle">DELETE!!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex flex-column align-items-center">
            <h1 class="display-3"><i class="fas fa-exclamation-triangle text-danger"></i></h1>
            <h6 class="p-1">Are you sure?</h6>
            <h6 class="p-1">Data will be deleted permanently!!</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action={{$slot}}  method="POST">
            @csrf
            @method('DELETE')
                <button class="btn btn-primary">OK</button>
            </form>
        </div>
      </div>
    </div>
</div>
