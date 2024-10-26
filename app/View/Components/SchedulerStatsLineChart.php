<?php

namespace App\View\Components;

use App\Models\SchedulerItem;
use Illuminate\View\Component;
use App\Models\CampaignSubmission;
use App\Enums\SchedulerItemStatusCode;

class SchedulerStatsLineChart extends Component
{
    public $day;
    public $month;
    public $location;

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($day=0, $month=0, $location)
    {
        $this->day = $day;
        $this->month = $month;
        $this->location = $location;
    }



    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $id = '';
        $series = [];
        if($this->day > 0) {
            $id = 'day_'.$this->day;

            $categories = collect(today()->subDay($this->day-1)->daysUntil(today()))->map(fn ($day) => $day->shortDayName.' '.$day->month.'/'.$day->day);
            $items = [];
            for ($x = 0; $x <= $this->day-1; $x++) {
                $past_start = now()->subDay($x)->startOfDay();

                foreach (SchedulerItemStatusCode::getValues() as $schedulerStatus) {
                    $items[$schedulerStatus][] = SchedulerItem::where('status_code', '=', $schedulerStatus)->where('location_id', $this->location)->whereDate('created_at', '=', $past_start->toDateString())->count();
                }
            }
        } elseif($this->month > 0) {
            $id = 'month_'.$this->month;
            $categories =  collect(today()->startOfMonth()->subMonths($this->month-1)->monthsUntil(today()->startOfMonth()))->mapWithKeys(fn ($month) => [$month->month => $month->shortMonthName]);
            $items = [];
            for ($x = 0; $x <= $this->month-1; $x++) {
                $past = now()->subMonth($x);
                $past_start = now()->subMonth($x)->startOfMonth();
                
                foreach (SchedulerItemStatusCode::getValues() as $schedulerStatus) {
                    $items[$schedulerStatus][] = SchedulerItem::where('status_code', '=', $schedulerStatus)->where('location_id', $this->location)->whereBetween('created_at', [$past_start, $past])->count();
                }
            }
        }

        foreach (SchedulerItemStatusCode::getValues() as $schedulerStatus) {
            $series[] = [
                'name' => SchedulerItemStatusCode::fromValue($schedulerStatus)->description,
                'data' => array_reverse($items[$schedulerStatus])
            ];
        }
        
        return view('components.basic.graph.multiple-line-graph', [
            'id' => $id,
            'series' => $series,
            'categories' => $categories->toArray()
        ]);
    }
}
