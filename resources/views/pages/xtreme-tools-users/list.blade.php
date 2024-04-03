<x-default-layout>
    @section('title')
    Xtreme Tools Users
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('xtreme-tools-users') }}
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Users" id="mySearchInput" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    {{-- <a type="button" class="btn btn-primary bgColor" onclick="AddProduct()" data-bs-toggle="modal" data-bs-target="#ProductModal">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Category
                    </a> --}}
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
    <div id="EditModal" class="modal fade show " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true" aria-hidden="true" style="color: black;">
        <div class="modal-dialog modal-lg" id="ProductModalDialog">
            <div class="modal-content" id="BlogModalData">

                <form name="productForm" method="POST" action="{{ route('xtreme-tools-users.update') }}" id="prodForm">
                    @csrf
                    <span class='arrow'>
                        <label class='error'></label>
                    </span>
                    <div class="modal-header">
                        <h4 class="modal-title" id="ProductModalLabel">Update Plan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-kt-users-modal-action="close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="" id="ProductModalData">

                            <div class="row">
                                <div class="col-lg-12 mb-5">
                                    <label>Select Plan:</label>
                                    <select name="planId" id="planId" class="form-control" style="padding: 5px">
                                        @if(!empty($plans))
                                        @foreach($plans as $plan)
                                        <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <input type="hidden" id="updateId" name="updateId">
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

    @push('scripts')
    {{ $dataTable->scripts() }}
   
    
    <script>
       
        document.getElementById('mySearchInput').addEventListener('keyup', function() {
            window.LaravelDataTables['user-table'].search(this.value).draw();
        });
        document.addEventListener('livewire:load', function() {
            Livewire.on('success', function() {
                $('#kt_modal_add_user').modal('hide');
                window.LaravelDataTables['user-table'].ajax.reload();
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
                url: "/xtreme-tools-users/" + categoryId + "/edit",
                type: "GET",
                dataType: "json",

                success: function(data) {
                    $('#EditModal').modal('show');
                    $('body').find('#planId').val(data.user_plan);
                    $('body').find('#updateId').val(data.uid);
                }
                
            });
        }
    </script>
    @endpush

</x-default-layout>