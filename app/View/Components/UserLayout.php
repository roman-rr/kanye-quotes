<?php

namespace App\View\Components;

use App\Data\Navigation;
use App\Models\User;
use Illuminate\View\Component;

class UserLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.user', ['nav' => Navigation::all()]);
    }
}