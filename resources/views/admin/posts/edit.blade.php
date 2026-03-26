@extends('admin.layouts.layout')

@section('title', 'Cập nhật bài viết')

@section('content')
    <div class="col-md-10 p-4">
        <!-- Topbar -->
        <div class="topbar d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Cập nhật bài viết</h5>
        </div>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="" class="form-label">Tiêu đề</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Danh mục</label>
                <select name="category_id" id="" class="form-control">
                    <option value="">--Chọn danh mục--</option>
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" @selected($cate->id === $post->category_id)>
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Hình ảnh</label> <br>
                <img src="{{Storage::URL($post->image)}}" width="100" alt="">
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Mô tả</label>
                <textarea name="description" rows="3" class="form-control">{{$post->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Nội dung</label>
                <textarea name="content" rows="6" class="form-control">{{$post->content}}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Lưu</button>
                <button type="reset" class="btn btn-primary">Làm lại</button>
            </div>
        </form>
    </div>
@endsection
