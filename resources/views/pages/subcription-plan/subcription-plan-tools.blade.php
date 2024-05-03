<form name="productForm" method="POST" action="{{ route('subcription-plan.tools.update') }}" id="prodForm">
    @csrf
    <span class='arrow'>
        <label class='error'></label>
    </span>
    <div class="modal-header">
        <h4 class="modal-title" id="ProductModalLabel">Manage Tools With {{ $plan->name ?? '' }} Plan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-kt-users-modal-action="close" data-bs-dismiss="modal" aria-label="Close">×</button>
    </div>
    <div class="modal-body">
       
        <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th><b>Tool Name</b></th>
                <th><b>Set Tool Quota</b></th>
              </tr>
            </thead>
            <tbody>
                @if(!empty($allTools))
                @foreach($allTools as $tool)
                    <tr>
                        <td>{{ $tool->tool_name ?? '' }}</td>
                        <td>
                            <input type="number" name="tools_quota[]" class="form-control" value="{{ $tool->tool_quota ? : 0 }}">
                            <input type="hidden" name="tool_ids[]" class="form-control" value="{{ $tool->tool_id ?? '' }}">
                        </td>
                    </tr>
                @endforeach
                @endif
                <input type="hidden" name="planId" value="{{ $plan->id ?? '' }}">
            </tbody>
          </table>
    </div>
    
    <div class="modal-footer" id="ProductModalFooter">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" data-kt-users-modal-action="cancel">Discard</button>
        <button type="submit" class="btn btn-primary theme_btn_bg" data-bs-dismiss="modal" aria-label="Close" data-kt-users-modal-action="cancel">
            <span class="indicator-label">Submit</span>
        </button>

    </div>
</form>