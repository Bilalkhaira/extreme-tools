<x-default-layout>

    @section('title')
    Blogs
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('blogs') }}
    @endsection
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Blog" id="mySearchInput" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <a type="button" class="btn btn-primary bgColor" onclick="AddProduct()" data-bs-toggle="modal" data-bs-target="#ProductModal">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Blog
                    </a>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Modal-->
                <livewire:user.add-user-modal></livewire:user.add-user-modal>
                <!--end::Modal-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <div id="ProductModal" class="modal fade show " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true" aria-hidden="true" style="color: black;">
        <div class="modal-dialog modal-lg" id="ProductModalDialog">
            <div class="modal-content" id="ProductModalContent">

                <form name="productForm" method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data" id="prodForm">
                    @csrf
                    <span class='arrow'>
                        <label class='error'></label>
                    </span>
                    <div class="modal-header">
                        <h4 class="modal-title" id="ProductModalLabel">Add Blog</h4>
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
                                        <div class="image-input-wrapper w-125px h-125px"></div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" required/>
                                        </label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mb-5">
                                    <label> Title:</label>
                                    <input id="input1" type="text" name="title" class="form-control" placeholder="Enter Title" required>
                                </div>

                                <div class="col-lg-12 mb-5">
                                    <label> Description:</label>
                                    <textarea name="description" id="summernote"></textarea>
                                </div>
                                <div class="col-lg-12 mb-5">
                                    <label> Select Categories:</label>
                                    <select id="select-categories" name="categories[]" placeholder="Select courses..." autocomplete="off" class="form-control" multiple>
                                        @if(!empty($categories))
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-lg-12 mb-5">
                                    <label> Select Tags:</label>
                                    <select id="select-tags" name="tags[]" placeholder="Select courses..." autocomplete="off" class="form-control" multiple>
                                        @if(!empty($tags))
                                        @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-lg-12 mb-5">
                                    <label> Slug:</label>
                                    <input id="input2" type="text" name="slug" class="form-control" required>
                                </div>
                               
                            </div>


                        </div>


                    </div>
                    <div class="modal-footer" id="ProductModalFooter">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" data-kt-users-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>

                    </div>
                </form>


            </div>
        </div>
    </div>
    <div id="EditModal" class="modal fade show " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true" aria-hidden="true" style="color: black;">
        <div class="modal-dialog modal-lg" id="ProductModalDialog">
            <div class="modal-content" id="BlogModalData">

                {{-- <form name="productForm" method="POST" action="{{ route('blogUpdate') }}" enctype="multipart/form-data" id="prodForm">
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
                                        <div class="image-input-wrapper w-125px h-125px" id="blogImg"></div>
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
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title">
                                    <input type="hidden" id="updateId" name="updateId">
                                </div>

                                <div class="col-lg-12">
                                    <label> Description:</label>
                                    <textarea name="description" id="summernote1"></textarea>
                                </div>
                            </div>


                        </div>


                    </div>
                    <div class="modal-footer" id="ProductModalFooter">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" data-kt-users-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>

                    </div>
                </form> --}}


            </div>
        </div>
    </div>

    @push('scripts')
    {{ $dataTable->scripts() }}
   
    
    <script>
        var input1 = document.getElementById("input1");
        var input2 = document.getElementById("input2");

        input1.addEventListener("input", function() {
            var valueWithSpaces = input1.value;
            var modifiedValue = valueWithSpaces.replace(/\s+/g, '-').toLowerCase();
            input2.value = modifiedValue;
        });


        document.getElementById('mySearchInput').addEventListener('keyup', function() {
            window.LaravelDataTables['blogs-table'].search(this.value).draw();
        });
        document.addEventListener('livewire:load', function() {
            Livewire.on('success', function() {
                $('#kt_modal_add_user').modal('hide');
                window.LaravelDataTables['blogs-table'].ajax.reload();
            });
        });




        function AddProduct() {
            $('#ProductModal').modal('show');
        }

        function EditBlog(anchor) {
            $('#EditModal').modal('show');
            var blogId = anchor.parentElement.querySelector("#blogUpdatedId").value;
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                // url: "/blogs/" + blogId + "/edit",
                // type: "GET",
                // dataType: "json",

                // success: function(data) {
                //     $('#EditModal').modal('show');
                //     $('body').find('#title').val(data.title);
                //     $('#summernote1').val(data.description);
                //     $('body').find('#updateId').val(data.id);

                //     var path = "{{ asset('images/blog/') }}"+"/"+data.img;
                //     var element = document.getElementById("blogImg");
                //     element.style.backgroundImage = "url("+ path + ")";
                // }

                
                method: 'POST',
                url: "{{ route('blogs.edit') }}",
                dataType: 'html',
                data: { blogId: blogId },
                success: function(result) {
                    $('#BlogModalData').html('');
                    if (result) {
                        $('#BlogModalData').html(result);
                    }
                },
            });
        }
    </script>
 {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
     $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
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
    new TomSelect('#select-categories', {
        maxItems: 10,
    });

    new TomSelect('#select-tags', {
        maxItems: 10,
    });
</script>

    @endpush

</x-default-layout>