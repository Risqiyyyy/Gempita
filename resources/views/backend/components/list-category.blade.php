<div class="col-md-4">
    <div class="card tree-categories-container">
        <div class="card-header">
            <div class="card-actions">
                <a class="btn btn-primary mx-2" type="button"
                    href="{{ route('category.create') }}">
                    <svg class="icon icon-left svg-icon-ti-ti-plus" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                    </svg>
                    Create
                </a>
            </div>
        </div>
        <div class="card-body tree-categories-body">
            <div class="file-tree-wrapper">
                <div class="dd" data-depth="0" data-empty-text="No categories found.">
                    <ol class="list-group dd-list ">
                        @foreach ($categories as $item)
                        <li class="dd-item" data-id="1" data-name="Artificial Intelligence">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content d-flex align-items-center gap-2">
                                <div class="d-flex align-items-center gap-1" style="width: 90%;">
                                    <svg class="icon svg-icon-ti-ti-file" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path
                                            d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    </svg>
                                    <a href="{{ route('category.edit', ['id' => $item->id ]) }}" class="text-truncate"
                                        data-bs-toggle="tooltip">
                                        {{ $item->nama_kategori }}
                                    </a>
                                </div>
                            </div>
                            @if ($item->subCategories->isNotEmpty())
                            <ul class="list-unstyled ms-4 mt-2">
                                @foreach ($item->subCategories as $subCategory)
                                <li>
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center gap-1" style="width: 90%;">
                                            <svg class="icon svg-icon-ti-ti-file" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                        </svg>
                                            <a href="{{ route('subcateg.edit', ['id' => $subCategory->id ]) }}" class="text-truncate" data-bs-toggle="tooltip">
                                                {{ $subCategory->nama_sub_kategori }}
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ol>
                    
                </div>
            </div>
        </div>
    </div>
</div>
