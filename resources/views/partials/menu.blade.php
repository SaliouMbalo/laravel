<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('agence_access')
                <li class="{{ request()->is('admin/agences') || request()->is('admin/agences/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.agences.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.agence.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('affectation_access')
                <li class="{{ request()->is('admin/affectations') || request()->is('admin/affectations/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.affectations.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.affectation.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('compte_access')
                <li class="{{ request()->is('admin/comptes') || request()->is('admin/comptes/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.comptes.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.compte.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('client_access')
                <li class="{{ request()->is('admin/clients') || request()->is('admin/clients/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.clients.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.client.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('operations_bancaire_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.operationsBancaire.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('depot_access')
                            <li class="{{ request()->is('admin/depots') || request()->is('admin/depots/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.depots.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.depot.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>