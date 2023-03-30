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
          <div class="col-12 mt-1">
            <div class="card" style="height: 41rem">
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
                    <h2 class="col-auto mx-2 mb-0">{{ $categorie->category_name }} aktuální měsíc
                      <span class="description"> období od {{ $from }} do {{ $to }}</span>
                    </h2>
                  </div>
                </div>
              </div>
              <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                <div class="divide-y">
                  @foreach ($daylist as $day)
                    <div>
                      <div class="row">
                        <div class="d-flex align-items-center justify-content-start col-auto">
                          @if (date('N', strtotime($day->date)) >= 6)
                            <span class="avatar bg-pink-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                          @elseif (Carbon\Carbon::parse($day->date) == Carbon\Carbon::today())
                            <span class="avatar bg-lime-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                          @else
                            <span class="avatar bg-blue-lt"><strong>{{ Carbon\Carbon::parse($day->date)->format('d|m') }}</strong></span>
                          @endif
                        </div>
                        @if (date('N', strtotime($day->date)) >= 6)
                          <div class="col-1 d-flex align-items-center justify-content-start">
                            <span>
                              <div class="text-pink">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                            </span>
                          </div>
                        @elseif (Carbon\Carbon::parse($day->date) == Carbon\Carbon::today())
                          <div class="col-1 d-flex align-items-center justify-content-start">
                            <span>
                              <div class="text-lime">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                            </span>
                          </div>
                        @else
                          <div class="col-1 d-flex align-items-center justify-content-start">
                            <span>
                              <div class="text-blue">{{ Carbon\Carbon::parse($day->date)->locale('cs')->dayName }}</div>
                            </span>
                          </div>
                        @endif
                        <div class="d-flex-column col-1 align-items-center justify-content-center p-2">
                          <div class="description text-lime text-center">JIP</div>
                          <div class="text-truncate description text-center">
                            {{ $day->jip }}
                          </div>
                        </div>
                        <div class="d-flex-column col-1 align-items-center justify-content-center p-2">
                          <div class="description text-yellow text-center">Operační sály</div>
                          <div class="text-truncate description text-center">
                            {{ $day->operacni_saly }}
                          </div>
                        </div>
                        <div class="d-flex-column col-1 align-items-center justify-content-center p-2">
                          <div class="description text-blue text-center">Interna</div>
                          <div class="description text-truncate text-center">
                            {{ $day->interna }}
                          </div>
                        </div>
                        <div class="d-flex-column col-1 align-items-center justify-content-center p-2">
                          <div class="description text-purple text-center">Neurologie</div>
                          <div class="text-truncate description text-center">
                            {{ $day->neurologie }}
                          </div>
                        </div>
                        <div class="d-flex-column col-1 align-items-center justify-content-center p-2">
                          <div class="description text-red text-center">RDG</div>
                          <div class="text-truncate description text-center">
                            {{ $day->rdg }}
                          </div>
                        </div>
                        <div class="d-flex-column col-1 align-items-center justify-content-center p-2">
                          <div class="description text-azure text-center">Příjmová ambulance</div>
                          <div class="text-truncate description text-center">
                            {{ $day->prijmova_ambulance }}
                          </div>
                        </div>
                        <div class="d-flex-column col-1 align-items-center justify-content-center p-2">
                          <div class="description text-orange text-center">Nutriční terapeuti</div>
                          <div class="text-truncate description text-center">
                            {{ $day->nutricni_terapeuti }}
                          </div>
                        </div>
                        <div class="d-flex-column col-1 align-items-center justify-content-center p-2">
                          <div class="description text-pink text-center">Žurnalní služby</div>
                          <div class="text-truncate description text-center">
                            {{ $day->zurnalni_sluzby }}
                          </div>
                        </div>
                        <div class="d-flex-column col-1 align-items-center justify-content-center p-2">
                          <div class="description text-pink text-center">Žurnální telefon</div>
                          <div class="text-truncate description text-center">
                            {{ $day->mobile }}
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              <!-- Page End -->
            </div>
            <!-- Page Wrapper End -->
          </div>
        </div>
      @endsection
