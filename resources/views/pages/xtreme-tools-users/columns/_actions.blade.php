<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    Actions
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">

    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" onclick="EditBlog(this)" data-bs-toggle="modal" data-bs-target="#EditModal">
            Edit
        </a>
        <input type="hidden" value="{{ $user->uid ?? '' }}"  id="blogUpdatedId" >
    </div>

    <div class="menu-item px-3">
        <form class="user_delete submit-form" action="{{ route('xtreme-tools-users.destroy', $user->uid) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="menu-link px-3 dlt_btn">Delete</button>
        </form>
    </div>
</div>
<script>
   $(document).ready(function () {
        $('.submit-form').submit(function (event) {
            event.preventDefault();
            var form = $(this);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                confirmButtonColor: '#dc3545',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.unbind('submit').submit();
                }
            });
        });
    });
</script>

