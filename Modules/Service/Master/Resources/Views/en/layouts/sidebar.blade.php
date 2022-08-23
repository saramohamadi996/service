
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{asset('panel/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Service</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('panel/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Sara mohamadi</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
{{--                    <a href="{{ route('master') }}" class="nav-link {{ isActive('master') }}">--}}
                    <a href="{{ route('master') }}" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Master</p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="{{route('categories.view', 0)}}" class="nav-link ">
                        <i class="nav-icon fa fa-chart-pie"></i>
                        <p>
                            categories
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('categories.view',0)}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>list categories</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('services.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-service"></i>
                        <p>
                            services
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('services.index')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>list services</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('attributes.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-attribute"></i>
                        <p>
                            attributes
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('attributes.index')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>list attributes</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('states.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-attribute"></i>
                        <p>
                            states
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('states.index')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>list states</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('orders.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-attribute"></i>
                        <p>
                            orders
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('orders.index')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>list orders</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>

