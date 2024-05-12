<div id="mediaModel" class="modal fade show " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true"
    aria-hidden="true" style="color: black;">
    <div class="modal-dialog modal-xl" id="ProductModalDialog">
        <div class="modal-content" id="ProductModalContent">

            <form name="productForm" method="POST" action="{{ route('tools.store') }}" enctype="multipart/form-data"
                id="prodForm">
                @csrf
                <span class='arrow'>
                    <label class='error'></label>
                </span>
                <div class="modal-header">
                    <h4 class="modal-title" id="ProductModalLabel">Add Media</h4>
                    <button type="button" class="close clearMedia" data-dismiss="modal" aria-hidden="true"
                        data-kt-users-modal-action="close" data-bs-dismiss="modal" aria-label="Close">×</button>

                </div>
                <div class="modal-body">
                    @php
                        $mediaFiles = App\Models\Media::all();
                    @endphp
                    <div class="row">
                        @if(!empty($mediaFiles))
                        @foreach($mediaFiles as $media)
                            <div class="col-lg-3 mb-5">
                                <div class="card media_model_card">
                                    <input class="mediaCheckbox" type="checkbox" name="" id="" value="{{ $media->url ?? '' }}">
                                    <img height="172px" src="{{ $media->url ?? '' }}" alt="">
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>

                </div>
                <div class="modal-footer" id="ProductModalFooter">
                    <button type="reset" class="btn btn-light me-3 clearMedia" data-bs-dismiss="modal" aria-label="Close"
                        data-kt-users-modal-action="cancel">Discard</button>
                    <button type="button" class="btn btn-primary theme_btn_bg" data-bs-dismiss="modal" aria-label="Close"
                    data-kt-users-modal-action="cancel">
                        <span class="indicator-label">Insert Media</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>

                </div>
            </form>


        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.media_model_card').click(function() {
            $('.mediaCheckbox').prop('checked', false);
            $('.media_model_card').removeClass('mediaActive');
            var checkbox = $(this).closest('div').find('input');
            checkbox.prop('checked', true);
            $(this).closest('div').addClass('mediaActive');
            var appendData = '<div class="col-md-6 mb-5"><div class="card"><input type="hidden" name="thumbnail" id="" value="'+ checkbox.val() +'"><img height="114px" src="'+ checkbox.val() +'" alt=""></div></div>';
            // $('.appearMedia').append(appendData);
            $('.appearMedia').html(appendData);
        });
    });
        $('.clearMedia').click(function() {
            $('.appearMedia').html('');
            $('.mediaCheckbox').prop('checked', false);
            $('.media_model_card').removeClass('mediaActive');
            // var modal = $(this).closest('#mediaModel'); 
            // if (modal.length) {
            //     modal.modal('hide'); 
            // }
        });
</script>
