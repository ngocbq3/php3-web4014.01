<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <h4 class="mb-4">ADMIN</h4>
                <a href="#">Dashboard</a>
                <a href="#" class="bg-secondary text-white">Bài viết</a>
                <a href="#">Danh mục</a>
                <a href="#">Người dùng</a>
            </div>

            <!-- Main content -->
            @yield('content')

        </div>
    </div>

</body>

</html>
