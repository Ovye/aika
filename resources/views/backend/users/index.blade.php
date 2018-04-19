<div class="container u-mt-large">
    <div class="row">
        <div class="col-sm-12">
            <div class="c-tabs">
                <nav class="c-tabs__list nav nav-tabs" id="myTab" role="tablist">
                    <a class="c-tabs__link active" id="nav-normal-users-tab" data-toggle="tab" href="#nav-normal-users"
                       role="tab" aria-controls="nav-normal-users" aria-selected="true">Via Form</a>
                    <a class="c-tabs__link" id="nav-social-users-tab" data-toggle="tab" href="#nav-social-users"
                       role="tab" aria-controls="nav-social-users" aria-selected="false">Via Socialite</a>
                    <a class="c-tabs__link" id="nav-admin-users-tab" data-toggle="tab" href="#nav-admin-users"
                       role="tab" aria-controls="nav-admin-users" aria-selected="false">Administrators</a>
                </nav>

                <div class="c-tabs__content tab-content" id="nav-tabContent">
                    <div class="c-tabs__pane active" id="nav-normal-users" role="tabpanel"
                         aria-labelledby="nav-normal-users-tab">
                        <div class="c-table-responsive u-mb-large">
                            <table class="c-table datatable-users" id="datatable-users">
                                <caption class="c-table__title">
                                    Normal Users
                                    <small>{{ count($users) }} Records</small>

                                    <a class="c-table__title-action" href="{{ url('users/add') }}/">
                                        <i class="sl sl-icon-plus"></i> Add New
                                    </a>
                                </caption>
                                <thead class="c-table__head c-table__head--slim">
                                <tr class="c-table__row">
                                    <th class="c-table__cell c-table__cell--head">Full Name</th>
                                    <th class="c-table__cell c-table__cell--head">Date Registered</th>
                                    <th class="c-table__cell c-table__cell--head">Email</th>
                                    <th class="c-table__cell c-table__cell--head">Active as</th>
                                    <th class="c-table__cell c-table__cell--head">
                                        <span class="u-hidden-visually">Actions</span>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $user)
                                    <tr class="c-table__row @if($user->verification()->first()->email == 0) c-table__row--danger @endif">
                                        <td class="c-table__cell">{{ $user->fullname }}
                                            <small class="u-block u-text-mute">{{ $user->phone }}</small>
                                        </td>

                                        <td class="c-table__cell">{{ date('jS M, Y', strtotime($user->created_at)) }}
                                            <small class="u-block u-text-mute">{{ now()->diffForHumans($user->created_at, true) }}
                                                ago
                                            </small>
                                        </td>

                                        <td class="c-table__cell">
                                            <div class="o-media">
                                                <div class="o-media__img u-mr-xsmall">
                                                    <div class="c-avatar c-avatar--xsmall">
                                                        @if($user->photo == '')
                                                            <img class="c-avatar__img"
                                                                 src="{{ asset('assets/img/user-default.png') }}"
                                                                 alt="{{ ucfirst($user->fname) }}'s Face">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="o-media__body">
                                                    {{ $user->email }}
                                                    <small class="u-block u-text-mute">
                                                        @if($user->verification()->first()->email == 0)
                                                            <span class="text-danger">Unverified</span>
                                                        @else
                                                            <span class="text-success">Verified</span>
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="c-table__cell">
                                            @if($user->active_as == 'traveller')
                                                <i class="fa fa-circle-o u-color-info u-mr-xsmall"></i>
                                            @elseif($user->active_as == 'sender')
                                                <i class="fa fa-circle-o u-color-warning u-mr-xsmall"></i>
                                            @endif
                                            <span class="text-capitalize">{{ $user->active_as }}</span>
                                            {{--<small class="u-block u-text-mute">Paid</small>--}}
                                        </td>

                                        <td class="c-table__cell u-text-right">
                                            <div class="c-dropdown dropdown">
                                                <button class="c-btn c-btn--secondary has-dropdown dropdown-toggle"
                                                        id="dropdownMenuButton10" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">Actions
                                                </button>

                                                <div class="c-dropdown__menu dropdown-menu"
                                                     aria-labelledby="dropdownMenuButton10">
                                                    <a class="c-dropdown__item dropdown-item edit-user"
                                                       href="" id="web-{{ $user->id }}">Edit
                                                        Profile</a>
                                                    <a class="c-dropdown__item dropdown-item"
                                                       href="users/{{ $user->id }}/view/">View
                                                        Profile</a>
                                                    <a class="c-dropdown__item dropdown-item"
                                                       href="roles/{{ $user->id }}/change/">Change
                                                        Role</a>
                                                    <a class="c-dropdown__item dropdown-item"
                                                       href="permissions/{{ $user->id }}/change/">Change
                                                        Permissions</a>
                                                    <a class="c-dropdown__item dropdown-item text-danger" href="#">Delete
                                                        Profile</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--Socialites--}}
                    <div class="c-tabs__pane" id="nav-social-users" role="tabpanel"
                         aria-labelledby="nav-social-users-tab">
                        <div class="c-table-responsive u-mb-large">
                            <table class="c-table datatable-users" id="datatable-users">
                                <caption class="c-table__title">
                                    Social Users
                                    <small>{{ count($socialiteUsers) }} Records</small>
                                </caption>
                                <thead class="c-table__head c-table__head--slim">
                                <tr class="c-table__row">
                                    <th class="c-table__cell c-table__cell--head">Full Name</th>
                                    <th class="c-table__cell c-table__cell--head">Date Registered</th>
                                    <th class="c-table__cell c-table__cell--head">Email</th>
                                    <th class="c-table__cell c-table__cell--head">Active as</th>
                                    <th class="c-table__cell c-table__cell--head">
                                        <span class="u-hidden-visually">Actions</span>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($socialiteUsers as $user)
                                    <tr class="c-table__row">
                                        <td class="c-table__cell">{{ $user->fullname }}
                                            <small class="u-block u-text-mute">ID: {{ $user->provider_id }}</small>
                                        </td>

                                        <td class="c-table__cell">{{ date('jS M, Y', strtotime($user->created_at)) }}
                                            <small class="u-block u-text-mute">{{ now()->diffForHumans($user->created_at, true) }}
                                                ago
                                            </small>
                                        </td>

                                        <td class="c-table__cell">
                                            <div class="o-media">
                                                <div class="o-media__img u-mr-xsmall">
                                                    <div class="c-avatar c-avatar--xsmall">
                                                        @if($user->photo == '')
                                                            <img class="c-avatar__img"
                                                                 src="{{ $user->photo }}"
                                                                 alt="{{ ucfirst($user->fname) }}'s Face">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="o-media__body">
                                                    {{ $user->email }}
                                                    <small class="u-block u-text-mute">
                                                        <span class="text-success text-capitalize">{{ $user->provider }}</span>
                                                    </small>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="c-table__cell">
                                            @if($user->active_as == 'traveller')
                                                <i class="fa fa-circle-o u-color-info u-mr-xsmall"></i>
                                            @elseif($user->active_as == 'sender')
                                                <i class="fa fa-circle-o u-color-warning u-mr-xsmall"></i>
                                            @endif
                                            <span class="text-capitalize">{{ $user->active_as }}</span>
                                            {{--<small class="u-block u-text-mute">Paid</small>--}}
                                        </td>

                                        <td class="c-table__cell u-text-right">
                                            <div class="c-dropdown dropdown">
                                                <button class="c-btn c-btn--secondary has-dropdown dropdown-toggle"
                                                        id="dropdownMenuButton10" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">Actions
                                                </button>

                                                <div class="c-dropdown__menu dropdown-menu"
                                                     aria-labelledby="dropdownMenuButton10">
                                                    <a class="c-dropdown__item dropdown-item"
                                                       href="users/{{ $user->id }}/edit/">Edit
                                                        Profile</a>
                                                    <a class="c-dropdown__item dropdown-item"
                                                       href="users/{{ $user->id }}/view/">View
                                                        Profile</a>
                                                    <a class="c-dropdown__item dropdown-item"
                                                       href="roles/{{ $user->id }}/change/">Change
                                                        Role</a>
                                                    <a class="c-dropdown__item dropdown-item"
                                                       href="permissions/{{ $user->id }}/change/">Change
                                                        Permissions</a>
                                                    <a class="c-dropdown__item dropdown-item text-danger"
                                                       href="#">Delete
                                                        Profile</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--Admins--}}
                    <div class="c-tabs__pane" id="nav-admin-users" role="tabpanel"
                         aria-labelledby="nav-admin-users-tab">
                        <div class="c-table-responsive u-mb-large">
                            <table class="c-table datatable-users" id="datatable-users">
                                <caption class="c-table__title">
                                    Admin Users
                                    <small>{{ count($admins) }} Records</small>

                                    <a class="c-table__title-action" href="{{ url('users/add') }}/">
                                        <i class="sl sl-icon-plus"></i> Add New
                                    </a>
                                </caption>
                                <thead class="c-table__head c-table__head--slim">
                                <tr class="c-table__row">
                                    <th class="c-table__cell c-table__cell--head">Full Name</th>
                                    <th class="c-table__cell c-table__cell--head">Date Registered</th>
                                    <th class="c-table__cell c-table__cell--head">Email</th>
                                    <th class="c-table__cell c-table__cell--head">Active as</th>
                                    <th class="c-table__cell c-table__cell--head">
                                        <span class="u-hidden-visually">Actions</span>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($admins as $user)
                                    <tr class="c-table__row @if($user->verification()->first()->email == 0) c-table__row--danger @endif">
                                        <td class="c-table__cell">{{ $user->fullname }}
                                            <small class="u-block u-text-mute">{{ $user->phone }}</small>
                                        </td>

                                        <td class="c-table__cell">{{ date('jS M, Y', strtotime($user->created_at)) }}
                                            <small class="u-block u-text-mute">{{ now()->diffForHumans($user->created_at, true) }}
                                                ago
                                            </small>
                                        </td>

                                        <td class="c-table__cell">
                                            <div class="o-media">
                                                <div class="o-media__img u-mr-xsmall">
                                                    <div class="c-avatar c-avatar--xsmall">
                                                        @if($user->photo == '')
                                                            <img class="c-avatar__img"
                                                                 src="{{ asset('assets/img/user-default.png') }}"
                                                                 alt="{{ ucfirst($user->fname) }}'s Face">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="o-media__body">
                                                    {{ $user->email }}
                                                    <small class="u-block u-text-mute">
                                                        @if($user->verification()->first()->email == 0)
                                                            <span class="text-danger">Unverified</span>
                                                        @else
                                                            <span class="text-success">Verified</span>
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="c-table__cell">
                                            @if($user->active_as == 'traveller')
                                                <i class="fa fa-circle-o u-color-info u-mr-xsmall"></i>
                                            @elseif($user->active_as == 'sender')
                                                <i class="fa fa-circle-o u-color-warning u-mr-xsmall"></i>
                                            @endif
                                            <span class="text-capitalize">{{ $user->active_as }}</span>
                                            {{--<small class="u-block u-text-mute">Paid</small>--}}
                                        </td>

                                        <td class="c-table__cell u-text-right">
                                            <div class="c-dropdown dropdown">
                                                <button class="c-btn c-btn--secondary has-dropdown dropdown-toggle"
                                                        id="dropdownMenuButton10" data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">Actions
                                                </button>

                                                <div class="c-dropdown__menu dropdown-menu"
                                                     aria-labelledby="dropdownMenuButton10">
                                                    <a class="c-dropdown__item dropdown-item"
                                                       href="users/{{ $user->id }}/edit/">Edit
                                                        Profile</a>
                                                    <a class="c-dropdown__item dropdown-item"
                                                       href="users/{{ $user->id }}/view/">View
                                                        Profile</a>
                                                    <a class="c-dropdown__item dropdown-item"
                                                       href="roles/{{ $user->id }}/change/">Change
                                                        Role</a>
                                                    <a class="c-dropdown__item dropdown-item"
                                                       href="permissions/{{ $user->id }}/change/">Change
                                                        Permissions</a>
                                                    <a class="c-dropdown__item dropdown-item text-danger" href="#">Delete
                                                        Profile</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
