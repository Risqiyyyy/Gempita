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
                               <h1 class="mb-0 d-inline-block fs-6 lh-1">Settings</h1>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">
                               <h1 class="mb-0 d-inline-block fs-6 lh-1">Google Tag</h1>
                           </li>
                       </ol>
                   </nav>
               </div>
           </div>
       </div>
   </div>
</div>
<div class="page-body page-content">
   <div class="container-xl">
      <form method="POST" action="{{ route('settings.addgoogletag') }}" >
         @csrf
         <div class="row mb-5 d-block d-md-flex">
            <div class="col-12 col-md-3">
               <h2>Google Tag Manager</h2>
               <p class="text-muted">Configure Google Tag Manager</p>
            </div>
            <div class="col-12 col-md-9">
               <div class="card">
                  <div class="card-body">
                     <div class="mb-3 position-relative">
                        <label class="form-label" for="google_tag_manager_type">
                        </label>
                        <div class="position-relative form-check-group">
                           <label class="form-check form-check-inline">
                           <input class="form-check-input" id="google_tag_manager_type" type="radio"
                              name="google_tag_manager_type" value="code">
                           <span class="form-check-label">Google tag code</span>
                           </label>
                        </div>
                     </div>
                     <div class="mb-3 position-relative" data-bb-collapse="true"
                        data-bb-trigger="[name=google_tag_manager_type]" data-bb-value="code"
                        style="display: none">
                        <label class="form-label" for="google_tag_manager_code">
                        </label>
                        <div class="mb-3 position-relative">
                           <textarea name="gtag" class="form-control"
                              id="google_tag_manager_code_d835d2663b126af3eeea403f2325eee9" data-bb-code-editor="" data-mode="htmlmixed"
                              data-counter="1000" rows="3">{{ $settings->gtag ?? old('gtag') }}</textarea>
                        </div>
                        <small class="form-hint">
                        <a href="https://developers.google.com/tag-platform/gtagjs/install"
                           target="_blank">https://developers.google.com/tag-platform/gtagjs/install</a>
                        </small>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12 col-md-9 offset-md-3">
               <button class="btn btn-primary" type="submit">
                  <svg class="icon icon-left svg-icon-ti-ti-device-floppy" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                     <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                     <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                     <path d="M14 4l0 4l-6 0l0 -4" />
                  </svg>
                  Save settings
               </button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection
