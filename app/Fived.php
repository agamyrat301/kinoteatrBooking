<?php

namespace App;
use App\Spot;
use Illuminate\Database\Eloquent\Model;

class Fived extends Model
{
    protected $fillable = [
        'price','spot_id'
    ];

    public function spot()
    {
        return $this->belongsTo(Spot::class);
    }
}
