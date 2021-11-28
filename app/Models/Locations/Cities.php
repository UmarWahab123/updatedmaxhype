<?php

namespace App\Models\Locations;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model

{
    protected $guarded = array();
    protected $table = 'location_cities';
     public function country()
    {
        return $this->belongsTo('App\Models\Locations\Countries', 'location_country_id', 'id');
    }

}

?>
