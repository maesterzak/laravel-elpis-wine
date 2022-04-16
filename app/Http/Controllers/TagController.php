<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    //
    public function index(Request $req){
        $Tag = new Tag;
        $Tag ->name = $req->tag_name;
        $Tag->save();
        return redirect('home');
        
    }
}
