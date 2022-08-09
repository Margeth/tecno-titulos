<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Minute extends Model
{
    protected $table = 'minute';

    protected $fillable = [
        'no_request',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/minutes/'.$this->getKey());
    }
}
