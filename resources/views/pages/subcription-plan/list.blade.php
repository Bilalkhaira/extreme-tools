<x-default-layout>

    @section('title')
        Plans
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('subcription-plan') }}
    @endsection

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search Plan"
                        id="mySearchInput" />
                </div>
            </div>

            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <a type="button" class="btn btn-primary theme_btn_bg" onclick="AddProduct()" data-bs-toggle="modal"
                        data-bs-target="#ProductModal">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Plan
                    </a>
                </div>

                <livewire:user.add-user-modal></livewire:user.add-user-modal>
            </div>
        </div>

        <div class="card-body py-4">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
    <div id="ProductModal" class="modal fade show planModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-modal="true" aria-hidden="true" style="color: black;">
        <div class="modal-dialog modal-lg" id="ProductModalDialog">
            <div class="modal-content" id="ProductModalContent">

                <form name="productForm" method="POST" action="{{ route('subcription-plan.store') }}" id="prodForm">
                    @csrf
                    @method('POST')

                    <div class="modal-header">
                        <h4 class="modal-title" id="ProductModalLabel">Add Plan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                            data-kt-users-modal-action="close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="" id="ProductModalData">
                            <div class="row">
                                <div class="col-lg-12 mb-5">
                                    <label> <b>Choose Plan:</b></label>
                                </div>
                            </div>
                            <div class="row mb-5">
                               
                                <div class="col-md-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="plan"
                                                value="monthly">Monthly
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="plan"
                                                value="yearly">Yearly
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-5">
                                    <label> <b>Name:</b></label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Name"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label> <b>Plan Level:</b></label>
                                    <select class="form-control" name="plan_level" id="">
                                        <option>Select Plan</option>
                                        <option value="1">Level One</option>
                                        <option value="2">Level Two</option>
                                        <option value="3">Level Three</option>
                                    </select>
                                </div>
                            </div>
                            
                           
                            <div class="row">
                                <div class="col-lg-6 mb-5">
                                    <label> <b>Plan Original Price:</b></label>
                                    <input type="number" name="price" class="form-control" placeholder="Enter Price">
                                </div>
                                <div class="col-lg-6 mb-5">
                                    <label> <b>Plan Discounted Price:</b></label>
                                    <input type="number" name="discounted_price" class="form-control" placeholder="Enter Price">
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-md-12">
                                    <label for=""><b>Features</b></label>
                                </div>
                            </div>
                            <div class="row append_col">
                                <div class="row">
                                    <div class="col-md-11 mb-5">
                                        <textarea name="features[]" col="12" rows="1" class="form-control" placeholder="Enter Plan Feature"
                                            required></textarea>
                                    </div>
                                    <div class="col-md-1 mb-5">
                                        <span class="trash_btn"><i class="fa fa-trash"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-sm float-right theme_btn_bg addMoreBtn">Add More Feature
                                    </button>
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
    <div id="EditModal" class="modal fade show planModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-modal="true" aria-hidden="true" style="color: black;">
        <div class="modal-dialog modal-lg" id="ProductModalDialog">
            <div class="modal-content" id="PlanEditModel">

                <form name="productForm" method="POST" action="{{ route('subcription-plan.Update') }}"
                    id="prodForm">
                    @csrf
                    <span class='arrow'>
                        <label class='error'></label>
                    </span>
                    <div class="modal-header">
                        <h4 class="modal-title" id="ProductModalLabel">Edit Plan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                            data-kt-users-modal-action="close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    </div>
                    <div class="modal-body appendModelBody"></div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-sm float-right theme_btn_bg addMoreBtn editAddMoreBtn">Add More Feature
                                </button>
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="manageTools" class="modal fade show " tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-modal="true" aria-hidden="true" style="color: black;">
        <div class="modal-dialog modal-lg" id="ProductModalDialog">
            <div class="modal-content" id="ToolsModalData"></div>
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            $(document).ready(function() {
                $('.addMoreBtn').on('click', function(event) {
                    event.preventDefault();
                    var featureRow = `
                                        <div class="row">
                                            <div class="col-md-11 mb-5">
                                                <textarea name="features[]" col="12" rows="1" class="form-control" placeholder="Enter Plan Feature"></textarea> 
                                            </div>
                                            <div class="col-md-1 mb-5">
                                                <span class="trash_btn"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>`;
                    $('.append_col').append(featureRow);
                });

                $(document).on('click', '.trash_btn', function() {
                    $(this).closest('.row').remove();
                });
            });

            document.getElementById('mySearchInput').addEventListener('keyup', function() {
                window.LaravelDataTables['subcription_plans-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:load', function() {
                Livewire.on('success', function() {
                    $('#kt_modal_add_user').modal('hide');
                    window.LaravelDataTables['subcription_plans-table'].ajax.reload();
                });
            });

            function AddProduct() {
                $('#ProductModal').modal('show');
            }

            function mangaeTools(anchor) {
                $('#manageTools').modal('show');
                var id = anchor.parentElement.querySelector("#blogUpdatedId").value;
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    method: 'POST',
                    url: "{{ route('subcription-plan.tools') }}",
                    dataType: 'html',
                    data: {
                        id: id
                    },
                    success: function(result) {
                        $('#ToolsModalData').html('');
                        if (result) {
                            $('#ToolsModalData').html(result);
                        }
                    },
                });
            }

            function EditBlog(anchor) {
                $('#EditModal').modal('show');
                var id = anchor.parentElement.querySelector("#blogUpdatedId").value;
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                $.ajax({
                    // url: "/subcription-plan/" + id + "/edit",
                    // type: "GET",
                    // dataType: "json",

                    // success: function(data) {
                    //     $('#EditModal').modal('show');
                    //     $('body').find('#title').val(data.name);
                    //     $('body').find('#updateId').val(data.id);
                    // }
                    method: 'POST',
                    url: "{{ route('subcription-plan.edit') }}",
                    dataType: 'html',
                    data: {
                        id: id
                    },
                    success: function(result) {
                        $('.appendModelBody').html('');
                        if (result) {
                            $('.appendModelBody').html(result);
                        }
                    },
                });
            }
        </script>
    @endpush

</x-default-layout>
