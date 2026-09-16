<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Part extends Model
{
    protected $fillable = [
        'name',
        'price',
        'stock'];

    public function repairs(): BelongsToMany
    {
        return $this->belongsToMany(Repair::class);
    }
}
