<div class="o-page__sidebar js-page-sidebar">
    <div class="c-sidebar">
        <a class="c-sidebar__brand" href="#">
            <img class="c-sidebar__brand-img" src="{{ asset('assets/img/logo.png') }}" alt="Logo"> Dashboard
        </a>

        <h4 class="c-sidebar__title">Users Manager</h4>
        <ul class="c-sidebar__list">

            <li class="c-sidebar__item has-submenu">
                <a class="c-sidebar__link" data-toggle="collapse" href="#side.users" aria-expanded="false" aria-controls="sidebar-submenu">
                    <i class="sl sl-icon-people u-mr-xsmall"></i>Users
                </a>
                <ul class="c-sidebar__submenu collapse" id="side.users">
                    <li><a class="c-sidebar__link" href="#">Add new</a></li>
                    <li><a class="c-sidebar__link" href="#">Roles</a></li>
                    <li><a class="c-sidebar__link" href="#">Permissions</a></li>
                    <li><a class="c-sidebar__link" href="{{ url('admin/users') }}">All users</a></li>
                </ul>
            </li>

            <li class="c-sidebar__item has-submenu">
                <a class="c-sidebar__link" data-toggle="collapse" href="#side.parcels" aria-expanded="false" aria-controls="sidebar-submenu">
                    <i class="fa fa-cube u-mr-xsmall"></i>Parcels
                </a>
                <ul class="c-sidebar__submenu collapse" id="side.parcels">
                    <li><a class="c-sidebar__link" href="#">Add new</a></li>
                    <li><a class="c-sidebar__link" href="#">All parcels</a></li>
                </ul>
            </li>
            <li class="c-sidebar__item">
                <a class="c-sidebar__link" href="{{ url('admin/settings') }}">
                    <i class="sl sl-icon-settings  u-mr-xsmall"></i>Settings
                </a>
            </li>
        </ul>

    </div><!-- // .c-sidebar -->
</div><!-- // .o-page__sidebar -->