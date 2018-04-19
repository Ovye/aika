<div class="o-page o-page--center login-page">

    <div class="o-page__card">
        <div class="c-card u-mb-xsmall">
            <header class="c-card__header u-pt-large">
                <a class="c-card__icon" href="#!">
                    <img src="{{ asset('assets/img/logo-login.svg') }}" alt="Aika logo">
                </a>
                <h1 class="u-h3 u-text-center u-mb-zero">Password Recovery</h1>
            </header>

            <form action="{{ url('validate-password-recovery') }}" method="post" class="c-card__body" id="recoveryForm">
                <div class="c-field u-mb-small">
                    <div class="alert alert-info">
                        Enter your account email below to recover your lost password. You can use phone number but you are limited to only 5 requests.
                    </div>
                </div>
                {{ csrf_field() }}
                <div class="c-field u-mb-medium">
                    <input class="c-input" type="text" id="email_or_phone" name="email_or_phone" placeholder="Enter email or phone" value="{{ old('email_or_phone') }}" required>
                </div>

                <div class="clearfix text-center">
                    <button class="c-btn c-btn--primary c-btn--large" type="submit">Recover Now</button>
                </div>

            </form>
        </div>
        <div class="o-line">
            <a class="u-text-mute u-text-small" href="{{ url('login') }}"><i class="fa fa-long-arrow-left"></i> Back to login</a>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        jQuery(document).ready(function () {
            $('#recoveryForm').validate({
                messages: {
                    email_or_phone: "Enter email or phone number."
                }
            });
        });
    </script>
@endpush
