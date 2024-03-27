<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
	<!--begin::Menu wrapper-->
	<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
		<!--begin::Menu-->
		<div class="menu menu-column menu-rounded menu-sub-indention px-3 fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
			<!--begin:Menu item-->
			<div style="display:none" data-kt-menu-trigger="click" class="menu-item menu-accordion <?php echo e(request()->routeIs('dashboard') ? 'here show' : ''); ?>">
				<!--begin:Menu link-->
				<span class="menu-link">
					<span class="menu-icon"><?php echo getIcon('element-11', 'fs-2'); ?></span>
					<span class="menu-title">Dashboards</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion">
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Default</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
				</div>
				<!--end:Menu sub-->
			</div>
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link" href="<?php echo e(route('dashboard')); ?>">
					<span class="menu-icon"><?php echo getIcon('element-11', 'fs-2'); ?></span>
					<span class="menu-title">Dashboards</span>
				</a>
				<!--end:Menu link-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div class="menu-item pt-5">
				<!--begin:Menu content-->
				<div class="menu-content">
					<span class="menu-heading fw-bold text-uppercase fs-7">Apps</span>
				</div>
				<!--end:Menu content-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion <?php echo e(request()->routeIs('user-management.*') ? 'here show' : ''); ?>">
				<!--begin:Menu link-->
				<span class="menu-link">
					<span class="menu-icon"><?php echo getIcon('abstract-28', 'fs-2'); ?></span>
					<span class="menu-title">User Management</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion">
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link <?php echo e(request()->routeIs('user-management.users.*') ? 'active' : ''); ?>" href="<?php echo e(route('user-management.users.index')); ?>">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Users</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
					<!--begin:Menu item-->
					<div class="menu-item displayNone">
						<a class="menu-link <?php echo e(request()->routeIs('user-management.roles.*') ? 'active' : ''); ?>" href="<?php echo e(route('user-management.roles.index')); ?>">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Roles</span>
						</a>
					</div>
					<div class="menu-item displayNone">
						<a class="menu-link <?php echo e(request()->routeIs('user-management.permissions.*') ? 'active' : ''); ?>" href="<?php echo e(route('user-management.permissions.index')); ?>">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Permissions</span>
						</a>
					</div>
				</div>
				<!--end:Menu sub-->
			</div>
			<div class="menu-item displayNone">
				<!--begin:Menu link-->
				<a class="menu-link" href="<?php echo e(route('car-request.index')); ?>">
					<span class="menu-icon"><?php echo getIcon('rocket', 'fs-2'); ?></span>
					<span class="menu-title">Dream Car Request</span>
				</a>
				<!--end:Menu link-->
			</div>
			
			
			
			<div class="menu-item displayNone">
				<!--begin:Menu link-->
				<a class="menu-link" href="<?php echo e(route('plan.index')); ?>">
					<span class="menu-icon"><?php echo getIcon('car', 'fs-2'); ?></span>
					<span class="menu-title">Plan</span>
				</a>
				<!--end:Menu link-->
			</div>
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link" href="<?php echo e(route('blogs.index')); ?>">
					<span class="menu-icon"><?php echo getIcon('book', 'fs-2'); ?></span>
					<span class="menu-title">Blogs</span>
				</a>
				<!--end:Menu link-->
			</div>
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link" href="<?php echo e(route('categories.index')); ?>">
					<span class="menu-icon"><?php echo getIcon('book', 'fs-2'); ?></span>
					<span class="menu-title">Categories</span>
				</a>
				<!--end:Menu link-->
			</div>

			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link" href="<?php echo e(route('tags.index')); ?>">
					<span class="menu-icon"><?php echo getIcon('book', 'fs-2'); ?></span>
					<span class="menu-title">Tags</span>
				</a>
				<!--end:Menu link-->
			</div>
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link" href="<?php echo e(route('subcription-plan.index')); ?>">
					<span class="menu-icon"><?php echo getIcon('book', 'fs-2'); ?></span>
					<span class="menu-title">Subcription Plan</span>
				</a>
				<!--end:Menu link-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div class="menu-item pt-5 displayNone">
				<!--begin:Menu content-->
				<div class="menu-content">
					<span class="menu-heading fw-bold text-uppercase fs-7">Help</span>
				</div>
				<!--end:Menu content-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div class="menu-item displayNone">
				<!--begin:Menu link-->
				<a class="menu-link" href="https://preview.keenthemes.com/html/metronic/docs/base/utilities" target="_blank">
					<span class="menu-icon"><?php echo getIcon('rocket', 'fs-2'); ?></span>
					<span class="menu-title">Components</span>
				</a>
				<!--end:Menu link-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div class="menu-item displayNone">
				<!--begin:Menu link-->
				<a class="menu-link" href="https://preview.keenthemes.com/laravel/metronic/docs" target="_blank">
					<span class="menu-icon"><?php echo getIcon('abstract-26', 'fs-2'); ?></span>
					<span class="menu-title">Documentation</span>
				</a>
				<!--end:Menu link-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div class="menu-item displayNone">
				<!--begin:Menu link-->
				<a class="menu-link" href="https://preview.keenthemes.com/laravel/metronic/docs/changelog" target="_blank">
					<span class="menu-icon"><?php echo getIcon('code', 'fs-2'); ?></span>
					<span class="menu-title">Changelog v8.2.0</span>
				</a>
				<!--end:Menu link-->
			</div>
			<!--end:Menu item-->
		</div>
		<!--end::Menu-->
	</div>
	<!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->
<?php /**PATH /Users/zubairmohsin/code/sites/veconekt/extreme-tools-admin/resources/views/layout/partials/sidebar-layout/sidebar/_menu.blade.php ENDPATH**/ ?>