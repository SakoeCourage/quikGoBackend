<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class searchcard extends Component
{
    public  $ad;
   

    
    public function __construct(Model $ad)
    {
        $this->ad = $ad;
     
        }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.searchcard');
    }
}
