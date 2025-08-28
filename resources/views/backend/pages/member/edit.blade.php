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
                                <a href="{{ route('member.index') }}">Member</a>
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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('member.update', ['id' => $member->id]) }}" accept-charset="UTF-8"
            id="botble-member-forms-member-form" class="js-base-form dirty-check" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="gap-3 col-md-9">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row row-cols-lg-2">
                                    <div class="col-lg-6">
                                        <div class="mb-3 position-relative">
                                            <label for="first_name" class="form-label">Fullname</label>
                                            <input class="form-control" data-counter="120" name="name" type="text"
                                                value="{{ $member->name }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 position-relative">
                                            <label for="email" class="form-label ">Email</label>
                                            <input class="form-control" data-counter="60"
                                                placeholder="e.g: example@domain.com" name="email" type="text"
                                                value="{{ $member->email }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 position-relative" data-bb-collapse="true"
                                            data-bb-trigger="[name=is_change_password]" data-bb-value="1" style="">
                                            <label for="password" class="form-label required">Password</label>
                                            <input class="form-control" data-counter="60" name="password"
                                                type="password" id="password">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 position-relative" data-bb-collapse="true"
                                            data-bb-trigger="[name=is_change_password]" data-bb-value="1" style="">

                                            <label for="password_confirmation" class="form-label required">Password
                                                confirmation</label>
                                            <input class="form-control" data-counter="60" name="password_confirmation"
                                                type="password" id="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 gap-3 d-flex flex-column-reverse flex-md-column mb-md-0 mb-5">
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
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                        <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M14 4l0 4l-6 0l0 -4" />
                                    </svg>
                                    Save
                                </button>
                                <a href="{{ route('member.index') }}" class="btn">
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
                    <div class="card meta-boxes">
                        <div class="card-header">
                            <h4 class="card-title">
                                <label for="status" class="form-label required">Status</label>
                            </h4>
                        </div>

                        <div class="card-body">
                            <select class="form-control form-select" name="status">
                                <option value="active" {{ $member->status == 'active' ? 'selected' : '' }}>Active
                                </option>
                                <option value="block" {{ $member->status == 'block' ? 'selected' : '' }}>Block</option>
                            </select>
                        </div>
                    </div>
                    <div class="card meta-boxes">
                        <div class="card-header">
                            <h4 class="card-title">
                                <label for="status" class="form-label required">Role</label>
                            </h4>
                        </div>

                        <div class="card-body">
                            <select class="form-control form-select" name="role">
                                <option value="author" {{ $member->role == 'author' ? 'selected' : '' }}>Editor</option>
                                <option value="admin" {{ $member->role== 'admin' ? 'selected' : '' }}>Administrator
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
