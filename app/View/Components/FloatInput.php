<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FloatInput extends Component
{

    public $type;
    public $id;
    public $name;
    public $label;
    public $value;
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $id, $name, $label, $value = "", $class = "")
    {
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.float-input');
    }
}
