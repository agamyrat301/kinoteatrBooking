<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ request()->is('admin/home*') ? 'active' : ''}}">
        <i class="nav-icon fas fa-home"></i>
        <p>Esasy Sahypa</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('seanses.index')}}" class="nav-link {{ request()->is('admin/seanses*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Seanslar</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('spots.index')}}" class="nav-link {{ request()->is('admin/spots*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Yerler</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('fiveds.index')}}" class="nav-link {{ request()->is('admin/fiveds*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>5D</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('bookings.index')}}" class="nav-link {{ request()->is('admin/bookings*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Satylan biletler</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('reports.index')}}" class="nav-link {{ request()->is('admin/reports*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Hasabat</p>
    </a>
</li>

