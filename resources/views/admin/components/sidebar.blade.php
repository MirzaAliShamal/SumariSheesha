<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{asset('admin/img/logo.png')}}"
                    class="header-logo.png" /> <span class="logo-name">Zivi</span>
            </a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-picture">
                <img alt="image" src="{{asset('admin/img/user.png')}}">
            </div>
            <div class="sidebar-user-details">
                <div class="user-name">Sarah Smith</div>
                <div class="user-role">Administrator</div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                <li class=" @routeis('admin.dashboard') active @endrouteis"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class=""><a class="nav-link" href="{{ route('admin.flavour.list') }}">Flavour</a></li>
            </li>

        </ul>
    </aside>
</div>
