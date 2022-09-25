!-- Modal Creation -->
<div id="formModal" class="modal fade" data-toggle="modal">
  <div class="modal-dialog {{ $size }}">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body text-right">
        {{-- Form --}}
        <form id="{{ $formId ?? null }}" class="form-horizontal" enctype="multipart/form-data">
          <span id="form_output"></span>

          {{ $content ?? null }}
          <br />
          
          {{-- Buttons --}}
          <div class="form-group text-center">
            <input type="hidden" name="id" id="id" value="" />
            <input type="hidden" name="button_action" id="button_action" value="insert" />
            <input type="submit" name="action" id="action" class="btn btn-success" value="تایید" />
            <button type="button" class="btn btn-danger" data-dismiss="modal">خروج</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>