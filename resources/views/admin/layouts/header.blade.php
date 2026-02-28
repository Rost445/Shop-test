<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" style="margin-right: 10px;>
        
        @php
        $getUnreadNotification = App\Models\NotificationModel::getUnreadNotification();
        @endphp
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">{{ $getUnreadNotification->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Сповіщення: {{ $getUnreadNotification->count() }}</span>
                @foreach ($getUnreadNotification as $noti)
                    <div class="dropdown-divider"></div>
                    <a href="{{ $noti->url }}?noti_id={{ $noti->id }}" class="dropdown-item">
                    <div><i class="fas fa-bell mr-2"></i></i>{!! $noti->message !!}</div>
                        <div class=" text-muted text-sm"> {{ \Carbon\Carbon::parse($noti->created_at)->locale('uk')->translatedFormat('d F Y H:i') }}
                        </div>
                    </a>
                @endforeach
                <div class="dropdown-divider"></div>
                <a href="{{ url('admin/notification') }}" class="dropdown-item dropdown-footer">Переглянути всі
                сповіщення</a>
            </div>
        </li>
    </ul>
    <a href="{{ url(' ') }}" target="_blank" class="nav-link text-secondary border-left" style="margin-right: 10px;">
        <i class="nav-icon fas fa-globe" aria-hidden="true"></i>
На сайт
    </a>
    <a href="{{ url('admin/logout') }}" class="nav-link text-secondary border-left" style="margin-right: 10px;">
        <i class="nav-icon fas fa-sign-out-alt" aria-hidden="true"></i>
        Вийти
    </a>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link" style="text-align: center">
        <span class="brand-text">Привіт, {{ Auth::user()->name }} !</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('admin/dashboard') }}"
                        class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                        <i class="fas fa-chart-line"></i>
                        <p>Адмін-панель</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/admin/list') }}"
                        class="nav-link @if (Request::segment(2) == 'admin') active @endif">
                        <i class="fas fa-user-shield"></i>
                       <p>Адміністратори</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{ url('admin/customer/list') }}"
                        class="nav-link @if (Request::segment(2) == 'customer') active @endif">
                        <i class="fas fa-user-friends"></i>
                        <p>Замовники</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/orders/list') }}"
                        class="nav-link @if (Request::segment(2) == 'orders') active @endif">
                        <i class="fas fa-cart-arrow-down"></i>
                        <p>Замовлення</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/category/list') }}"
                        class="nav-link @if (Request::segment(2) == 'category') active @endif">
                        <i class="fas fa-list-ul"></i>
                        <p>Категорії</p>
                    </a>
                </li>
    
                <li class="nav-item">
                    <a href="{{ url('admin/sub_category/list') }}"
                        class="nav-link @if (Request::segment(2) == 'sub_category') active @endif">
                        <i class="far fa-list-alt"></i>
                        <p>Підкатегорії</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/brand/list') }}"
                        class="nav-link @if (Request::segment(2) == 'brand') active @endif">
                        <i class="fas fa-copyright"></i>
                        <p>Бренд</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/color/list') }}"
                        class="nav-link @if (Request::segment(2) == 'color') active @endif">
                        <i class="fas fa-palette"></i>
                        <p>Колір</p>
                    </a>
                </li>
    
    
                <li class="nav-item">
                    <a href="{{ url('admin/product/list') }}"
                        class="nav-link @if (Request::segment(2) == 'product') active @endif">
                        <i class="fab fa-product-hunt"></i>
                        <p>Продукція</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/discount_code/list') }}"
                        class="nav-link @if (Request::segment(2) == 'discount_code') active @endif">
                        <i class="fas fa-tags"></i>
                        <p>Знижки</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/shipping_charge/list') }}"
                        class="nav-link @if (Request::segment(2) == 'shipping_charge') active @endif">
                        <i class="fas fa-truck"></i>
                        <p>Доставка</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/contactus') }}"
                        class="nav-link @if (Request::segment(2) == 'contactus') active @endif">
                        <i class="fas fa-envelope"></i>
                        <p>Повідомлення</p>
                    </a>
                </li>
    
                <li class="nav-item">
                    <a href="{{ url('admin/review/list') }}"
                        class="nav-link @if (Request::segment(2) == 'review') active @endif">
                        <i class="fas fa-edit"></i>
                        <p>Відгуки</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/page/list') }}"
                        class="nav-link @if (Request::segment(2) == 'page') active @endif">
                        <i class="fas fa-file-alt"></i>
                        <p>Сторінки</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/slider/list') }}"
                        class="nav-link @if (Request::segment(2) == 'slider') active @endif">
                        <i class="fas fa-sliders-h"></i>
                        <p>Слайдер</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/partner/list') }}"
                        class="nav-link @if (Request::segment(2) == 'partner') active @endif">
                        <i class="fab fa-joomla"></i>
                        <p>Логотипи</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/blog_category/list') }}"
                        class="nav-link @if (Request::segment(2) == 'blog_category') active @endif">
                        <i class="fas fa-cubes"></i>
                        <p>Категорії блогу</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/blog/list') }}"
                        class="nav-link @if (Request::segment(2) == 'blog') active @endif">
                        <i class="fas fa-blog"></i>
                        <p>Блог</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/system-setting') }}"
                        class="nav-link @if (Request::segment(2) == 'system-setting') active @endif">
                        <i class="fas fa-cogs"></i>
                        <p>Налаштування</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/home-setting') }}"
                        class="nav-link @if (Request::segment(2) == 'home-setting') active @endif">
                        <i class="far fa-file-alt"></i>
                        <p>Головна сторінка</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/smtp-setting') }}"
                        class="nav-link @if (Request::segment(2) == 'smtp-setting') active @endif">
                        <i class="fas fa-mail-bulk"></i>
                        <p>Налаштування SMTP</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/card-setting') }}"
                        class="nav-link @if (Request::segment(2) == 'card-setting') active @endif">
                        <i class="fas fa-credit-card"></i>
                        <p>Банківська картка</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt" aria-hidden="true"></i>
                        <p>Вийти</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
