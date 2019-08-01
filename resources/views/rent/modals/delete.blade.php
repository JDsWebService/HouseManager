<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Rent Entry?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete the Rent Entry for {{ $payment->occupant->fullName }}? This action can not be undone.
      </div>
      <div class="modal-footer">
        {{ Form::open(['route' => ['rent.destroy', $payment->id ], 'method' => 'DELETE']) }}
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>