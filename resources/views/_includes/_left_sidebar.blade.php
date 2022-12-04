<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Home</li>

                <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Menu Information</li>


                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-map-marked"></i>
                        <span>Place Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Activity</a></li>
                        <li><a href="#">Place Information</a></li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <a href="" class="waves-effect">
                        <i class="fas fa-search"></i>
                        <span>Search Books</span>
                    </a>
                </li> --}}
                {{-- @if (auth()->user()->user_type_id == 1 || auth()->user()->user_type_id == 2)
                    <li>
                        <a href="{{ route('users.index') }}" class="waves-effect">
                            <i class="fas fa-user-friends"></i>
                            <span>Users</span>
                        </a>
                    </li>
                @endif --}}
                @if (auth()->user()->user_type_id == 1)
                    <li>
                        <a href="{{route('products.index')}}" class="waves-effect">
                            <i class="fa fa-list"></i>
                            <span>Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('colors.index')}}" class="waves-effect">
                           <i class="fa fa-tint" aria-hidden="true"></i>
                            <span>Color</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('sizes.index')}}" class="waves-effect">
                          <i class="fa fa-list"></i>
                            <span>Size</span>
                        </a>
                    </li>

                @endif
               
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
