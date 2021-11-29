<?php

namespace App;
use App\Seans;
use App\Spot;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['spot_id','seans_id','booking_number'];
    
    public function seans()
    {
        return $this->belongsTo(Seans::class);
    }

    public function spot()
    {
        return $this->belongsTo(Spot::class);
    }
}
