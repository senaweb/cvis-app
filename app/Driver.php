<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $guarded = [];

    /**
     * The incident of a particular driver instance
     * @return Illuminate\Database\Eluquent\Relationshp
     */
    public function incidents()
    {
        return $this->hasMany(Incident::class, 'driver_id');
    }
}
