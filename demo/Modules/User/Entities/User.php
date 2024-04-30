<?php

namespace Modules\User\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\User\Permissions\HasPermissionsTrait;

class User extends Authenticatable
{
    use HasPermissionsTrait;
    use Notifiable;

    protected $dates = [
        'email_verified_at',
        'package_ends_at',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role',
        'name',
        'mobile',
        'gender_id',
        'functional_area_id',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'settings',
        'package_id',
        'package_ends_at',
        'country_id',
        'address',
        'state',
        'city',
        'education',
        'degree_type_id',
        'description',
        'experience',
        'blocked',
        'technical_skills'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'settings' => 'array'
    ];
    
    
    public function getEducation(){
        return $this->hasOne('Modules\Jobs\Entities\DegreeLevel', 'id', 'education');
    }
    
    public function getDegreeType(){
        return $this->hasOne('Modules\Jobs\Entities\DegreeType', 'id', 'degree_type_id');
    }
    
    
    public function getExperience(){
        return $this->hasOne('Modules\Jobs\Entities\JobExperience', 'id', 'experience');
    }
    
    public function getGender(){
        return $this->hasOne('Modules\Jobs\Entities\Gender', 'id', 'gender_id');
    }
    
    public function getFunctionalArea(){
        return $this->hasOne('Modules\Jobs\Entities\FunctionalArea', 'id', 'functional_area_id');
    }
    
    public function getCountry(){
        return $this->hasOne('Modules\Location\Entities\Country', 'id', 'country_id');
    }
    
    public function getState(){
        return $this->hasOne('Modules\Location\Entities\State', 'id', 'state');
    }
    
    public function getCity(){
        return $this->hasOne('Modules\Location\Entities\City', 'id', 'city');
    }
    
    public function scopeEmployer($query)
    {
        return $query->where('role', '=', 'employer');
    }

    public function scopeCandidate($query)
    {
        return $query->where('role', '=', 'candidate');
    }

    public function resumecvs()
    {
        return $this->hasMany('Modules\ResumeCV\Entities\Resumecv');
    }
    
    public function payments()
    {
        return $this->hasMany('Modules\Saas\Entities\Payment');
    }

    public function package()
    {
        return $this->belongsTo('Modules\Saas\Entities\Package')->withDefault();
    }

    public function company()
    {
        return $this->hasOne('Modules\Jobs\Entities\Company', 'user_id', 'id');
    }
    
    

    public function subscribed()
    {
        if (is_null($this->package_ends_at)) {
            return false;
        }
        return $this->package_ends_at->isFuture();
    }
    public function checkRemoveBrand()
    {
        if (!$this->subscribed()) {
            # code...
            if (config('saas.remove_branding') == true) {
                return true;
            }
            return false;
        }
        else{
            if ($this->package->remove_branding == true) {
                return true;
            }
            return false;
        }
    }

    public function checkDownloadPDF()
    {
        if (!$this->subscribed()) {
            # code...
            if (config('saas.download_pdf') == true) {
                return true;
            }
            return false;
        }
        else{
            if ($this->package->remove_branding == true) {
                return true;
            }
            return false;
        }
    }
    

    public static function boot() {
        parent::boot();
    }
   
    
}
