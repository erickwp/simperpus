<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Transaksi
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/transactions/borrow') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Peminjaman</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/transactions/return') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pengembalian</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ url('/books') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Buku
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/bookshelfs') }}" class="nav-link">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>
                        Lemari
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        Pengaturan
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">3</span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('users') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/profile') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Akun</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/logout') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Keluar</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
