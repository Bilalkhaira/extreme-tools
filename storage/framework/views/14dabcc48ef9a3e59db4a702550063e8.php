<?php if (! ($breadcrumbs->isEmpty())): ?>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!$loop->last): ?>
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="<?php echo e($breadcrumb->url); ?>" class="text-muted text-hover-primary">
                        <?php echo e($breadcrumb->title); ?>

                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
            <?php else: ?>
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">
                    <?php echo e($breadcrumb->title); ?>

                </li>
                <!--end::Item-->
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<?php /**PATH /Users/zubairmohsin/code/sites/veconekt/extreme-tools-admin/resources/views/vendor/breadcrumbs/bootstrap5.blade.php ENDPATH**/ ?>