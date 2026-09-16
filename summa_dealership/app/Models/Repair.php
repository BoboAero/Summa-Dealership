<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Repair extends Model
{
    protected $fillable = [
        'description',
        'user_id',
        'car_id'
    ];

    public function parts(): BelongsToMany{
        return $this->belongsToMany(Part::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function car(): BelongsTo{
        return $this->belongsTo(Car::class);
    }
}
