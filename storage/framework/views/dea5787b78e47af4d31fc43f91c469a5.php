<!--begin::Table widget 14-->
<div class="card card-flush h-md-100">
	<!--begin::Header-->
	<div class="card-header pt-7">
		<!--begin::Title-->
		<h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bold text-gray-800">Latest Users</span>
			<?php if(!empty($users[0])): ?>
			<span class="text-gray-400 mt-1 fw-semibold fs-6"><?php echo e($users[0]->created_at->diffForHumans()); ?></span>
			<?php endif; ?>
		</h3>
		<!--end::Title-->
		<!--begin::Toolbar-->
		<div class="card-toolbar">
			<a href="<?php echo e(url('/user-management/users')); ?>" class="btn btn-sm btn-light">View all Users</a>
		</div>
		<!--end::Toolbar-->
	</div>
	<!--end::Header-->
	<!--begin::Body-->
	<div class="card-body pt-6">
		<!--begin::Table container-->
		<div class="table-responsive">
			<!--begin::Table-->
			<table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
				<!--begin::Table head-->
				<thead>
					<tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
						<th class="p-0 pb-3 min-w-175px text-start">Name</th>
						<th class="p-0 pb-3 min-w-100px text-start">Email</th>
						<th class="p-0 pb-3 min-w-100px text-start">Phone</th>
						<th class="p-0 pb-3 min-w-175px text-start pe-12">Created At</th>
						<th class="p-0 pb-3 w-50px text-start">VIEW</th>
					</tr>
				</thead>
				<!--end::Table head-->
				<!--begin::Table body-->
				<tbody>
				<?php if(!empty($users)): ?>
					<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td class="text-start">
							<span class="text-gray-600 fs-6"><?php echo e($user->name ?? ''); ?></span>
						</td>
						
						<td class="text-start">
							<span class="text-gray-600 fs-6"><?php echo e($user->email ?? ''); ?></span>
						</td>
						<td class="text-start">
							<!--begin::Label-->
							<span class="text-gray-600 fs-6"><?php echo e($user->phone_no ?? ''); ?></span>
							<!--end::Label-->
						</td>
						<td class="text-start">
							<span class="text-gray-600 fs-6"><?php echo e($user->created_at->diffForHumans()); ?></span>
						</td>
						
						<td class="text-start">
							<a href="<?php echo e(route('user-management.users.show', $user)); ?>" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px"><?php echo getIcon('black-right', 'fs-2 text-gray-500'); ?></a>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				</tbody>
				<!--end::Table body-->
			</table>
		</div>
		<!--end::Table-->
	</div>
	<!--end: Card Body-->
</div>
<!--end::Table widget 14-->
<?php /**PATH /Users/zubairmohsin/code/sites/veconekt/extreme-tools-admin/resources/views/partials/widgets/tables/_widget-14.blade.php ENDPATH**/ ?>