<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\Blog::class                => \App\Policies\BlogPolicy::class,
        \App\Models\ServiceBdd::class          => \App\Policies\ServicePagePolicy::class,
        \App\Models\ServiceBranding::class     => \App\Policies\ServicePagePolicy::class,
        \App\Models\ServiceEmailing::class     => \App\Policies\ServicePagePolicy::class,
        \App\Models\ServiceNewsletter::class   => \App\Policies\ServicePagePolicy::class,
        \App\Models\ServiceSms::class          => \App\Policies\ServicePagePolicy::class,
        \App\Models\ServiceVisionnaire::class  => \App\Policies\ServicePagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::before(function (User $user, string $ability) {
            if ($user->hasRole('super-admin')) {
                return true;
            }
        });

        try {
            $permissions = cache()->rememberForever('permissions', function () {
                return Permission::all();
            });

            foreach ($permissions as $permission) {
                Gate::define($permission->key, function (User $user) use ($permission) {
                    return $user->hasPermission($permission->key);
                });
            }
        } catch (\Exception $e) {
            // Log the exception if needed
        }

        Blade::if('permission', function (string $permissionKey) {
            return auth()->check() && auth()->user()->hasPermission($permissionKey);
        });
    }
}
