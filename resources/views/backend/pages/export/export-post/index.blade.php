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
                              <h1 class="mb-0 d-inline-block fs-6 lh-1">Post Data</h1>
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
      <form method="POST" action="{{ route('posts.export') }}">
         @csrf
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">
                  Export Posts
               </h4>
            </div>
            <div class="card-body">
               <div class="mb-5">
                  <div class="row g-3">
                     <div class="col">
                        <div class="text-center bg-body-tertiary rounded p-3">
                           <h3 class="text-muted mb-2">Total Posts</h3>
                           <div class="fs-1 fw-bold">{{ $postCount }}</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div>
                  <label class="form-label">
                  Columns
                  <a href="javascript:void(0)" class="ms-2 text-primary" data-bb-toggle="check-all"
                     data-bb-target=".export-column">Check
                  all</a>
                  </label>
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
                     <div class="mb-3 position-relative">
                        <label class="form-check">
                        <input type="checkbox" name="columns[]" class="form-check-input export-column"
                           value="title" checked>
                        <span class="form-check-label">
                        Title
                        </span>
                        </label>
                     </div>
                     <div class="mb-3 position-relative">
                        <label class="form-check">
                        <input type="checkbox" name="columns[]" class="form-check-input export-column"
                           value="description" checked>
                        <span class="form-check-label">
                        Description
                        </span>
                        </label>
                     </div>
                     <div class="mb-3 position-relative">
                        <label class="form-check">
                        <input type="checkbox" name="columns[]" class="form-check-input export-column"
                           value="content" checked>
                        <span class="form-check-label">
                        Content
                        </span>
                        </label>
                     </div>
                     <div class="mb-3 position-relative">
                        <label class="form-check">
                        <input type="checkbox" name="columns[]" class="form-check-input export-column"
                           value="headline" checked>
                        <span class="form-check-label">
                        Is Headline
                        </span>
                        </label>
                     </div>
                     <div class="mb-3 position-relative">
                        <label class="form-check">
                        <input type="checkbox" name="columns[]" class="form-check-input export-column"
                           value="gambar" checked>
                        <span class="form-check-label">
                        Image
                        </span>
                        </label>
                     </div>
                     <div class="mb-3 position-relative">
                        <label class="form-check">
                        <input type="checkbox" name="columns[]" class="form-check-input export-column"
                           value="slug" checked>
                        <span class="form-check-label">
                        Slug
                        </span>
                        </label>
                     </div>
                     <div class="mb-3 position-relative">
                        <label class="form-check">
                        <input type="checkbox" name="columns[]" class="form-check-input export-column"
                           value="status" checked>
                        <span class="form-check-label">
                        Status
                        </span>
                        </label>
                     </div>
                     <div class="mb-3 position-relative">
                        <label class="form-check">
                        <input type="checkbox" name="columns[]" class="form-check-input export-column"
                           value="categories" checked>
                        <span class="form-check-label">
                        Categories
                        </span>
                        </label>
                     </div>
                     <div class="mb-3 position-relative">
                        <label class="form-check">
                        <input type="checkbox" name="columns[]" class="form-check-input export-column"
                           value="tags" checked>
                        <span class="form-check-label">
                        Tags
                        </span>
                        </label>
                     </div>
                  </div>
               </div>
               <div class="mb-3 position-relative">
                  <label class="form-label">
                  Format
                  </label>
                  <div class="position-relative form-check-group">
                     <label class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="format" value="csv"
                        checked>
                     <span class="form-check-label">CSV</span>
                     </label>
                     <label class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="format" value="xlsx">
                     <span class="form-check-label">Excel</span>
                     </label>
                     <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="format" value="json">
                        <span class="form-check-label">JSON</span>
                     </label>
                  </div>
               </div>
            </div>
            <div class="card-footer">
               <button class="btn btn-primary" type="submit">
               Export
               </button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection
