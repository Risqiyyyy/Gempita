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
                              <h1 class="mb-0 d-inline-block fs-6 lh-1">Analytics</h1>
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
      <form method="POST" action="{{ route('settings.addannalytic') }}">
       @csrf
         <div class="row mb-5 d-block d-md-flex">
            <div class="col-12 col-md-3">
               <h2>Google Analytics</h2>
               <p class="text-muted">Config Credentials for Google Analytics</p>
            </div>
            <div class="col-12 col-md-9">
               <div class="card">
                  <div class="card-body">
                     <div class="mb-3 position-relative">
                        <label class="form-check form-switch ">
                        <input name="analytics_dashboard_widgets" type="hidden" value="0" />
                        <input class="form-check-input" name="analytics_dashboard_widgets"
                           type="checkbox" value="1" id="analytics_dashboard_widgets"
                           checked />
                        <span class="form-check-label">Enable Dashboard Widgets</span>
                        </label>
                     </div>
                     <fieldset class="form-fieldset" data-bb-collapse="true"
                        data-bb-trigger="[name=analytics_dashboard_widgets]" data-bb-value="1">
                        <div class="mb-3 position-relative">
                           <label class="form-label" for="analytics_property_id">
                           Property ID for GA4
                           </label>
                           <input class="form-control" data-counter="250"
                              placeholder="Google Analytics Property ID (GA4)"
                              name="analytics" type="text" value="{{ $settings->analytics ?? old('analytics') }}">
                           <small class="form-hint">
                           <a href="https://developers.google.com/analytics/devguides/reporting/data/v1/property-id"
                              target="_blank">https://developers.google.com/analytics/devguides/reporting/data/v1/property-id</a>
                           </small>
                        </div>
                     </fieldset>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12 col-md-9 offset-md-3">
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
                  Save settings
               </button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection