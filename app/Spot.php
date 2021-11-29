<?php

namespace App;

use App\Fived;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $fillable = ['status','number','zal'];

    public function Bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function fiveds()
    {
        return $this->HasMany(Fived::class);
    }


}
