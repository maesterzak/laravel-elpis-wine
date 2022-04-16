<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wine;
use App\Models\Tag;
use App\Models\Category;

class WineController extends Controller
{
    //
    public function index(Request $req){
        $word = count($req->input());
        if($word - 4 >0){
            // $word = "not less than 0"; 
            $i = 1;
            $w = (int)$word - 4;
            $tag = array();
            for($i=1; $i <= $w; $i++){
                if($req->has("tag".$i)){
                array_push($tag, $req->tag.$i);
                // print_r($i);
                }
            };
            // print_r($tag);
        }
        $Wine = new Wine;
        $Wine ->name = $req->name;
        $Wine ->price = $req->price;
        $Wine ->quantity = $req->quantity;
        $Wine ->category_id = $req->category;
        if($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/wine_image', $filename);
            $Wine->image = $filename;
        }

        $Wine ->tags = $tag;
        $Wine->save();
        return redirect('home')->with('status', 'Wine added successfully');
    }
    public function edit($id){
        $data = Wine::find($id);
        $data3 = Category::all();
        $data1 = Tag::all();
        
        return view('edit', ['wine'=>$data,'categories'=>$data3,'tags'=>$data1, ]);
    }
    public function update(Request $req){
        $word = count($req->input());
        if($word - 4 >0){
            // $word = "not less than 0"; 
            $i = 1;
            $w = (int)$word - 4;
            $tag = array();
            for($i=1; $i <= $w; $i++){
                if($req->has("tag".$i)){
                array_push($tag, $req->tag.$i);
                // print_r($i);
                }
            };
            // print_r($tag);
        }
        $Wine = Wine::find($req->id);
        $Wine ->name = $req->name;
        $Wine ->price = $req->price;
        $Wine ->category_id = $req->category;
        $Wine ->quantity = $req->quantity;
        if($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/wine_image', $filename);
            $Wine->image = $filename;
        }
        $Wine ->tags = $tag;
        $Wine->save();
        return redirect('home');
        // return $req;
    }
    public function delete($id){
        $Wine = Wine::find($id);
        $Wine->delete();
        return redirect('home');

    }
}
