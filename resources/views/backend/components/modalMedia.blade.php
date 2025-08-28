{{-- <div class="modal modal-blur fade media-modal rv-media-modal show" id="rv_media_modal" tabindex="-1"
    style="display: block;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-full" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Media gallery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="p-0 modal-body media-modal-body" id="rv_media_body">
                <meta name="csrf-token" content="0ynAse28z9auIH4ku26oyShg792xkv23cLaHU9ud">

                <link type="text/css"
                    href="https://cms.botble.com/vendor/core/core/media/libraries/jquery-context-menu/jquery.contextMenu.min.css?v=7.4.7"
                    rel="stylesheet">
                <link type="text/css" href="https://cms.botble.com/vendor/core/core/media/css/media.css?v=7.4.7"
                    rel="stylesheet">

                <script>
                    "use strict";

                    var RV_MEDIA_URL = JSON.parse(
                        '{\u0022base_url\u0022:\u0022https:\\\/\\\/cms.botble.com\u0022,\u0022base\u0022:\u0022https:\\\/\\\/cms.botble.com\\\/admin\\\/media\u0022,\u0022get_media\u0022:\u0022https:\\\/\\\/cms.botble.com\\\/admin\\\/media\\\/list\u0022,\u0022create_folder\u0022:\u0022https:\\\/\\\/cms.botble.com\\\/admin\\\/media\\\/folders\\\/create\u0022,\u0022popup\u0022:\u0022https:\\\/\\\/cms.botble.com\\\/admin\\\/media\\\/popup\u0022,\u0022download\u0022:\u0022https:\\\/\\\/cms.botble.com\\\/admin\\\/media\\\/download\u0022,\u0022upload_file\u0022:\u0022https:\\\/\\\/cms.botble.com\\\/admin\\\/media\\\/files\\\/upload\u0022,\u0022get_breadcrumbs\u0022:\u0022https:\\\/\\\/cms.botble.com\\\/admin\\\/media\\\/breadcrumbs\u0022,\u0022global_actions\u0022:\u0022https:\\\/\\\/cms.botble.com\\\/admin\\\/media\\\/global-actions\u0022,\u0022media_upload_from_editor\u0022:\u0022https:\\\/\\\/cms.botble.com\\\/admin\\\/media\\\/files\\\/upload-from-editor\u0022,\u0022download_url\u0022:\u0022https:\\\/\\\/cms.botble.com\\\/admin\\\/media\\\/files\\\/download-url\u0022}'
                    );

                    var RV_MEDIA_CONFIG = JSON.parse(
                        '{\u0022permissions\u0022:[\u0022folders.create\u0022,\u0022folders.edit\u0022,\u0022folders.trash\u0022,\u0022folders.destroy\u0022,\u0022files.create\u0022,\u0022files.edit\u0022,\u0022files.trash\u0022,\u0022files.destroy\u0022,\u0022files.favorite\u0022,\u0022folders.favorite\u0022],\u0022translations\u0022:{\u0022name\u0022:\u0022Name\u0022,\u0022url\u0022:\u0022URL\u0022,\u0022full_url\u0022:\u0022Full URL\u0022,\u0022alt\u0022:\u0022Alt text\u0022,\u0022size\u0022:\u0022Size\u0022,\u0022mime_type\u0022:\u0022Type\u0022,\u0022created_at\u0022:\u0022Uploaded at\u0022,\u0022updated_at\u0022:\u0022Modified at\u0022,\u0022nothing_selected\u0022:\u0022Nothing is selected\u0022,\u0022visit_link\u0022:\u0022Open link\u0022,\u0022width\u0022:\u0022Width\u0022,\u0022height\u0022:\u0022Height\u0022,\u0022no_item\u0022:{\u0022all_media\u0022:{\u0022title\u0022:\u0022Drop files and folders here\u0022,\u0022message\u0022:\u0022Or use the upload button above\u0022},\u0022trash\u0022:{\u0022title\u0022:\u0022There is nothing in your trash currently\u0022,\u0022message\u0022:\u0022Delete files to move them to trash automatically. Delete files from trash to remove them permanently\u0022},\u0022favorites\u0022:{\u0022title\u0022:\u0022You have not added anything to your favorites yet\u0022,\u0022message\u0022:\u0022Add files to favorites to easily find them later\u0022},\u0022recent\u0022:{\u0022title\u0022:\u0022You did not opened anything yet\u0022,\u0022message\u0022:\u0022All recent files that you opened will be appeared here\u0022},\u0022default\u0022:{\u0022title\u0022:\u0022No items\u0022,\u0022message\u0022:\u0022This directory has no item\u0022}},\u0022clipboard\u0022:{\u0022success\u0022:\u0022These file links have been copied to clipboard\u0022},\u0022message\u0022:{\u0022error_header\u0022:\u0022Error\u0022,\u0022success_header\u0022:\u0022Success\u0022},\u0022download\u0022:{\u0022error\u0022:\u0022No files selected or cannot download these files\u0022},\u0022actions_list\u0022:{\u0022basic\u0022:{\u0022preview\u0022:\u0022Preview\u0022,\u0022crop\u0022:\u0022Crop\u0022},\u0022file\u0022:{\u0022copy_link\u0022:\u0022Copy link\u0022,\u0022copy_indirect_link\u0022:\u0022Copy indirect link\u0022,\u0022rename\u0022:\u0022Rename\u0022,\u0022make_copy\u0022:\u0022Make a copy\u0022,\u0022alt_text\u0022:\u0022ALT text\u0022,\u0022share\u0022:\u0022Share\u0022},\u0022user\u0022:{\u0022favorite\u0022:\u0022Add to favorite\u0022,\u0022remove_favorite\u0022:\u0022Remove favorite\u0022},\u0022other\u0022:{\u0022download\u0022:\u0022Download\u0022,\u0022trash\u0022:\u0022Move to trash\u0022,\u0022delete\u0022:\u0022Delete permanently\u0022,\u0022restore\u0022:\u0022Restore\u0022,\u0022properties\u0022:\u0022Properties\u0022}},\u0022change_image\u0022:\u0022Change image\u0022,\u0022delete_image\u0022:\u0022Delete image\u0022,\u0022choose_image\u0022:\u0022Choose image\u0022,\u0022preview_image\u0022:\u0022Preview image\u0022},\u0022pagination\u0022:{\u0022paged\u0022:null,\u0022posts_per_page\u0022:null,\u0022in_process_get_media\u0022:false,\u0022has_more\u0022:true},\u0022chunk\u0022:{\u0022enabled\u0022:false,\u0022chunk_size\u0022:1048576,\u0022max_file_size\u0022:1048576,\u0022storage\u0022:{\u0022chunks\u0022:\u0022chunks\u0022,\u0022disk\u0022:\u0022local\u0022},\u0022clear\u0022:{\u0022timestamp\u0022:\u0022-3 HOURS\u0022,\u0022schedule\u0022:{\u0022enabled\u0022:true,\u0022cron\u0022:\u002225 * * * *\u0022}},\u0022chunk\u0022:{\u0022name\u0022:{\u0022use\u0022:{\u0022session\u0022:true,\u0022browser\u0022:false}}}},\u0022random_hash\u0022:\u002257f1b8459d9c3956317b5bd1f7540ae7\u0022,\u0022default_image\u0022:\u0022https:\\\/\\\/cms.botble.com\\\/vendor\\\/core\\\/core\\\/base\\\/images\\\/placeholder.png\u0022}'
                    );

                    RV_MEDIA_CONFIG.translations.actions_list.other.properties = 'Properties';
                </script>


                <div class="rv-media-container" data-breadcrumb-count="2" data-allow-upload="true"
                    data-view-in="all_media">
                    <div class="card rv-media-wrapper">
                        <input type="checkbox" id="media_details_collapse" class="d-none fake-click-event">

                        <div class="offcanvas offcanvas-start d-md-none" tabindex="-1"
                            aria-labelledby="rvMediaAsideLabel" style="--bb-offcanvas-width: 85%;" id="rv-media-aside">
                            <div class="offcanvas-header">
                                <h2 class="offcanvas-title">Media</h2>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body p-0">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-header">
                                        Filter
                                    </div>
                                    <a class="list-group-item list-group-item-action js-rv-media-change-filter"
                                        data-type="filter" data-value="everything">
                                        <svg class="icon  svg-icon-ti-ti-recycle" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 17l-2 2l2 2"></path>
                                            <path d="M10 19h9a2 2 0 0 0 1.75 -2.75l-.55 -1"></path>
                                            <path d="M8.536 11l-.732 -2.732l-2.732 .732"></path>
                                            <path d="M7.804 8.268l-4.5 7.794a2 2 0 0 0 1.506 2.89l1.141 .024"></path>
                                            <path d="M15.464 11l2.732 .732l.732 -2.732"></path>
                                            <path d="M18.196 11.732l-4.5 -7.794a2 2 0 0 0 -3.256 -.14l-.591 .976">
                                            </path>
                                        </svg> Everything
                                    </a>

                                    <a class="list-group-item list-group-item-action js-rv-media-change-filter"
                                        data-type="filter" data-value="video">
                                        <svg class="icon  svg-icon-ti-ti-photo" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M15 8h.01"></path>
                                            <path
                                                d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z">
                                            </path>
                                            <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5"></path>
                                            <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3"></path>
                                        </svg> Image
                                    </a>

                                    <a class="list-group-item list-group-item-action js-rv-media-change-filter"
                                        data-type="filter" data-value="document">
                                        <svg class="icon  svg-icon-ti-ti-video" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z">
                                            </path>
                                            <path
                                                d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z">
                                            </path>
                                        </svg> Video
                                    </a>

                                    <a class="list-group-item list-group-item-action js-rv-media-change-filter"
                                        data-type="filter" data-value="image">
                                        <svg class="icon  svg-icon-ti-ti-file" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                            </path>
                                        </svg> Document
                                    </a>
                                </div>

                                <div class="list-group list-group-flush">
                                    <div class="list-group-header">
                                        View in
                                    </div>
                                    <a class="list-group-item list-group-item-action js-rv-media-change-filter"
                                        data-type="view_in" data-value="all_media">
                                        <svg class="icon  svg-icon-ti-ti-world" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                            <path d="M3.6 9h16.8"></path>
                                            <path d="M3.6 15h16.8"></path>
                                            <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                                            <path d="M12.5 3a17 17 0 0 1 0 18"></path>
                                        </svg> All media
                                    </a>

                                    <a class="list-group-item list-group-item-action js-rv-media-change-filter"
                                        data-type="view_in" data-value="trash">
                                        <svg class="icon  svg-icon-ti-ti-trash" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7l16 0"></path>
                                            <path d="M10 11l0 6"></path>
                                            <path d="M14 11l0 6"></path>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg> Trash
                                    </a>

                                    <a class="list-group-item list-group-item-action js-rv-media-change-filter"
                                        data-type="view_in" data-value="recent">
                                        <svg class="icon  svg-icon-ti-ti-clock" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                            <path d="M12 7v5l3 3"></path>
                                        </svg> Recent
                                    </a>

                                    <a class="list-group-item list-group-item-action js-rv-media-change-filter"
                                        data-type="view_in" data-value="favorites">
                                        <svg class="icon  svg-icon-ti-ti-star" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                            </path>
                                        </svg> Favorites
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="rv-media-main-wrapper">
                            <div class="card-header flex-column rv-media-header p-0">
                                <div
                                    class="w-100 p-2 rv-media-top-header flex-wrap gap-3 d-flex justify-content-between align-items-start border-bottom bg-body">
                                    <div class="d-flex gap-2 justify-content-between w-100 w-md-auto rv-media-actions">
                                        <button class="btn btn-icon   d-flex d-md-none" type="button"
                                            data-bs-toggle="offcanvas" href="#rv-media-aside">
                                            <svg class="icon icon-left svg-icon-ti-ti-menu-2"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 6l16 0"></path>
                                                <path d="M4 12l16 0"></path>
                                                <path d="M4 18l16 0"></path>
                                            </svg>

                                        </button>

                                        <div class="btn-list">
                                            <div class="dropdown ">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown">

                                                    <svg class="icon  svg-icon-ti-ti-upload"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                        <path d="M7 9l5 -5l5 5"></path>
                                                        <path d="M12 4l0 12"></path>
                                                    </svg>
                                                    Upload

                                                </button>

                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item js-dropzone-upload dz-clickable">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-upload"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                            <path d="M7 9l5 -5l5 5"></path>
                                                            <path d="M12 4l0 12"></path>
                                                        </svg>
                                                        Upload from local

                                                    </button>

                                                    <button class="dropdown-item js-download-action dropdown-item">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-link"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M9 15l6 -6"></path>
                                                            <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464">
                                                            </path>
                                                            <path
                                                                d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463">
                                                            </path>
                                                        </svg>
                                                        Upload from URL

                                                    </button>
                                                </div>
                                            </div>

                                            <button class="btn btn-icon btn-primary js-create-folder-action"
                                                type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Create folder">
                                                <svg class="icon icon-left svg-icon-ti-ti-folder-plus"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M12 19h-7a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2h4l3 3h7a2 2 0 0 1 2 2v3.5">
                                                    </path>
                                                    <path d="M16 19h6"></path>
                                                    <path d="M19 16v6"></path>
                                                </svg>

                                            </button>

                                            <button class="btn btn-icon btn-primary  js-change-action" type="button"
                                                data-type="refresh" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Refresh">
                                                <svg class="icon icon-left svg-icon-ti-ti-refresh"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                                </svg>

                                            </button>

                                            <div class="dropdown d-none d-md-block">
                                                <button
                                                    class="btn btn-primary dropdown-toggle js-rv-media-change-filter-group js-filter-by-type"
                                                    type="button" data-bs-toggle="dropdown" data-bs-placement="top"
                                                    title="Filter">
                                                    <svg class="icon icon-left svg-icon-ti-ti-filter"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z">
                                                        </path>
                                                    </svg>
                                                    <span class="js-rv-media-filter-current">(
                                                        <svg class="icon  svg-icon-ti-ti-recycle"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M12 17l-2 2l2 2"></path>
                                                            <path d="M10 19h9a2 2 0 0 0 1.75 -2.75l-.55 -1"></path>
                                                            <path d="M8.536 11l-.732 -2.732l-2.732 .732"></path>
                                                            <path
                                                                d="M7.804 8.268l-4.5 7.794a2 2 0 0 0 1.506 2.89l1.141 .024">
                                                            </path>
                                                            <path d="M15.464 11l2.732 .732l.732 -2.732"></path>
                                                            <path
                                                                d="M18.196 11.732l-4.5 -7.794a2 2 0 0 0 -3.256 -.14l-.591 .976">
                                                            </path>
                                                        </svg> Everything
                                                        )</span>

                                                </button>

                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item js-rv-media-change-filter active"
                                                        data-type="filter" data-value="everything">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-recycle"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M12 17l-2 2l2 2"></path>
                                                            <path d="M10 19h9a2 2 0 0 0 1.75 -2.75l-.55 -1"></path>
                                                            <path d="M8.536 11l-.732 -2.732l-2.732 .732"></path>
                                                            <path
                                                                d="M7.804 8.268l-4.5 7.794a2 2 0 0 0 1.506 2.89l1.141 .024">
                                                            </path>
                                                            <path d="M15.464 11l2.732 .732l.732 -2.732"></path>
                                                            <path
                                                                d="M18.196 11.732l-4.5 -7.794a2 2 0 0 0 -3.256 -.14l-.591 .976">
                                                            </path>
                                                        </svg>
                                                        Everything

                                                    </button>

                                                    <button class="dropdown-item js-rv-media-change-filter"
                                                        data-type="filter" data-value="image">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-photo"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M15 8h.01"></path>
                                                            <path
                                                                d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z">
                                                            </path>
                                                            <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5"></path>
                                                            <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3"></path>
                                                        </svg>
                                                        Image

                                                    </button>

                                                    <button class="dropdown-item js-rv-media-change-filter"
                                                        data-type="filter" data-value="video">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-video"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path
                                                                d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z">
                                                            </path>
                                                            <path
                                                                d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z">
                                                            </path>
                                                        </svg>
                                                        Video

                                                    </button>

                                                    <button class="dropdown-item js-rv-media-change-filter"
                                                        data-type="filter" data-value="document">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-file"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                            <path
                                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                            </path>
                                                        </svg>
                                                        Document

                                                    </button>
                                                </div>
                                            </div>

                                            <div class="dropdown d-none d-md-block">
                                                <button
                                                    class="btn btn-primary dropdown-toggle js-rv-media-change-filter-group js-filter-by-view-in"
                                                    type="button" data-bs-toggle="dropdown" data-bs-placement="top"
                                                    title="View in" aria-expanded="false">
                                                    <svg class="icon icon-left svg-icon-ti-ti-eye"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                        <path
                                                            d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                                        </path>
                                                    </svg>
                                                    <span class="js-rv-media-filter-current">(
                                                        <svg class="icon  svg-icon-ti-ti-world"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                                            <path d="M3.6 9h16.8"></path>
                                                            <path d="M3.6 15h16.8"></path>
                                                            <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                                                            <path d="M12.5 3a17 17 0 0 1 0 18"></path>
                                                        </svg> All media
                                                        )</span>

                                                </button>

                                                <div class="dropdown-menu" style="">
                                                    <button class="dropdown-item js-rv-media-change-filter active"
                                                        data-type="view_in" data-value="all_media">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-world"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                                            <path d="M3.6 9h16.8"></path>
                                                            <path d="M3.6 15h16.8"></path>
                                                            <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                                                            <path d="M12.5 3a17 17 0 0 1 0 18"></path>
                                                        </svg>
                                                        All media

                                                    </button>

                                                    <button class="dropdown-item js-rv-media-change-filter"
                                                        data-type="view_in" data-value="trash">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-trash"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M4 7l16 0"></path>
                                                            <path d="M10 11l0 6"></path>
                                                            <path d="M14 11l0 6"></path>
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12">
                                                            </path>
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                        </svg>
                                                        Trash

                                                    </button>

                                                    <button class="dropdown-item js-rv-media-change-filter"
                                                        data-type="view_in" data-value="recent">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-clock"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                                            <path d="M12 7v5l3 3"></path>
                                                        </svg>
                                                        Recent

                                                    </button>

                                                    <button class="dropdown-item js-rv-media-change-filter"
                                                        data-type="view_in" data-value="favorites">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-star"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                            </path>
                                                        </svg>
                                                        Favorites

                                                    </button>
                                                </div>
                                            </div>

                                            <button class="btn btn-danger d-none js-files-action" type="button"
                                                data-action="empty_trash" style="display: none;">
                                                <svg class="icon icon-left svg-icon-ti-ti-trash"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 7l16 0"></path>
                                                    <path d="M10 11l0 6"></path>
                                                    <path d="M14 11l0 6"></path>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg>
                                                Empty trash

                                            </button>
                                        </div>
                                    </div>
                                    <div class="rv-media-search">
                                        <form class="input-search-wrapper" action="" method="GET">
                                            <div class="input-group">
                                                <input type="search" class="form-control" name="search"
                                                    placeholder="Search in current folder">
                                                <button class="btn btn-icon" type="submit">
                                                    <svg class="icon icon-left svg-icon-ti-ti-search"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                                        <path d="M21 21l-6 -6"></path>
                                                    </svg>

                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="w-100 d-flex flex-wrap gap-3 p-2">
                                    <div class="d-flex w-100 w-md-auto align-items-center rv-media-breadcrumb">
                                        <ul class="breadcrumb">
                                            <li>
                                                <a href="#" data-folder="0"
                                                    class="text-decoration-none js-change-folder">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M15 8h.01"></path>
                                                        <path
                                                            d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z">
                                                        </path>
                                                        <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5"></path>
                                                        <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3"></path>
                                                    </svg>
                                                    All media
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-folder="1"
                                                    class="text-decoration-none js-change-folder">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2">
                                                        </path>
                                                    </svg>
                                                    news
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between justify-content-md-end align-items-center rv-media-tools w-100 w-md-auto">
                                        <div class="btn-list" role="group">
                                            <div class="dropdown ">
                                                <button class="btn   dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown">

                                                    <svg class="icon  svg-icon-ti-ti-sort-a-z"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M16 8h4l-4 8h4"></path>
                                                        <path d="M4 16v-6a2 2 0 1 1 4 0v6"></path>
                                                        <path d="M4 13h4"></path>
                                                        <path d="M11 12h2"></path>
                                                    </svg>
                                                    Sort

                                                </button>

                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item js-rv-media-change-filter"
                                                        data-type="sort_by" data-value="name-asc">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-sort-ascending-letters"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M15 10v-5c0 -1.38 .62 -2 2 -2s2 .62 2 2v5m0 -3h-4">
                                                            </path>
                                                            <path d="M19 21h-4l4 -7h-4"></path>
                                                            <path d="M4 15l3 3l3 -3"></path>
                                                            <path d="M7 6v12"></path>
                                                        </svg>
                                                        File name - ASC

                                                    </button>
                                                    <button class="dropdown-item js-rv-media-change-filter"
                                                        data-type="sort_by" data-value="name-desc">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-sort-descending-letters"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M15 21v-5c0 -1.38 .62 -2 2 -2s2 .62 2 2v5m0 -3h-4">
                                                            </path>
                                                            <path d="M19 10h-4l4 -7h-4"></path>
                                                            <path d="M4 15l3 3l3 -3"></path>
                                                            <path d="M7 6v12"></path>
                                                        </svg>
                                                        File name - DESC

                                                    </button>
                                                    <button class="dropdown-item js-rv-media-change-filter"
                                                        data-type="sort_by" data-value="created_at-asc">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-sort-ascending-numbers"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M4 15l3 3l3 -3"></path>
                                                            <path d="M7 6v12"></path>
                                                            <path
                                                                d="M17 3a2 2 0 0 1 2 2v3a2 2 0 1 1 -4 0v-3a2 2 0 0 1 2 -2z">
                                                            </path>
                                                            <path d="M17 16m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                            <path d="M19 16v3a2 2 0 0 1 -2 2h-1.5"></path>
                                                        </svg>
                                                        Uploaded date - ASC

                                                    </button>
                                                    <button class="dropdown-item js-rv-media-change-filter active"
                                                        data-type="sort_by" data-value="created_at-desc">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-sort-descending-numbers"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M4 15l3 3l3 -3"></path>
                                                            <path d="M7 6v12"></path>
                                                            <path
                                                                d="M17 14a2 2 0 0 1 2 2v3a2 2 0 1 1 -4 0v-3a2 2 0 0 1 2 -2z">
                                                            </path>
                                                            <path d="M17 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                            <path d="M19 5v3a2 2 0 0 1 -2 2h-1.5"></path>
                                                        </svg>
                                                        Uploaded date - DESC

                                                    </button>
                                                    <button class="dropdown-item js-rv-media-change-filter"
                                                        data-type="sort_by" data-value="size-asc">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-sort-ascending-2"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M14 9l3 -3l3 3"></path>
                                                            <path
                                                                d="M5 5m0 .5a.5 .5 0 0 1 .5 -.5h4a.5 .5 0 0 1 .5 .5v4a.5 .5 0 0 1 -.5 .5h-4a.5 .5 0 0 1 -.5 -.5z">
                                                            </path>
                                                            <path
                                                                d="M5 14m0 .5a.5 .5 0 0 1 .5 -.5h4a.5 .5 0 0 1 .5 .5v4a.5 .5 0 0 1 -.5 .5h-4a.5 .5 0 0 1 -.5 -.5z">
                                                            </path>
                                                            <path d="M17 6v12"></path>
                                                        </svg>
                                                        Size - ASC

                                                    </button>
                                                    <button class="dropdown-item js-rv-media-change-filter"
                                                        data-type="sort_by" data-value="size-desc">
                                                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-sort-descending-2"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path
                                                                d="M5 5m0 .5a.5 .5 0 0 1 .5 -.5h4a.5 .5 0 0 1 .5 .5v4a.5 .5 0 0 1 -.5 .5h-4a.5 .5 0 0 1 -.5 -.5z">
                                                            </path>
                                                            <path
                                                                d="M5 14m0 .5a.5 .5 0 0 1 .5 -.5h4a.5 .5 0 0 1 .5 .5v4a.5 .5 0 0 1 -.5 .5h-4a.5 .5 0 0 1 -.5 -.5z">
                                                            </path>
                                                            <path d="M14 15l3 3l3 -3"></path>
                                                            <path d="M17 18v-12"></path>
                                                        </svg>
                                                        Size - DESC

                                                    </button>
                                                </div>
                                            </div>

                                            <div class="dropdown rv-dropdown-actions">
                                                <button class="btn disabled dropdown-toggle" type="button"
                                                    disabled="" data-bs-toggle="dropdown">

                                                    <svg class="icon  svg-icon-ti-ti-hand-finger"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5"></path>
                                                        <path d="M11 11.5v-2a1.5 1.5 0 1 1 3 0v2.5"></path>
                                                        <path d="M14 10.5a1.5 1.5 0 0 1 3 0v1.5"></path>
                                                        <path
                                                            d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7a69.74 69.74 0 0 1 -.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47">
                                                        </path>
                                                    </svg>
                                                    Actions

                                                </button>

                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item js-files-action"
                                                        data-action="rename">
                                                        <span class="icon-tabler-wrapper dropdown-item-icon"><span
                                                                class="icon-tabler-wrapper dropdown-item-icon"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <path
                                                                        d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                                    </path>
                                                                    <path
                                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                                    </path>
                                                                    <path d="M16 5l3 3"></path>
                                                                </svg></span></span>
                                                        Rename

                                                    </button>

                                                    <button class="dropdown-item js-files-action"
                                                        data-action="make_copy">
                                                        <span class="icon-tabler-wrapper dropdown-item-icon"><span
                                                                class="icon-tabler-wrapper dropdown-item-icon"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <path
                                                                        d="M8 8m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z">
                                                                    </path>
                                                                    <path
                                                                        d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2">
                                                                    </path>
                                                                </svg></span></span>
                                                        Make a copy

                                                    </button>

                                                    <button class="dropdown-item js-files-action"
                                                        data-action="copy_link">
                                                        <span class="icon-tabler-wrapper dropdown-item-icon"><span
                                                                class="icon-tabler-wrapper dropdown-item-icon"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <path d="M9 15l6 -6"></path>
                                                                    <path
                                                                        d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464">
                                                                    </path>
                                                                    <path
                                                                        d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463">
                                                                    </path>
                                                                </svg></span></span>
                                                        Copy link

                                                    </button>

                                                    <button class="dropdown-item js-files-action"
                                                        data-action="copy_indirect_link">
                                                        <span class="icon-tabler-wrapper dropdown-item-icon"><span
                                                                class="icon-tabler-wrapper dropdown-item-icon"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <path d="M9 15l6 -6"></path>
                                                                    <path
                                                                        d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464">
                                                                    </path>
                                                                    <path
                                                                        d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463">
                                                                    </path>
                                                                </svg></span></span>
                                                        Copy indirect link

                                                    </button>

                                                    <button class="dropdown-item js-files-action" data-action="share">
                                                        <span class="icon-tabler-wrapper dropdown-item-icon"><span
                                                                class="icon-tabler-wrapper dropdown-item-icon"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0">
                                                                    </path>
                                                                    <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0">
                                                                    </path>
                                                                    <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0">
                                                                    </path>
                                                                    <path d="M8.7 10.7l6.6 -3.4"></path>
                                                                    <path d="M8.7 13.3l6.6 3.4"></path>
                                                                </svg></span></span>
                                                        Share

                                                    </button>
                                                    <li role="separator" class="divider"></li>
                                                    <button class="dropdown-item js-files-action"
                                                        data-action="favorite">
                                                        <span class="icon-tabler-wrapper dropdown-item-icon"><span
                                                                class="icon-tabler-wrapper dropdown-item-icon"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <path
                                                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                                    </path>
                                                                </svg></span></span>
                                                        Add to favorite

                                                    </button>
                                                    <li role="separator" class="divider"></li>
                                                    <button class="dropdown-item js-files-action"
                                                        data-action="download">
                                                        <span class="icon-tabler-wrapper dropdown-item-icon"><span
                                                                class="icon-tabler-wrapper dropdown-item-icon"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <path
                                                                        d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2">
                                                                    </path>
                                                                    <path d="M7 11l5 5l5 -5"></path>
                                                                    <path d="M12 4l0 12"></path>
                                                                </svg></span></span>
                                                        Download

                                                    </button>

                                                    <button class="dropdown-item js-files-action" data-action="trash">
                                                        <span class="icon-tabler-wrapper dropdown-item-icon"><span
                                                                class="icon-tabler-wrapper dropdown-item-icon"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <path d="M4 7l16 0"></path>
                                                                    <path d="M10 11l0 6"></path>
                                                                    <path d="M14 11l0 6"></path>
                                                                    <path
                                                                        d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12">
                                                                    </path>
                                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3">
                                                                    </path>
                                                                </svg></span></span>
                                                        Move to trash

                                                    </button>

                                                    <button class="dropdown-item js-files-action"
                                                        data-action="properties">
                                                        <span class="icon-tabler-wrapper dropdown-item-icon"><span
                                                                class="icon-tabler-wrapper dropdown-item-icon"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-palette"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <path
                                                                        d="M12 21a9 9 0 0 1 0 -18c4.97 0 9 3.582 9 8c0 1.06 -.474 2.078 -1.318 2.828c-.844 .75 -1.989 1.172 -3.182 1.172h-2.5a2 2 0 0 0 -1 3.75a1.3 1.3 0 0 1 -1 2.25">
                                                                    </path>
                                                                    <path
                                                                        d="M8.5 10.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0">
                                                                    </path>
                                                                    <path
                                                                        d="M12.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0">
                                                                    </path>
                                                                    <path
                                                                        d="M16.5 10.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0">
                                                                    </path>
                                                                </svg></span></span>
                                                        Properties

                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-group js-rv-media-change-view-type ms-2" role="group">
                                            <button class="btn btn-icon active" type="button" data-type="tiles">
                                                <svg class="icon icon-left svg-icon-ti-ti-layout-grid"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                                    </path>
                                                    <path
                                                        d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                                    </path>
                                                    <path
                                                        d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                                    </path>
                                                    <path
                                                        d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                                    </path>
                                                </svg>

                                            </button>
                                            <button class="btn btn-icon" type="button" data-type="list">
                                                <svg class="icon icon-left svg-icon-ti-ti-layout-list"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                    </path>
                                                    <path
                                                        d="M4 14m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                    </path>
                                                </svg>

                                            </button>
                                        </div>
                                        <label class="btn btn-icon   collapse-panel ms-2 d-none d-sm-flex"
                                            type="button" for="media_details_collapse">
                                            <svg class="icon icon-left svg-icon-ti-ti-arrow-bar-right"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M20 12l-10 0"></path>
                                                <path d="M20 12l-4 4"></path>
                                                <path d="M20 12l-4 -4"></path>
                                                <path d="M4 4l0 16"></path>
                                            </svg>

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <main class="rv-media-main">
                                <div class="rv-media-items has-items">
                                    <div class="rv-media-grid">
                                        <ul>
                                            <li class="no-items">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                    <path d="M7 9l5 -5l5 5"></path>
                                                    <path d="M12 4l0 12"></path>
                                                </svg>
                                                <h3>Drop files and folders here</h3>
                                                <p>Or use the upload button above</p>
                                            </li>
                                            <li class="rv-media-list-title up-one-level js-up-one-level">
                                                <div class="rv-media-item" data-context="__type__"
                                                    title="Up one level">
                                                    <div class="rv-media-thumbnail">
                                                        <svg class="icon icon-lg svg-icon-ti-ti-corner-up-left"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M18 18v-6a3 3 0 0 0 -3 -3h-10l4 -4m0 8l-4 -4">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title">...</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="17">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="6">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/6-150x150.jpg"
                                                            alt="6">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">6</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="18">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="7">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/7-150x150.jpg"
                                                            alt="7">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">7</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="19">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="8">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/8-150x150.jpg"
                                                            alt="8">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">8</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="20">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="9">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/9-150x150.jpg"
                                                            alt="9">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">9</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="10">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="18">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/18-150x150.jpg"
                                                            alt="18">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">18</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="11">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="19">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/19-150x150.jpg"
                                                            alt="19">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">19</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="12">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="2">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/2-150x150.jpg"
                                                            alt="2">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">2</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="13">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="20">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/20-150x150.jpg"
                                                            alt="20">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">20</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="14">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="3">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/3-150x150.jpg"
                                                            alt="3">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">3</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="15">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="4">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/4-150x150.jpg"
                                                            alt="4">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">4</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="16">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="5">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/5-150x150.jpg"
                                                            alt="5">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">5</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="3">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="11">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/11-150x150.jpg"
                                                            alt="11">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">11</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="4">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="12">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/12-150x150.jpg"
                                                            alt="12">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">12</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="5">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="13">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/13-150x150.jpg"
                                                            alt="13">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">13</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="6">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="14">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/14-150x150.jpg"
                                                            alt="14">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">14</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="7">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="15">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/15-150x150.jpg"
                                                            alt="15">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">15</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="8">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="16">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/16-150x150.jpg"
                                                            alt="16">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">16</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="9">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="17">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/17-150x150.jpg"
                                                            alt="17">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">17</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="1">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="1">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/1-150x150.jpg"
                                                            alt="1">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">1</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="rv-media-list-title js-media-list-title js-context-menu"
                                                data-context="file" data-id="2">
                                                <input type="checkbox" class="hidden">
                                                <div class="rv-media-item" title="10">
                                                    <span class="media-item-selected">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <div class="rv-media-thumbnail">
                                                        <img src="https://cms.botble.com/storage/news/10-150x150.jpg"
                                                            alt="10">
                                                    </div>
                                                    <div class="rv-media-description">
                                                        <div class="title title">10</div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="rv-media-details" style="">
                                    <div class="rv-media-thumbnail"><svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M15 8h.01"></path>
                                            <path
                                                d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z">
                                            </path>
                                            <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5"></path>
                                            <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3"></path>
                                        </svg></div>
                                    <div class="rv-media-description"></div>
                                </div>




                            </main>
                            <footer class="rv-media-footer">
                                <button class="btn btn-primary  js-insert-to-editor" type="button">

                                    Insert

                                </button>
                            </footer>
                        </div>
                        <div class="rv-upload-progress hide-the-pane position-fixed bottom-0 end-0 ">
                            <div class="card">
                                <div class="card-header position-relative">
                                    <h3 class="panel-title mb-0">Upload progress</h3>
                                    <button
                                        class="btn   close-pane position-absolute top-50 bg-primary text-white text-center p-0"
                                        type="button">

                                        <svg class="icon m-0 svg-icon-ti-ti-x" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M18 6l-12 12"></path>
                                            <path d="M6 6l12 12"></path>
                                        </svg>

                                    </button>
                                </div>
                                <div class="table-responsive overflow-auto" style="max-height: 180px">
                                    <table class="table table-vcenter card-table table-hover table-striped">
                                        <tbody class="rv-upload-progress-table">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade modal-blur" id="modal_add_folder" tabindex="-1" role="dialog"
                    aria-hidden="true" data-select2-dropdown-parent="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-has-form " role="document">
                        <div class="modal-content">
                            <form action="" method="POST" class="rv-form form-add-folder">
                                <input type="hidden" name="_token"
                                    value="0ynAse28z9auIH4ku26oyShg792xkv23cLaHU9ud" autocomplete="off">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create folder</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>


                                <div class="modal-body">
                                    <div class="mb-3 position-relative">
                                        <div class="input-group">


                                            <input class="form-control" type="text" name="name"
                                                id="name" placeholder="Folder name">


                                            <button class="btn btn-primary" type="submit">

                                                Create

                                            </button>

                                        </div>
                                    </div>
                                    <div class="modal-notice"></div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade modal-blur" id="modal_rename_items" tabindex="-1" role="dialog"
                    aria-hidden="true" data-select2-dropdown-parent="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-has-form " role="document">
                        <div class="modal-content">
                            <form action="" method="POST" class="form-rename">
                                <input type="hidden" name="_token"
                                    value="0ynAse28z9auIH4ku26oyShg792xkv23cLaHU9ud" autocomplete="off">
                                <div class="modal-header">
                                    <h5 class="modal-title">Rename</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>


                                <div class="modal-body">
                                    <div class="rename-items"></div>
                                    <div class="modal-notice"></div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn" type="button" data-bs-dismiss="modal">

                                        Close

                                    </button>
                                    <button class="btn btn-primary" type="submit">

                                        Save changes

                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade modal-blur" id="modal_alt_text_items" tabindex="-1" role="dialog"
                    aria-hidden="true" data-select2-dropdown-parent="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-has-form " role="document">
                        <div class="modal-content">
                            <form action="" method="POST" class="form-alt-text">
                                <input type="hidden" name="_token"
                                    value="0ynAse28z9auIH4ku26oyShg792xkv23cLaHU9ud" autocomplete="off">
                                <div class="modal-header">
                                    <h5 class="modal-title">Alt text</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>


                                <div class="modal-body">
                                    <div class="alt-text-items"></div>
                                    <div class="modal-notice"></div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn" type="button" data-bs-dismiss="modal">

                                        Close

                                    </button>
                                    <button class="btn btn-primary" type="submit">

                                        Save changes

                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade modal-blur" id="modal_trash_items" tabindex="-1" role="dialog"
                    aria-hidden="true" data-select2-dropdown-parent="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-has-form " role="document">
                        <div class="modal-content">
                            <form action="" method="POST" class="form-delete-items">
                                <input type="hidden" name="_token"
                                    value="0ynAse28z9auIH4ku26oyShg792xkv23cLaHU9ud" autocomplete="off">
                                <div class="modal-header">
                                    <h5 class="modal-title">Move items to trash</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>


                                <div class="modal-body">
                                    <p>Are you sure you want to move these items to trash?</p>
                                    <div class="modal-notice"></div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                    <button type="button" class="btn btn-primary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade modal-blur" id="modal_delete_items" tabindex="-1" role="dialog"
                    aria-hidden="true" data-select2-dropdown-parent="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-has-form " role="document">
                        <div class="modal-content">
                            <form action="" method="POST" class="form-delete-items">
                                <input type="hidden" name="_token"
                                    value="0ynAse28z9auIH4ku26oyShg792xkv23cLaHU9ud" autocomplete="off">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete item(s)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>


                                <div class="modal-body">
                                    <p>This action is irreversible. Are you sure want to delete these items?</p>
                                    <div class="modal-notice"></div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                    <button type="button" class="btn btn-primary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade modal-blur" id="modal_empty_trash" tabindex="-1" role="dialog"
                    aria-hidden="true" data-select2-dropdown-parent="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-has-form " role="document">
                        <div class="modal-content">
                            <form action="" method="POST" class="form-empty-trash">
                                <input type="hidden" name="_token"
                                    value="0ynAse28z9auIH4ku26oyShg792xkv23cLaHU9ud" autocomplete="off">
                                <div class="modal-header">
                                    <h5 class="modal-title">Empty trash</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>


                                <div class="modal-body">
                                    <p>This action is irreversible. Are you sure you want to permanently delete all
                                        items in trash?</p>
                                    <div class="modal-notice"></div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                    <button type="button" class="btn btn-primary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal modal-blur fade" tabindex="-1" role="dialog" id="modal_download_url">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" data-downloading="Downloading..." data-text="Download">
                                    <svg class="icon  svg-icon-ti-ti-download" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                        <path d="M7 11l5 5l5 -5"></path>
                                        <path d="M12 4l0 12"></path>
                                    </svg> Download
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="rv-form form-download-url">
                                    <div id="download-form-wrapper">
                                        <div class="mb-3">
                                            <textarea rows="4" name="urls" class="form-control"
                                                placeholder="https://example.com/image1.jpg
https://example.com/image2.jpg
https://example.com/image3.jpg
..."></textarea>

                                            <small class="form-hint">Enter one URL per line.</small>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary  w-100" type="submit">

                                        Download

                                    </button>
                                </form>
                                <div class="mt-2 modal-notice" id="modal-notice"
                                    style="max-height: 350px;overflow: auto"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade modal-blur" id="modal_crop_image" tabindex="-1" role="dialog"
                    aria-hidden="true" data-select2-dropdown-parent="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-has-form modal-lg" role="document">
                        <div class="modal-content">
                            <form action="" method="POST" class="rv-form form-crop">
                                <input type="hidden" name="_token"
                                    value="0ynAse28z9auIH4ku26oyShg792xkv23cLaHU9ud" autocomplete="off">
                                <div class="modal-header">
                                    <h5 class="modal-title">Crop</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>


                                <div class="modal-body">
                                    <div>
                                        <input type="hidden" name="image_id">
                                        <input type="hidden" name="crop_data">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="crop-image"></div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mt-3">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="dataHeight">
                                                            Height


                                                        </label>



                                                        <input class="form-control" type="text"
                                                            name="dataHeight" id="dataHeight">
                                                    </div>

                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="dataWidth">
                                                            Width


                                                        </label>



                                                        <input class="form-control" type="text"
                                                            name="dataWidth" id="dataWidth">
                                                    </div>

                                                    <label class="form-check">
                                                        <input type="checkbox" id="aspectRatio" name="aspectRatio"
                                                            class="form-check-input" value="">

                                                        <span class="form-check-label">
                                                            Aspect ratio
                                                        </span>

                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn" type="button" data-bs-dismiss="modal">

                                        Close

                                    </button>

                                    <button class="btn btn-primary" type="submit">

                                        Crop

                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade modal-blur" id="modal-properties" tabindex="-1" role="dialog"
                    aria-hidden="true" data-select2-dropdown-parent="true">
                    <div class="modal-dialog modal-dialog-centered " role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Properties</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>


                            <div class="modal-body">
                                <input type="hidden" name="selected">

                                <div class="mb-3 position-relative">
                                    <label class="form-label" for="color">
                                        Choose a color for this folder


                                    </label>

                                    <div class="row g-2">
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color" type="radio" value="#3498db"
                                                    class="form-colorinput-input">
                                                <span class="form-colorinput-color"
                                                    style="background-color:#3498db;"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color" type="radio" value="#2ecc71"
                                                    class="form-colorinput-input">
                                                <span class="form-colorinput-color"
                                                    style="background-color:#2ecc71;"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color" type="radio" value="#e74c3c"
                                                    class="form-colorinput-input">
                                                <span class="form-colorinput-color"
                                                    style="background-color:#e74c3c;"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color" type="radio" value="#f39c12"
                                                    class="form-colorinput-input">
                                                <span class="form-colorinput-color"
                                                    style="background-color:#f39c12;"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color" type="radio" value="#9b59b6"
                                                    class="form-colorinput-input">
                                                <span class="form-colorinput-color"
                                                    style="background-color:#9b59b6;"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color" type="radio" value="#1abc9c"
                                                    class="form-colorinput-input">
                                                <span class="form-colorinput-color"
                                                    style="background-color:#1abc9c;"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color" type="radio" value="#34495e"
                                                    class="form-colorinput-input">
                                                <span class="form-colorinput-color"
                                                    style="background-color:#34495e;"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color" type="radio" value="#e67e22"
                                                    class="form-colorinput-input">
                                                <span class="form-colorinput-color"
                                                    style="background-color:#e67e22;"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color" type="radio" value="#27ae60"
                                                    class="form-colorinput-input">
                                                <span class="form-colorinput-color"
                                                    style="background-color:#27ae60;"></span>
                                            </label>
                                        </div>
                                        <div class="col-auto">
                                            <label class="form-colorinput form-colorinput-light">
                                                <input name="color" type="radio" value="#c0392b"
                                                    class="form-colorinput-input">
                                                <span class="form-colorinput-color"
                                                    style="background-color:#c0392b;"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn" type="button" data-bs-dismiss="modal">

                                    Close

                                </button>

                                <button class="btn btn-primary" type="submit">

                                    Save changes

                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal fade modal-blur" id="modal_share_items" tabindex="-1" role="dialog"
                    aria-hidden="true" data-select2-dropdown-parent="true">
                    <div class="modal-dialog modal-dialog-centered " role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Share</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>


                            <div class="modal-body">
                                <div class="share-items">
                                    <div class="mb-3">
                                        <label for="media-share-type" class="form-label">Share Type</label>
                                        <select id="media-share-type" data-bb-value="share-type"
                                            class=" form-select" name="share_type">
                                            <option value="url">URL</option>
                                            <option value="indirect_url">Indirect URL</option>
                                            <option value="html">HTML</option>
                                            <option value="markdown">Markdown</option>
                                        </select>

                                    </div>

                                    <div class="mb-3" data-bb-value="results">
                                        <label for="media-share-results" class="form-label">Share Results</label>
                                        <textarea id="media-share-results" class="form-control" readonly="" data-bb-value="share-result"
                                            name="share_result" cols="50" rows="10"></textarea>
                                    </div>

                                    <div class="mb-0 text-end">
                                        <button class="btn   btn-icon" type="button" data-bb-toggle="clipboard"
                                            data-clipboard-parent="#modal_share_items .share-items"
                                            data-clipboard-target="[data-bb-value='share-result']">

                                            <svg class="icon  svg-icon-ti-ti-clipboard" data-clipboard-icon="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                                                </path>
                                                <path
                                                    d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                                                </path>
                                            </svg> <svg class="icon text-success d-none svg-icon-ti-ti-check"
                                                data-clipboard-success-icon="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>

                                        </button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <button class="d-none js-rv-clipboard-temp"></button>

                <script type="text/x-custom-template" id="rv_media_loading">
    <div class="loading-spinner"></div>
</script>

                <script type="text/x-custom-template" id="rv_action_item">
    <button class="dropdown-item js-files-action" data-action="__action__">
            <i class="__icon__ dropdown-item-icon dropdown-item-icon"></i>
    __name__

        </button>
</script>

                <script type="text/x-custom-template" id="rv_media_items_list">
    <div class="rv-media-list">
        <ul>
            <li class="no-items">
                <svg class="icon  svg-icon-ti-ti-upload"
  xmlns="http://www.w3.org/2000/svg"
  width="24"
  height="24"
  viewBox="0 0 24 24"
  fill="none"
  stroke="currentColor"
  stroke-width="2"
  stroke-linecap="round"
  stroke-linejoin="round"
  >
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
  <path d="M7 9l5 -5l5 5" />
  <path d="M12 4l0 12" />
</svg>                <h3>Drop files and folders here</h3>
                <p>Or use the upload button above.</p>
            </li>
            <li class="rv-media-list-title up-one-level js-up-one-level" title="Up one level">
                <div class="custom-checkbox"></div>
                <div class="rv-media-file-name">
                    <svg class="icon  svg-icon-ti-ti-corner-up-left"
  xmlns="http://www.w3.org/2000/svg"
  width="24"
  height="24"
  viewBox="0 0 24 24"
  fill="none"
  stroke="currentColor"
  stroke-width="2"
  stroke-linecap="round"
  stroke-linejoin="round"
  >
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M18 18v-6a3 3 0 0 0 -3 -3h-10l4 -4m0 8l-4 -4" />
</svg>                    <span>...</span>
                </div>
                <div class="rv-media-file-size"></div>
                <div class="rv-media-created-at"></div>
            </li>
        </ul>
    </div>
</script>

                <script type="text/x-custom-template" id="rv_media_items_tiles">
    <div class="rv-media-grid">
        <ul>
            <li class="no-items">
                __noItemIcon__
                <h3>__noItemTitle__</h3>
                <p>__noItemMessage__</p>
            </li>
            <li class="rv-media-list-title up-one-level js-up-one-level">
                <div class="rv-media-item" data-context="__type__" title="Up one level">
                    <div class="rv-media-thumbnail">
                        <svg class="icon icon-lg svg-icon-ti-ti-corner-up-left"
  xmlns="http://www.w3.org/2000/svg"
  width="24"
  height="24"
  viewBox="0 0 24 24"
  fill="none"
  stroke="currentColor"
  stroke-width="2"
  stroke-linecap="round"
  stroke-linejoin="round"
  >
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M18 18v-6a3 3 0 0 0 -3 -3h-10l4 -4m0 8l-4 -4" />
</svg>                    </div>
                    <div class="rv-media-description">
                        <div class="title">...</div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</script>

                <script type="text/x-custom-template" id="rv_media_items_list_element">
    <li class="rv-media-list-title js-media-list-title js-context-menu" data-context="__type__" title="__name__" data-id="__id__">
        <div class="custom-checkbox">
            <label>
                <input type="checkbox">
                <span></span>
            </label>
        </div>
        <div class="rv-media-file-name">
            __thumb__
            <span>__name__</span>
        </div>
        <div class="rv-media-file-size">__size__</div>
        <div class="rv-media-created-at">__date__</div>
    </li>
</script>

                <script type="text/x-custom-template" id="rv_media_items_tiles_element">
    <li class="rv-media-list-title js-media-list-title js-context-menu" data-context="__type__" data-id="__id__">
        <input type="checkbox" class="hidden">
        <div class="rv-media-item" title="__name__">
            <span class="media-item-selected">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z"></path>
                </svg>
            </span>
            <div class="rv-media-thumbnail">
                __thumb__
            </div>
            <div class="rv-media-description">
                <div class="title title">__name__</div>
            </div>
        </div>
    </li>
</script>

                <script type="text/x-custom-template" id="rv_media_upload_progress_item">
    <tr >
    <td >
    <span class="file-name">__fileName__</span>
            <div class="file-error"></div>
</td>
        <td >
    <span class="file-size">__fileSize__</span>
</td>
        <td >
    <span class="file-status text-__status__">__message__</span>
</td>
</tr>
</script>

                <script type="text/x-custom-template" id="rv_media_breadcrumb_item">
    <li>
        <a href="#" data-folder="__folderId__" class="text-decoration-none js-change-folder">
            __icon__
            __name__
        </a>
    </li>
</script>

                <script type="text/x-custom-template" id="rv_media_rename_item">
    <div class="mb-3">
        <div class="input-group">
            <div class="input-group-text">__icon__</div>
            <input class="form-control" placeholder="__placeholder__" value="__value__">
        </div>
    </div>

    <label  class="form-check">
    <input
        type="checkbox" name="rename_physical_file" class="form-check-input" data-folder-label="Rename physical folder name on disk too" data-file-label="Rename physical file name on disk too" data-bb-toggle="collapse" data-bb-target=".rename-physical-file-warning"
        value=""
            >

            <span class="form-check-label">
            __label__
        </span>

    </label>

    <div
    role="alert"
    class="alert alert-warning rename-physical-file-warning" style="display: none;"
>
            <div class="d-flex">
            <div>
                <svg class="icon alert-icon svg-icon-ti-ti-alert-circle"
  xmlns="http://www.w3.org/2000/svg"
  width="24"
  height="24"
  viewBox="0 0 24 24"
  fill="none"
  stroke="currentColor"
  stroke-width="2"
  stroke-linecap="round"
  stroke-linejoin="round"
  >
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
  <path d="M12 8v4" />
  <path d="M12 16h.01" />
</svg>            </div>
            <div class="w-100">


    This option will rename physical file name on disk too. It may cause broken links if you are using this file in other places.

            </div>
    </div>



</div>
</script>

                <script type="text/x-custom-template" id="rv_media_alt_text_item">
    <div class="mb-3">
        <div class="input-group">
            <div class="input-group-text">
                __icon__
            </div>
            <input class="form-control" placeholder="__placeholder__" value="__value__">
        </div>
    </div>
</script>

                <script type="text/x-custom-template" id="rv_media_crop_image">
    <img src="__src__" style="display: block;max-width: 100%">
</script>

                <div class="media-download-popup" style="display: none">
                    <div role="alert" class="alert alert-success">
                        <div class="d-flex">
                            <div>
                                <svg class="icon alert-icon svg-icon-ti-ti-circle-check"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                    <path d="M9 12l2 2l4 -4"></path>
                                </svg>
                            </div>
                            <div class="w-100">


                                Preparing file to download...

                            </div>
                        </div>



                    </div>
                </div>


                <script src="https://cms.botble.com/vendor/core/core/media/libraries/lodash/lodash.min.js?v=7.4.7"
                    type="text/javascript"></script>
                <script src="https://cms.botble.com/vendor/core/core/base/libraries/dropzone/dropzone.js?v=7.4.7"
                    type="text/javascript"></script>
                <script
                    src="https://cms.botble.com/vendor/core/core/media/libraries/jquery-context-menu/jquery.ui.position.min.js?v=7.4.7"
                    type="text/javascript"></script>
                <script
                    src="https://cms.botble.com/vendor/core/core/media/libraries/jquery-context-menu/jquery.contextMenu.min.js?v=7.4.7"
                    type="text/javascript"></script>
                <script src="https://cms.botble.com/vendor/core/core/media/js/media.js?v=7.4.7" type="text/javascript"></script>

            </div>
        </div>
    </div>
</div> --}}

{{-- <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
    Upload Image
</button>

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="image">Choose Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Display Uploaded Images -->
<div id="image-gallery" class="mt-3">
    <h5>Uploaded Images:</h5>
    <div class="row">
        <div class="col-4">
            <img src="path/to/image1.jpg" alt="Image 1" class="img-fluid mb-2">
        </div>
        <div class="col-4">
            <img src="path/to/image2.jpg" alt="Image 2" class="img-fluid mb-2">
        </div>
        <div class="col-4">
            <img src="path/to/image3.jpg" alt="Image 3" class="img-fluid mb-2">
        </div>
    </div>
</div> --}}
