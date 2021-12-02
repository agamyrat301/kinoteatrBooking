<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ request()->is('admin/home*') ? 'active' : ''}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <p>Esasy Sahypa</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('seanses.index')}}" class="nav-link {{ request()->is('admin/seanses*') ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-film"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"/><line x1="7" y1="2" x2="7" y2="22"/><line x1="17" y1="2" x2="17" y2="22"/><line x1="2" y1="12" x2="22" y2="12"/><line x1="2" y1="7" x2="7" y2="7"/><line x1="2" y1="17" x2="7" y2="17"/><line x1="17" y1="17" x2="22" y2="17"/><line x1="17" y1="7" x2="22" y2="7"/></svg>
        <p>Seanslar</p>
    </a>
</li>

{{-- <li class="nav-item">
    <a href="{{route('spots.index')}}" class="nav-link {{ request()->is('admin/spots*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Yerler</p>
    </a>
</li> --}}

<li class="nav-item">
    <a href="{{route('fiveds.index')}}" class="nav-link {{ request()->is('admin/fiveds*') ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        <p>5D</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('bookings.index')}}" class="nav-link {{ request()->is('admin/bookings*') ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
        <p>Satylan biletler</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('reports.index')}}" class="nav-link {{ request()->is('admin/reports*') ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        <p>Hasabat</p>
    </a>
</li>

