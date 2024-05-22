<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\TwitterCloneModel;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //Gate -> Permission | simple role

        //Role based gate

        /**
         * Only logged admin user can we the page
         */
        Gate::define('admin', function(User $user) : bool {
            return (bool) $user->is_admin;
        });

        //Permission based gate

        /**
         * If a user role in admin they can delete & edit everyone's tweet and For non-admin user they can only delete & edit the tweets they posted.
         */
        Gate::define('tweet.delete', function (User $user, TwitterCloneModel $id): bool {
            return ((bool) $user->is_admin || $user->id === $id->user_id);
        });

        Gate::define('tweet.edit', function (User $user, TwitterCloneModel $id): bool {
            return ((bool) $user->is_admin || $user->id === $id->user_id);
        });

        Gate::define('tweet.update', function (User $user, TwitterCloneModel $id): bool {
            return ((bool) $user->is_admin || $user->id === $id->user_id);
        });
    }
}
