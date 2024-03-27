<!--begin::Table widget 14-->
<div class="card card-flush h-md-100">
	<!--begin::Header-->
	<div class="card-header pt-7">
		<!--begin::Title-->
		<h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bold text-gray-800">Latest Blogs</span>
			@if(!empty($blogs[0]))
			<span class="text-gray-400 mt-1 fw-semibold fs-6">{{ $blogs[0]->created_at->diffForHumans() }}</span>
			@endif
		</h3>
		<!--end::Title-->
		<!--begin::Toolbar-->
		<div class="card-toolbar">
			<a href="{{ route('blogs.index') }}" class="btn btn-sm btn-light">View all Blogs</a>
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
						<th class="p-0 pb-3 min-w-175px text-start">#</th>
						<th class="p-0 pb-3 min-w-100px text-start">Title</th>
						<th class="p-0 pb-3 min-w-175px text-start pe-12">Created At</th>
						<th class="p-0 pb-3 w-50px text-start">VIEW</th>
					</tr>
				</thead>
				<!--end::Table head-->
				<!--begin::Table body-->
				<tbody>
				@if(!empty($blogs))
					@foreach($blogs as $blog)
					<tr>
						<td class="text-start">
							<span class="text-gray-600 fs-6">{{ $blog->id ?? ''}}</span>
						</td>
						
						<td class="text-start">
							<span class="text-gray-600 fs-6">{{ $blog->title ?? ''}}</span>
						</td>
						
						<td class="text-start">
							<span class="text-gray-600 fs-6">{{ $blog->created_at->diffForHumans() }}</span>
						</td>
						
						<td class="text-start">
							<a href="{{ route('blogs.show' ,$blog->id) }}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">{!! getIcon('black-right', 'fs-2 text-gray-500') !!}</a>
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
				<!--end::Table body-->
			</table>
		</div>
		<!--end::Table-->
	</div>
	<!--end: Card Body-->
</div>
<!--end::Table widget 14-->
