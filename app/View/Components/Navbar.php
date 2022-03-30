<?php

namespace App\View\Components;

use App\Models\Level;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data['levels'] = Level::select('id', 'name')->active()->get();
        return view('components.navbar')->with($data);
    }

    public function name()
    {
        if(App::getLocale() == "ar")
        {
            return json_decode($this->name)->ar;
        }
    }
}
