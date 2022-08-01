<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $number;
    public $item;
    public $deleteRoute;
    public $editRoute;

    public function __construct($number, $item, $deleteRoute, $editRoute)
    {
        $this->number     = $number;
        $this->item       = $item;
        $this->deleteRoute= $deleteRoute;
        $this->editRoute  = $editRoute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-component');
    }
}
