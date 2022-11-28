<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Warehouse</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">KGM</a>
        </div>
        <ul class="sidebar-menu">
            
            @if (auth()->user()->username == "AAA")
                <li class="menu-header">Dashboard</li>
                <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                    <a class="nav-link"
                        href="{{ url('tool') }}"><i class="fa-solid fa-screwdriver-wrench"></i> <span>List Tools</span></a>
                </li>
            @endif
            
            <li class="menu-header">Log Tools</li>
            <li class="{{ Request::is('eror-404') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('peminjaman') }}"><i class="fa-solid fa-file-circle-minus"></i> <span>Peminjaman</span></a>
                <a class="nav-link"
                    href="{{ url('pengembalian') }}"><i class="fa-solid fa-file-circle-plus"></i> <span>Pengembalian</span></a>
            </li>

            <li class="menu-header">Log Materials</li>
            <li class="{{ Request::is('eror-404') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('materialout') }}"><i class="fa-solid fa-file-circle-minus"></i> <span>Material Keluar</span></a>
            </li>
            
            @if (auth()->user()->username == "AAA")
                <li class="menu-header">History</li>
                <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                    <a class="nav-link"
                        href="{{ url('history-tools') }}"><i class="fa-regular fa-calendar-days"></i> <span>History Tools</span></a>
                </li>
                <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                    <a class="nav-link"
                        href="{{ url('history-materials') }}"><i class="fa-regular fa-calendar-days"></i> <span>History Materials</span></a>
                </li>
            @endif
           
        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            {{-- <a href="https://www.wati.io/free-whatsapp-link-generator/"
                class="btn btn-success btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Whatsapp
            </a> --}}
            <a href="https://wa.me/6289617275564?text=Hello%20world!"
                class="btn btn-success btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Whatsapp
            </a>
        </div>
    </aside>
</div>
