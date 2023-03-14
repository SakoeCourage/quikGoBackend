<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class selectoption extends Component
{
    public $modelobjs;

    public $options;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options, $modelobjs)
    {
        $this->options = $options;
        $this->modelobjs = $modelobjs;
        //
    }

   

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.selectoption');
    }
}
