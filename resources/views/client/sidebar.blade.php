<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item {{  request()->routeIs('client.users.index') ? 'active' : '' }}">
                    <a href="{{route('client.users.index')}}">
                        <i class="fas fa-user"></i>
                        <p>Mijoz</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>


