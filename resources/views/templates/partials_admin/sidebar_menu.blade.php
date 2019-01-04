<div class="page-sidebar-wrapper">
<!-- BEGIN SIDEBAR -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <li class="sidebar-search-wrapper">
            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
            <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                <a href="javascript:;" class="remove">
                    <i class="icon-close"></i>
                </a>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit">
                            <i class="icon-magnifier"></i>
                        </a>
                    </span>
                </div>
            </form>
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>
        <li class="nav-item start @if (request()->segment(1) == 'dashboard_admin') active open @endif">
            <a href="{{ route('home') }}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Beranda</span>
                <span class="selected"></span>  
            </a>
        </li>

        @if (Auth::check())
        <li class="heading">
            <h3 class="uppercase">Fitur</h3>
        </li>
        <li class="nav-item @if ($seg1 == 'user' && $seg2 != 'profile') active open @endif">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-user"></i>
                <span class="title">Pengguna</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item @if ($seg2 == 'show' && $seg1 == 'user') active @endif ">
                    <a href="{{ route('user_show') }}" class="nav-link ">
                        <i class="fa fa-users"></i>
                        <span class="title">Semua Pengguna</span>
                    </a>
                </li>
                <li class="nav-item  @if ($seg2 == 'add' && $seg1 == 'user') active @endif ">
                    <a href="{{ route('user_add') }}" class="nav-link ">
                        <i class="fa fa-user-plus"></i>
                        <span class="title">Tambah Pengguna Baru</span>
                    </a>
                </li>
                
            </ul>
        </li>

        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-notebook"></i>
                <span class="title">Halaman</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="#" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">Semua Halaman</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="#" class="nav-link ">
                        <i class="fa fa-plus-square"></i>
                        <span class="title">Tambahkan Halaman Baru</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item  @if ($seg1 == 'post') active @endif ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-note"></i>
                <span class="title">Pos</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item @if ($seg2 == 'show' && $seg1 == 'post') active @endif ">
                    <a href="{{ route('post_show') }}" class="nav-link ">
                        <i class="fa fa-sticky-note"></i>
                        <span class="title">Semua Pos</span>
                    </a>
                </li>
                <li class="nav-item @if ($seg2 == 'add' && $seg1 == 'post') active @endif ">
                    <a href="{{ route('post_add') }}" class="nav-link ">
                        <i class="fa fa-pencil-square"></i>
                        <span class="title">Tambah Pos Baru</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item @if ($seg1 == 'tag') active open @endif">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-tag"></i>
                <span class="title">Tag</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item @if ($seg2 == 'show' && $seg1 == 'tag') active @endif ">
                    <a href="{{ route('tag_show') }}" class="nav-link ">
                        <i class="fa fa-tags"></i>
                        <span class="title">Semua Tag</span>
                    </a>
                </li>
                <li class="nav-item @if ($seg2 == 'add' && $seg1 == 'tag') active @endif ">
                    <a href="{{ route('tag_add') }}" class="nav-link ">
                        <i class="fa fa-tag"></i>
                        <span class="title">Tambah Tag Baru</span>
                    </a>
                </li>
            </ul>
        </li>

        @endif
    
    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>