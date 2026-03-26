<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function show($id)
    {
        $post = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'name')
            ->where('posts.id', $id)
            ->first();

        //Lấy danh mục
        $categories = DB::table('categories')->get();
        return view('clients.post', compact('post', 'categories'));
    }

    //@id mã danh mục
    public function index($id)
    {
        //lấy dữ toàn bộ dl
        $posts = Post::all();
        //Lấy dữ liệu có hạn chế
        $posts = Post::query()->limit(10)->get();
        //Sắp xếp dữ liệu
        $posts = Post::query()->orderBy('id', 'desc')->get();
        //Phân trang
        $posts = Post::query()->paginate(10);

        //relationship lazy loading
        $posts = $posts[0]->category->name;

        //relationship Eager loading
        $posts = Post::with('category')
            ->where('category_id', $id)
            ->orderBy('id', 'desc')
            ->paginate(10);


        //Lấy danh mục
        $categories = DB::table('categories')->get();
        return view('clients.list', compact('posts', 'categories'));
    }
}
