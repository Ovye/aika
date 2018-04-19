<div class="o-page o-page--center">
    <div class="o-page__card">
        <div class="c-card u-mb-xsmall">
            <header class="c-card__header u-pt-large">
                <a class="c-card__icon" href="#!">
                    <img src="{{ asset('assets/img/logo-login.svg') }}" alt="Dashboard UI Kit">
                </a>
                <h1 class="u-h3 u-text-center u-mb-zero">Register To Get Started</h1>
            </header>

            <form action="" method="post" class="c-card__body validateForm">
                {{ csrf_field() }}
                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="fname">First Name</label>
                    <input class="c-input" type="text" id="fname" name="fname" value="{{ old('fname') }}"
                           placeholder="e.g Josiah" required>
                </div>

                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="lname">Last Name</label>
                    <input class="c-input" type="text" id="lname" name="lname" value="{{ old('lname') }}"
                           placeholder="e.g Yahaya" required>
                </div>

                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="phone">Phone</label>
                    <input class="c-input" type="text" id="phone" name="phone" value="{{ old('phone') }}"
                           placeholder="e.g 08021435567" required minlength="11" digits="true">
                </div>

                <div class="c-field u-mb-small">
                    <label class="c-field__label" for="password">Password</label>
                    <input class="c-input" type="password" id="password" name="password" required minlength="5">
                </div>

                <button class="c-btn c-btn--primary c-btn--fullwidth c-btn--large" type="submit">Register</button>

                <span class="c-divider c-divider--small has-text u-mv-medium">Register via social networks</span>

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
                        <button type="submit" class="c-btn u-bg-facebook" href="#!">
                            <i class="fa fa-facebook"></i> Facebook
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="o-line">
            <a class="u-text-mute u-text-small" href="{{ url('login') }}"><i class="fa fa-long-arrow-left"></i> Already
                have an account, login instead </a>
        </div>
    </div>
</div>

@push('scripts')
    <script>

    </script>
@endpush