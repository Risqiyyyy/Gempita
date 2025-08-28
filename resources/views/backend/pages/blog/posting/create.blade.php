@extends('backend.master.app')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('blog.post') }}">Post</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <h1 class="mb-0 d-inline-block fs-6 lh-1">Create</h1>
                            </li>
                        </ol>
                    </nav>

                </div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body page-content">
    <div class="container-xl">
        <form method="POST" action="{{ route('blog.add') }}" enctype="multipart/form-data"
            class="js-base-form dirty-check">
            @csrf
            <div class="row">
                <div class="gap-3 col-md-9">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="mb-3 position-relative">
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control" data-counter="250" required placeholder="Name"
                                        name="title" value="{{ old('title') }}" type="text" id="name">
                                    @if ($errors->has('title'))
                                    <small class="text-danger">{{ $errors->first('title') }}</small>
                                    @endif
                                </div>
                                <div class="mb-3 position-relative">
                                    <label for="content" class="form-label">Content</label>
                                    <textarea required class="form-control form-control editor-ckeditor ays-ignore"
                                        data-counter="100000" rows="4" placeholder="Write your content" with-short-code
                                        id="content" name="content" cols="50" value="{{ old('content') }}"></textarea>
                                    @if ($errors->has('content'))
                                    <small class="text-danger">{{ $errors->first('content') }}</small>
                                    @endif
                                </div>
                                <div class="mb-3 position-relative">
                                    <label for="video-url" class="mt-4 block">Video URL</label>
                                    <input class="form-control" id="video-url" placeholder="Paste video URL di sini"
                                        type="text">
                                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="insertVideo()">
                                        Insert Video
                                    </button>
                                </div>
                                <div class="mb-3 position-relative " id="embed-container">
                                    <label for="embed-url">Generated Embed URL:</label>
                                    <textarea class="form-control" data-counter="500" rows="3" id="embed-url"
                                        placeholder="URL Embed"></textarea>
                                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="copyEmbedUrl()">
                                        Copy Embed URL
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 mb-3 mb-md-0">
                            <div class="card meta-boxes">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <label for="reporter" class="form-label">Reporter</label>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <select class="form-control select2" name="reporter_id" id="reporter">
                                        <option value="">-- Pilih Reporter --</option>
                                        @foreach ($reporter as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('reporter_id', $post->reporter_id ?? '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3 mb-md-0">
                            <div class="card meta-boxes">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <label for="author_id" class="form-label">Adult</label>
                                    </h4>
                                </div>
                                <div class="card-body mb-3">
                                    <label class="form-check form-switch">
                                        <input name="adult" type="hidden" value="no" />
                                        <input class="form-check-input" name="adult" type="checkbox" value="yes"
                                            {{ old('adult', $post->adult ?? '') === 'yes' ? 'checked' : '' }} />
                                        <span class="form-check-label">Is content adult?</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3 mb-md-0">
                            <div class="card meta-boxes">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <label for="pages_id" class="form-label">Multiple Page</label>
                                    </h4>
                                </div>
                                <div class="card-body mb-3">
                                    <label class="form-check form-switch">
                                        <input name="multipages" type="hidden" value="no" />
                                        <input class="form-check-input" name="multipages" type="checkbox" value="yes"
                                            {{ old('multipages', $post->multipages ?? '') === 'yes' ? 'checked' : '' }} />
                                        <span class="form-check-label">Is multiple pages?</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3 mb-md-0">
                            <div class="card meta-boxes">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <label for="author_id" class="form-label">SEO</label>
                                    </h4>
                                </div>
                                <div class="card-body mb-3">
                                    <label class="form-check form-switch">
                                        <input name="seo" type="hidden" value="no" />
                                        <input class="form-check-input" name="seo" type="checkbox" value="yes"
                                            {{ old('seo', $post->adult ?? '') === 'yes' ? 'checked' : '' }} />
                                        <span class="form-check-label">Is content SEO?</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="meta-box-sortables">
                        <div class="card meta-boxes mb-3">
                            <div class="card-header">
                                <h4 class="card-title">Search Engine Optimize</h4>
                            </div>
                            <div class="card-body">
                                <div class="seo-edit-section" v-pre>
                                    <div class="mb-3 position-relative">
                                        <label for="seo_meta[seo_title]" class="form-label">SEO Keyword</label>
                                        <input class="form-control" data-counter="70" placeholder="SEO Keyword"
                                            data-allow-over-limit name="seo_meta[seo_title]" type="text"
                                            id="seo_meta[seo_title]" value="{{ old('seo_meta[seo_title]') }}">
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label for="seo_meta[seo_description]" class="form-label">SEO
                                            description</label>
                                        <textarea class="form-control" data-counter="160" rows="3"
                                            placeholder="SEO description" data-allow-over-limit
                                            name="seo_meta[seo_description]" cols="50" id="seo_meta[seo_description]"
                                            value="{{ old('seo_meta[seo_description]') }}"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 gap-3 d-flex flex-column-reverse flex-md-column mb-md-0 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="btn-list">
                                <button class="btn btn-primary" type="submit" value="apply" name="submitter">
                                    <svg class="icon icon-left svg-icon-ti-ti-device-floppy"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                        <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M14 4l0 4l-6 0l0 -4" />
                                    </svg>
                                    Publish
                                </button>
                                <a href="{{ route('blog.post') }}" class="btn">
                                    <svg class="icon icon-left svg-icon-ti-ti-transfer-in"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 18v3h16v-14l-8 -4l-8 4v3" />
                                        <path d="M4 14h9" />
                                        <path d="M10 11l3 3l-3 3" />
                                    </svg>
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div data-bb-waypoint data-bb-target="#form-actions"></div>
                    <header class="top-0 w-100 position-fixed end-0 z-1000" id="form-actions" style="display: none;">
                        <div class="navbar">
                            <div class="container-xl">
                                <div class="row g-2 align-items-center w-100">
                                    <div class="col">
                                        <div class="page-pretitle">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb"></ol>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="col-auto ms-auto d-print-none">
                                        <div class="btn-list">
                                            <button class="btn btn-primary" type="submit" value="apply"
                                                name="submitter">
                                                <svg class="icon icon-left svg-icon-ti-ti-device-floppy"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                    <path d="M14 4l0 4l-6 0l0 -4" />
                                                </svg>
                                                Publish
                                            </button>
                                            <a href="{{ route('blog.post') }}" class="btn">
                                                <svg class="icon icon-left svg-icon-ti-ti-transfer-in"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 18v3h16v-14l-8 -4l-8 4v3" />
                                                    <path d="M4 14h9" />
                                                    <path d="M10 11l3 3l-3 3" />
                                                </svg>
                                                Back
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="card meta-boxes">
                        <div class="card-header">
                            <h4 class="card-title">
                                <label for="banner_image" class="form-label">Featured Image</label>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="image-box image-box-banner_image" data-counter="250">
                                <input required class="image-data" name="banner_image" type="hidden" data-counter="250"
                                    id="banner_image_input" />
                                <div style="width: 8rem; height: 8rem; border: 1px dashed #ddd; display: flex; align-items: center; justify-content: center;"
                                    class="preview-image-wrapper mb-1">
                                    <div class="preview-image-inner">
                                        <a href="#" data-bb-toggle="image-picker-choose"
                                            onclick="openFileManager(event)" class="image-box-actions"
                                            data-result="banner_image" data-action="select-image" data-allow-thumb="1">
                                            <img class="preview-image default-image"
                                                data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                                src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                                alt="Preview image" style="max-width: 100%; max-height: 100%;" />
                                            <span class="image-picker-backdrop"></span>
                                        </a>
                                        <button class="btn btn-pill btn-icon btn-sm image-picker-remove-button p-0"
                                            style="display: none; --bb-btn-font-size: 0.5rem;" type="button"
                                            onclick="removeImage()" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Remove image">
                                            <svg class="icon icon-sm icon-left svg-icon-ti-ti-x"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M18 6l-12 12" />
                                                <path d="M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                @if ($errors->has('banner_image'))
                                <small class="text-danger">{{ $errors->first('banner_image') }}</small>
                                @endif
                                <input class="form-control mb-3" placeholder="Image Caption" name="image_caption"
                                    type="text" id="caption_input">

                                <a href="{{ url('/laravel-filemanager') }}" onclick="openFileManager(event)"
                                    class="btn btn-primary btn-sm">
                                    Choose image
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card meta-boxes">
                        <div class="card-header">
                            <h4 class="card-title">
                                <label for="status" class="form-label">Status</label>
                            </h4>
                        </div>
                        <div class="card-body">
                            <select class="form-control form-select" id="status" name="status">
                                <option value="public">Published</option>
                                <option value="schedule">Scheduled</option>
                            </select>
                            <div id="form-schedule" style="margin-top: 10px; display: none;">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" name="scheduled_date" min="{{ date('Y-m-d') }}">
                                <label class="form-label">Time</label>
                                <input type="time" name="scheduled_time" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card meta-boxes">
                        <div class="card-header">
                            <h4 class="card-title">
                                <label for="author_id" class="form-label">Headline</label>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="position-relative">
                                <label class="form-check form-switch ">
                                    <input name="headline" type="hidden" value="no" />
                                    <input class="form-check-input" name="headline" type="checkbox" value="yes" />
                                    <span class="form-check-label">Is headline?</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card meta-boxes">
                        <div class="card-header">
                            <h4 class="card-title">
                                <label for="categories" class="form-label">Categories</label>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="tree-categories-list-998852741">
                                <ul class="list-unstyled">
                                    @foreach ($category as $item)
                                    <li>
                                        <label class="form-check">
                                            <input type="checkbox" id="category-{{ $item->id }}" name="categories[]"
                                                class="form-check-input category-checkbox" value="{{ $item->id }}"
                                                onchange="toggleCategorySelection(this, {{ $item->id }})">
                                            <span class="form-check-label">
                                                {{ $item->nama_kategori }}
                                            </span>
                                        </label>
                                        <ul class="list-unstyled ms-4 mt-2">
                                            @foreach ($item->subCategories as $subItem)
                                            <li>
                                                <label class="form-check">
                                                    <input type="checkbox" id="subcategory-{{ $subItem->id }}"
                                                        name="subcategories[]" value="{{ $subItem->id }}"
                                                        class="form-check-input subcategory-checkbox sub-of-{{ $item->id }}"
                                                        disabled>
                                                    <span class="form-check-label">
                                                        {{ $subItem->nama_sub_kategori }}
                                                    </span>
                                                </label>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @if ($errors->has('categories'))
                            <small class="text-danger">{{ $errors->first('categories') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="card meta-boxes">
                        <div class="card-header">
                            <h4 class="card-title">
                                <label for="tag" class="form-label">Tags</label>
                            </h4>
                        </div>
                        <div class="card-body">
                            <input required class="form-control tags" placeholder="Write some tags" name="tag"
                                type="text" id="tag">
                            @if ($errors->has('tag'))
                            <small class="text-danger">{{ $errors->first('tag') }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Tambahkan jQuery dan CKEditor -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('backend/ckeditor/adapters/jquery.js') }}"></script>
<script>
    $(document).ready(function () {
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            toolbar: [{
                    name: 'document',
                    items: ['Source', 'NewPage', 'Preview', 'Print']
                },
                {
                    name: 'clipboard',
                    items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo',
                        'Redo'
                    ]
                },
                {
                    name: 'editing',
                    items: ['Find', 'Replace', '-', 'SelectAll']
                },
                {
                    name: 'insert',
                    items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar']
                },
                {
                    name: 'styles',
                    items: ['Styles', 'Format']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript',
                        '-', 'RemoveFormat'
                    ]
                },
                {
                    name: 'alignment',
                    items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                },
                {
                    name: 'ui',
                    items: ['Font', 'FontSize', 'TextColor', 'BGColor']
                },
                {
                    name: 'tools',
                    items: ['Maximize']
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-',
                        'Blockquote'
                    ]
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink', 'Anchor']
                },
                {
                    name: 'source',
                    items: ['']
                },
                {
                    name: 'iframe',
                    items: ['Iframe']
                }
            ],
            height: 400
        });
    });

    window.SetUrl = function (file) {
        const fileData = Array.isArray(file) ? file[0] : file;

        const fileUrl = fileData.url || fileData.thumb_url;

        if (fileUrl) {
            const newFileUrl = fileUrl.replace('storage/photos/shares/', 'storage/gambar/');

            const inputField = document.querySelector('input[name="banner_image"]');
            if (inputField) {
                inputField.value = newFileUrl;
            }

            const previewImage = document.querySelector('.preview-image');
            if (previewImage) {
                previewImage.src = newFileUrl;
            }

            const removeButton = document.querySelector('.image-picker-remove-button');
            if (removeButton) {
                removeButton.style.display = 'inline-block';
            }
        } else {
            console.error('Invalid file object or missing URL property:', fileData);
        }
    };

