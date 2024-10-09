<aside class="app-sidebar sticky" id="sidebar">
    <div class="main-sidebar-header">
        <a href="{{ url('/') }}" class="header-logo">
            <img src="{{ asset('admin/assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo">
        </a>
    </div>
    <div class="main-sidebar" id="sidebar-scroll">
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <ul class="main-menu">
                        <li class="slide__category"><span class="category-name">Main</span></li>
                        <li class="slide has-sub">
                            <a href="#" class="side-menu__item">
                                <i class="bx bx-home side-menu__icon"></i>
                                <span class="side-menu__label">Dashboard</span>
                            </a>
                            <ul class="slide-menu child1">
                         </ul>
                        </li>
                            <li class="slide__category"><span class="category-name">Customers</span></li>
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bi bi-people side-menu__icon"></i> 
                                <span class="side-menu__label">Customers</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                            <li class="slide">
                                <a href="{{ route('customers.index')}}" class="side-menu__item">Customers</a>
                            </li>
                        </ul>
                         <li class="slide__category"><span class="category-name">Bookings</span></li>
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bi bi-journal side-menu__icon"></i>
                                <span class="side-menu__label">Bookings</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                            <li class="slide">
                                <a href="#" class="side-menu__item">Bookings</a>
                            </li>
                      </li>
                            </ul>    
                             <li class="slide__category"><span class="category-name">Settings</span></li>
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bi bi-gear-wide-connected side-menu__icon"></i>
                                <span class="side-menu__label">Setting</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                            <li class="slide">
                                <a href="#" class="side-menu__item">Roles & Permissions</a>
                            </li>
                      </li>
                            </ul>    
                                  
                            </nav>
                        </div>
                    </aside>