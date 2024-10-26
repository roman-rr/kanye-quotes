<?php

namespace App\View\Components;

use App\Models\CampaignSubmission;
use App\Models\Post;
use App\Models\Comment;
use App\Data\CampaignSubmissionStatus;
use Illuminate\View\Component;

class SubmissionComments extends Component
{
    protected $id;
    protected $show;
    protected $mini;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $show=false, $mini=false)
    {
        $this->id = $id;
        $this->show = $show;
        $this->mini = $mini;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $post = Post::all()->where('campaign_submission_id', '=', $this->id)->first();
        $submission = CampaignSubmission::all()->find($this->id);

        return view('widgets.submission.comments',[
            'id' => $this->id,
            'comments' => $post->comments->where('comment_id', '=', null),
            'total' => Post::all()->find($post->id)->comments->count(),
            'submission' => $submission,
            'status' => CampaignSubmissionStatus::all()[$submission->status],
            'show' => $this->show,
            'mini' => $this->mini
        ]);
    }
}
