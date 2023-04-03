@extends('layouts.blank')

@section('favicon')
  <link type="image/png" href="{{ asset('img/kantyna.png') }}" rel="shortcut icon">
@endsection

@section('content')
  <div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-fluid">
        <div class="row align-items-center">
          <!-- Page pre-title -->
          <div class="col">
            <div class="page-pretitle text-primary">
              {{ __($pretitle) ?? '' }}
            </div>
            <h2 class="page-title text-primary">
              {{ __($title) ?? '' }}
            </h2>
          </div>

          <div class="ms-auto d-print-none col-auto">
            <div class="btn-list">
              <div class="d-flex justify-content-end">
                {{ $daylist->onEachSide(7)->links() }}
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- Wrapper End -->

  <!-- Page body -->
  <div class="page-body">
    <div class="container-fluid">
      <div class="row justify-content-start g-2">
        <div class="col-12 col-md-12 col-lg-6 col-xl-6 col-xxl-8">
          <div class="card" style="height: 38rem">
            <div class="card-header bg-azure-lt text-left">
              <div class="d-flex justify-item-center align-items-center">
                <div class="avatar bg-azure-lt col-auto">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-azure" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M19 3v12h-5c-.023 -3.681 .184 -7.406 5 -12zm0 12v6h-1v-3m-10 -14v17m-3 -17v3a3 3 0 1 0 6 0v-3"></path>
                  </svg>
                </div>
                <div>
                  <h2 class="ms-2 col-auto mb-0">Nabídka teplých jídel - {{ $od }} - {{ $do }}</small></h2>
                </div>
              </div>
            </div>
            <div class="card-body card-body-scrollable card-body-scrollable-shadow">
              <div class="divide-y">
                @foreach ($daylist as $day)
                  <div>
                    <div class="row">
                      <div class="d-flex align-items-center justify-content-start col-1">
                        @if (date('N', strtotime($day->date)) >= 6)
                          <span class="avatar bg-pink-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                        @elseif (Carbon\Carbon::parse($day->date) == Carbon\Carbon::today())
                          <span class="avatar bg-lime-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                        @else
                          <span class="avatar bg-azure-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                        @endif
                      </div>
                      @if (date('N', strtotime($day->date)) >= 6)
                        <div class="d-flex align-items-center justify-content-start col-1">
                          <span>
                            <div class="text-pink">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                          </span>
                        </div>
                      @elseif (Carbon\Carbon::parse($day->date) == Carbon\Carbon::today())
                        <div class="d-flex align-items-center justify-content-start col-1">
                          <span>
                            <div class="text-lime">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                          </span>
                        </div>
                      @else
                        <div class="d-flex align-items-center justify-content-start col-1">
                          <span>
                            <div class="text-azure">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                          </span>
                        </div>
                      @endif
                      @auth
                        @if (Auth::user()->role == 'strava' or Auth::user()->role == 'admin')
                          <div class="col-12 col-lg-10 mb-2">
                            @if ($day->polevka == '')
                              <label class="text-red description">Polévka: NEZADÁNA</label>
                            @else
                              <label class="text-blue description">Polévka: {{ $day->polevka }}</label>
                            @endif
                            <select class="form-select edit-polevka" name="polevka[{{ $day->id }}]" data-id="{{ $day->id }}">
                              <option value="-">Vyber polévku</option>
                              <option value="Svátek - Dnes se nevaří">Svátek - Dnes se nevaří</option>
                              @foreach ($food->where('type', '=', 'soup') as $polevka)
                                <option value="{{ $polevka->name }}" @if (old('polevka[' . $day->id . ']') == $polevka->_name) selected @endif>
                                  {{ $polevka->name }}
                                </option>
                              @endforeach
                            </select>
                            @if ($day->jidlo_a == '')
                              <label class="text-red description">Jídlo: NEZADÁNO</label>
                            @else
                              <label class="text-blue description">Jídlo: {{ $day->jidlo_a }}</label>
                            @endif
                            <select class="form-select edit-jidlo-a" name="jidlo_a[{{ $day->id }}]" data-id="{{ $day->id }}">
                              <option value="-">Vyber jídlo</option>
                              <option value="Svátek - Dnes se nevaří">Svátek - Dnes se nevaří</option>
                              @foreach ($food->where('type', 'food') as $jidlo)
                                <option value="{{ $jidlo->name }}" @if (old('jidlo_a[' . $day->id . ']') == $jidlo->name) selected @endif>
                                  {{ $jidlo->name }}
                                </option>
                              @endforeach
                            </select>
                            @if ($day->jidlo_b == '')
                              <label class="text-red description">Jídlo: NEZADÁNO</label>
                            @else
                              <label class="text-blue description">Jídlo: {{ $day->jidlo_b }}</label>
                            @endif
                            <select class="form-select edit-jidlo-b" name="jidlo_b[{{ $day->id }}]" data-id="{{ $day->id }}">
                              <option value="-">Vyber jídlo</option>
                              <option value="Svátek - Dnes se nevaří">Svátek - Dnes se nevaří</option>
                              @foreach ($food->where('type', 'food') as $jidlo)
                                <option value="{{ $jidlo->name }}" @if (old('jidlo_b[' . $day->id . ']') == $jidlo->name) selected @endif>
                                  {{ $jidlo->name }}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        @endauth
                      @else
                        <div class="d-flex-column align-items-center justify-content-start col-auto">
                          <div class="text-truncate">
                            @if ($day->polevka == '')
                              <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-soup-off" width="24" height="24"
                                  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M3 19h16"></path>
                                  <path d="M15 11h6c0 1.691 -.525 3.26 -1.42 4.552m-2.034 2.032a7.963 7.963 0 0 1 -4.546 1.416h-2a8 8 0 0 1 -8 -8h8"></path>
                                  <path d="M12 5v3"></path>
                                  <path d="M15 5v3"></path>
                                  <path d="M3 3l18 18"></path>
                                </svg>
                              </span>
                            @else
                              <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg class="icon text-yellow lin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                  fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path
                                    d="M4 11h16a1 1 0 0 1 1 1v.5c0 1.5 -2.517 5.573 -4 6.5v1a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-1c-1.687 -1.054 -4 -5 -4 -6.5v-.5a1 1 0 0 1 1 -1z">
                                  </path>
                                  <path d="M12 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                                  <path d="M16 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                                  <path d="M8 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                                </svg>
                              </span>
                              {{ $day->polevka }}
                            @endif
                          </div>
                          <div class="text-truncate">
                            @if ($day->jidlo_a == '')
                              <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                  stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M13.62 8.382l1.966 -1.967a2 2 0 1 1 3.414 -1.415a2 2 0 1 1 -1.413 3.414l-1.82 1.821"></path>
                                  <path
                                    d="M5.904 18.596c2.733 2.734 5.9 4 7.07 2.829c1.172 -1.172 -.094 -4.338 -2.828 -7.071c-2.733 -2.734 -5.9 -4 -7.07 -2.829c-1.172 1.172 .094 4.338 2.828 7.071z">
                                  </path>
                                  <path d="M7.5 16l1 1"></path>
                                  <path d="M12.975 21.425c1.582 -1.582 2.679 -3.407 3.242 -5.2"></path>
                                  <path d="M16.6 12.6c-.16 -1.238 -.653 -2.345 -1.504 -3.195c-.85 -.85 -1.955 -1.344 -3.192 -1.503"></path>
                                  <path d="M8.274 8.284c-1.792 .563 -3.616 1.66 -5.198 3.242"></path>
                                  <path d="M3 3l18 18"></path>
                                </svg>
                              </span>
                            @else
                              <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg class="icon text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                  fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M13.62 8.382l1.966 -1.967a2 2 0 1 1 3.414 -1.415a2 2 0 1 1 -1.413 3.414l-1.82 1.821">
                                  </path>
                                  <path
                                    d="M5.904 18.596c2.733 2.734 5.9 4 7.07 2.829c1.172 -1.172 -.094 -4.338 -2.828 -7.071c-2.733 -2.734 -5.9 -4 -7.07 -2.829c-1.172 1.172 .094 4.338 2.828 7.071z">
                                  </path>
                                  <path d="M7.5 16l1 1"></path>
                                  <path d="M12.975 21.425c3.905 -3.906 4.855 -9.288 2.121 -12.021c-2.733 -2.734 -8.115 -1.784 -12.02 2.121">
                                  </path>
                                </svg>
                              </span>
                              {{ $day->jidlo_a }}
                            @endif
                          </div>
                          <div class="text-truncate">
                            @if ($day->jidlo_b == '')
                              <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                  stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M13.62 8.382l1.966 -1.967a2 2 0 1 1 3.414 -1.415a2 2 0 1 1 -1.413 3.414l-1.82 1.821"></path>
                                  <path
                                    d="M5.904 18.596c2.733 2.734 5.9 4 7.07 2.829c1.172 -1.172 -.094 -4.338 -2.828 -7.071c-2.733 -2.734 -5.9 -4 -7.07 -2.829c-1.172 1.172 .094 4.338 2.828 7.071z">
                                  </path>
                                  <path d="M7.5 16l1 1"></path>
                                  <path d="M12.975 21.425c1.582 -1.582 2.679 -3.407 3.242 -5.2"></path>
                                  <path d="M16.6 12.6c-.16 -1.238 -.653 -2.345 -1.504 -3.195c-.85 -.85 -1.955 -1.344 -3.192 -1.503"></path>
                                  <path d="M8.274 8.284c-1.792 .563 -3.616 1.66 -5.198 3.242"></path>
                                  <path d="M3 3l18 18"></path>
                                </svg>
                              </span>
                            @else
                              <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg class="icon icon-tabler icon-tabler-meat text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                  stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M13.62 8.382l1.966 -1.967a2 2 0 1 1 3.414 -1.415a2 2 0 1 1 -1.413 3.414l-1.82 1.821">
                                  </path>
                                  <path
                                    d="M5.904 18.596c2.733 2.734 5.9 4 7.07 2.829c1.172 -1.172 -.094 -4.338 -2.828 -7.071c-2.733 -2.734 -5.9 -4 -7.07 -2.829c-1.172 1.172 .094 4.338 2.828 7.071z">
                                  </path>
                                  <path d="M7.5 16l1 1"></path>
                                  <path d="M12.975 21.425c3.905 -3.906 4.855 -9.288 2.121 -12.021c-2.733 -2.734 -8.115 -1.784 -12.02 2.121">
                                  </path>
                                </svg>
                              </span>
                              {{ $day->jidlo_b }}
                            @endif
                          </div>
                        </div>
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-12 col-lg-6 col-xl-5 col-xxl-4">
          <div class="card" style="height: 38rem">

            <div class="card-header bg-teal-lt text-left">
              <div class="d-flex justify-item-center align-items-center">
                <div class="avatar bg-teal-lt col-auto">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-teal" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4"></path>
                    <circle cx="18" cy="18" r="4"></circle>
                    <path d="M15 3v4"></path>
                    <path d="M7 3v4"></path>
                    <path d="M3 11h16"></path>
                    <path d="M18 16.496v1.504l1 1"></path>
                  </svg>
                </div>
                <div>
                  <h2 class="ms-2 col-auto mb-0">Provozní doba</h2>
                </div>
              </div>
            </div>
            <div class="card-body card-body-scrollable card-body-scrollable-shadow">
              <div class="divide-y">
                @foreach ($daylist as $day)
                  <div>
                    <div class="row">
                      <div class="col-3 d-flex align-items-center justify-content-start pt-1">
                        @if (date('N', strtotime($day->date)) >= 6)
                          <span class="avatar bg-pink-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                        @elseif (Carbon\Carbon::parse($day->date) == Carbon\Carbon::today())
                          <span class="avatar bg-lime-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                        @else
                          <span class="avatar bg-azure-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                        @endif
                      </div>
                      @if (date('N', strtotime($day->date)) >= 6)
                        <div class="col-4 d-flex align-items-center justify-content-center">
                          <span>
                            <div class="text-pink">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                          </span>
                        </div>
                      @elseif (Carbon\Carbon::parse($day->date) == Carbon\Carbon::today())
                        <div class="col-4 d-flex align-items-center justify-content-center">
                          <span>
                            <div class="text-lime">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                          </span>
                        </div>
                      @else
                        <div class="col-4 d-flex align-items-center justify-content-center">
                          <span>
                            <div class="text-azure">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                          </span>
                        </div>
                      @endif
                      @if (date('N', strtotime($day->date)) >= 6)
                        <div class="col-4 d-flex align-items-center justify-content-end">
                          <div class="text-truncate text-pink">
                            14:30 - 17:30
                          </div>
                        </div>
                      @else
                        <div class="col-4 d-flex align-items-center justify-content-end">
                          <div class="text-truncate fw-bold">
                            6:30 - 17:00
                          </div>
                        </div>
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  @endsection

  @section('scripts')
    <script>
      $('.edit-polevka').on('change', function() {
        var value = $(this).val()
        var id = $(this).data('id')
        $.ajax({
          type: 'POST',
          headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/stravovani/polevka/update/" + id,
          data: {
            polevka: value,
            id: id
          },
          dataType: "json",
          success: function(data) {
            console.log('success')
          }

        })
      })

      $('.edit-jidlo-a').on('change', function() {
        var value = $(this).val()
        var id = $(this).data('id')
        $.ajax({
          type: 'POST',
          headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/stravovani/jidloa/update/" + id,
          data: {
            jidlo_a: value,
            id: id
          },
          dataType: "json",
          success: function(data) {
            console.log('success')
          }

        })
      })

      $('.edit-jidlo-b').on('change', function() {
        var value = $(this).val()
        var id = $(this).data('id')
        $.ajax({
          type: 'POST',
          headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/stravovani/jidlob/update/" + id,
          data: {
            jidlo_b: value,
            id: id
          },
          dataType: "json",
          success: function(data) {
            console.log('success')
          }

        })
      })
    </script>
  @endsection
