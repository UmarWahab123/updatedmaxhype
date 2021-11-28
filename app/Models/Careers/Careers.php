<?php

namespace App\Models\Careers;
use Illuminate\Database\Eloquent\Model;

class Careers extends Model

{
    protected $guarded = array();
    protected $table = 'careers';
    public function position()
    {
        return $this->belongsTo('App\Models\Position\Position', 'career_position_id', 'id');
    }


}

?>
