<div class="header-menu bg-blue">
    <div class="container">
        <nav class="nav-bar">
            <div class="nav-header">
                            <span class="nav-toggle" data-toggle="#header-navbar">
                                <i></i>
                                <i></i>
                                <i></i>
                            </span>
            </div>
            <div id="header-navbar" class="nav-collapse">
                <ul class="nav-menu">
                    <li class="{{ url()->current() == route('home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}">صفحه اصلی</a>
                    </li>
                    <li>
                        <a href="index.html">جزوات</a>
                    </li>
                    <li>
                        <a href="coupons_grid.html">کتب</a>
                    </li>
                    <li>
                        <a href="stores_01.html">نمونه سوالات</a>
                    </li>
                    <li>
                        <a href="contact_us_01.html">سوالات کنکور</a>
                    </li>
                    <li>
                        <a href="#">ویدیو های آموزشی</a>
                    </li>
                    <li>
                        <a href="#">صفحات</a>
                    </li>
                </ul>
            </div>
            <div class="nav-menu nav-menu-fixed">
                @if(auth()->user())
                    <a href="#">منوی کاربر</a>
                @else
                    <a href="{{ route('register') }}">ایجاد حساب کاربری</a>
                @endif
            </div>
        </nav>
    </div>
</div>
