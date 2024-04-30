<?php

namespace Modules\Jobs\Entities;

use Illuminate\Database\Eloquent\Model;

class JobApplicant extends Model
{
  protected $table = 'job_applicants';

  protected $dates = [
    'created_at',
    'updated_at',
  ];

  protected $fillable = [
    'job_id',
    'user_id',
    'company_id',
    'fullname',
    'email',
    'description',
    'resume_link',
    'resume_pdf',
    'mobile_number',
  ];

  public function job()
  {
      return $this->hasOne('Modules\Jobs\Entities\Job','id');
  }
  
  public function user(){
      return $this->belongsTo('Modules\User\Entities\User','id');
  }
  
}
