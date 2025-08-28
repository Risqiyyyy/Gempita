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
                                <a href="{{ route('category.create') }}">Catgeories</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <h1 class="mb-0 d-inline-block fs-6 lh-1">Edit</h1>
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
        <div class="row row-cards">
            <div class="col-12">
                <div class="my-2 text-end">
                </div>
            </div>
            @include('backend.components.list-category')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('subcateg.update', ['id' => $category->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 position-relative">
                                <label for="name" class="form-label">Name</label>
                                <input id="nama_kategori" class="form-control" data-counter="250" placeholder="Name"
                                    name="nama_kategori" type="text" value="{{ $category->nama_sub_kategori }}">
                            </div>
                            <input type="hidden" name="parent_id" value="{{ $category->category_id }}">
                            <div class="mb-3">
                                <div class="slug-field-wrapper">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="slug">
                                            Permalink
                                        </label>
                                        <div class="input-group input-group-flat">
                                            <span class="input-group-text" >
                                                {{ config('app.url') }}/sub-category/
                                            </span>
                                            <input id="slug" class="form-control ps-0" type="text" value="{{ $category->slug }}" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        Publish
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="btn-list">
                                        <button class="btn btn-primary" type="submit">
                                            <svg class="icon icon-left svg-icon-ti-ti-device-floppy"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M14 4l0 4l-6 0l0 -4" />
                                            </svg>
                                            Save
                                        </button>
                                    </form>
                                        <form action="{{ route('subcateg.destroy', ['id' => $category->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <svg class="icon icon-sm icon-left svg-icon-ti-ti-trash"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7l16 0" />
                                                    <path d="M10 11l0 6" />
                                                    <path d="M14 11l0 6" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
