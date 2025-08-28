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
                                <h1 class="mb-0 d-inline-block fs-6 lh-1">Profile</h1>
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
        <div class="user-profile">
            <div class="card">
                <div class="card-header">
                    <ul data-bs-toggle="tabs" class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" data-bs-toggle="tab">
                                <svg class="icon me-2 svg-icon-ti-ti-user" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                                User profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#change-password" class="nav-link" data-bs-toggle="tab">
                                <svg class="icon me-2 svg-icon-ti-ti-lock" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                                    <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                    <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                                </svg>
                                Change password
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="profile">

                            <form method="POST" action="{{ route('profile.updateProfile', ['id' => Auth::user()->id]) }}">
                                @csrf
                                <div class="mb-3 position-relative">
                                    <label class="form-label">
                                        Avatar
                                    </label>
                                    <div class="avatar-view rounded-pill overflow-hidden">
                                        <img class="image-preview crop-image-original avatar avatar-2xl rounded-pill"
                                            src="{{ asset('backend/images/profile/profile.png') }}" alt="Avatar"
                                            style="--bb-avatar-size: 10rem;" />
                                        <div class="backdrop"></div>
                                    </div>
                                </div>
                                <div class="row row-cols-lg-2">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label form-label required" for="first_name">
                                            First Name
                                        </label>
                                        <input class="form-control" data-counter="30" name="first_name" type="text"
                                            value="{{ Auth::user()->first_name }}">
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label form-label required" for="last_name">
                                            Last Name
                                        </label>
                                        <input class="form-control" data-counter="30" name="last_name" type="text"
                                            value="{{ Auth::user()->last_name }}">
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label form-label required" for="username">
                                            Full Name
                                        </label>
                                        <input class="form-control" data-counter="30" name="username" type="text"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label form-label required" for="email">
                                            Email
                                        </label>
                                        <input class="form-control" data-counter="60"
                                            placeholder="e.g: example@domain.com" name="email" type="email"
                                            value="{{ Auth::user()->email }}" readonly disabled>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent mt-3 p-0 pt-3">
                                    <div class="btn-list justify-content-end">
                                        <button class="btn btn-primary" type="submit">
                                            <svg class="icon icon-left svg-icon-ti-ti-circle-check"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                <path d="M9 12l2 2l4 -4" />
                                            </svg>
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="change-password">
                            <form method="POST" action="{{ route('profile.updatePassword') }}">
                                @csrf 
                                <div class="row row-cols-lg-2">
                                    <div class="col-lg-12">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label form-label required" for="old_password">
                                                Current Password
                                            </label>
                                            <input class="form-control" data-counter="60" required="required"
                                                name="old_password" type="password">
                                        </div>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label form-label required" for="password">
                                            New Password
                                        </label>
                                        <input class="form-control" data-counter="60" required="required"
                                            name="password" type="password">
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label form-label required" for="password_confirmation">
                                            Confirm New Password
                                        </label>
                                        <input class="form-control" data-counter="60" required="required"
                                            name="password_confirmation" type="password">
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent mt-3 p-0 pt-3">
                                    <div class="btn-list justify-content-end">
                                        <button class="btn btn-primary" type="submit">
                                            <svg class="icon icon-left svg-icon-ti-ti-circle-check"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                <path d="M9 12l2 2l4 -4" />
                                            </svg>
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
