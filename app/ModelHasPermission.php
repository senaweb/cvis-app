<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHasPermission extends Model
{
    public $timestamps = false;

    protected $fillable = ['permission_id', 'model_type', 'model_id'];
}
