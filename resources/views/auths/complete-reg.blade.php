<div class="clearfix" style="overflow: hidden">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="o-page o-page--center">
                <div class="card-body">
                    <h3>Why social connect?</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 clearfix">
            <div class="o-page o-page--center">
                <div class="o-page__card">
                    <div class="c-card u-mb-xsmall">
                        <header class="c-card__header u-pt-large">
                            <a class="c-card__icon" href="#!">
                                <img src="{{ asset('assets/img/logo-login.svg') }}" alt="Dashboard UI Kit">
                            </a>
                            <h1 class="u-h3 u-text-center u-mb-zero">Finalize</h1>
                        </header>
                        <form action="{{ url('social/facebook') }}" method="post" class="c-card__body" id="Form">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="complete_reg" value="true">
                            <input type="hidden" name="token" value="{{ $userVerifications->token }}">
                            <input type="hidden" name="redirect" value="{{ get('redirect') }}">

                            <div class="c-field u-mb-small">
                                <input class="c-input" type="text" id="name" name="name"
                                       value="{{ $user->fname }} {{ $user->lname }}"
                                       placeholder="e.g First and last name" disabled>
                            </div>

                            <div class="c-field u-mb-small" id="user_email">
                                <input class="c-input" type="text" id="email" name="email" value="{{ old('email') }}"
                                       placeholder="Your active email" required>
                            </div>

                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="code">Enter verification code</label>
                                <input class="c-input" type="text" id="code" name="code" minlength="6" maxlength="6"
                                       required value="{{ old('code') }}">
                            </div>
                            <div class="c-field u-mb-small">
                                <div class="c-choice c-choice--checkbox">
                                    <input type="checkbox" class="c-choice__input" name="use_fb_email"
                                           id="use_fb_email">
                                    <label for="use_fb_email" class="c-choice__label">Use facebook email instead</label>
                                </div>
                            </div>
                            <button class="c-btn c-btn--primary c-btn--fullwidth c-btn--large" type="submit">Complete
                                Now
                            </button>

                        </form>
                    </div>

                    <div class="o-line">
                        <a class="u-text-mute u-text-small" href="{{ url('/') }}"><i class="fa fa-long-arrow-left"></i>
                            Return home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#Form').validate({
            rules: {
                code: {
                    required: true,
                    digits: true
                },
                email: {
                    email: true
                }
            },
            messages: {
                code: {
                    required: 'Enter verification code.',
                    minlength: 'Enter atleast 6 digits.'
                }
            }
        });

        let useFBCheckbox = $('#use_fb_email');
        let userEmailDiv = $('#user_email');

        if (useFBCheckbox.is(':checked')) {
            userEmailDiv.hide();
        }
        useFBCheckbox.click(function () {
            if (useFBCheckbox.is(':checked')) {
                userEmailDiv.hide('slow');
            }
            else {
                userEmailDiv.show('slow');
            }
        });
    </script>
@endpush

