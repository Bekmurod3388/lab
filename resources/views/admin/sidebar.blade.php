<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item {{  request()->routeIs('admin.users.index') ? 'active' : '' }}">
                    <a href="{{route('admin.users.index')}}">
                        <i class="fas fa-user"></i>
                        <p>Foydalanuvchilar</p>
                    </a>
                </li>
                <li class="nav-item {{  request()->routeIs('admin.roles.index') ? 'active' : '' }}">
                    <a href="{{route('admin.roles.index')}}">
                        <i class="fas fa-user"></i>
                        <p>Rollar</p>
                    </a>
                </li>
                <li class="nav-item {{  request()->routeIs('admin.posts.index') ? 'active' : '' }}">
                    <a href="{{route('admin.posts.index')}}">
                        <i class="fas fa-user"></i>
                        <p>Yangiliklar</p>
                    </a>
                </li>
                <li class="nav-item {{  request()->routeIs('admin.api.index') ? 'active' : '' }}">
                    <a href="{{route('admin.api.index')}}">
                        <i class="fas fa-user"></i>
                        <p>API lar</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>


