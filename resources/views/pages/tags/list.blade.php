<x-default-layout>

    @section('title')
    Tags
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('tags') }}
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Tag" id="mySearchInput" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <a type="button" class="btn btn-primary theme_btn_bg" onclick="AddProduct()" data-bs-toggle="modal" data-bs-target="#ProductModal">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Tag
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
    <div id="ProductModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true" aria-hidden="true" style="color: black;">
        <div class="modal-dialog modal-lg" id="ProductModalDialog">
            <div class="modal-content" id="ProductModalContent">

                <form name="productForm" method="POST" action="{{ route('tags.store') }}" id="prodForm">
                    @csrf
                    <span class='arrow'>
                        <label class='error'></label>
                    </span>
                    <div class="modal-header">
                        <h4 class="modal-title" id="ProductModalLabel">Add Tag</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-kt-users-modal-action="close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="" id="ProductModalData">

                            <div class="row">
                                <div class="col-lg-12 mb-5">
                                    <label> Name:</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Name" required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="ProductModalFooter">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" data-kt-users-modal-action="cancel">Discard</button>
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
    <div id="EditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true" aria-hidden="true" style="color: black;">
        <div class="modal-dialog modal-lg" id="ProductModalDialog">
            <div class="modal-content" id="BlogModalData">

                <form name="productForm" method="POST" action="{{ route('tags.update') }}" enctype="multipart/form-data" id="prodForm">
                    @csrf
                    <span class='arrow'>
                        <label class='error'></label>
                    </span>
                    <div class="modal-header">
                        <h4 class="modal-title" id="ProductModalLabel">Edit Tag</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-kt-users-modal-action="close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="" id="ProductModalData">

                            <div class="row">
                                <div class="col-lg-12 mb-5">
                                    <label> Title:</label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title">
                                    <input type="hidden" id="updateId" name="updateId">
                                </div>

                            </div>


                        </div>


                    </div>
                    <div class="modal-footer" id="ProductModalFooter">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" data-kt-users-modal-action="cancel">Discard</button>
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

    @push('scripts')
    {{ $dataTable->scripts() }}
   
    
    <script>
       
        document.getElementById('mySearchInput').addEventListener('keyup', function() {
            window.LaravelDataTables['tags-table'].search(this.value).draw();
        });
        document.addEventListener('livewire:load', function() {
            Livewire.on('success', function() {
                $('#kt_modal_add_user').modal('hide');
                window.LaravelDataTables['tags-table'].ajax.reload();
            });
        });

        function AddProduct() {
            $('#ProductModal').modal('show');
        }

        function EditBlog(anchor) {
            var categoryId = anchor.parentElement.querySelector("#blogUpdatedId").value;
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                url: "/tags/" + categoryId + "/edit",
                type: "GET",
                dataType: "json",

                success: function(data) {
                    $('body').find('#title').val(data.name);
                    $('body').find('#updateId').val(data.id);
                    $('#EditModal').modal('show');
                }
                
            });
        }
    </script>
    @endpush
</x-default-layout>