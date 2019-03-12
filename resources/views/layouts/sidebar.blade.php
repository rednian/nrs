<aside class="page-sidebar-wrapper">
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
        <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="start {{ Request::is('dashboard*') ? 'active' : '' }}">
                <a href="{{route('dashboard')}}">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            {{--<li>--}}
                {{--<a href="javascript:;">--}}
                    {{--<i class="fa fa-user"></i>--}}
                    {{--<span class="title">User</span>--}}
                    {{--<span class="arrow "></span>--}}
                {{--</a>--}}
                {{--<ul class="sub-menu">--}}
                    {{--<li>--}}
                        {{--<a href="{{route('service.create')}}"><i class="fa fa-pencil"></i>New User</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('service.index')}}"><i class="fa fa-list"></i>Users List</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
{{--            <li class="{{ Request::is('service/*') ? 'active open' : '' }}">--}}
            <li class="'active open">
                <a href="javascript:;"><i class="fa fa-gears"></i>
                    <span class="title">Services</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ Request::is('service/create') ? 'active' : '' }}">
                        <a href="{{route('service.create')}}"><i class="fa fa-pencil"></i>New Service</a>
                    </li>
                    <li class="{{ Request::is('service/index') ? 'active' : '' }}">
                        <a href="{{route('service.index')}}"><i class="fa fa-list"></i>Service List</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('delivery/*') ? 'active open' : '' }}">
                <a href="javascript:;">
                    <i class="fa fa-calendar-o"></i>
                    <span class="title">Delivery</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ Request::is('delivery/create') ? 'active' : '' }}">
                        <a href="{{route('delivery.create')}}"><i class="fa fa-pencil"></i>New Delivery</a>
                    </li>
                    <li class="{{ Request::is('delivery/index') ? 'active' : '' }}">
                        <a href="{{route('delivery.index')}}"><i class="fa fa-list"></i>Delivery List</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</aside>