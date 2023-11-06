<?php

namespace App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Product extends Model

{
    protected $guarded = array();
    protected $table = 'products';
     public function businesses()
    {
        return $this->belongsTo('App\Models\User', 'business_id', 'id');
    }
}

?>

