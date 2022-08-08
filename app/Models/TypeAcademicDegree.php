<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeAcademicDegree extends Model
{
    protected $table = 'type_academic_degree';

    protected $fillable = [
        'name',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/type-academic-degrees/'.$this->getKey());
    }
}
