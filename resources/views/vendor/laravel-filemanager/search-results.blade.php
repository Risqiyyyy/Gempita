{{-- @if(count($files) > 0)
    <div id="content" class="row">
        @foreach($files as $file)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $file) }}" class="card-img-top" alt="File">
                    <div class="card-body">
                        <p class="text-center">{{ basename($file) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="text-muted text-center">Tidak ada file ditemukan.</p>
@endif --}}
