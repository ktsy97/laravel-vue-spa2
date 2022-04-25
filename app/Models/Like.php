<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    protected $fillable = ['city_name','user_id'];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Model\User');
    }
}
