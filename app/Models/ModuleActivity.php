<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleActivity extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $casts = [
        'created_at' => 'datetime'
    ];

    /**
     * Get the module
     */
    public function modules()
    {
        return $this->belongsTo(\App\Models\Modules::class, 'module_id');
    }
}
