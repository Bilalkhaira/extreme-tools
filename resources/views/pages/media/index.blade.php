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
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Tools" id="mySearchInput" />
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
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
   

    @push('scripts')
   
    
    <script>
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

                    var path = "{{ asset('images/tools/') }}"+"/"+data.img;
                    var element = document.getElementById("blogImg");
                    element.style.backgroundImage = "url("+ path + ")";
                }
            });
        }
    </script>

    @endpush

</x-default-layout>