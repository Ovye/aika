<div class="c-modal__dialog modal-dialog" role="document">
    <div class="c-modal__header">
        <div class="c-modal__title">
            Edit Profile
        </div>
    </div>
    <form action="{{ route('user.update') }}" method="post" class="editUserForm" id="{{ $randomFormId }}">
        <div class="c-modal__body">
            <div class="">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="guard" value="web">
                <div class="u-clearfix u-mb-medium">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="">First Name</label>
                                <input type="text" class="c-input" name="fname" value="{{ $user->fname }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="">Last Name</label>
                                <input type="text" class="c-input" name="lname"
                                       value="{{ old('lname', $user->lname) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="">Phone Number</label>
                                <input type="text" class="c-input" name="phone" value="{{ old('phone', $user->phone) }}"
                                       required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="">Email</label>
                                <input type="email" class="c-input" name="email"
                                       value="{{ old('email', $user->email) }}"
                                       required>
                            </div>
                        </div>
                    </div>

                    <div class="c-field c-card">
                        <div class="alert alert-warning" style="border-radius: 0">
                            Tick <span class="badge badge-info">Send this to user</span> to notify user of this change.
                        </div>
                        <div class="c-card__body">
                            <label class="c-field__label" for="">New Password</label>
                            <input type="text" class="c-input" name="password">
                            <div class="c-choice c-choice--checkbox mt-1">
                                <input class="c-choice__input" id="send_user_password_{{ $user->id }}"
                                       name="send_user_password_{{ $user->id }}"
                                       type="checkbox">
                                <label class="c-choice__label" for="send_user_password_{{ $user->id }}">Send this to
                                    user?</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="c-modal__footer">
            <button type="submit" class="c-btn c-btn--primary u-float-left">
                <i class="fa fa-check-circle"></i> Save changes
            </button>
            <button type="button" class="c-btn c-btn--secondary u-float-right" data-dismiss="modal">
                Close
            </button>
        </div>
    </form>
</div>