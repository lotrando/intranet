<header class="navbar navbar-expand-md navbar-light d-print-none">

  <div class="container-fluid">

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-menu" type="button" aria-controls="navbar-menu" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
      <a href="https://www.khn.cz" target="_blank">
        <img class="navbar-brand-image" data-bs-toggle="tooltip" data-bs-placement="bottom"
          data-bs-original-title="Spustí stránky Karvinské hornické nemocnice a.s. v nové záložce" src="{{ asset('img/logo.png') }}" href="https://www.khn.cz"
          alt="Logo Intranetu KHN a.s." target="_blank">
      </a>
    </h1>

    <div class="navbar-nav order-md-last flex-row">
      <div class="nav-item d-none d-md-flex nav-item d-none d-md-flex">
        <div class="btn-list">
          {{-- Helpdesk --}}
          {{-- <div class="nav-item dropdown d-none d-md-flex">
            <button class="btn dropdown-toggle m-0 align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
              <svg class="icon text-red" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="12" cy="12" r="4"></circle>
                <circle cx="12" cy="12" r="9"></circle>
                <line x1="15" y1="15" x2="18.35" y2="18.35"></line>
                <line x1="9" y1="15" x2="5.65" y2="18.35"></line>
                <line x1="5.65" y1="5.65" x2="9" y2="9"></line>
                <line x1="18.35" y1="5.65" x2="15" y2="9"></line>
              </svg>
              <span class="d-sm-none d-md-none d-lg-inline">{{ __('Helpdesk') }}</span>
            </button>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow dropdown-menu-card">
              <div class="card">
                <div class="list-group list-group-flush list-group-hoverable">
                  <div class="list-group-item col-12">
                    <div class="row align-items-center">
                      <div class="col text-truncate">
                        <a class="d-block text-decoration-none text-primary" href="#">
                          IT
                        </a>
                        <div class="d-block text-muted text-truncate mt-n1">
                          Akord, počítače, tiskárny, mobily, sítě, web, intranet ...
                        </div>
                      </div>
                      <div class="col-auto">
                        <a class="list-group-item-actions" href="#">
                          <svg class="icon icon-tabler icon-tabler-devices-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 15h-6a1 1 0 0 1 -1 -1v-8a1 1 0 0 1 1 -1h6"></path>
                            <rect x="13" y="4" width="8" height="16" rx="1"></rect>
                            <line x1="7" y1="19" x2="10" y2="19"></line>
                            <line x1="17" y1="8" x2="17" y2="8.01"></line>
                            <circle cx="17" cy="16" r="1"></circle>
                            <line x1="9" y1="15" x2="9" y2="19"></line>
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col">
                        <a class="text-primary d-block text-decoration-none" href="#">
                          Údržbářské práce
                        </a>
                        <div class="d-block text-muted text-truncate mt-n1">
                          Stěhování, opravy, elektro, instalatérské práce, plyn...
                        </div>
                      </div>
                      <div class="col-auto">
                        <a class="list-group-item-actions" href="#">
                          <svg class="icon icon-tabler icon-tabler-tool text-black-50" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6 -6a6 6 0 0 1 -8 -8l3.5 3.5">
                            </path>
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col">
                        <a class="text-primary d-block text-decoration-none" href="#">
                          Úklidové služby
                        </a>
                        <div class="d-block text-muted text-truncate mt-n1">
                          Úklid, mytí oken, dezinfekce, úklid po malování ...
                        </div>
                      </div>
                      <div class="col-auto">
                        <a class="list-group-item-actions" href="#">
                          <svg class="icon icon-tabler icon-tabler-recycle text-success" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                            viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 17l-2 2l2 2"></path>
                            <path d="M10 19h9a2 2 0 0 0 1.75 -2.75l-.55 -1"></path>
                            <path d="M8.536 11l-.732 -2.732l-2.732 .732"></path>
                            <path d="M7.804 8.268l-4.5 7.794a2 2 0 0 0 1.506 2.89l1.141 .024"></path>
                            <path d="M15.464 11l2.732 .732l.732 -2.732"></path>
                            <path d="M18.196 11.732l-4.5 -7.794a2 2 0 0 0 -3.256 -.14l-.591 .976"></path>
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
          @guest
            <a class="btn hover-shadow-sm" href="{{ route('register') }}" rel="noreferrer">
              <svg class="icon icon-tabler icon-tabler-login text-azure" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                </path>
                <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
              </svg>
              {{ __('Register') }}
            </a>
            <a class="btn hover-shadow-sm" href="{{ route('login') }}" rel="noreferrer">
              <svg class="icon icon-tabler icon-tabler-lock-open text-success" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <rect x="5" y="11" width="14" height="10" rx="2">
                </rect>
                <circle cx="12" cy="16" r="1"></circle>
                <path d="M8 11v-5a4 4 0 0 1 8 0"></path>
              </svg>
              {{ __('Login') }}
            </a>
          @endguest
        </div>
      </div>
      @auth
        {{-- User Dropdown --}}
        <div class="nav-item dropdown m-1">
          <a class="nav-link d-flex text-reset p-0" data-bs-toggle="dropdown" href="#" aria-label="Open user menu">
            <div class="d-none d-xl-block ps-1">
              <div>{{ Auth::user()->name ?? '' }}</div>
              <div class="small text-muted">{{ Auth::user()->personal_number ?? '' }}</div>
            </div>
            <span class="avatar avatar-sm ms-1" style="background-image: url(../../foto/{{ Auth::user()->personal_number . '.jpg' ?? 'no_image.png' }})"></span>
          </a>
          {{-- User Dropdown Menu --}}
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            {{-- <a class="dropdown-item" href="{{ route('user.profile') }}">
              <svg class="icon dropdown-item-icon text-azure" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                <path d="M16 5l3 3"></path>
              </svg>
              {{ __('Profil') }}
            </a>
            <a class="dropdown-item" href="#">
              <svg class="icon dropdown-item-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path
                  d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                </path>
                <circle cx="12" cy="12" r="3"></circle>
              </svg>
              {{ __('Nastavení') }}
            </a>
              <div class="dropdown-divider"></div> --}}
            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout-modal" href="#">
              <svg class="icon dropdown-item-icon text-red" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
              </svg>
              {{ __('Logout') }}
            </a>
          </div>
          {{-- User Dropdown Menu End --}}
        </div>
        {{-- User Dropdown End --}}
      </div>
    @endauth
  </div>
</header>
