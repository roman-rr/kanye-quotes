<?php

namespace App\Providers;

use Livewire\Livewire;
use App\Models\Location;
use App\Enums\LocationRole;
use Laravel\Jetstream\Features;
use Laravel\Jetstream\Jetstream;
use App\Models\LocationInvitation;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use App\Actions\Jetstream\CreateLocation;
use App\Actions\Jetstream\DeleteLocation;
use App\Actions\Jetstream\AddLocationMember;
use App\Actions\Jetstream\UpdateLocationName;
use App\Actions\Jetstream\InviteLocationMember;
use App\Actions\Jetstream\RemoveLocationMember;
use App\Http\Livewire\Location\LocationMemberManager;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        // Jetstream::permissions([
        //     'create',
        //     'read',
        //     'update',
        //     'delete',
        // ]);

        Jetstream::role('owner', 'Owner', [
            // ...
        ])->description('Administrator users can perform any action.');

        Jetstream::role('editor', 'Editor', [
            // ...
        ])->description('Editor users have the ability to read, create, and update.');
    }
}
