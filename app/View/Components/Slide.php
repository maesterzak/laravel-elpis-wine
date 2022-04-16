<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Wine;


class Slide extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $category;
    public function __construct($data)
    {
        //
        $category = Wine::all();
        $category = $category->where('category_id', $data);
        $category->all();
        

        $this->category=$category;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {   
        return view('components.slide');
    }
}
