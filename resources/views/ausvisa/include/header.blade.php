<header class="header-style2">
    <div class="top-nav top-nav-style2">
        <div class="azir-container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="top-nav_left">
                        <a class="logo" href="{{url('/')}}"><img src="{{asset('/ausvisa')}}/images/logo.png" width="200" class="img-fluid" alt="logo"></a>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="top-nav_right text-lg-right">
                        <div class="language inline-block"><a class="select" href="#">
                                <div class="flag inline-block"><img src="{{asset('/ausvisa')}}/images/homepage1/flag.png"
                                                                    alt="flag"></div>{{$defaultCurrency}}</a>
                            <div class="options-box">
                                <ul>
                                    @foreach($currencies as $currency)
                                    <li>
                                        <form name="set-currency" method="post" action="{{route('set-currency')}}">
                                            <input type="hidden" name="currency" value="{{$currency->code}}">
                                            <input type="hidden" name="url" value="{{url()->current()}}">
                                            {{ csrf_field() }}
                                        <button type="submit" class="btn btn-mini btn-outline-light">
                                            <img class="img-fluid img-thumbnail" src="{{asset('/ausvisa')}}/images/homepage1/flag.png" alt="senangPay">
                                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>{{$currency->code}}
                                        </button>
                                        </form>
                                    </li>
                                    @endforeach </ul>
                            </div>
                        </div>
                        <div class="social inline-block"><span>Follow: </span><a class="fab fa-facebook-f" href="https://www.facebook.com/"></a><a class="fab fa-twitter" href="https://twitter.com/"></a><a class="fab fa-invision" href="https://www.invisionapp.com/"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header">

        <div class="header-bottom">
            <div class="azir-container">
                <div class="row align-items-center justify-content-end">
                    <div class="col-1 col-lg-8">
                        <div class="navigation">
                            <ul>
                                <li class="navigtion-item {{ (request()->is('/')) ? 'active' : '' }}"><a class="navigation-link" href="{{url('/')}}">Home</a><i class="submenu-opener"></i>

                                </li>
                                <li class="navigtion-item {{ (request()->is('application')) ? 'active' : '' }}"><a class="navigation-link" href="{{route('application')}}">APPLY ONLINE</a><i class="submenu-opener"></i>

                                </li>
                                <li class="navigtion-item {{ (request()->is('page*')) ? 'active' : '' }}"><a class="navigation-link" href="{{url('page/general-information')}}">GENERAL INFORMATION</a><i class="submenu-opener"></i>

                                </li>
                                <li class="navigtion-item {{ (request()->is('check-eta-status')) ? 'active' : '' }}"><a class="navigation-link" href="{{url('check-eta-status')}}">VISA STATUS</a><i class="submenu-opener"></i>

                                </li>
                                <li class="navigtion-item"><a class="navigation-link" href="#">ETA REVIEW</a><i class="submenu-opener"></i>

                                </li>
                                <li class="navigtion-item"><a class="navigation-link" href="#">FAQ</a><i class="submenu-opener"></i>
                                    <div class="dropdown_menu">
                                        <ul>
                                            <li><a class="dropdown_link" href="{{url('page/frequently-ask-question')}}">FAQ</a></li>
                                            <li><a class="dropdown_link" href="#">Visa Verification</a></li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="navigtion-item"><a class="navigation-link" href="{{route('contact')}}">CONTACT</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-11 col-lg-4">
                        <div class="page-function_block d-flex align-items-center justify-content-end">
                            <div class="page-function">

                                <div class="function-btn inline-block"><a href="#" id="open-menu-sidebar"><i class="icon_menu"></i></a></div>
                            </div><a class="btn btn-yellow" href="{{route('home')}}">Admin							</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
