<?php

namespace Modules\User\Entities;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PermissionType extends Authenticatable
{
    protected $table = 'permission_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission_name',
    ];
    

    public static function boot() {
        parent::boot();
    }
    
    
    public function users() {

        return $this->belongsToMany('Modules\User\Entities\User', 'Modules\User\Entities\User\PermissionsUser');
       
    }
   
    
}
