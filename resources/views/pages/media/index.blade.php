<x-default-layout>

    @section('title')
        Media
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('media') }}
    @endsection
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title" style="visibility: hidden">
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search Tools"
                        id="mySearchInput" />
                </div>
            </div>

            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <a type="button" class="btn btn-primary bgColor addImageBtn">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Images
                    </a>
                </div>

                <livewire:user.add-user-modal></livewire:user.add-user-modal>
            </div>
        </div>

        <div class="card-body py-4">
            <div class="table-responsive hideshow displayNone">
                <form method="POST" action="{{ route('media.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="file-form" id="dropSection">
                        <input name="media[]" id="fileInput" type="file" multiple accept="image/*"
                            onchange="app.actions.handleFiles(this.files)">
                        <label class="drop-content" for="fileInput">
                            Drops file to attach, or click and select
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="none"
                                viewBox="0 0 24 20" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                        </label>

                    </div>
                    <div id="actionContainer" class="d-none"> </div>
                    <div id="uploadedImage"></div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary bgColor">Save</button>
                        <button id="clearAllBtn" onclick="app.actions.clearAll()" type="button"
                            class="btn">Clear</button>
                        <button type="button" class="btn btn-secondary hideBtn">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="card mt-10">

        <div class="card-body py-4">
            <div class="row">
                @if (!empty($images))
                    @foreach ($images as $image)
                        <div class="col-md-2">
                            <div class="card media_inner_card">
                                <form class="user_delete submit-form" action="{{ route('media.destroy', $image->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="menu-link px-3 dlt_btn"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                                {{-- <a href=""><i class="fa fa-trash"></i></a> --}}
                                <img src="{{ $image->url ?? '' }}" alt="">
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    </div>


    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.submit-form').submit(function(event) {
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
        <script>
            $('.addImageBtn').on('click', function(event) {
                $('.hideshow').removeClass('displayNone');
            });
            $('.hideBtn').on('click', function(event) {
                $('.hideshow').addClass('displayNone');
            });
            const app = {
                selector: {
                    dropArea: document.getElementById("dropSection"),
                    uploadedImages: document.getElementById("uploadedImage"),
                },
                actions: {
                    highlightAdd: function() {
                        app.selector.dropArea.classList.add('highlight')
                    },
                    highlightRemove: function() {
                        app.selector.dropArea.classList.remove('highlight')
                    },
                    handleFiles: function(files) {
                        files = [...files]
                        files.forEach(app.actions.previewFile)
                    },
                    handleDrop: function(e) {
                        var dt = e.dataTransfer
                        var files = dt.files

                        app.actions.handleFiles(files)
                    },
                    previewFile: function(file) {
                        let reader = new FileReader()
                        reader.readAsDataURL(file)
                        reader.onloadend = function() {
                            let elems =
                                `<div class="image-content"><div class="image-wrapper"><img alt="${file.name}" src="${reader.result}"><span onclick="app.actions.imageDelete(this)">X</span></div></div>`;
                            app.selector.uploadedImages.insertAdjacentHTML("beforeend", elems);
                            app.selector.actionContainer.classList.remove('d-none')
                        }
                    },
                    imageDelete: function(scope) {
                        scope.parentNode.parentNode.remove();
                        app.selector.uploadedImages.innerHTML == '' && app.selector.actionContainer.classList.add(
                            'd-none');
                    },
                    clearAll: function() {
                        app.selector.uploadedImages.innerHTML = '';
                        app.selector.actionContainer.classList.add('d-none')
                    },
                    preventDefaults: function(e) {
                        e.preventDefault()
                        e.stopPropagation()
                    },
                    aspectRatio: function(w, h, mw, mh) {
                        var ratio = w / h;
                        if (mh * ratio < mw) {
                            return [mw, mw / ratio];
                        } else {
                            return [mh * ratio, mh];
                        }
                    },
                    resizeImages: function(base64Str, maxWidth, maxHeight) {
                        return new Promise((resolve) => {
                            let img = new Image()
                            img.src = base64Str
                            img.onload = () => {
                                let canvas = document.createElement('canvas')
                                let width = img.width
                                let height = img.height

                                var newSize = app.actions.aspectRatio(width, height, maxWidth, maxHeight);

                                width = newSize[0];
                                height = newSize[1];

                                canvas.width = width
                                canvas.height = height
                                let ctx = canvas.getContext('2d')
                                ctx.drawImage(img, 0, 0, width, height)
                                resolve(canvas.toDataURL())
                            }
                        })
                    },

                },
                init: function() {
                    app.selector.dropArea.addEventListener('drop', app.actions.handleDrop, false);

                    ;
                    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                        app.selector.dropArea.addEventListener(eventName, app.actions.preventDefaults, false)
                        document.body.addEventListener(eventName, app.actions.preventDefaults, false)
                    })

                    ;
                    ['dragenter', 'dragover'].forEach(eventName => {
                        app.selector.dropArea.addEventListener(eventName, app.actions.highlightAdd, false)
                    })

                    ;
                    ['dragleave', 'drop'].forEach(eventName => {
                        app.selector.dropArea.addEventListener(eventName, app.actions.highlightRemove, false)
                    })
                }
            }

            app.init();
        </script>
    @endpush
    <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}" />

</x-default-layout>
