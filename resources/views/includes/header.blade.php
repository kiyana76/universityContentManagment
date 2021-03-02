<div class="header-header bg-white">
    <div class="container">
        <div class="row row-rl-0 row-tb-20 row-md-cell">
            <div class="brand col-md-3 t-xs-center t-md-right valign-middle">
                <a href="#" class="logo">
                    <img src="{{ url('images/logo.png') }}" alt="" width="250">
                </a>
            </div>
            <div class="header-search col-md-9">
                <div class="row row-tb-10 ">
                    <div class="col-sm-8">
                        <form class="search-form">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg search-input" placeholder="جست و جو" required="required">
                                <div class="input-group-btn">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-lg btn-search btn-block">
                                                <i class="fa fa-search font-16"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4 t-xs-center t-md-left">
                        @if(auth()->user())
                            <div class="header-wishlist mr-20">
                                    <a href="#">
                                        <span style="vertical-align: sub">{{ auth()->user()->full_name }}</span>
                                        <span class="icon lnr lnr-user font-30"></span>
                                    </a>
                            </div>
                            <div class="header-wishlist mr-20">
                                <a href="{{ route('logout') }}">
                                    <span style="vertical-align: sub">خروج</span>
                                    <span class="icon lnr lnr-power-switch font-30"></span>
                                </a>
                            </div>
                        @else
                            <div class="header-wishlist mr-20">
                                <a href="{{ route('login') }}">
                                    <span style="vertical-align: sub">ورود</span>
                                    <span class="icon lnr lnr-user font-30"></span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
