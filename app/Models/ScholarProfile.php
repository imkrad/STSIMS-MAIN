<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarProfile extends Model
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
        'is_completed',
        'scholar_id'
    ];

    public function scholar()
    {
        return $this->belongsTo('App\Models\Scholar', 'scholar_id', 'id');
    }

    public function getFirstnameAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    public function getLastnameAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    public function getMiddlenameAttribute($value)
    {
        return ucwords(strtolower($value));
    }
}
