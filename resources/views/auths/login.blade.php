<div class="o-page o-page--center login-page">
    <div class="o-page__card">
        <div class="c-card u-mb-xsmall">
            <header class="c-card__header u-pt-large">
                <a class="c-card__icon" href="#!">
                    <img src="{{ asset('assets/img/logo-login.svg') }}" alt="Aika logo">
                </a>
                <h1 class="u-h3 u-text-center u-mb-zero">Please login</h1>
            </header>
            <form action="{{ url('login') }}" method="post" class="c-card__body">
                {{ csrf_field() }}
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="email_or_phone">Email or phone number</label>
                    <input class="c-input" type="text" id="email_or_phone" name="email_or_phone" placeholder="Email, phone" value="{{ old('email_or_phone') }}">
                </div>

                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="password">Password</label>
                    <input class="c-input" type="password" id="password" name="password" placeholder="Numbers, Letters...">
                </div>

                <button class="c-btn c-btn--primary c-btn--fullwidth c-btn--large" type="submit">Sign in to Account</button>

                <span class="c-divider c-divider--small has-text u-mv-medium">Login via social networks</span>
            </form>
            <div class="c-card__body" style="margin-top: -35px">
                <div class="o-line">
                    <form action="{{ url('social/twitter') }}" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="c-btn u-bg-twitter">
                            <i class="fa fa-twitter"></i> Twitter
                        </button>
                    </form>

                    <form action="{{ url('social/facebook') }}" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="c-btn u-bg-facebook">
                            <i class="fa fa-facebook"></i> Facebook
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="o-line">
            <a class="u-text-mute u-text-small" href="{{ url('register') }}">Don’t have an account yet?<br/><b>Get Started</b></a>
            <a class="u-text-mute u-text-small" href="{{ url('recover-password') }}">Forgot Password?</a>
        </div>
    </div>
</div>
