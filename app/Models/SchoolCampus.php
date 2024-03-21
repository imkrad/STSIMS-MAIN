<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolCampus extends Model
{
    use HasFactory;

    protected $fillable = [
        'campus',
        'shortcut',
        'address',
        'is_main',
        'is_alone',
        'is_active',
        'term_id',
        'grading_id',
        'school_id',
        'municipality_code',
        'province_code',
        'region_code',
        'assigned_region'
    ];

    public function assigned()
    {
        return $this->belongsTo('App\Models\LocationRegion', 'assigned_region', 'code');
    }

    public function region()
    {
        return $this->belongsTo('App\Models\LocationRegion', 'region_code', 'code');
    }

    public function province()
    {
        return $this->belongsTo('App\Models\LocationProvince', 'province_code', 'code');
    }

    public function municipality()
    {
        return $this->belongsTo('App\Models\LocationMunicipality', 'municipality_code', 'code');
    }

    public function school()
    {
        return $this->belongsTo('App\Models\School', 'school_id', 'id');
    }

    public function names()
    {
        return $this->hasMany('App\Models\SchoolName', 'school_id');
    } 

    public function courses()
    {
        return $this->hasMany('App\Models\SchoolCourse', 'school_id');
    } 

    public function term()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'term_id', 'id');
    }

    public function grading()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'grading_id', 'id');
    }

    public function getCampusAttribute($value){
        return ucwords(strtolower($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }
}
