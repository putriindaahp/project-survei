{{-- <li class="nav-item">


    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
    </a>


    <div class="navbar-search-block">
        <form class="form-inline" action="{{ $item['href'] }}" method="{{ $item['method'] }}">
            {{ csrf_field() }}

            <div class="input-group">


                <input class="form-control form-control-navbar" type="search"
                    @isset($item['id']) id="{{ $item['id'] }}" @endisset
                    name="{{ $item['input_name'] }}"
                    placeholder="{{ $item['text'] }}"
                    aria-label="{{ $item['text'] }}">


                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

            </div>
        </form>
    </div>

</li> --}}
