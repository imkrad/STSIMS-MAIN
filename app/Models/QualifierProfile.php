<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualifierProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'contact_no',
        'firstname', 
        'lastname', 
        'middlename',
        'suffix',
        'sex',
        'birthday',
        'qualifier_id'
    ];

    public function qualifier()
    {
        return $this->belongsTo('App\Models\Qualifier', 'qualifier_id', 'id');
    }
}
