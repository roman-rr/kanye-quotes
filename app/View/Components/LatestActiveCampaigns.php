<?php

namespace App\View\Components;

use App\Models\Campaign;
use Illuminate\View\Component;

class LatestActiveCampaigns extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('widgets.campaign.latest-active', [
            'campaigns' => Campaign::latest()->where('active', '=', true)->take(6)->orderByDesc('created_at')->get(),
            'total' => Campaign::all()->where('active', '=', true)->count(),
        ]);
    }
}
