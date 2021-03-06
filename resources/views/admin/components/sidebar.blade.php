<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{asset('admin/img/logo.png')}}"
                    class="header-logo.png" /> <span class="logo-name">Zivi</span>
            </a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-picture">
                @if(auth()->user()->image)
                    <img alt="image" style="margin-left:4%; object-fit: cover; min-height:60px; min-width:32px" src="{{asset(auth()->user()->image)}}">
                @else
                <img alt="image" src="{{asset('admin/img/user.png')}}">
                @endif
            </div>
            <div class="sidebar-user-details">
                <div class="user-name">{{ auth()->user()->name }}</div>
                <div class="user-role">Administrator</div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.dashboard') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i data-feather="monitor"></i> <span> Dashboard </span>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.flavour.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.flavour.list') }}">
                            <i data-feather="droplet"></i> <span>Flavours</span>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.color.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.color.list') }}">
                            <i data-feather="aperture"></i> <span>Colors</span>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.category.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.category.list') }}">
                            <i data-feather="database"></i> <span>Categories</span> </a>
                        </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.sub.category.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.sub.category.list') }}">
                            <i data-feather="hard-drive"></i> <span>Sub Categories</span> </a>
                        </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.product.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.product.list') }}">
                            <i data-feather="grid"></i><span>Products</span>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.brand.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.brand.list') }}">
                          <i data-feather="target"></i> <span>Brands</span>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.brand_product.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.brand_product.list') }}">
                            <i data-feather="package"></i> <span>Brand Products</span>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.order.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.order.list') }}">
                            <i data-feather="shopping-cart"></i> <span> Orders </span>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.booking.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.booking.list') }}">
                            <i data-feather="shopping-bag"></i> <span> Bookings </span>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @can('dashboard') --}}
                    <li class=" @routeis('admin.earning.*') active @endrouteis">
                        <a class="nav-link" href="{{ route('admin.earning.list') }}">
                            <i data-feather="dollar-sign"></i> <span> Transactions </span>
                        </a>
                    </li>
                {{-- @endcan --}}
            </li>

            <li class="menu-header">Blogs</li>
            <li class=" @routeis('admin.blog.category*') active @endrouteis">
                <a class="nav-link" href="{{ route('admin.blog.category.list') }}">
                    <i data-feather="database"></i> <span> Categories </span>
                </a>
            </li>
            <li class=" @routeis('admin.blog.post*') active @endrouteis">
                <a class="nav-link" href="{{ route('admin.blog.post.list') }}">
                    <i data-feather="file-text"></i> <span> Posts </span>
                </a>
            </li>

            <li class="menu-header">CMS</li>
            <li class=" @routeis('admin.cms.general*') active @endrouteis">
                <a class="nav-link" href="{{ route('admin.cms.general') }}">
                    <i data-feather="grid"></i> <span> General </span>
                </a>
            </li>
            <li class=" @routeis('admin.cms.home*') active @endrouteis">
                <a class="nav-link" href="{{ route('admin.cms.home') }}">
                    <i data-feather="home"></i> <span> Home </span>
                </a>
            </li>

            <li class="menu-header">Settings</li>
            <li class=" @routeis('admin.cms.coupon*') active @endrouteis">
                <a class="nav-link" href="{{ route('admin.cms.coupon') }}">
                    <i data-feather="gift"></i> <span> Coupon</span>
                </a>
            </li>
            <li class=" @routeis('admin.cms.payment*') active @endrouteis">
                <a class="nav-link" href="{{ route('admin.cms.payment') }}">
                    <i data-feather="dollar-sign"></i> <span> Payment</span>
                </a>
            </li>
            <li style="margin-top: 100px"></li>
        </ul>
    </aside>
</div>
