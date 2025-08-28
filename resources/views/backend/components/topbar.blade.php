<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler d-none d-lg-block me-2 ms-n1" type="button" data-bb-toggle="navbar-minimal"
            data-bb-target="#sidebar-menu-main" aria-controls="navbar-menu" aria-expanded="false"
            aria-label="Toggle navigation"
            data-method="PATCH">
            <svg class="icon  svg-icon-ti-ti-menu-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 6l16 0" />
                <path d="M4 12l16 0" />
                <path d="M4 18l16 0" />
            </svg> </button>
        <h1 class="navbar-brand navbar-brand-autodark me-4">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('backend/images/logo/logo.png') }}" style="max-height: 32px; height: auto;"
                    alt="FTnews" class="navbar-brand-image">
            </a>
        </h1>
        <div class="flex-row navbar-nav order-md-last">
            <div class="dropdown nav-item">
                <a href="{{ route('profile.indexProfile') }}" class="p-0 nav-link d-flex lh-1 text-reset"
                    data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="crop-image-original avatar avatar-sm" style="background-image: url('{{ asset('backend/images/profile/profile.png') }}');"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="mt-1 small text-muted"><span>{{ Auth::user()->email }}</span>
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

                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg class="icon dropdown-item-icon svg-icon-ti-ti-logout" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 -2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M9 12h12l-3 -3" />
                            <path d="M18 15l3 -3" />
                        </svg>
                        Logout
                    </a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu"></div>
    </div>
</header>
