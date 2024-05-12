<form class="form" method="POST" action="{{ route('updateAdminUser') }}" id="kt_modal_update_user_form" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="row mb-5">
            <div class="col-md-6">
                <a type="button" class="addMediaBtn1 btn btn-primary theme_btn_bg btn-sm">
                    Profile Image
                </a>
                <div class="row appearMedia">
                    <div class="col-md-6 mb-5">
                        <div class="card">
                            <input type="hidden" name="media[]" id="" value="{{ $user->avatar ?? '' }}">
                            <img height="114px" src="{{ $user->avatar ?? '' }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="updatedId" value="{{ $user->id ?? '' }}">
        <div class="fv-row mb-7">
            <label class="required fw-semibold fs-6 mb-2">Full Name</label>
            <input type="text" name="name" value="{{ $user->name ?? '' }}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name"/>
            
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-semibold fs-6 mb-2">Email</label>
            <input type="email" name="email" value="{{ $user->email ?? '' }}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com"/>
           
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-semibold fs-6 mb-2">Phone</label>
            <input type="number" name="phone_no" value="{{ $user->phone_no ?? '' }}" class="form-control form-control-solid mb-3 mb-lg-0"/>
        </div>

        <div class="fv-row mb-7">
            <label class="required fw-semibold fs-6 mb-2">Address</label>
            <input type="text" name="address" value="{{ $user->address ?? '' }}" class="form-control form-control-solid mb-3 mb-lg-0"/>
        </div>
        
    </div>
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" wire:loading.attr="disabled">Discard</button>
        <button type="submit" class="btn btn-primary theme_btn_bg" data-kt-users-modal-action="submit">
            <span class="indicator-label" wire:loading.remove>Submit</span>
            <span class="indicator-progress" wire:loading wire:target="submit">
                Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
    </div>
</form>
@include('pages.apps/user-management/users/media/mediaModel1')
<script>
     $('.addMediaBtn1').click(function() {
        $('#mediaModel1').modal('show');
    });
</script>