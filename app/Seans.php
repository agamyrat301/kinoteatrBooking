<?php

namespace App;
use App\Booking;
use Illuminate\Database\Eloquent\Model;

class Seans extends Model
{
    protected $fillable = [
        'film_name',
        'start_date',
        'seans_number',
        'duration',
        'price',
        'hall'
    ];

    protected $dates = ['start_date'];

    public function Bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getHall()
    {
        switch ($this->hall) {
            case '3d1':
                return '1nji zal 3D';
                break;
            case '3d2':
                return '2nji zal 3D';
                break;
            default:
                break;
        }
    }

}
