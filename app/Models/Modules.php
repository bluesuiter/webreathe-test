<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    protected $guarded = [];

    /**
     * Get the module
     */
    public function user()
    {
        return $this->hasOne(\App\Models\User::class);
    }
}
