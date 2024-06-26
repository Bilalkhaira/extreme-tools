<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
	<!--begin::Menu wrapper-->
	<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
		<!--begin::Menu-->
		<div class="menu menu-column menu-rounded menu-sub-indention px-3 fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
			<!--begin:Menu item-->
			<div style="display:none" data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('dashboard') ? 'here show' : '' }}">
				<!--begin:Menu link-->
				<span class="menu-link">
					<span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
					<span class="menu-title">Dashboards</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion">
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
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
				<a class="menu-link" href="{{ route('dashboard') }}">
					<span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
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
			{{-- @if(auth()->user()->getRoleNames()[0] == 'super admin') --}}
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('user-management.*') ? 'here show' : '' }}">
				<!--begin:Menu link-->
				<span class="menu-link">
					<span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
					<span class="menu-title">User Management</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion {{ request()->routeIs('xtreme-tools-users.*') ? 'show' : '' }}">
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link {{ request()->routeIs('user-management.users.*') ? 'active' : '' }}" href="{{ route('user-management.users.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Admin Users</span>
						</a>
						<!--end:Menu link-->
					</div>

					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link {{ request()->routeIs('xtreme-tools-users.*') ? 'active' : '' }}" href="{{ route('xtreme-tools-users.index') }}">
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
						<a class="menu-link {{ request()->routeIs('user-management.roles.*') ? 'active' : '' }}" href="{{ route('user-management.roles.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Roles</span>
						</a>
					</div>
					<div class="menu-item displayNone">
						<a class="menu-link {{ request()->routeIs('user-management.permissions.*') ? 'active' : '' }}" href="{{ route('user-management.permissions.index') }}">
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
				<a class="menu-link" href="{{ route('car-request.index') }}">
					<span class="menu-icon">{!! getIcon('rocket', 'fs-2') !!}</span>
					<span class="menu-title">Dream Car Request</span>
				</a>
				<!--end:Menu link-->
			</div>
			
			{{-- @endif --}}
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('blogs.*') ? 'here show' : '' }}">
				<!--begin:Menu link-->
				<span class="menu-link">
					<span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
					<span class="menu-title">Blogs</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion {{ request()->routeIs('tags.*') ? 'show' : '' }} {{ request()->routeIs('categories.*') ? 'show' : '' }}  {{ request()->routeIs('blogs.*') ? 'show' : '' }}">
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link {{ request()->routeIs('blogs.*') ? 'active' : '' }}" href="{{ route('blogs.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Blogs List</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
					<!--begin:Menu item-->
					<div class="menu-item">
						<a class="menu-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Categories</span>
						</a>
					</div>
					<div class="menu-item">
						<a class="menu-link {{ request()->routeIs('tags.*') ? 'active' : '' }}" href="{{ route('tags.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Tags</span>
						</a>
					</div>
				</div>
				<!--end:Menu sub-->
			</div>
			<div class="menu-item displayNone">
				<!--begin:Menu link-->
				<a class="menu-link" href="{{ route('plan.index') }}">
					<span class="menu-icon">{!! getIcon('car', 'fs-2') !!}</span>
					<span class="menu-title">Plan</span>
				</a>
				<!--end:Menu link-->
			</div>
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link {{ request()->routeIs('tools.*') ? 'active' : '' }}"  href="{{ route('tools.index') }}">
					<span class="menu-icon">{!! getIcon('code', 'fs-2') !!}</span>
					<span class="menu-title">Tools</span>
				</a>
				<!--end:Menu link-->
			</div>
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link {{ request()->routeIs('media.*') ? 'active' : '' }}"  href="{{ route('media.index') }}">
					<span class="menu-icon">{!! getIcon('code', 'fs-2') !!}</span>
					<span class="menu-title">Media</span>
				</a>
				<!--end:Menu link-->
			</div>


			
			<div class="menu-item">
				<!--begin:Menu link-->
				<a class="menu-link {{ request()->routeIs('subcription-plan.*') ? 'active' : '' }}" href="{{ route('subcription-plan.index') }}">
					<span class="menu-icon">{!! getIcon('book', 'fs-2') !!}</span>
					<span class="menu-title">Subscription Plan</span>
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
					<span class="menu-icon">{!! getIcon('rocket', 'fs-2') !!}</span>
					<span class="menu-title">Components</span>
				</a>
				<!--end:Menu link-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div class="menu-item displayNone">
				<!--begin:Menu link-->
				<a class="menu-link" href="https://preview.keenthemes.com/laravel/metronic/docs" target="_blank">
					<span class="menu-icon">{!! getIcon('abstract-26', 'fs-2') !!}</span>
					<span class="menu-title">Documentation</span>
				</a>
				<!--end:Menu link-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div class="menu-item displayNone">
				<!--begin:Menu link-->
				<a class="menu-link" href="https://preview.keenthemes.com/laravel/metronic/docs/changelog" target="_blank">
					<span class="menu-icon">{!! getIcon('code', 'fs-2') !!}</span>
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
