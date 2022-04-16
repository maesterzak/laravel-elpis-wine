<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index(Request $req){
        $Category = new Category;
        $Category ->name = $req->category_name;
        $Category->save();
        return redirect('home');
        
    }
}
