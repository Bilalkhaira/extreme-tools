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
    Plans
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(Breadcrumbs::render('subcription-plan')); ?>

    <?php $__env->stopSection(); ?>

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <?php echo getIcon('magnifier', 'fs-3 position-absolute ms-5'); ?>

                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Plan" id="mySearchInput" />
                </div>
            </div>

            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <a type="button" class="btn btn-primary bgColor" onclick="AddProduct()" data-bs-toggle="modal" data-bs-target="#ProductModal">
                        <?php echo getIcon('plus', 'fs-2', '', 'i'); ?>

                        Add Plan
                    </a>
                </div>

                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.add-user-modal', [])->html();
} elseif ($_instance->childHasBeenRendered('MawHN4W')) {
    $componentId = $_instance->getRenderedChildComponentId('MawHN4W');
    $componentTag = $_instance->getRenderedChildComponentTagName('MawHN4W');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('MawHN4W');
} else {
    $response = \Livewire\Livewire::mount('user.add-user-modal', []);
    $html = $response->html();
    $_instance->logRenderedChild('MawHN4W', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:user.add-user-modal>
            </div>
        </div>

        <div class="card-body py-4">
            <div class="table-responsive">
                <?php echo e($dataTable->table()); ?>

            </div>
        </div>
    </div>
    <div id="ProductModal" class="modal fade show " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true" aria-hidden="true" style="color: black;">
        <div class="modal-dialog modal-lg" id="ProductModalDialog">
            <div class="modal-content" id="ProductModalContent">

                <form name="productForm" method="POST" action="<?php echo e(route('subcription-plan.store')); ?>" id="prodForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
                    
                    <div class="modal-header">
                        <h4 class="modal-title" id="ProductModalLabel">Add Plan</h4>
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
            <div class="modal-content" id="ProductModalContent">

                <form name="productForm" method="POST" action="<?php echo e(route('subcription-plan.Update')); ?>" id="prodForm">
                    <?php echo csrf_field(); ?>
                    <span class='arrow'>
                        <label class='error'></label>
                    </span>
                    <div class="modal-header">
                        <h4 class="modal-title" id="ProductModalLabel">Edit Blog</h4>
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="manageTools" class="modal fade show " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true" aria-hidden="true" style="color: black;">
        <div class="modal-dialog modal-lg" id="ProductModalDialog">
            <div class="modal-content" id="ToolsModalData"></div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <?php echo e($dataTable->scripts()); ?>

    <script>
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
              url: "<?php echo e(route('subcription-plan.tools')); ?>",
              dataType: 'html',
              data: { id: id },
              success: function(result) {
                  $('#ToolsModalData').html('');
                  if (result) {
                      $('#ToolsModalData').html(result);
                  }
              },
          });
        }

        function EditBlog(anchor) {
            var id = anchor.parentElement.querySelector("#blogUpdatedId").value;
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                url: "/subcription-plan/" + id + "/edit",
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
<?php endif; ?><?php /**PATH /Users/zubairmohsin/code/sites/veconekt/extreme-tools-admin/resources/views/pages/subcription-plan/list.blade.php ENDPATH**/ ?>