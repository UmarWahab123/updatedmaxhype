<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
      protected $guarded = array();
      protected $primaryKey  = 'id';
      protected $table = 'roles';

     //  public function exam() // return the class record of Datesheet
     //    {
    	// return $this->hasOne('App\Exam', 'examID', 'examID');
     //    } 

    public function role()
    {
        return $this->belongsTo(User::class);
    }

}
