<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('assets/images/oldlogo.png')}}" alt="" height="50" />
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/oldlogo.png')}}" alt="" height="60" />
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('assets/images/oldlogo.png')}}" alt="" height="50" />
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/oldlogo.png')}}" alt="" height="60" />
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('indexchat') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="bx bxs-chat"></i><span>Index</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('campaignspage') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class=" bx bxs-megaphone"></i><span>Campaigns</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('automationpage') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="ri-settings-3-fill"></i><span>Automations</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="bx bx-user"></i>
                        <span data-key="t-landing">User</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLanding">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-one-page">
                                    Registration
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-one-page">
                                   All Users
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
