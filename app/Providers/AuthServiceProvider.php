<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Command;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        $this->registerPolicies();

        Gate::define('edit-command', function (User $user, Command $command) {
            return $user->id === $command->user->id;
        });

        Gate::define('destroy-command', function (User $user, Command $command) {
            return $user->id === $command->user->id;
        });

        Gate::define('edit-blog', function (User $user, Blog $blog) {
            return $user->id === $blog->user->id;
        });

        Gate::define('destroy-blog', function (User $user, Blog $blog) {
            return $user->id === $blog->user->id;
        });
    }
}
