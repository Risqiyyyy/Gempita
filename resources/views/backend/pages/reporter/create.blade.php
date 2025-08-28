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
                               <a href="{{ route('reporter.index') }}">Reporter</a>
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('reporter.post') }}" accept-charset="UTF-8" id="botble-member-forms-member-form" class="js-base-form dirty-check" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="gap-3 col-md-9">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row row-cols-lg-2">
                                    <div class="col-lg-6">
                                        <div class="mb-3 position-relative">
                                            <label for="first_name" class="form-label required">Fullname</label>
                                            <input class="form-control" data-counter="120" required="required" name="name" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 position-relative">
                                            <label for="email" class="form-label required">Email</label>
                                            <input class="form-control" data-counter="60"
                                                placeholder="e.g: example@domain.com"
                                                required="required" name="email" type="text" id="email">
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
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                        <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M14 4l0 4l-6 0l0 -4" />
                                    </svg>
                                    Save
                                </button>
                                <a href="{{ route('reporter.index') }}" class="btn">
                                    <svg class="icon icon-left svg-icon-ti-ti-transfer-in"
                                         xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round">
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
        </form>
        </div>
    </div>
@endsection
