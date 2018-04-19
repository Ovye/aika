<div class="o-page o-page--center">

    <div class="o-page__card">
        <div class="c-card u-mb-xsmall">
            <header class="c-card__header u-pt-large">
                <a class="c-card__icon" href="#!">
                    <img src="{{ asset('assets/img/logo-login.svg') }}" alt="Dashboard UI Kit">
                </a>
                <h1 class="u-h3 u-text-center u-mb-zero">Verify Account Email</h1>
            </header>

            <form action="{{ route('new.email.link') }}" method="post" class="c-card__body">
                <div class="c-field u-mb-small">
                    <div class="alert alert-info">
                        Open your email and click the verify now button on the mail we've sent to you. If you didn't receive our mail, kindly enter your <b class="badge badge-info">active</b> email address below and click the red button below.
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ $userId }}">
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="c-field u-mb-medium">
                    <input class="c-input" type="text" id="email" name="email" placeholder="Enter active email address" value="{{ old('email') }}">
                    <span class="help-block text-muted small">If you don't have access to your registration email.</span>
                </div>

                <div class="clearfix text-center">
                    <button class="c-btn c-btn--primary c-btn--large" type="submit">Send New Verification Link</button>
                </div>

            </form>
        </div>
        <div class="o-line">
            <a class="u-text-mute u-text-small" href="{{ url('login') }}"><i class="fa fa-long-arrow-left"></i> Back to login</a>
        </div>
    </div>
</div>