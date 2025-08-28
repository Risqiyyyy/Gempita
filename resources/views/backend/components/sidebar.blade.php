<aside class="navbar navbar-vertical navbar-expand-lg flex-auto" data-bs-theme="dark" id="sidebar-menu-main">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <svg class="icon svg-icon-ti-ti-menu-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 6l16 0" />
                <path d="M4 12l16 0" />
                <path d="M4 18l16 0" />
            </svg>
        </button>
        <h2 class="d-block d-lg-none navbar-brand navbar-brand-autodark">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('backend/images/logo/logo.png') }}" style="max-height: 32px; height: auto;"
                    alt="FTnews" class="navbar-brand-image">
            </a>
        </h2>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="dropdown nav-item">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="crop-image-original avatar avatar-sm"
                        style="background-image: url('{{ asset('backend/images/profile/profile.png') }}');"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="mt-1 small text-muted"><span class="__cf_email__">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('profile.indexProfile') }}">
                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-user" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                        Profile
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-logout" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 -2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M9 12h12l-3 -3" />
                            <path d="M18 15l3 -3" />
                        </svg>
                        Logout
                    </a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav ">
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a class="nav-link nav-priority--9999 {{ Request::is('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}" id="cms-core-dashboard" title="Dashboard">
                        <span class="nav-link-icon d-md-none d-lg-inline-block" title="Dashboard">
                            <svg class="icon svg-icon-ti-ti-home" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                            </svg>
                        </span>
                        <span class="nav-link-title text-truncate">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item dropdown {{ Request::is('dashboard/blog*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle nav-priority-3" href="#cms-plugins-blog" id="cms-plugins-blog"
                        data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false"
                        title="Blog">
                        <span class="nav-link-icon d-md-none d-lg-inline-block" title="Blog">
                            <svg class="icon svg-icon-ti-ti-article" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                <path d="M7 8h10" />
                                <path d="M7 12h10" />
                                <path d="M7 16h10" />
                            </svg>
                        </span>
                        <span class="nav-link-title text-truncate">
                            Blog
                        </span>
                    </a>
                    <div
                        class="dropdown-menu animate slideIn dropdown-menu-start {{ Request::is('dashboard/blog*') ? 'show' : '' }}">
                        <a class="dropdown-item nav-priority-10 {{ Request::is('dashboard/blog/post*') ? 'active' : '' }}"
                            href="{{ route('blog.post') }}" id="cms-plugins-blog-post" title="Posts">
                            <span class="nav-link-icon d-md-none d-lg-inline-block" title="Posts">
                                <svg class="icon svg-icon-ti-ti-file-text" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <path d="M9 9l1 0" />
                                    <path d="M9 13l6 0" />
                                    <path d="M9 17l6 0" />
                                </svg>
                            </span>
                            <span class="nav-link-title text-truncate">
                                Posts
                            </span>
                        </a>
                        <a class="dropdown-item nav-priority-10 {{ Request::is('dashboard/blog/schedule-post*') ? 'active' : '' }}"
                            href="{{ route('blog.schedulePost') }}" id="cms-plugins-blog-post" title="Schedule-post">
                            <span class="nav-link-icon d-md-none d-lg-inline-block" title="Schedule-post">
                                <svg class="icon svg-icon-ti-ti-calendar" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                    <line x1="16" y1="2" x2="16" y2="6" />
                                    <line x1="8" y1="2" x2="8" y2="6" />
                                    <line x1="3" y1="10" x2="21" y2="10" />
                                </svg>
                            </span>
                            <span class="nav-link-title text-truncate">
                                Schedule Posts
                            </span>
                        </a>
                        <a class="dropdown-item nav-priority-10 {{ Request::is('dashboard/blog/seo-post*') ? 'active' : '' }}"
                        href="{{ route('blog.seoPost') }}" id="cms-plugins-blog-post" title="seo-post">
                            <span class="nav-link-icon d-md-none d-lg-inline-block" title="seo-post">
                                <!-- Ganti SVG di bawah ini dengan kode ikon SEO -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                <text x="8" y="12" font-size="5" fill="currentColor">SEO</text>
                                </svg>
                            </span>
                            <span class="nav-link-title text-truncate">
                                SEO Posts
                            </span>
                        </a>
                        @if (Auth::check() && Auth::user()->role == 'admin')
                            <a class="dropdown-item nav-priority-20 {{ Request::is('dashboard/blog/category*') ? 'active' : '' }}"
                                href="{{ route('category.create') }}" id="cms-plugins-blog-categories"
                                title="Categories">
                                <span class="nav-link-icon d-md-none d-lg-inline-block" title="Categories">
                                    <svg class="icon svg-icon-ti-ti-folder" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" />
                                    </svg>
                                </span>
                                <span class="nav-link-title text-truncate">
                                    Categories
                                </span>
                            </a>
                        @endif
                        <a class="dropdown-item nav-priority-30 {{ Request::is('dashboard/blog/tags*') ? 'active' : '' }}"
                            href="{{ route('tags.index') }}" id="cms-plugins-blog-tags" title="Tags">
                            <span class="nav-link-icon d-md-none d-lg-inline-block" title="Tags">
                                <svg class="icon svg-icon-ti-ti-tag" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    <path
                                        d="M3 6v5.172a2 2 0 0 0 .586 1.414l7.71 7.71a2.41 2.41 0 0 0 3.408 0l5.592 -5.592a2.41 2.41 0 0 0 0 -3.408l-7.71 -7.71a2 2 0 0 0 -1.414 -.586h-5.172a3 3 0 0 0 -3 3z" />
                                </svg>
                            </span>
                            <span class="nav-link-title text-truncate">
                                Tags
                            </span>
                        </a>
                    </div>
                </li>
                @if (Auth::check() && Auth::user()->role == 'admin')
                    <li
                        class="nav-item {{ Request::is('dashboard/member') || Request::is('dashboard/member/create') || Request::is('dashboard/member/edit/*') ? 'active' : '' }}">
                        <a class="nav-link nav-priority-50" href="{{ route('member.index') }}" id="cms-core-member"
                            title="Members">
                            <span class="nav-link-icon d-md-none d-lg-inline-block" title="Members">
                                <svg class="icon svg-icon-ti-ti-users" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                </svg>
                            </span>
                            <span class="nav-link-title text-truncate">
                                Members
                            </span>
                        </a>
                    </li>
                <li
                    class="nav-item {{ Request::is('dashboard/reporter') || Request::is('dashboard/reporter/create') || Request::is('dashboard/reporter/edit/*') ? 'active' : '' }}">
                    <a class="nav-link nav-priority-50" href="{{ route('reporter.index') }}"
                        title="Reporter">
                        <span class="nav-link-icon d-md-none d-lg-inline-block" title="Reporter">
                            <svg class="icon svg-icon-ti-ti-microphone" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 1a3 3 0 0 1 3 3v8a3 3 0 0 1 -6 0v-8a3 3 0 0 1 3 -3z" />
                                <path d="M19 10a7 7 0 0 1 -14 0" />
                                <path d="M12 19v4" />
                                <path d="M8 23h8" />
                            </svg>
                        </span>
                        <span class="nav-link-title text-truncate">
                            Reporter
                        </span>
                    </a>
                </li>
                @endif
                <li class="nav-item {{ Request::is('dashboard/media') ? 'active' : '' }}">
                    <a class="nav-link nav-priority-999" href="{{ route('media.index') }}" id="cms-core-media"
                        title="Media">
                        <span class="nav-link-icon d-md-none d-lg-inline-block" title="Media">
                            <svg class="icon svg-icon-ti-ti-folder" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" />
                            </svg>
                        </span>
                        <span class="nav-link-title text-truncate">
                            Media
                        </span>
                    </a>
                </li>
                @if (Auth::check() && Auth::user()->role == 'admin')
                    <li class="nav-item dropdown {{ Request::is('dashboard/export*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle nav-priority-3" href="#cms-plugins-blog"
                            id="cms-plugins-blog" data-bs-toggle="dropdown" data-bs-auto-close="false"
                            role="button" aria-expanded="false" title="Blog">
                            <span class="nav-link-icon d-md-none d-lg-inline-block" title="Media">
                                <svg class="icon svg-icon-ti-ti-package-import" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5" />
                                    <path d="M12 12l8 -4.5" />
                                    <path d="M12 12v9" />
                                    <path d="M12 12l-8 -4.5" />
                                    <path d="M22 18h-7" />
                                    <path d="M18 15l-3 3l3 3" />
                                </svg>
                            </span>
                            <span class="nav-link-title text-truncate">
                                Export Data
                            </span>
                        </a>
                        <div
                            class="dropdown-menu animate slideIn dropdown-menu-start {{ Request::is('dashboard/export*') ? 'show' : '' }}">
                            <a class="dropdown-item nav-priority-10 {{ Request::is('dashboard/export/export-post*') ? 'active' : '' }}"
                                href="{{ route('dashboard.exportPost') }}" id="cms-plugins-blog-post"
                                title="Posts">
                                <span class="nav-link-icon d-md-none d-lg-inline-block" title="Widgets">
                                    <svg class="icon  svg-icon-ti-ti-layout" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                        <path
                                            d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                        <path
                                            d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    </svg> </span>
                                <span class="nav-link-title text-truncate">
                                    Posts Data
                                </span>
                            </a>
                            <a class="dropdown-item nav-priority-20 {{ Request::is('dashboard/export/export-report*') ? 'active' : '' }}"
                                href="{{ route('dashboard.exportReport') }}" id="cms-plugins-blog-categories"
                                title="Categories">
                                <span class="nav-link-icon d-md-none d-lg-inline-block" title="Theme Options">
                                    <svg class="icon  svg-icon-ti-ti-list-tree" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 6h11" />
                                        <path d="M12 12h8" />
                                        <path d="M15 18h5" />
                                        <path d="M5 6v.01" />
                                        <path d="M8 12v.01" />
                                        <path d="M11 18v.01" />
                                    </svg> </span>
                                <span class="nav-link-title text-truncate">
                                    Report
                                </span>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{ Request::is('dashboard/settings*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle nav-priority-3" href="#cms-plugins-blog"
                            id="cms-plugins-blog" data-bs-toggle="dropdown" data-bs-auto-close="false"
                            role="button" aria-expanded="false" title="Blog">
                            <span class="nav-link-icon d-md-none d-lg-inline-block" title="Settings">
                                <svg class="icon svg-icon-ti-ti-settings" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                </svg>
                            </span>
                            <span class="nav-link-title text-truncate">
                                Settings
                            </span>
                        </a>
                        <div
                            class="dropdown-menu animate slideIn dropdown-menu-start {{ Request::is('dashboard/settings*') ? 'show' : '' }}">
                            <a class="dropdown-item nav-priority-20 {{ Request::is('dashboard/settings/member-dashboard*') ? 'active' : '' }}"
                                href="{{ route('settings.memberDashboard') }}" id="cms-plugins-blog-categories"
                                title="Categories">
                                <span class="nav-link-icon d-md-none d-lg-inline-block" title="Categories">
                                    <svg class="icon svg-icon-ti-ti-user-shield" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h2" />
                                        <path
                                            d="M22 16c0 4 -2.5 6 -3.5 6s-3.5 -2 -3.5 -6c1 0 2.5 -.5 3.5 -1.5c1 1 2.5 1.5 3.5 1.5z" />
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    </svg>
                                </span>
                                <span class="nav-link-title text-truncate">
                                    Member Dashboard
                                </span>
                            </a>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</aside>
