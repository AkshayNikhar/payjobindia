<?php

namespace Modules\User\Entities;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PermissionsUser extends Authenticatable
{
    protected $table = 'permissions_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'permission_type_id',
    ];
    
    

    public static function boot() {
        parent::boot();
    }
   
    
}
