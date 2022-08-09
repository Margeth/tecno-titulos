<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAcademicDegree extends Model
{
    protected $table = 'user_academic_degree';

    protected $fillable = [
        'no_request',
        'code_academic_degree',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/user-academic-degrees/'.$this->getKey());
    }
}
