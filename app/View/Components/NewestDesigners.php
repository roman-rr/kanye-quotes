<?php

namespace App\View\Components;

use App\Models\Designer;
use Illuminate\View\Component;

class NewestDesigners extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('widgets.designer.newest', [
                'designers' => Designer::latest()->take(4)->orderByDesc('created_at')->get(),
                'total' => Designer::all()->count()
            ]);
    }
}
