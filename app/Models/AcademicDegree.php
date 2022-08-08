<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicDegree extends Model
{
    protected $table = 'academic_degree';

    protected $fillable = [
        'id_entity',
        'id_type',
        'name',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/academic-degrees/'.$this->getKey());
    }
}
