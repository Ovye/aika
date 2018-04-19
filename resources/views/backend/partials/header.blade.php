@includeIf('partials.head')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5" style="top: 0; position: fixed; z-index: 2">
            @if(session()->exists('notice'))
                {!! session('notice') !!}
            @endif
        </div>
    </div>
</div>
<body class="o-page">
@includeIf('backend.partials.sidebar')

<main class="o-page__content">
    <header class="c-navbar u-mb-medium">
        <button class="c-sidebar-toggle u-mr-small">
            <span class="c-sidebar-toggle__bar"></span>
            <span class="c-sidebar-toggle__bar"></span>
            <span class="c-sidebar-toggle__bar"></span>
        </button><!-- // .c-sidebar-toggle -->

        <h2 class="c-navbar__title u-mr-auto">Account</h2>

        <div class="c-dropdown u-hidden-down@mobile">
            <a class="c-notification dropdown-toggle" href="#" id="dropdownMenuUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="c-notification__icon">
                            <i class="fa fa-user-o"></i>
                        </span>
                <span class="c-notification__number">3</span>
            </a>

            <div class="c-dropdown__menu c-dropdown__menu--large dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuUser">
                <a href="#" class="c-dropdown__item dropdown-item o-media">
                            <span class="o-media__img u-mr-xsmall">
                                <span class="c-avatar c-avatar--xsmall">
                                    <img class="c-avatar__img" src="img/avatar2-72.jpg" alt="User's Profile Picture">
                                </span>
                            </span>
                    <div class="o-media__body">
                        <h6 class="u-mb-zero">Someone mentioned you</h6>
                        <p class="u-text-mute">You have recieved a mention on twitter, check it out!</p>
                    </div>
                </a>
                <a href="#" class="c-dropdown__item dropdown-item o-media">
                            <span class="o-media__img u-mr-xsmall">
                                <span class="c-avatar c-avatar--xsmall">
                                    <img class="c-avatar__img" src="img/avatar3-72.jpg" alt="User's Profile Picture">
                                </span>
                            </span>
                    <div class="o-media__body">
                        <h6 class="u-mb-zero">Recieved a Payment</h6>
                        <p class="u-text-mute">You have recieved a mention on twitter, check it out!</p>
                    </div>
                </a>
                <a href="#" class="c-dropdown__item dropdown-item o-media">
                            <span class="o-media__img u-mr-xsmall">
                                <span class="c-avatar c-avatar--xsmall">
                                    <img class="c-avatar__img" src="img/avatar4-72.jpg" alt="User's Profile Picture">
                                </span>
                            </span>
                    <div class="o-media__body">
                        <h6 class="u-mb-zero">You got a promotion</h6>
                        <p class="u-text-mute">You have recieved a mention on twitter, check it out!</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="c-dropdown dropdown u-mr-medium u-ml-small u-hidden-down@mobile">
            <a class="c-notification dropdown-toggle" href="#" id="dropdownMenuAlerts" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="c-notification__icon">
                            <i class="fa fa-bell-o"></i>
                        </span>
                <span class="c-notification__number">3</span>
            </a>

            <div class="c-dropdown__menu c-dropdown__menu--large dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAlerts">
                <a href="#" class="c-dropdown__item dropdown-item o-media">
                            <span class="o-media__img u-mr-xsmall">
                                <span class="c-avatar c-avatar--xsmall">
                                    <span class="c-avatar__img u-bg-success u-flex u-justify-center u-align-items-center">
                                        <i class="fa fa-check u-text-large u-color-white"></i>
                                    </span>
                                </span>

                            </span>
                    <div class="o-media__body">
                        <h6 class="u-mb-zero">Completed a task</h6>
                        <p class="u-text-mute">You have recieved a mention on twitter, check it out!</p>
                    </div>
                </a>

                <a href="#" class="c-dropdown__item dropdown-item o-media">
                            <span class="o-media__img u-mr-xsmall">
                                <span class="c-avatar c-avatar--xsmall">
                                    <span class="c-avatar__img u-bg-fancy u-flex u-justify-center u-align-items-center">
                                        <i class="fa fa-calendar u-text-large u-color-white"></i>
                                    </span>
                                </span>

                            </span>
                    <div class="o-media__body">
                        <h6 class="u-mb-zero">Company meetup</h6>
                        <p class="u-text-mute">You have recieved a mention on twitter, check it out!</p>
                    </div>
                </a>
                <a href="#" class="c-dropdown__item dropdown-item o-media">
                            <span class="o-media__img u-mr-xsmall">
                                <span class="c-avatar c-avatar--xsmall">
                                    <span class="c-avatar__img u-bg-primary u-flex u-justify-center u-align-items-center">
                                        <i class="fa fa-info u-text-large u-color-white"></i>
                                    </span>
                                </span>

                            </span>
                    <div class="o-media__body">
                        <h6 class="u-mb-zero">Someone mentioned you</h6>
                        <p class="u-text-mute">You have recieved a mention on twitter, check it out!</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="c-dropdown dropdown">
            <a  class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="c-avatar__img" src="img/avatar-72.jpg" alt="User's Profile Picture">
            </a>

            <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
                <a class="c-dropdown__item dropdown-item" href="#">Edit Profile</a>
                <a class="c-dropdown__item dropdown-item" href="#">View Activity</a>
                <a class="c-dropdown__item dropdown-item text-danger" href="{{ url('logout') }}">Logout</a>
            </div>
        </div>
    </header>