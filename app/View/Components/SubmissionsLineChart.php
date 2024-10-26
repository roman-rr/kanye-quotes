<?php

namespace App\View\Components;

use App\Models\CampaignSubmission;
use Illuminate\View\Component;

class SubmissionsLineChart extends Component
{
    protected $day;
    protected $month;

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($day=0,$month=0)
    {
        $this->day = $day;
        $this->month = $month;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $id='';
        if($this->day > 0) {
            $past = now()->subDay($this->day);
            $id = 'day_'.$this->day;
            $categories = collect(today()->subDay($this->day-1)->daysUntil(today()))->map(fn ($day) => $day->shortDayName.' '.$day->month.'/'.$day->day);
            $items = [];
            for ($x = 0; $x <= $this->day-1; $x++) {
                $past = now()->subDay($x);
                $past_start = now()->subDay($x)->startOfDay();
                $items[] = CampaignSubmission::all()->whereBetween('created_at', [$past_start, $past])->count();
            }
        } elseif($this->month > 0) {
            $id = 'month_'.$this->month;
            $categories =  collect(today()->startOfMonth()->subMonths($this->month-1)->monthsUntil(today()->startOfMonth()))->mapWithKeys(fn ($month) => [$month->month => $month->shortMonthName]);
            $items = [];
            for ($x = 0; $x <= $this->month-1; $x++) {
                $past = now()->subMonth($x);
                $past_start = now()->subMonth($x)->startOfMonth();
                $items[] = CampaignSubmission::all()->whereBetween('created_at', [$past_start, $past])->count();
            }
        }

        return view('components.basic.graph.line-graph-1', [
            'id' => $id,
            'items' => array_reverse($items),
            'categories' => $categories->toArray()
        ]);
    }
}
