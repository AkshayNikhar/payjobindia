<?php
namespace Modules\User\Permissions;


use Modules\User\Entities\PermissionType;

trait HasPermissionsTrait {

   public function givePermissionsTo(... $permissions) {

    $permissions = $this->getAllPermissions($permissions);
    //dd($permissions);
    if($permissions === null) {
      return $this;
    }
    $this->permissions()->saveMany($permissions);
    return $this;
  }

  public function withdrawPermissionsTo( ... $permissions ) {

    $permissions = $this->getAllPermissions($permissions);
    $this->permissions()->detach($permissions);
    return $this;

  }

  public function refreshPermissions( ... $permissions ) {

    $this->permissions()->detach();
    return $this->givePermissionsTo($permissions);
  }

  public function hasPermissionTo($permission) {

    return $this->hasPermission($permission);
  }

  public function permissions() {

    return $this->belongsToMany(PermissionType::class,'permissions_user');

  }
  protected function hasPermission($permission) {

    return (bool) $this->permissions->where('permission_name', $permission->permission_name)->count();
  }

  protected function getAllPermissions(array $permissions) {

    return PermissionType::whereIn('permission_name',$permissions)->get();
    
  }

}