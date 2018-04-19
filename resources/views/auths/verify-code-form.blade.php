<div class="o-page o-page--center">

    <div class="o-page__card">
        <div class="c-card u-mb-xsmall">
            <header class="c-card__header u-pt-large">
                <a class="c-card__icon" href="#!">
                    <img src="{{ asset('assets/img/logo-login.svg') }}" alt="Dashboard UI Kit">
                </a>
                <h1 class="u-h3 u-text-center u-mb-zero">Enter Verification Code</h1>
            </header>

            <form action="{{ url('verify-account-code') }}" method="post" class="c-card__body">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ $userId }}">
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="c-field u-mb-small">
                    <input class="c-input" type="text" id="code" name="code" placeholder="e.g 245034">
                </div>

                <div class="clearfix text-center">
                    <button class="c-btn c-btn--primary c-btn--large" type="submit">Verify Now</button>
                </div>

            </form>
        </div>
        <div class="o-line">
            <a class="u-text-mute u-text-small" href="{{ url('login') }}"><i class="fa fa-long-arrow-left"></i> Back to login</a>
        </div>
    </div>
</div>