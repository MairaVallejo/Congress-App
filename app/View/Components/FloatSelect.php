<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FloatSelect extends Component
{

    public $id;
    public $name;
    public $label;
    public $values;
    public $selected;
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $name, $label, $values = [], $selected = "", $class = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->values = $values;
        $this->selected = $selected;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.float-select');
    }
}
