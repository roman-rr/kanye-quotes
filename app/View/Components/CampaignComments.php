<?php

namespace App\View\Components;

use App\Models\Campaign;
use App\Models\Comment;
use Illuminate\View\Component;

class CampaignComments extends Component
{
    protected $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {

        $campaign = Campaign::find($this->id);
        return view('widgets.campaign.comments', [
            'id' => $this->id,
            'total' => $campaign->comments->count()
        ]);
    }
}
