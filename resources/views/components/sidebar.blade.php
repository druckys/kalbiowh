<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Warehouse</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">KGM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('tool') }}"><i class="far fa-square"></i> <span>List Tools</span></a>
            </li>

            <li class="menu-header">Log Book</li>
            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('peminjaman') }}"><i class="far fa-square"></i> <span>Peminjaman</span></a>
                <a class="nav-link"
                    href="{{ url('pengembalian') }}"><i class="far fa-square"></i> <span>Pengembalian</span></a>
            </li>
            
            <li class="menu-header">History</li>
            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('history') }}"><i class="far fa-square"></i> <span>History</span></a>
            </li>
           
        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
