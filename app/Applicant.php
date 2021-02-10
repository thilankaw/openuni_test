<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'surname',
        'first_name',
        'national_id_no',
        'mobile_no',
        'email',
        'age',
        'address',
        'user_id',
        'job_id',
    ];
}
