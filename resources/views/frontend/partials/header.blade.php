@includeIf('partials.head')

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5" style="top: 0; position: fixed; z-index: 2">
            @if(session()->exists('notice'))
                {!! session('notice') !!}
            @endif
        </div>
    </div>
</div>

@if(!isset($only_body) || isset($only_body) && $only_body != true)
<header class="c-navbar">
    <a class="c-navbar__brand" href="#!">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Aika's Logo">
    </a>

    <!-- Navigation items that will be collapes and toggle in small viewports -->
    <nav class="c-nav collapse" id="main-nav">
        <ul class="c-nav__list">
            <li class="c-nav__item">
                <a class="c-nav__link" href="#!">Events</a>
            </li>
            <li class="c-nav__item">
                <a class="c-nav__link" href="#!">Browse</a>
            </li>
            <li class="c-nav__item">
                <a class="c-nav__link" href="#!">Your Ticket</a>
            </li>
            <li class="c-nav__item">
                <div class="c-field c-field--inline has-icon-right u-hidden-up@tablet">
                            <span class="c-field__icon">
                                <i class="fa fa-search"></i>
                            </span>

                    <label class="u-hidden-visually" for="navbar-search-small">Seach</label>
                    <input class="c-input" id="navbar-search-small" type="text" placeholder="Search">
                </div>
            </li>
        </ul>
    </nav>
    <!-- // Navigation items  -->

    <div class="c-field has-icon-right c-navbar__search u-hidden-down@tablet u-ml-auto u-mr-small">
                <span class="c-field__icon">
                    <i class="fa fa-search"></i>
                </span>

        <label class="u-hidden-visually" for="navbar-search">Search</label>
        <input class="c-input" id="navbar-search" type="text" placeholder="Search">
    </div>


    <div class="c-dropdown dropdown">
        <a  class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="c-avatar__img" src="{{ asset('assets/img/avatar-72.jpg') }}" alt="User's Profile Picture">
        </a>

        <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
            <a class="c-dropdown__item dropdown-item" href="#">Edit Profile</a>
            <a class="c-dropdown__item dropdown-item" href="#">View Activity</a>
            <a class="c-dropdown__item dropdown-item" href="#">Manage Roles</a>
        </div>
    </div>

    <button class="c-nav-toggle" type="button" data-toggle="collapse" data-target="#main-nav">
        <span class="c-nav-toggle__bar"></span>
        <span class="c-nav-toggle__bar"></span>
        <span class="c-nav-toggle__bar"></span>
    </button><!-- // .c-nav-toggle -->
</header>

@endif
