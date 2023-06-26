<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if (config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if (config('adminlte.sidebar_nav_animation_speed') != 300) data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}" @endif
                @if (!config('adminlte.sidebar_nav_accordion')) data-accordion="false" @endif>
                <li>
                    {{-- <div class="form-inline my-2">
                        <div class="input-group" data-widget="sidebar-search" data-arrow-sign="»">
                            <input class="form-control form-control-sidebar" type="search" placeholder="search"
                                aria-label="search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-fw fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="sidebar-search-results">
                            <div class="list-group"><a href="#" class="list-group-item">
                                    <div class="search-title"><strong class="text-light"></strong>N<strong
                                            class="text-light"></strong>o<strong class="text-light"></strong>
                                        <strong class="text-light"></strong>e<strong
                                            class="text-light"></strong>l<strong class="text-light"></strong>e<strong
                                            class="text-light"></strong>m<strong class="text-light"></strong>e<strong
                                            class="text-light"></strong>n<strong class="text-light"></strong>t<strong
                                            class="text-light"></strong>
                                        <strong class="text-light"></strong>f<strong
                                            class="text-light"></strong>o<strong class="text-light"></strong>u<strong
                                            class="text-light"></strong>n<strong class="text-light"></strong>d<strong
                                            class="text-light"></strong>!<strong class="text-light"></strong>
                                    </div>
                                    <div class="search-path"></div>
                                </a></div>
                        </div>
                    </div> --}}
                </li>
                @if (Auth::user()->role == 'admin')
                    <ul class="list-group">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('survey/layanan') }}">
                                <i class="fa fa-tasks "></i>
                                <p>
                                    Manajemen Layanan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('survey/pertanyaan') }}">
                                <i class="fa fa-file "></i>
                                <p>
                                    Manajemen Pertanyaan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('survey/pilihan') }}">
                                <i class="fa fa-file "></i>
                                <p>
                                    Manajemen Jawaban
                                </p>
                            </a>
                        </li>
                    @elseif (Auth::user()->role == 'superadmin')
                        <li class="nav-item">
                            <a class="nav-link  " href="{{ url('survey/responden') }}">
                                <i class="fa fa-check "></i>
                                <p>
                                    Jawaban Responden
                                </p>
                            </a>
                        </li>
                @endif

            </ul>
        </nav>
    </div>

</aside>
