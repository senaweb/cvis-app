<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $guarded = [];
    /**
     * The incidents that a particular vehicle has gotten incolved in.
     * @return \Illuminate\Database\Eloquent
     */
    public function incidents()
    {
        return $this->hasMany(Incident::class, 'vehicle_id');
    }
}
