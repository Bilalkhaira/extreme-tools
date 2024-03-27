<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    Actions
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
   
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" onclick="EditBlog(this)" data-bs-toggle="modal" data-bs-target="#EditModal">
            Edit
        </a>
        <input type="hidden" value="<?php echo e($user->id ?? ''); ?>"  id="blogUpdatedId" >
    </div>

    <div class="menu-item px-3">
        <form class="user_delete" action="<?php echo e(route('subcription-plan.destroy', $user->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="menu-link px-3 dlt_btn" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
        
    </div>
    <div class="menu-item px-3">
        <input type="hidden" value="<?php echo e($user->id ?? ''); ?>"  id="blogUpdatedId" >
        <a href="#" class="menu-link px-3" onclick="mangaeTools(this)" data-bs-toggle="modal" data-bs-target="#manageTools">
            Manage Tools
        </a>
    </div>
</div>


<?php /**PATH /Users/zubairmohsin/code/sites/veconekt/extreme-tools-admin/resources/views/pages/subcription-plan/columns/_actions.blade.php ENDPATH**/ ?>