<body>
    <div id="app">


<div id="sidebar" class="active">


    <div class="sidebar-wrapper active">

        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">

                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/admin/images/logo/logo.svg') }}" alt="Logo" srcset=""></a>
                </div>

                <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" checked hidden >
                        <label class="form-check-label" ></label>
                    </div>


                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">


                <li
                    class="sidebar-item {{ Route::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{ Route::is('referral') ? 'active' : '' }} ">
                    <a href="{{ route('admin.referral') }}" class="sidebar-link">
                        <i class="far fa-handshake"></i>
                        <span>Referral Levels</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{ Route::is('plan') ? 'active' : '' }} ">
                    <a href="{{ route('admin.plan') }}" class="sidebar-link">
                        <i class="far fa-lightbulb"></i>
                        <span>Manage Plan</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{ Route::is('rewards') ? 'active' : '' }} ">
                    <a href="{{ route('admin.rewards') }}" class="sidebar-link">
                        <i class="fas fa-gifts"></i>
                        <span>Manage Rewards</span>
                    </a>
                </li>

                <li class="sidebar-title">MANAGE USERS</li>

                <li
                    class="sidebar-item has-sub">
                    <a href="" class='sidebar-link'>
                        <i class="fas fa-users-cog"></i>
                        <span>Users Management</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item {{ Route::is('allusers') ? 'active' : '' }} ">
                            <a href="{{ route('admin.allusers') }}">All Users</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Active Users</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Pending Users</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Banned Users</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Email Unverified</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Sms Unverified</a>
                        </li>
                    </ul>
                </li>

                <li
                    class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-book"></i>
                        <span>Subscribers</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="">Subscribers</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Mail to Subscribers</a>
                        </li>
                    </ul>
                </li>

                <li
                    class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-book-open"></i>
                        <span>Deposit Methods</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="">Autometic Methods</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Manual Methods</a>
                        </li>
                    </ul>
                </li>

                <li
                    class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-file-alt"></i>
                        <span>Deposit History</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="">All Deposits</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Approved Deposits</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Pending Deposits</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Rejected Deposits</a>
                        </li>
                    </ul>
                </li>

                <li
                    class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-hand-holding-usd"></i>
                        <span>Withdrawals</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="">Withdraw Methods</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Pending Withdrawals</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Approved Withdrawals</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Rejected Withdrawals</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">All Withdrawals</a>
                        </li>
                    </ul>
                </li>

                <li
                    class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-comments-dollar"></i>
                        <span>Transections</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="">Transaction Logs</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Investment Log </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Investment History</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="">Referral Commissions</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">BASIC SETTINGS</li>


            </ul>
        </div>
    </div>

</div>
