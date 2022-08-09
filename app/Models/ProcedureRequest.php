<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcedureRequest extends Model
{
    protected $table = 'procedure_request';

    protected $fillable = [
        'no_request',
        'id_academic_degree',
        'id_request_state',
        'user_student',
        'user_transcriber',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/procedure-requests/'.$this->getKey());
    }
}
