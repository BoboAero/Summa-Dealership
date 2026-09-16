<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    protected $fillable = [
        'name',
        'model',
        'year'

    ];

    public function repair(): HasOne{
        return $this->hasOne(Repair::class);
    }


}
