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
                            <li class="breadcrumb-item active" aria-current="page">
                                <h1 class="mb-0 d-inline-block fs-6 lh-1">Catgeories</h1>
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('category.add') }}">
                            @csrf
                            <div class="mb-3 position-relative">
                                <label for="name" class="form-label">Name</label>
                                <input id="nama_kategori" class="form-control" data-counter="250" placeholder="Name" required="required"
                                    name="nama_kategori" type="text">
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="parent_id" class="form-label">Parent</label>
                                <select class="select-search-full form-select" data-allow-clear="false" id="parent_id"
                                    name="parent_id">
                                    <option value="">None</option>
                                    @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
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
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
