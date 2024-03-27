<?php if (isset($component)) { $__componentOriginal1c2e2f4f77e507b499e79defc0d48b7e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c2e2f4f77e507b499e79defc0d48b7e = $attributes; } ?>
<?php $component = App\View\Components\DefaultLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('default-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DefaultLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <?php $__env->startSection('title'); ?>
    Categories
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(Breadcrumbs::render('categories')); ?>

    <?php $__env->stopSection(); ?>

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <?php echo getIcon('magnifier', 'fs-3 position-absolute ms-5'); ?>

                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Category" id="mySearchInput" />
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
                        <?php echo getIcon('plus', 'fs-2', '', 'i'); ?>

                        Add Category
                    </a>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Modal-->
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.add-user-modal', [])->html();
} elseif ($_instance->childHasBeenRendered('8IHtbII')) {
    $componentId = $_instance->getRenderedChildComponentId('8IHtbII');
    $componentTag = $_instance->getRenderedChildComponentTagName('8IHtbII');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('8IHtbII');
} else {
    $response = \Livewire\Livewire::mount('user.add-user-modal', []);
    $html = $response->html();
    $_instance->logRenderedChild('8IHtbII', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:user.add-user-modal>
                <!--end::Modal-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                <?php echo e($dataTable->table()); ?>

            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <div id="ProductModal" class="modal fade show " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true" aria-hidden="true" style="color: black;">
        <div class="modal-dialog modal-lg" id="ProductModalDialog">
            <div class="modal-content" id="ProductModalContent">

                <form name="productForm" method="POST" action="<?php echo e(route('categories.store')); ?>" id="prodForm">
                    <?php echo csrf_field(); ?>
                    <span class='arrow'>
                        <label class='error'></label>
                    </span>
                    <div class="modal-header">
                        <h4 class="modal-title" id="ProductModalLabel">Add Category</h4>
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

                <form name="productForm" method="POST" action="<?php echo e(route('categories.update')); ?>" enctype="multipart/form-data" id="prodForm">
                    <?php echo csrf_field(); ?>
                    <span class='arrow'>
                        <label class='error'></label>
                    </span>
                    <div class="modal-header">
                        <h4 class="modal-title" id="ProductModalLabel">Edit Category</h4>
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

    <?php $__env->startPush('scripts'); ?>
    <?php echo e($dataTable->scripts()); ?>

   
    
    <script>
       
        document.getElementById('mySearchInput').addEventListener('keyup', function() {
            window.LaravelDataTables['categories-table'].search(this.value).draw();
        });
        document.addEventListener('livewire:load', function() {
            Livewire.on('success', function() {
                $('#kt_modal_add_user').modal('hide');
                window.LaravelDataTables['categories-table'].ajax.reload();
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
                url: "/categories/" + categoryId + "/edit",
                type: "GET",
                dataType: "json",

                success: function(data) {
                    $('#EditModal').modal('show');
                    $('body').find('#title').val(data.name);
                    $('body').find('#updateId').val(data.id);
                }
                
            });
        }
    </script>
    <?php $__env->stopPush(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c2e2f4f77e507b499e79defc0d48b7e)): ?>
<?php $attributes = $__attributesOriginal1c2e2f4f77e507b499e79defc0d48b7e; ?>
<?php unset($__attributesOriginal1c2e2f4f77e507b499e79defc0d48b7e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c2e2f4f77e507b499e79defc0d48b7e)): ?>
<?php $component = $__componentOriginal1c2e2f4f77e507b499e79defc0d48b7e; ?>
<?php unset($__componentOriginal1c2e2f4f77e507b499e79defc0d48b7e); ?>
<?php endif; ?><?php /**PATH /Users/zubairmohsin/code/sites/veconekt/extreme-tools-admin/resources/views/pages/categories/list.blade.php ENDPATH**/ ?>