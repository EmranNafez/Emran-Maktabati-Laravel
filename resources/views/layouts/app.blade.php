<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>مكتبتي</title>
    <style>
        body { font-family: Tahoma, sans-serif; max-width: 900px; margin: auto; padding: 20px; }
        nav a { margin: 0 10px; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">الرئيسية</a>
        <a href="{{ route('cart.index') }}">السلة</a>
        <a href="{{ route('orders.index') }}">الطلبات</a>
        @guest
            <a href="{{ route('login') }}">تسجيل الدخول</a>
            <a href="{{ route('register') }}">تسجيل جديد</a>
        @else
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">تسجيل خروج</button>
            </form>
        @endguest
    </nav>
    <hr>
    @yield('content')
</body>
</html>
