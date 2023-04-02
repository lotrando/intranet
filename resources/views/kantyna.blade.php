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
                        @if (Auth::user()->role == 'strava')
                          <div class="col-12 col-lg-10 mb-2">
                            @if ($day->polevka == '')
                              <label class="text-red description">Polévka: NEZADÁNA</label>
                            @else
                              <label class="text-blue">Původní polévka: {{ $day->polevka }}</label>
                            @endif
                            <select class="form-select edit-polevka" name="polevka[{{ $day->id }}]" data-id="{{ $day->id }}">
                              <option value="">Vyber polevku</option>
                              @foreach ($polevky as $polevka)
                                <option value="{{ $polevka->last_name }}" @if (old('polevka[' . $day->id . ']') == $polevka->last_name) selected @endif>
                                  {{ $polevka->last_name }}
                                </option>
                              @endforeach
                            </select>
                            @if ($day->jidlo == '')
                              <label class="text-red description">Jídlo: NEZADÁNO</label>
                            @else
                              <label class="text-blue">Původní jídlo: {{ $day->jidlo }}</label>
                            @endif
                            <select class="form-select edit-jidlo" name="jidlo[{{ $day->id }}]" data-id="{{ $day->id }}">
                              <option value="">Vyber jídlo</option>
                              @foreach ($jidla as $jidlo)
                                <option value="{{ $jidlo->last_name }}" @if (old('polevka[' . $day->id . ']') == $jidlo->last_name) selected @endif>
                                  {{ $jidlo->last_name }}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        @endauth
                      @else
                        <div class="d-flex-column align-items-center justify-content-start col-auto">
                          <div class="text-truncate fw-bold">
                            @if ($day->polevka == '')
                              <span class="text-red">Nevyplněno</span>
                            @else
                              {{ $day->polevka }}
                            @endif
                          </div>
                          <div class="text-truncate fw-bold">
                            @if ($day->jidlo == '')
                              <span class="text-red">Nevyplněno</span>
                            @else
                              {{ $day->jidlo }}
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

      $('.edit-jidlo').on('change', function() {
        var value = $(this).val()
        var id = $(this).data('id')
        $.ajax({
          type: 'POST',
          headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/stravovani/jidlo/update/" + id,
          data: {
            jidlo: value,
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
