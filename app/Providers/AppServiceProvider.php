<?php

namespace App\Providers;

use Livewire\Livewire;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use App\Http\Livewire\Scheduler\AyrshareForm;
use App\Http\Livewire\Scheduler\ScheduleSettings;
use App\Http\Livewire\Scheduler\AyrshareConnector;
use App\Http\Livewire\Scheduler\CalendarView;
use App\Http\Livewire\Scheduler\ExternalServices;
use App\Http\Livewire\Scheduler\ScheduleItemDetails;
use App\Http\Livewire\Scheduler\ScheduleTimelineView;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        // DEV
        // if ($this->app->environment('local')) {
        //     // Theme Playground for devs
        //     $view_paths = config('view.paths');
        //     array_push($view_paths, base_path('resources-playground'));
        //     array_push($view_paths, base_path('resources-playground/views'));
        //     Config::set('view.paths', $view_paths);
        // }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Component Namespaces
        // Blade::componentNamespace('App\\View\\Components\\Posts', 'posts');

        // Anonymous Component Namespaces
        // Blade::anonymousComponentNamespace('posts.components', 'posts');
        Blade::anonymousComponentNamespace('pages', 'pages');

        
        Livewire::component('pages.scheduler.components.ayrshare-form', AyrshareForm::class);
        Livewire::component('pages.scheduler.components.schedule-settings', ScheduleSettings::class);
        Livewire::component('pages.scheduler.components.schedule-timeline-view', ScheduleTimelineView::class);
        Livewire::component('pages.scheduler.components.calendar-view', CalendarView::class);
        Livewire::component('pages.scheduler.components.external-services', ExternalServices::class);
        Livewire::component('pages.scheduler.modals.schedule-details-modal', ScheduleItemDetails::class);
    }
}
