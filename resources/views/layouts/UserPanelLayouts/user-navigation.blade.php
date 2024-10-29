<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('indexchat') }}" class="logo logo-dark">
            <span class="logo-sm p-2">
                {{-- <img src="{{asset('assets/images/oldlogo.png')}}" alt="" height="50" /> --}}
                 <img class="rounded-pill" src="{{asset('assets/images/Y.png')}}" alt="" height="50" />
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/popup-logo.png')}}" alt="" height="60" />
                {{-- <h2 class="text-white py-1 fw-bold" style="font-family: rubik;">YUVMEDIA Whatsapp</h2> --}}
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('indexchat') }}" class="logo logo-light py-2">
            <span class="logo-sm p-2">
                {{-- <img src="{{asset('assets/images/oldlogo.png')}}" alt="" height="50" /> --}}
                <img class="rounded-pill" src="{{asset('assets/images/Y.png')}}" alt="" height="50" />
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/popup-logo.png')}}" alt="" height="60" />
                {{-- <h2 class="text-white py-1 fw-bold" style="font-family: rubik;">YUVMEDIA Whatsapp</h2> --}}
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
                <li class="nav-item {{ request()->routeIs('indexchat') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('indexchat') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <img class="" src="{{asset('assets/images/mail.png')}}" alt="" height="25" />&nbsp;<span class="fs-5">Inbox</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('campaignspage') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('campaignspage') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <img class="" src="{{asset('assets/images/campaign (1).png')}}" alt="" height="25" />&nbsp;<span class="fs-5">Campaigns</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('automationpage') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('automationpage') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <img class="" src="{{asset('assets/images/automation.png')}}" alt="" height="25" />&nbsp;<span class="fs-5">Automations</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('analyticspage') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('analyticspage') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <img class="" src="{{asset('assets/images/statistics.png')}}" alt="" height="25" />&nbsp;<span class="fs-5">Analytics</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link " href="#sidebarLanding" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarLanding">
                        <img class="" src="{{asset('assets/images/gear.png')}}" alt="" height="25" />&nbsp;
                        <span class="fs-5" data-key="t-landing">Whatsapp Settings</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLanding">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('wahapage') }}" class="nav-link" data-key="t-one-page">
                                    WABA Business
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('templatespage') }}" class="nav-link" data-key="t-one-page">
                                  Templates
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('groupspage') }}" class="nav-link" data-key="t-one-page">
                                  Groups
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->routeIs('contactspage') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('contactspage') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <img class="" src="{{asset('assets/images/phone-book.png')}}" alt="" height="25" />&nbsp;&nbsp;<span class="fs-5">Contacts</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('logoutuserpanel') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('logoutuserpanel') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <img class="" src="{{asset('assets/images/log-out.png')}}" alt="" height="25" />&nbsp;&nbsp;<span class="fs-5">Log out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
