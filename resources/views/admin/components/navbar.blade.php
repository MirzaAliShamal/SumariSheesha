@php
$user = auth()->user()
@endphp
<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                        collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                    <i data-feather="maximize"></i>
                </a></li>
            {{-- <li>
                <form class="form-inline mr-auto">
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="200">
                        <button class="btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </li> --}}
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">

        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg">
                <i data-feather="bell" class="{{  $user->unreadNotifications()->groupBy('notifiable_type')->count() > 0 ? 'bell' : '' }}"></i>
                {{-- @if($user->unreadNotifications()->groupBy('notifiable_type')->count() > 0) --}}
                    <span class="badge notif-count" style="position: absolute;
                    top: 4px;
                    right: 5px;
                    font-weight: 150px;
                    padding: 3px 6px;
                    background: #fb5623;
                    border-radius: 10px;">
                        {{  $user->unreadNotifications()->groupBy('notifiable_type')->count() }}
                    </span>
                {{-- @endif --}}

            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                <div class="dropdown-header">
                    Notifications
                    {{-- <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div> --}}
                </div>
                <div class="dropdown-list-content dropdown-list-icons notifications-prepend">

                    @if (count($user->notifications) > 0)
                    @foreach ($user->notifications as $notif)

                        <a href="{{ route('notification', $notif->id) }}" class="dropdown-item  {{ is_null($notif->read_at) ? 'dropdown-item-unread' : '' }}">
                            <span class="dropdown-item-icon">
                                <img src="{{ asset($notif->data['data']['icon']) }}" style="width: 50px; height:50px; object-fit:cover; border-radius:20px" alt="">
                            </span>
                            <span class="dropdown-item-desc"> {{ $notif->data['data']['body'] }}
                                <span class="time">{{ $notif->created_at->diffForHumans() }}</span>
                            </span>
                        </a>
                    @endforeach
                @else
                    <h4 class="text-center mt-3">No notification yet!</h4>
                @endif
                </div>
                {{-- <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div> --}}
            </div>
        </li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if(auth()->user()->image)
                    <img alt="image" src="{{asset(auth()->user()->image)}}" style="object-fit: cover; min-height:32px; min-width:32px" class="user-img-radious-style">
                @else
                    <img alt="image" src="{{asset('admin/img/user.png')}}" class="user-img-radious-style">
                @endif
                <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title">{{ auth()->user()->name }}</div>
                <a href="{{ route('admin.profile.view') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i>
                    Profile
                </a>
                 {{-- <a href="" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i>
                    Settings
                </a> --}}
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
                    class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
