<div class="c-chat-dialogue">
    <div class="c-chat-dialogue__btn">
        <i class="c-chat-dialogue__btn-open fa fa-comments"></i>
        <i class="c-chat-dialogue__btn-close fa fa-close"></i>
    </div>

    <div class="c-chat-dialogue__body">
        <div class="c-chat-dialogue__header">
            <div class="c-chat-dialogue__team">
                <div class="c-avatar c-avatar--xsmall">
                    <img class="c-avatar__img" src="{{ asset('assets/img/avatar5-72.jpg') }}" alt="Profile Title">
                </div>

                <div class="c-avatar c-avatar--xsmall">
                    <img class="c-avatar__img" src="{{ asset('assets/img/avatar6-72.jpg') }}" alt="Profile Title">
                </div>

                <div class="c-avatar c-avatar--xsmall">
                    <img class="c-avatar__img" src="{{ asset('assets/img/avatar4-72.jpg') }}" alt="Profile Title">
                </div>
            </div>

            <div class="c-chat-dialogue__intro">
                <h4 class="u-h6 u-mb-zero">Workspace Support</h4>
                <p class="u-text-mute">Need help? Tell us about your problems. We’d love to help you!</p>
            </div>
        </div>

        <div class="c-chat-dialogue__messages">
            <div class="c-chat-dialogue__message">
                <div class="c-chat-dialogue__message-content">
                    Hi there! I just wanted to ask if there is any chance to get any discount on this UI Kit?
                </div>
            </div>

            <div class="c-chat-dialogue__message c-chat-dialogue__message--self">
                <div class="c-chat-dialogue__message-content">
                    Hello, yeah it is. Thanks for asking! Just use the coupon #getitcheaper and you’ll get 30% off! &#x1f600;
                </div>
            </div>

            <div class="c-chat-dialogue__message">
                <div class="c-chat-dialogue__message-content">
                    That’s amazing! Thanks
                </div>
            </div>
        </div>

        <div class="c-chat-dialogue__footer">
            <div class="c-field has-icon-right navbar-fixed-bottom">
                        <span class="c-field__icon">
                            <i class="fa fa-smile-o"></i>
                        </span>
                <label class="c-field__label u-hidden-visually" for="input-chat">Begin Chat</label>
                <input class="c-input" id="input-chat" type="text" placeholder="Begin Chat..">
            </div>
        </div>
    </div>
</div><!-- // .c-chat-dialogue -->

@includeIf('partials.foot')