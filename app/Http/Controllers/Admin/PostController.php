<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestPost;
use App\Http\Requests\UpdateRequestPost;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->back()->with('success', 'Xóa dữ liệu thành công');
    }

    //thêm mới
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }
    //Lưu
    public function store(StoreRequestPost $request)
    {
        $data = $request->except('image');

        $data['view'] = 0;
        $data['image'] = ""; //Khi không nhập ảnh

        //Xử lý file
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }
        Post::query()->create($data);
        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Thêm dữ liệu thành công');
    }

    //Form edit
    public function edit($id)
    {
        $post = Post::query()->findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }
    //Cập nhật
    public function update(UpdateRequestPost $request, $id)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images');
        }
        $post = Post::query()->findOrFail($id);
        $post->update($data);
        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Cập nhật dữ liệu thành công');
    }
}
