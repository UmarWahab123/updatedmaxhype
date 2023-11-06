<?php

namespace App\Models\Applicants;

use Illuminate\Database\Eloquent\Model;



class Applicant extends Model



{

    protected $guarded = array();

    protected $table = 'job_applicant';

    public function applicant()
    {
        return $this->belongsTo('App\Models\Careers\Careers', 'careers_id', 'id');
    }

}



?>



