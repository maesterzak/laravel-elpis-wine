<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Wine;
use App\Models\Tag;

class Slide2 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $wine;
    public $list;
    public function __construct($data)
    {
        //
        $wine = Wine::all();
        $w = count($wine);
        $list = array();
        for($i=0; $i < $w; $i++){
            $winer = collect($wine[$i]->tags);
            if($winer->contains($data)){
            array_push($list, $wine[$i]);  
            }
        };
        $this->wine=$list;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slide2');
    }
}
