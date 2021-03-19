<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="/">
                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" width="36">
                    <path
                        d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z"
                        fill="#6875F5"></path>
                    <path
                        d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z"
                        fill="#6875F5"></path>
                </svg>
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">

            @auth
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                       aria-label="Open user menu">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <span class="avatar avatar-sm"
                                  style="background-image: url({{ Auth::user()->profile_photo_url }}"
                                  alt="{{ Auth::user()->name }})"></span>
                        @endif
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ Auth::user()->name }}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="{{route('profile.show')}}" class="dropdown-item">Profile</a>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('api-tokens.index') }}" class="dropdown-item">{{ __('API Tokens') }}</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a onclick="$('#user-logout-form').submit();" class="dropdown-item">{{ __('Log Out') }}</a>
                        <form id="user-logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    </div>
                </div>
            @endauth

        </div>
    </div>
</header>
<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item {{(request()->routeIs('dashboard')) ? "active" : ""}}">
                        <a class="nav-link" href="{{route('dashboard')}}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                 class="icon" width="24" height="24"
                                                                                 viewBox="0 0 24 24" stroke-width="2"
                                                                                 stroke="currentColor" fill="none"
                                                                                 stroke-linecap="round"
                                                                                 stroke-linejoin="round"><path
                                stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline
                                points="5 12 3 12 12 3 21 12 19 12"></polyline><path
                                d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path><path
                                d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path></svg>
                    </span>
                            <span class="nav-link-title">
                      {{__("Dashboard")}}
                    </span>
                        </a>
                    </li>
                    <li class="nav-item {{(request()->routeIs('admin.places.control')) ? "active" : ""}}">
                        <a class="nav-link" href="{{route('admin.places.control')}}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                       <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pins" width="44"
                            height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M10.828 9.828a4 4 0 1 0 -5.656 0l2.828 2.829l2.828 -2.829z"/>
  <line x1="8" y1="7" x2="8" y2="7.01"/>
  <path d="M18.828 17.828a4 4 0 1 0 -5.656 0l2.828 2.829l2.828 -2.829z"/>
  <line x1="16" y1="15" x2="16" y2="15.01"/>
</svg>
                    </span>
                            <span class="nav-link-title">
                      {{__("Places")}}
                    </span>
                        </a>
                    </li>

                </ul>
                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                    <form action="." method="get">
                        <div class="input-icon">
                    <span class="input-icon-addon">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                           stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle
                              cx="10" cy="10" r="7"></circle><line x1="21" y1="21" x2="15" y2="15"></line></svg>
                    </span>
                            <input type="text" class="form-control" placeholder="Search…"
                                   aria-label="Search in website">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

