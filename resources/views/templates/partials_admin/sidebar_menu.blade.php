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
        <li class="nav-item start active open">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                <span class="selected"></span>  
            </a>
        </li>

        @if (Auth::check())
        <li class="heading">
            <h3 class="uppercase">Features</h3>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-user"></i>
                <span class="title">User</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ route('user_show') }}" class="nav-link ">
                        <i class="fa fa-users"></i>
                        <span class="title">All User</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('user_add') }}" class="nav-link ">
                        <i class="fa fa-user-plus"></i>
                        <span class="title">Add New User</span>
                    </a>
                </li>
                
            </ul>
        </li>

        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-notebook"></i>
                <span class="title">Pages</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="#" class="nav-link ">
                        <i class="fa fa-book"></i>
                        <span class="title">All Pages</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="#" class="nav-link ">
                        <i class="fa fa-plus-square"></i>
                        <span class="title">Add New Page</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-note"></i>
                <span class="title">Post</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="#" class="nav-link ">
                        <i class="fa fa-sticky-note"></i>
                        <span class="title">All Post</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="#" class="nav-link ">
                        <i class="fa fa-pencil-square"></i>
                        <span class="title">Add Post</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-tag"></i>
                <span class="title">Tag</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ route('tag_show') }}" class="nav-link ">
                        <i class="fa fa-tags"></i>
                        <span class="title">All Tag</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('tag_add') }}" class="nav-link ">
                        <i class="fa fa-tag"></i>
                        <span class="title">Add New Tag</span>
                    </a>
                </li>
            </ul>
        </li>

        @endif
    
        <li class="heading">
            <h3 class="uppercase">Pages</h3>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-basket"></i>
                <span class="title">eCommerce</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="ecommerce_index.html" class="nav-link ">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="ecommerce_orders.html" class="nav-link ">
                        <i class="icon-basket"></i>
                        <span class="title">Orders</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="ecommerce_orders_view.html" class="nav-link ">
                        <i class="icon-tag"></i>
                        <span class="title">Order View</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="ecommerce_products.html" class="nav-link ">
                        <i class="icon-graph"></i>
                        <span class="title">Products</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="ecommerce_products_edit.html" class="nav-link ">
                        <i class="icon-graph"></i>
                        <span class="title">Product Edit</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-docs"></i>
                <span class="title">Apps</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="app_todo.html" class="nav-link ">
                        <i class="icon-clock"></i>
                        <span class="title">Todo 1</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="app_todo_2.html" class="nav-link ">
                        <i class="icon-check"></i>
                        <span class="title">Todo 2</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="app_inbox.html" class="nav-link ">
                        <i class="icon-envelope"></i>
                        <span class="title">Inbox</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="app_calendar.html" class="nav-link ">
                        <i class="icon-calendar"></i>
                        <span class="title">Calendar</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="app_ticket.html" class="nav-link ">
                        <i class="icon-notebook"></i>
                        <span class="title">Support</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-social-dribbble"></i>
                <span class="title">General</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="page_general_about.html" class="nav-link ">
                        <i class="icon-info"></i>
                        <span class="title">About</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="page_general_contact.html" class="nav-link ">
                        <i class="icon-call-end"></i>
                        <span class="title">Contact</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-notebook"></i>
                        <span class="title">Portfolio</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="page_general_portfolio_1.html" class="nav-link "> Portfolio 1 </a>
                        </li>
                        <li class="nav-item ">
                            <a href="page_general_portfolio_2.html" class="nav-link "> Portfolio 2 </a>
                        </li>
                        <li class="nav-item ">
                            <a href="page_general_portfolio_3.html" class="nav-link "> Portfolio 3 </a>
                        </li>
                        <li class="nav-item ">
                            <a href="page_general_portfolio_4.html" class="nav-link "> Portfolio 4 </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-magnifier"></i>
                        <span class="title">Search</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="page_general_search.html" class="nav-link "> Search 1 </a>
                        </li>
                        <li class="nav-item ">
                            <a href="page_general_search_2.html" class="nav-link "> Search 2 </a>
                        </li>
                        <li class="nav-item ">
                            <a href="page_general_search_3.html" class="nav-link "> Search 3 </a>
                        </li>
                        <li class="nav-item ">
                            <a href="page_general_search_4.html" class="nav-link "> Search 4 </a>
                        </li>
                        <li class="nav-item ">
                            <a href="page_general_search_5.html" class="nav-link "> Search 5 </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="page_general_pricing.html" class="nav-link ">
                        <i class="icon-tag"></i>
                        <span class="title">Pricing</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="page_general_faq.html" class="nav-link ">
                        <i class="icon-wrench"></i>
                        <span class="title">FAQ</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="page_general_blog.html" class="nav-link ">
                        <i class="icon-pencil"></i>
                        <span class="title">Blog</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="page_general_blog_post.html" class="nav-link ">
                        <i class="icon-note"></i>
                        <span class="title">Blog Post</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="page_general_invoice.html" class="nav-link ">
                        <i class="icon-envelope"></i>
                        <span class="title">Invoice</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="page_general_invoice_2.html" class="nav-link ">
                        <i class="icon-envelope"></i>
                        <span class="title">Invoice 2</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-settings"></i>
                <span class="title">System</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="page_cookie_consent_1.html" class="nav-link ">
                        <span class="title">Cookie Consent 1</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="page_cookie_consent_2.html" class="nav-link ">
                        <span class="title">Cookie Consent 2</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="page_system_coming_soon.html" class="nav-link " target="_blank">
                        <span class="title">Coming Soon</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="page_system_404_1.html" class="nav-link ">
                        <span class="title">404 Page 1</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="page_system_404_2.html" class="nav-link " target="_blank">
                        <span class="title">404 Page 2</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="page_system_404_3.html" class="nav-link " target="_blank">
                        <span class="title">404 Page 3</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="page_system_500_1.html" class="nav-link ">
                        <span class="title">500 Page 1</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="page_system_500_2.html" class="nav-link " target="_blank">
                        <span class="title">500 Page 2</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-folder"></i>
                <span class="title">Multi Level Menu</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i> Item 1
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="javascript:;" target="_blank" class="nav-link">
                                <i class="icon-user"></i> Arrow Toggle
                                <span class="arrow nav-toggle"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="icon-power"></i> Sample Link 1</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="icon-paper-plane"></i> Sample Link 1</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="icon-star"></i> Sample Link 1</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icon-camera"></i> Sample Link 1</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icon-link"></i> Sample Link 2</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icon-pointer"></i> Sample Link 3</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" target="_blank" class="nav-link">
                        <i class="icon-globe"></i> Arrow Toggle
                        <span class="arrow nav-toggle"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icon-tag"></i> Sample Link 1</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icon-pencil"></i> Sample Link 1</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="icon-graph"></i> Sample Link 1</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icon-bar-chart"></i> Item 3 </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>