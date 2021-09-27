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
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.dashboard') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i data-feather="monitor"></i> Dashboard
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.flavour.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.flavour.list') }}">
                            <i data-feather="droplet"></i> Flavours
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.color.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.color.list') }}">
                            <i class="fa fa-brush"></i>  Colors
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.category.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.category.list') }}">
                            <i data-feather="layers"></i> Categories</a>
                        </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.product.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.product.list') }}">
                            <i data-feather="box"></i> Products
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.brand.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.brand.list') }}">
                          <i data-feather="aperture"></i>  Brands
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.brand_product.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.brand_product.list') }}">
                            <i data-feather="box"></i>  Brand Products
                        </a>
                    </li>
                {{-- @endcan --}}
            </li>

        </ul>
    </aside>
</div>