</script>

<script>
    function openFileManager(event) {
        event.preventDefault();

        const route_prefix = "/laravel-filemanager?type=image";

        window.open(route_prefix, 'FileManager', 'width=1920,height=1080');

        window.SetUrl = function (file) {
            const fileData = Array.isArray(file) ? file[0] : file;

            const fileUrl = fileData.url || fileData.thumb_url;

            if (fileUrl) {
                const newFileUrl = fileUrl.replace('storage/photos/shares/', 'storage/gambar/');

                const inputField = document.querySelector('input[name="banner_image"]');
                if (inputField) {
                    inputField.value = newFileUrl;
                }

                const previewImage = document.querySelector('.preview-image');
                if (previewImage) {
                    previewImage.src = newFileUrl;
                }

                const removeButton = document.querySelector('.image-picker-remove-button');
                if (removeButton) {
                    removeButton.style.display = 'inline-block';
                }
            } else {
                console.error('Invalid file object or missing URL property:', fileData);
            }
        };
    }

    function removeImage() {
        const inputField = document.querySelector('input[name="banner_image"]');
        inputField.value = '';

        const previewImage = document.querySelector('.preview-image');
        previewImage.src = previewImage.getAttribute('data-default');

        const removeButton = document.querySelector('.image-picker-remove-button');
        removeButton.style.display = 'none';
    }

