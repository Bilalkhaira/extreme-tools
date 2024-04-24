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
        <div class="row tools_main">
            @foreach($allTools as $key => $tool)
            <div class="col-md-3">
                <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" name="checkbox[{{ $tool->id }}]" class="form-check-input" value="{{ in_array($tool->id, $alreadySelectedTools) ? true : false }}" {{ in_array($tool->id, $alreadySelectedTools) ? 'checked' : '' }}>{{ $tool->name ?? '' }}
                    </label>
                  </div>
            </div>
            @endforeach
            <input type="hidden" name="planId" value="{{ $plan->id ?? '' }}">
        </div>
        
    </div>
    
    <div class="modal-footer" id="ProductModalFooter">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" data-kt-users-modal-action="cancel">Discard</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close" data-kt-users-modal-action="cancel">
            <span class="indicator-label">Submit</span>
        </button>

    </div>
</form>