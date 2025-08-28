<!-- resources/views/media-modal.blade.php -->
<div class="modal fade" id="mediaModal" tabindex="-1" aria-labelledby="mediaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediaModalLabel">Select Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="media-list" class="row">
                    @foreach($mediaItems as $media)
                        <li class="col-4 mb-4">
                            <img src="{{ $media->getUrl() }}" alt="{{ $media->file_name }}" style="width: 100%; cursor: pointer;" data-id="{{ $media->id }}">
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#media-list img').on('click', function() {
            var mediaUrl = $(this).attr('src');
            var editor = CKEDITOR.instances.content;
            editor.insertHtml('<img src="' + mediaUrl + '" />');
            $('#mediaModal').modal('hide');
        });
    });
</script>
