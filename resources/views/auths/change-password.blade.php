<div class="o-page o-page--center login-page">

    <div class="o-page__card">
        <div class="c-card u-mb-xsmall">
            <header class="c-card__header u-pt-large">
                <a class="c-card__icon" href="#!">
                    <img src="{{ asset('assets/img/logo-login.svg') }}" alt="Aika logo">
                </a>
                <h1 class="u-h3 u-text-center u-mb-zero">Reset Password</h1>
            </header>

            <form action="{{ url('validate-change-password') }}" method="post" class="c-card__body" id="Form">
                <div class="c-field u-mb-small">
                    <div class="alert alert-info">
                        Hi <b>{{ $user->fname }},</b><br/>
                        Fill in the required information below to change your password.
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="hidden" name="type" value="{{ $log->recovery_type }}">
                <input type="hidden" name="token" value="{{ $log->token }}">
                <input type="hidden" name="user_id" value="{{ $log->user_id }}">

                @if($log->recovery_type == 'phone')
                    <div class="c-field u-mb-medium">
                        <input class="c-input" type="text" id="code" name="code" placeholder="Enter the code sent you" minlength="6" maxlength="6" value="{{ old('code') }}" required>
                    </div>
                @endif
                <div class="c-field u-mb-medium">
                    <input class="c-input" type="password" id="password" name="password" placeholder="Enter new password" minlength="5" required>
                </div>
                <div class="c-field u-mb-medium">
                    <input class="c-input" type="password" id="confirm_password" name="confirm_password" placeholder="Enter new password again" minlength="5" required>
                </div>


                <div class="clearfix text-center">
                    <button class="c-btn c-btn--primary c-btn--large" type="submit">Submit</button>
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
            $('#Form').validate({
                rules: {
                    confirm_password: {
                        equalTo: "#password",
                    },
                    code: {
                        digits: true
                    }
                },
                messages: {
                    password: {
                        required: "Enter your new password."
                    },
                    confirm_password: {
                        required: "Enter the password again.",
                    },
                    code: {
                        required: "Enter recovery code",
                        maxlength: "Please enter not more than 6 digits.",
                        minlength: "Please enter atleast 6 digits."
                    }
                }
            });
        });
    </script>
@endpush
