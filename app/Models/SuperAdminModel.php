<?php

namespace App\Models;

use CodeIgniter\Model;

class SuperAdminModel extends Model
{
    protected $table      = 'payjobadmin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password'];
}

?>