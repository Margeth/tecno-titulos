<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signer extends Model
{
    protected $table = 'signer';

    protected $fillable = [
        'id_minute',
        'code_user_academic_degre',
        'code',
        'id_step',
        'is_signed',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/signers/'.$this->getKey());
    }
}
