<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $fillable = [
        'page_name',
        'count',

    ];


    protected $labels = [

    ];
    protected $dataset = [

    ];
    protected $colours = [

    ];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/stats/'.$this->getKey());
    }
}
