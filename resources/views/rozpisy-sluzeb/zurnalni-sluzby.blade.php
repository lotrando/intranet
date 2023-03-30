@extends('layouts.blank')

@section('favicon')
  <link type="image/png" href="{{ asset('img/' . $categorie->category_icon) ?? ' ' }}" rel="shortcut icon">
@endsection

@section('content')
  {{-- Page Wrapper Start --}}
  <div class="page-wrapper">

    <div class="page-header d-print-none">
      <div class="container-fluid">
        <div class="row align-items-center">
          @foreach ($rozpisy as $category)
            <div class="col ps-0 m-0">
              <a class="btn bg-{{ $category->color }}-lt hover-shadow-sm w-100 m-1" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-original-title="{{ __('' . $category->category_name . '') }}"
                href="/{{ $category->category_file }}/{{ $category->folder_name . '/' . $category->id }}">
                <span class="d-inline d-sm-inline d-md-none d-lg-inline d-xl-inline">{!! $category->svg_icon !!}</span>
                <span class="d-none d-md-inline d-lg-inline d-xl-inline pe-1">{{ $category->category_name }}</span>
              </a>
            </div>
          @endforeach

          {{-- Searched events --}}
          <div>
          </div>

          {{-- Page title --}}
          <div class="col mt-1">
            {{-- Page Pretitle --}}
            <div class="page-pretitle text-primary">
              {{ __($pretitle) ?? '' }}
            </div>
          </div>
        </div>

        <!-- Page -->
        <div class="row">
          <div class="col-12 col-xl-4 mt-1">
            <div class="card" style="height: 40.8rem">
              <div class="card-header bg-{{ $categorie->color }}-lt text-left">
                <div class="d-flex justify-item-center align-items-center">
                  <div class="avatar bg-{{ $categorie->color }}-lt col-auto">
                    <svg class="icon text-{{ $categorie->color }}" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                      fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                    <h2 class="ms-2 col-auto mb-0">{{ $categorie->category_name }} na období od {{ $from }} do {{ $to }}</h2>
                  </div>
                </div>
              </div>
              <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                <div class="divide-y">
                  @foreach ($daylist as $day)
                    <div>
                      <div class="row">
                        <div class="col-2 d-flex align-items-center justify-content-start">
                          @if (date('N', strtotime($day->date)) >= 6)
                            <span class="avatar bg-pink-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                          @elseif (Carbon\Carbon::parse($day->date) == Carbon\Carbon::today())
                            <span class="avatar bg-lime-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                          @else
                            <span class="avatar bg-blue-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                          @endif
                        </div>
                        @if (date('N', strtotime($day->date)) >= 6)
                          <div class="col-2 d-flex align-items-center justify-content-start">
                            <span>
                              <div class="text-pink">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                            </span>
                          </div>
                        @elseif (Carbon\Carbon::parse($day->date) == Carbon\Carbon::today())
                          <div class="col-2 d-flex align-items-center justify-content-start">
                            <span>
                              <div class="text-lime">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                            </span>
                          </div>
                        @else
                          <div class="col-2 d-flex align-items-center justify-content-start">
                            <span>
                              <div class="text-azure">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                            </span>
                          </div>
                        @endif
                        @auth
                          <div class="col-12 col-lg-8 mb-2">
                            <label class="text-blue">Původní sloužící lékař: {{ $day->zurnalni_sluzby }}</label>
                            <select class="form-select edit" name="zurnalni_sluzby[{{ $day->id }}]" data-id="{{ $day->id }}">
                              <option value="">Vyber lékaře</option>
                              @foreach ($doctorsAll as $doctor)
                                <option data-phone="{{ $doctor->mobile }}" value="{{ $doctor->title_preffix . ' ' . $doctor->last_name }}" @if (old('zurnalni_sluzby[' . $day->id . ']') == $doctor->title_preffix . ' ' . $doctor->last_name) selected @endif>
                                  {{ $doctor->title_preffix }} {{ $doctor->last_name }}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        @else
                          <div class="col-7 d-flex align-items-center justify-content-start">
                            <div class="text-truncate fw-bold">
                              {{ $day->zurnalni_sluzby }}
                            </div>
                          </div>
                        @endauth
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-xl-4 mt-1">
            <div class="card" style="height: 40.8rem">
              <div class="card-header bg-{{ $categorie->color }}-lt text-left">
                <div class="d-flex justify-item-center align-items-center">
                  <div class="avatar bg-{{ $categorie->color }}-lt col-auto">
                    <svg class="icon text-{{ $categorie->color }}" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                      fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                    <h2 class="ms-2 col-auto mb-0">{{ $categorie->category_name }} - Předešlý měsíc</h2>
                  </div>
                </div>
              </div>
              <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                <div class="divide-y">
                  @foreach ($daylistPrev as $day)
                    <div>
                      <div class="row">
                        <div class="col-2 d-flex align-items-center justify-content-start">
                          @if (date('N', strtotime($day->date)) >= 6)
                            <span class="avatar bg-pink-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                          @elseif (Carbon\Carbon::parse($day->date) == Carbon\Carbon::today())
                            <span class="avatar bg-lime-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                          @else
                            <span class="avatar bg-blue-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                          @endif
                        </div>
                        @if (date('N', strtotime($day->date)) >= 6)
                          <div class="col-2 d-flex align-items-center justify-content-start">
                            <span>
                              <div class="text-pink">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                            </span>
                          </div>
                        @elseif (Carbon\Carbon::parse($day->date) == Carbon\Carbon::today())
                          <div class="col-2 d-flex align-items-center justify-content-start">
                            <span>
                              <div class="text-lime">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                            </span>
                          </div>
                        @else
                          <div class="col-2 d-flex align-items-center justify-content-start">
                            <span>
                              <div class="text-azure">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                            </span>
                          </div>
                        @endif
                        @auth
                          <div class="col-12 col-lg-8 mb-2">
                            <label class="text-blue">Původní sloužící lékař: {{ $day->zurnalni_sluzby }}</label>
                            <select class="form-select edit" name="zurnalni_sluzby[{{ $day->id }}]" data-id="{{ $day->id }}">
                              <option value="">Vyber lékaře</option>
                              @foreach ($doctorsAll as $doctor)
                                <option value="{{ $doctor->title_preffix . ' ' . $doctor->last_name }}" @if (old('zurnalni_sluzby[' . $day->id . ']') == $doctor->title_preffix . ' ' . $doctor->last_name) selected @endif date-phone="{{ $doctor->phone }}">
                                  {{ $doctor->title_preffix }} {{ $doctor->last_name }}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        @else
                          <div class="col-7 d-flex align-items-center justify-content-start">
                            <div class="text-truncate fw-bold">
                              {{ $day->zurnalni_sluzby }}
                            </div>
                          </div>
                        @endauth
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-xl-4 mt-1">
            <div class="card" style="height: 40.8rem">
              <div class="card-header bg-{{ $categorie->color }}-lt text-left">
                <div class="d-flex justify-item-center align-items-center">
                  <div class="avatar bg-{{ $categorie->color }}-lt col-auto">
                    <svg class="icon text-{{ $categorie->color }}" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                      fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                    <h2 class="ms-2 col-auto mb-0">{{ $categorie->category_name }} - Následující měsíc</h2>
                  </div>
                </div>
              </div>
              <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                <div class="divide-y">
                  @foreach ($daylistNext as $day)
                    <div>
                      <div class="row">
                        <div class="col-2 d-flex align-items-center justify-content-start">
                          @if (date('N', strtotime($day->date)) >= 6)
                            <span class="avatar bg-pink-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                          @elseif (Carbon\Carbon::parse($day->date) == Carbon\Carbon::today())
                            <span class="avatar bg-lime-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                          @else
                            <span class="avatar bg-blue-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                          @endif
                        </div>
                        @if (date('N', strtotime($day->date)) >= 6)
                          <div class="col-2 d-flex align-items-center justify-content-start">
                            <span>
                              <div class="text-pink">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                            </span>
                          </div>
                        @elseif (Carbon\Carbon::parse($day->date) == Carbon\Carbon::today())
                          <div class="col-2 d-flex align-items-center justify-content-start">
                            <span>
                              <div class="text-lime">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                            </span>
                          </div>
                        @else
                          <div class="col-2 d-flex align-items-center justify-content-start">
                            <span>
                              <div class="text-azure">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                            </span>
                          </div>
                        @endif
                        @auth
                          <div class="col-12 col-lg-8 mb-2">
                            @if ($day->zurnalni_sluzby == '')
                              <label class="text-red">Původní sloužící lékař: NEZADÁNO</label>
                            @else
                              <label class="text-blue">Původní sloužící lékař: {{ $day->zurnalni_sluzby }}</label>
                            @endif
                            <select class="form-select edit" name="zurnalni_sluzby[{{ $day->id }}]" data-id="{{ $day->id }}">
                              <option value="">Vyber lékaře</option>
                              @foreach ($doctorsAll as $doctor)
                                <option value="{{ $doctor->title_preffix . ' ' . $doctor->last_name }}" @if (old('zurnalni_sluzby[' . $day->id . ']') == $doctor->title_preffix . ' ' . $doctor->last_name) selected @endif>
                                  {{ $doctor->title_preffix }} {{ $doctor->last_name }}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        @else
                          <div class="col-7 d-flex align-items-center justify-content-start">
                            <div class="text-truncate fw-bold">
                              @if ($day->zurnalni_sluzby == '')
                                <span class="text-red">Nevyplněno</span>
                              @else
                                {{ $day->zurnalni_sluzby }}
                              @endif
                            </div>
                          </div>
                        @endauth
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- Page End -->
        </div>
        <!-- Page Wrapper End -->
      </div>
    </div>
  @endsection

  @section('scripts')
    <script>
      $('.edit').on('change', function() {
        var value = $(this).val();
        var mobile = $(this).find(":selected").data('phone');
        var id = $(this).data('id');
        $.ajax({
          type: 'POST',
          headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/sluzby/zurnal/update/" + id,
          data: {
            mobile: mobile,
            zurnalni_sluzby: value,
            id: id
          },
          dataType: "json",
          success: function(data) {
            console.log('success')
          }

        });
      });
    </script>
  @endsection
