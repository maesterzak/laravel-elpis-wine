<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wine;
use App\Models\Tag;
use App\Models\Category;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Category::all();
        $data1 = Tag::all();
        $data2 = Wine::all();
        
        return view('home', ['categories'=>$data, 'tags'=>$data1, 'wine'=>$data2]);
    }
    public function index2()
    {
        $data = Category::all();
        $data1 = Tag::all();
        $data2 = Wine::all();
        $data3 = Wine::latest()->take(6)->get();
        return view('index', ['categories'=>$data, 'tags'=>$data1, 'wine'=>$data2, 'latest'=>$data3]);
    }
}
