<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        //Lấy danh mục
        $categories = DB::table('categories')->get();
        //Lấy toàn bộ dự liệu từ 1 bảng
        $posts = DB::table('posts')->get();

        //Hạn chế số lượng bản ghi
        $posts = DB::table('posts')->limit(10)->get();

        //Nối bảng Query builder
        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id') //Nối bảng
            ->select('posts.*', 'name') //lựa chọn các cột sử dụng
            ->orderBy('posts.id', 'desc') //Sắp xếp
            ->limit(10) //Hạn chế
            ->get();

        return view('clients.home', compact('posts', 'categories'));
    }
}