</script>

<script>
    $(document).ready(function () {
        function toggleScheduledForm() {
            if ($("#status").val() === "schedule") {
                $("#form-schedule").show();
            } else {
                $("#form-schedule").hide();
            }
        }

        toggleScheduledForm();

        $("#status").change(function () {
            toggleScheduledForm();
        });
    });

</script>

<script>
    function toggleCategorySelection(selectedCategory, categoryId) {
        const isChecked = selectedCategory.checked;

        const subcategoryCheckboxes = document.querySelectorAll('.sub-of-' + categoryId);
        subcategoryCheckboxes.forEach(function (checkbox) {
            checkbox.disabled = !isChecked;
            if (!isChecked) {
                checkbox.checked = false;
            }
        });
    }

</script>


<script>
    async function convertSocialMediaLink(url) {
        let regex, match;

        // Instagram
        regex = /https:\/\/www\.instagram\.com\/(p|reel|tv)\/([^\/?]+)\//;
        match = url.match(regex);
        if (match) {
            const postId = match[2];
            return `https://www.instagram.com/p/${postId}/embed`;
        }

        // TikTok
        regex = /https:\/\/www\.tiktok\.com\/@[^\/]+\/video\/([^\/?]+)/;
        match = url.match(regex);
        if (match) {
            const videoId = match[1];
            return `https://www.tiktok.com/embed/v2/${videoId}`;
        }

        // Twitter
        regex = /https:\/\/x\.com\/[^\/]+\/status\/([^\/?]+)/;
        match = url.match(regex);
        if (match) {
            const tweetId = match[1];
            return `https://platform.twitter.com/embed/Tweet.html?id=${tweetId}`;
        }

        // YouTube
        regex = /https:\/\/(?:www\.)?youtube\.com\/watch\?v=([^&]+)/;
        match = url.match(regex);
        if (match) {
            const videoId = match[1];
            return `https://www.youtube.com/embed/${videoId}`;
        }

        // YouTube
        regex = /https:\/\/youtu\.be\/([^?]+)/;
        match = url.match(regex);
        if (match) {
            const videoId = match[1];
            return `https://www.youtube.com/embed/${videoId}`;
        }

        // Facebook
        regex = /https:\/\/www\.facebook\.com\/share\/(p|v)\/([^\/?]+)/;
        match = url.match(regex);
        if (match) {
            const response = await fetch('/get-facebook-embed-url', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                },
                body: JSON.stringify({
                    url
                }),
            });

            const data = await response.json();
            if (data.embed_url) {
                return data.embed_url;
            } else {
                throw new Error('Gagal mendapatkan URL embed Facebook.');
            }
        }

        // Facebook
        regex = /https:\/\/www\.facebook\.com\/[^\/]+\/posts\/([^\/?]+)/;
        match = url.match(regex);
        if (match) {
            const encodedUrl = encodeURIComponent(url);
            return `https://www.facebook.com/plugins/post.php?href=${encodedUrl}`;
        }

        regex = /https:\/\/www\.facebook\.com\/[^\/]+\/(photos|videos)\/[^\/]+\/(\d+)/;
        match = url.match(regex);
        if (match) {
            const encodedUrl = encodeURIComponent(url);
            return `https://www.facebook.com/plugins/post.php?href=${encodedUrl}`;
        }

        regex = /https:\/\/www\.facebook\.com\/reel\/(\d+)/;
        match = url.match(regex);
        if (match) {
            const encodedUrl = encodeURIComponent(url);
            return `https://www.facebook.com/plugins/video.php?href=${encodedUrl}`;
        }

        regex = /https:\/\/www\.facebook\.com\/\d+\/videos\/\d+/;
        match = url.match(regex);
        if (match) {
            const encodedUrl = encodeURIComponent(url);
            return `https://www.facebook.com/plugins/video.php?href=${encodedUrl}`;
        }

        regex = /facebook\.com\/watch\/\?v=(\d+)/i;
        match = url.match(regex);
        if (match) {
            const response = await fetch('/get-facebook-embed-url', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                },
                body: JSON.stringify({
                    url
                }),
            });

            const data = await response.json();
            if (data.embed_url) {
                return data.embed_url;
            } else {
                throw new Error('Gagal mendapatkan URL embed Facebook.');
            }
        }

        throw new Error('URL tidak valid atau tidak didukung.');
    }

    async function insertVideo() {
        const url = document.getElementById('video-url').value;

        try {
            const embedUrl = await convertSocialMediaLink(url);
            document.getElementById('embed-url').value = embedUrl;
            document.getElementById('embed-container').style.display = 'block';
        } catch (error) {
            alert(`Error: ${error.message}`);
        }
    }

    function copyEmbedUrl() {
        const embedUrlInput = document.getElementById('embed-url');
        embedUrlInput.select();
        embedUrlInput.setSelectionRange(0, 99999);
        document.execCommand("copy");
        alert("Embed URL copied to clipboard: " + embedUrlInput.value);
    }

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bannerInput = document.getElementById('banner_image_input');
        const captionInput = document.getElementById('caption_input');

        function extractNameFromUrl(url) {
            let decoded = decodeURIComponent(url);
            return decoded.replace(/^.*\/(.*?)\s\d+\.[a-zA-Z]+$/, "$1");
        }

        function fetchCaption(compUrl) {
            if (!compUrl) {
                captionInput.value = '';
                return;
            }

            fetch(`/get-caption?url=${encodeURIComponent(compUrl)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.caption && data.caption.trim() !== '') {
                        captionInput.value = data.caption;
                    } else {
                        captionInput.value = extractNameFromUrl(compUrl);
                    }
                })
                .catch(err => {
                    console.error('Fetch error:', err);
                    captionInput.value = extractNameFromUrl(compUrl);
                });
        }

        if (bannerInput.value) {
            fetchCaption(bannerInput.value);
        }

        const observer = new MutationObserver(() => {
            fetchCaption(bannerInput.value);
        });

        observer.observe(bannerInput, {
            attributes: true,
            attributeFilter: ['value']
        });

        bannerInput.addEventListener('change', () => {
            fetchCaption(bannerInput.value);
        });
    });
</script>

@endsection
