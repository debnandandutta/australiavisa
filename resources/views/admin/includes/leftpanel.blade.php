<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{url('admins')}}">
                <img src="{{asset('/')}}/images/uploads/logo.png" alt="Australian Visa"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{asset('/admin')}}/images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{url('admins/dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <li class="active">
                    <a href="{{route('basic-info')}}"> <i class="menu-icon fa fa-dashboard"></i>Basic Information </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Page</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{route('category')}}">Menus</a></li>
                        <li><i class="fa fa-tablet"></i><a href="{{route('manage-content')}}">Content</a></li>


                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Application</a>
                    <ul class="sub-menu children ">

                        <li><i class="fa fa-table"></i><a href="{{route('unpaid')}}">Unpaid<span class="counts">{{isset($countApplicant)
                                    ?$countApplicant['pendingCount']:0}}</span></a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('approved')}}">Approved<span class="counts">{{isset($countApplicant)
                                    ?$countApplicant['approvedCount']:0}}</span></a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('processing')}}">Processing<span class="counts">{{isset($countApplicant)
                                    ?$countApplicant['processingCount']:0}}</span></a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('onhold')}}">On Hold</a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('refund')}}">Refund</a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('rejected')}}">Rejected</a></li>

                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Settings</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{route('country')}}">Country</a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('payment-info')}}">Payment Gates</a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('currency')}}">Currency</a></li>
                        <a href="{{route('user-register')}}"> <i class="menu-icon fa fa-dashboard"></i>User </a>


                    </ul>
                </li>
                <li class="">
                    <a href="{{route('activity-log')}}"> <i class="menu-icon fa fa-dashboard"></i>Activity Log </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
