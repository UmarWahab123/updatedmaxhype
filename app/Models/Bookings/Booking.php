<?php

namespace App\Models\Bookings;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model

{
    protected $guarded = array();
    protected $table = 'bookings';
    public function business_user()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }
    public function package_title()
    {
        return $this->belongsTo('App\Models\Memberships\Membership', 'membership_id', 'id');
    }

}

?>

