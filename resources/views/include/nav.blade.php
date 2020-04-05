<ul id="menu-mainmenu"
                    class="navbar-nav"
                    data-control="mainmenu"
                    data-alias="mainmenu">
                    <li id="menuitem-preview" class="nav-item">
                        <a  class="nav-link front-end" title="Storefront" href="#" target="_blank">
                            <i class="fa fa-store"></i>
                        </a>
                    </li>
                    <!-- <li id="menuitem-activity" class="nav-item dropdown">
                        <a  class="nav-link" href="http://localhost/tastyigniter/admin" data-toggle="dropdown">
                            <i class="fa fa-bell" role="button"></i>
                                </a>

                        <ul
                            class="dropdown-menu "
                            data-request-options="activity"    >
                                        <li class="dropdown-header">Recent activities</li>
                                <li
                                    id="menuitem-activity-activity-options"
                                    class="dropdown-body">
                                    <p class="wrap-all text-muted text-center"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></p>
                                </li>
                                    <li class="dropdown-footer">
                                                <a class="text-center" href="http://localhost/tastyigniter/admin/activities"><i class="fa fa-ellipsis-h"></i></a>
                                        </li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link" href="" data-toggle="dropdown">
                            <i class="fa fa-gears" role="button"></i>
                            <span class="badge badge-danger"><i class="fa fa-exclamation text-white"></i></span>
                        </a>

                        <ul class="dropdown-menu">
                            <div class='menu menu-grid row'>
                                <div class="menu-item col col-4">
                                    <a class="menu-link" href="http://localhost/tastyigniter/admin/settings/edit/general">
                                        <i class="fa fa-sliders"></i>
                                        <span>General</span>
                                    </a>
                                </div>
                                <div class="menu-item col col-4">
                                        <a class="menu-link" href="http://localhost/tastyigniter/admin/settings/edit/setup">
                                            <i class="fa fa-toggle-on"></i>
                                            <span>Order &amp; Reservation</span>
                                        </a>
                                </div>
                                <div class="menu-item col col-4">
                                    <a class="menu-link" href="http://localhost/tastyigniter/admin/settings/edit/user">
                                        <i class="fa fa-user"></i>
                                        <span>User</span>
                                    </a>
                                </div>
                                <div class="menu-item col col-4">
                                    <a class="menu-link" href="http://localhost/tastyigniter/admin/settings/edit/media">
                                        <i class="fa fa-image"></i>
                                        <span>Media</span>
                                    </a>
                                </div>
                                <div class="menu-item col col-4">
                                    <a class="menu-link" href="http://localhost/tastyigniter/admin/settings/edit/mail">
                                        <i class="fa fa-envelope"></i>
                                        <span>Mail</span>
                                    </a>
                                </div>
                                <div class="menu-item col col-4">
                                    <a class="menu-link" href="http://localhost/tastyigniter/admin/settings/edit/advanced">
                                        <i class="fa fa-cog"></i>
                                        <span>Advanced</span>
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown-footer">
                                <a class="text-center text-danger" href="http://localhost/tastyigniter/admin/settings"><i class="fa fa-ellipsis-h"></i></a>
                            </div>
                        </ul>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <img class="rounded-circle" src="//www.gravatar.com/avatar/0193f9e8ab162da02d02c82d94e4d003.png?s=64&d=mm">
                        </a>
                        <div class="dropdown-menu">
                            <div class="user-info">
                                <span class="text-uppercase">Administrator</span>
                                <div class="username">Admin</div>
                                    <span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Default</span>
                                </div>
                            <a class="dropdown-item" href="http://localhost/tastyigniter/admin/staffs/edit/1"><i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;Edit Details        </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off fa-fw"></i>&nbsp;&nbsp;Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                <!-- <a class="dropdown-item text-danger" href="http://localhost/tastyigniter/admin/logout">
                            <i class="fa fa-power-off fa-fw"></i>&nbsp;&nbsp;Logout</a> -->
                            <div role="separator" class="dropdown-divider"></div>
                        </div>
                    </li>
                </ul>