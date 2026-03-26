@extends('admin.layouts.layout')

@section('title', 'Danh sách bài viết')

@section('content')
    <div class="col-md-10 p-0">

        <!-- Topbar -->
        <div class="topbar d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Danh sách bài viết</h5>
            <button class="btn btn-primary">+ Tạo mới</button>
        </div>

        <div class="p-1">
            @session('success')
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endsession
        </div>

        <!-- Content -->
        <div class="p-4">

            <div class="card shadow-sm">
                <div class="card-body">

                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Mã</th>
                                <th>Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Danh mục</th>
                                <th>Lượt xem</th>
                                <th>Ngày tạo</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td><img src="{{ Storage::URL($post->image) }}"></td>
                                    <td>{{ $post->title }}</td>
                                    <td> {{ $post->category->name }} </td>
                                    <td>{{ $post->view }} </td>
                                    <td>{{ $post->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm">Sửa</button>
                                        <form class="d-inline" action="{{ route('admin.posts.destroy', $post->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                {{ $posts->links() }}
            </div>

        </div>

    </div>
@endsection
