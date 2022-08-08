<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicDegreeRequirement extends Model
{
    protected $table = 'academic_degree_requirement';

    protected $fillable = [
        'id_type_academic_degree',
        'id_requirement',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/academic-degree-requirements/'.$this->getKey());
    }
}
