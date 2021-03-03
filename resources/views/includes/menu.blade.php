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
                    <li class="{{ url()->current() == route('notes') ? 'active' : '' }}">
                        <a href="{{ route('notes') }}">جزوات</a>
                    </li>
                    <li class="{{ url()->current() == route('books') ? 'active' : '' }}">
                        <a href="{{ route('books') }}">کتب</a>
                    </li>
                    <li class="{{ url()->current() == route('exams') ? 'active' : '' }}">
                        <a href="{{ route('exams') }}">نمونه سوالات</a>
                    </li>
                    <li class="{{ url()->current() == route('questions') ? 'active' : '' }}">
                        <a href="{{ route('questions') }}">سوالات کنکور</a>
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
