<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/admin" class="brand-link">
        <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">An Nguyễn</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fa-solid fa-plane-departure"></i>
                <p style = "margin-left: 20px">
                    Chuyến bay
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/flights/add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm chuyến bay</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/flights/list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách chuyến bay</p>
                    </a>
                </ul>
           </li>
           <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fa-solid fa-user"></i>
                <p style = "margin-left: 20px">
                    Người dùng
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/users/list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách người dùng</p>
                    </a>
                </ul>
           </li>
           <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fa-solid fa-receipt"></i>
                <p style = "margin-left: 20px">
                    Giao dịch
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/transaction/list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách giao dịch</p>
                    </a>
                </ul>
           </li>

        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>