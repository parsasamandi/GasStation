{{-- Delete modal --}}
<div id="confirmationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h5 class="mb-0">Do you confirm to delete this {{ $title }}?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" id="deleteSubmission" class="btn btn-danger">Confirm</button>
                <button type="button" class="btn btn-opaque close" data-dismiss="modal">Cancel</button>
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
            </div>
        </div>
    </div>
</div>

