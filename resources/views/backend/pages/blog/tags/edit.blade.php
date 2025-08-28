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
                              <a href="{{ route('tags.index') }}">Tags</a>
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
      <form method="POST" action="https://cms.botble.com/admin/blog/tags/edit/8" accept-charset="UTF-8"
         id="botble-blog-forms-tag-form" class="js-base-form dirty-check">
         <input name="_token" type="hidden" value="ZomMcTjBrmCGafyJ5GMAh46L9SPPEMlrkrQGaGzI">
         <div class="row">
            <div class="gap-3 col-md-9">
               <div class="card mb-3">
                  <div class="card-body">
                     <div class="form-body">
                        <div class="mb-3 position-relative">
                           <label for="name" class="form-label required">Name</label>
                           <input class="form-control" data-counter="120" placeholder="Name"
                              required="required" name="name" type="text" value="{{ $tag->nama_tags }}"
                              id="name">
                        </div>
                        <input type="hidden" name="model" value="Botble\Blog\Models\Tag">
                        <div class="mb-3 ">
                           <div class="slug-field-wrapper" data-field-name="name">
                              <div class="mb-3 position-relative">
                                 <label class="form-label required" for="slug">
                                 Permalink
                                 </label>
                                 <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        {{ config('app.url') }}/
                                    </span>
                                    <input class="form-control ps-0" type="text" value="{{ $tag->slug }}"/>
                                 </div>
                              </div>
                              <small class="form-hint mt-n2 text-truncate">Preview: <a
                                 href="#"
                                 target="_blank">{{ config('app.url') }}/tag/{{ $tag->slug }}</a></small>
                              <input class="slug-current" name="slug" type="hidden" value="ar-gaming">
                              <div class="slug-data" data-url="#"
                                 data-view="#" data-id="21">
                              </div>
                              <input name="slug_id" type="hidden" value="21">
                              <input name="is_slug_editable" type="hidden" value="1">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="advanced-sortables" class="meta-box-sortables">
                  <div class="card meta-boxes mb-3" id="seo_wrap">
                     <div class="card-header">
                        <h4 class="card-title">
                           Search Engine Optimize
                        </h4>
                     </div>
                     <div class="card-body">
                        <div class="seo-preview" v-pre>
                           <p class="default-seo-description hidden">
                              Setup meta title &amp; description to make your site easy to
                              discovered on search engines such as Google
                           </p>
                           <div class="existed-seo-meta">
                              <h4 class="page-title-seo text-truncate">
                                {{ $tag->slug }}
                              </h4>
                              <div class="page-url-seo">
                                 <p>{{ config('app.url') }}/tag/{{ $tag->slug }}</p>
                              </div>
                              <div>
                                <span style="color: #70757a;">
                                    {{ date('M d, Y', strtotime($tag->created_at)) }}
                                </span>
                                 <span class="page-description-seo">
                                 </span>
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
                        <button class="btn btn-primary" type="submit" value="apply" name="submitter">
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
                        <button class="btn" type="submit" name="submitter" value="save">
                           <svg class="icon icon-left svg-icon-ti-ti-transfer-in"
                              xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M4 18v3h16v-14l-8 -4l-8 4v3" />
                              <path d="M4 14h9" />
                              <path d="M10 11l3 3l-3 3" />
                           </svg>
                           Save &amp; Exit
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection
