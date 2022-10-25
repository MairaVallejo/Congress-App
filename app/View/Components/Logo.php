<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Logo extends Component
{
    public $name;
    public $logo;
    public $logo_b;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->name = env('APP_MUNICIPIO', '-');
        $this->logo = env('APP_LOGO', null);
        $this->logo_b = env('APP_LOGO_B', null);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.logo');
    }
}
