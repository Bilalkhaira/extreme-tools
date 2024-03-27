<form name="productForm" method="POST" action="{{ route('blogUpdate') }}" enctype="multipart/form-data" id="prodForm">
    @csrf
    <span class='arrow'>
        <label class='error'></label>
    </span>
    <div class="modal-header">
        <h4 class="modal-title" id="ProductModalLabel">Edit Blog</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-kt-users-modal-action="close" data-bs-dismiss="modal" aria-label="Close">×</button>
    </div>
    <div class="modal-body">
        <div class="" id="ProductModalData">

            <br>
            <div class="mb-7">
                <label class="fs-6 fw-semibold mb-2">
                    <span>Blog Image</span>
                    <span class="ms-1" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg.">
                        <i class="ki-duotone ki-information fs-7">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                    </span>
                </label>
                <div class="mt-1">
                    <style>
                        .image-input-placeholder {
                            background-image: url('{{ image(' svg/files/blank-image.svg') }}');
                        }

                        [data-bs-theme="dark"] .image-input-placeholder {
                            background-image: url('{{ image(' svg/files/blank-image-dark.svg') }}');
                        }
                    </style>
                    <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                        <div class="image-input-wrapper w-125px h-125px" id="blogImg" style="background-image: url({{ asset('images/blog/'. $blog->img ?? '') }});"></div>
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                            <i class="ki-duotone ki-pencil fs-7">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                        </label>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-5">
                    <label> Title:</label>
                    <input type="text" id="input3" name="title" class="form-control" value="{{ $blog->title ?? '' }}" placeholder="Enter Title">
                    <input type="hidden" id="updateId" value="{{ $blog->id ?? '' }}" name="updateId">
                </div>

                <div class="col-lg-12 mb-5">
                    <label> Description:</label>
                    <textarea name="description" id="summernote1">{{ $blog->description ?? '' }}</textarea>
                </div>
                <div class="col-lg-12 mb-5">
                    <label> Select Categories:</label>
                    <select id="select-categories1" name="categories[]" placeholder="Select courses..." autocomplete="off" class="form-control" multiple>
                        @if(!empty($categories))
                        @foreach($categories as $category)
                        <option @if(in_array($category->id, json_decode($blog->categories))) ? selected : '' @endif value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-lg-12 mb-5">
                    <label> Select Tags:</label>
                    <select id="select-tags1" name="tags[]" placeholder="Select courses..." autocomplete="off" class="form-control" multiple>
                        @if(!empty($tags))
                        @foreach($tags as $tag)
                        <option @if(in_array($tag->id, json_decode($blog->tags))) ? selected : '' @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-lg-12 mb-5">
                    <label> Slug:</label>
                    <input id="input4" type="text" name="slug" class="form-control" value="{{ $blog->slug ?? '' }}" required>
                </div>
            </div>


        </div>


    </div>
    <div class="modal-footer" id="ProductModalFooter">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" data-kt-users-modal-action="cancel">Discard</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close" data-kt-users-modal-action="cancel">
            <span class="indicator-label">Submit</span>
            <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>

    </div>
</form>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
     $('#summernote1').summernote({
       tabsize: 2,
       height: 120,
       toolbar: [
         ['style', ['style']],
         ['font', ['bold', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['table', ['table']],
         ['insert', ['link', 'picture', 'video']],
         ['view', ['fullscreen', 'codeview', 'help']]
       ]
     });
</script>

<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<script>
    new TomSelect('#select-categories1', {
        maxItems: 10,
    });

    new TomSelect('#select-tags1', {
        maxItems: 10,
    });


    // var input3 = document.getElementById("input3");
    // var input4 = document.getElementById("input4");

    // input3.addEventListener("input", function() {
    //     var valueWithSpaces = input1.value;
    //     var modifiedValue = valueWithSpaces.replace(/\s+/g, '-').toLowerCase();
    //     input4.value = modifiedValue;
    // });
</script>