<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tin tức - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>

<body>
    <div>
        <nav>
            <a href="/">Trang chủ</a>
            @foreach ($categories as $cate)
                <a href="#">
                    {{ $cate->name }}
                </a>
            @endforeach
        </nav>
        <div>Banner</div>

        @yield('content')

        <footer>Footer</footer>
    </div>
</body>

</html>
