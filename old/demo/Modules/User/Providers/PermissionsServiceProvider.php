<?php

namespace Modules\User\Providers;

use Modules\User\Entities\PermissionType;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
   
    public function register()
    {
        //
    }

    public function boot()
    {
        try {
            PermissionType::get()->map(function ($permission) {
                Gate::define($permission->permission_name, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }

    }
}