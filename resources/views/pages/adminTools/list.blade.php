<x-default-layout>

    @section('title')
        Tools
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('tools') }}
    @endsection
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search Tools"
                        id="mySearchInput" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <a type="button" class="btn btn-primary theme_btn_bg" onclick="AddProduct()" data-bs-toggle="modal"
                        data-bs-target="#ProductModal">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Tool
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
    <div id="ProductModal" class="modal fade show " tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-modal="true" aria-hidden="true" style="color: black;">
        <div class="modal-dialog modal-lg" id="ProductModalDialog">
            <div class="modal-content" id="ProductModalContent">

                <form name="productForm" method="POST" action="{{ route('tools.store') }}"
                    enctype="multipart/form-data" id="prodForm">
                    @csrf
                    <span class='arrow'>
                        <label class='error'></label>
                    </span>
                    <div class="modal-header">
                        <h4 class="modal-title" id="ProductModalLabel">Add Tool</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                            data-kt-users-modal-action="close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="" id="ProductModalData">

                            <div class="row">
                                {{-- <div class="col-md-6">
                                    <div class="mb-7">
                                        <label class="fs-6 fw-semibold mb-2">
                                            <span>Tool Thumbnail</span>
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
                                </div> --}}
                                <div class="col-md-12 mb-10">
                                    <a type="button" class="addMediaBtns btn btn-primary theme_btn_bg btn-sm">
                                        Add Media
                                    </a>
                                    <div class="row appearMedia"></div>
                                    <p class="small">Media size will be 960/460</p>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12 mb-5">
                                    <label> Title:</label>
                                    <input id="input1" type="text" name="title" class="form-control"
                                        placeholder="Enter Title" required>
                                </div>

                                <div class="col-lg-12 mb-5">
                                    <label> Url:</label>
                                    <input id="url" type="text" name="url" class="form-control"
                                        placeholder="Enter url" required>
                                </div>

                                <div class="col-lg-12 mb-5">
                                    <label> Description:</label>
                                    <textarea name="description" id="summernote" class="form-control" rows="4" cols="12"></textarea>
                                </div>

                            </div>


                        </div>


                    </div>
                    <div class="modal-footer" id="ProductModalFooter">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close"
                            data-kt-users-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary theme_btn_bg" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>

                    </div>
                </form>


            </div>
        </div>
    </div>
    <div id="EditModal" class="modal fade show " tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-modal="true" aria-hidden="true" style="color: black;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="BlogModalData">
                <form name="productForm" method="POST" action="{{ route('toolUpdate') }}"
                    enctype="multipart/form-data" id="prodForm">
                    @csrf
                    <span class='arrow'>
                        <label class='error'></label>
                    </span>
                    <div class="modal-header">
                        <h4 class="modal-title" id="ProductModalLabel">Edit Tool</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                            data-kt-users-modal-action="close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="" id="ProductModalData">
                            <div class="row">
                                {{-- <div class="col-md-6">
                                    <div class="mb-7">
                                        <label class="fs-6 fw-semibold mb-2">
                                            <span>Tool Thumbnail</span>
                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Allowed file types: png, jpg, jpeg.">
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
                                            <div class="image-input image-input-outline image-input-placeholder"
                                                data-kt-image-input="true">
                                                <div class="image-input-wrapper w-125px h-125px" id="blogImg"></div>
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Change avatar">
                                                    <i class="ki-duotone ki-pencil fs-7">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <input type="file" name="avatar"
                                                        accept=".png, .jpg, .jpeg" />
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-12 mb-10">
                                    <a type="button" class="addMediaBtns btn btn-primary theme_btn_bg btn-sm">
                                        Add Media
                                    </a>
                                    <div class="row appearMedia"></div>
                                    <p class="small">Media size will be 960/460</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mb-5">
                                    <label> Title:</label>
                                    <input id="edittitle" type="text" name="title" class="form-control"
                                        placeholder="Enter Title" required>
                                </div>

                                <div class="col-lg-12 mb-5">
                                    <label> Url:</label>
                                    <input id="editurl" type="text" name="url" class="form-control"
                                        placeholder="Enter url" required>
                                    <input type="hidden" id="updateId" name="updateId">
                                </div>

                                <div class="col-lg-12 mb-5">
                                    <label> Description:</label>
                                    <textarea name="description" class="form-control" rows="4" cols="12" id="summernote1"></textarea>
                                </div>

                            </div>


                        </div>


                    </div>
                    <div class="modal-footer" id="ProductModalFooter">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close"
                            data-kt-users-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary theme_btn_bg"
                            data-kt-users-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('pages.adminTools.media.mediaModel');

    @push('scripts')
        {{ $dataTable->scripts() }}


        <script>
            $('.addMediaBtns').click(function() {
                $('#mediaModel1').modal('show');
            });
            document.getElementById('mySearchInput').addEventListener('keyup', function() {
                window.LaravelDataTables['admin_tools-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:load', function() {
                Livewire.on('success', function() {
                    $('#kt_modal_add_user').modal('hide');
                    window.LaravelDataTables['admin_tools-table'].ajax.reload();
                });
            });

            function AddProduct() {
                $('#ProductModal').modal('show');
                $('.appearMedia').html('');
            }


            function EditBlog(anchor) {
                $('#EditModal').modal('show');
                var toolId = anchor.parentElement.querySelector("#blogUpdatedId").value;
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                $.ajax({
                    url: "/tools/" + toolId + "/edit",
                    type: "GET",
                    dataType: "json",

                    success: function(data) {
                        $('#EditModal').modal('show');
                        $('#edittitle').val(data.title);
                        $('#editurl').val(data.url);
                        $('#summernote1').val(data.description);
                        $('body').find('#updateId').val(data.id);

                        // var path = "{{ asset('images/tools/') }}" + "/" + data.img;
                        // var element = document.getElementById("blogImg");
                        // element.style.backgroundImage = "url(" + path + ")";

                        var appendData = '<div class="col-md-3 mb-5"><div class="card"><input type="hidden" name="media_url" id="" value="'+ data.img +'"><img height="114px" src="'+ data.img +'" alt=""></div></div>';
                        $('.appearMedia').html(appendData);
                    }
                });
            }
        </script>
    @endpush

</x-default-layout>
