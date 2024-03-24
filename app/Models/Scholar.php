<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    use HasFactory;

    protected $fillable = [
        'spas_id',
        'program_id',
        'subprogram_id',
        'category_id',
        'status_id',
        'awarded_year',
        'is_endorsed',
        'is_undergrad',
        'is_completed'
    ];

    public function profile()
    {
        return $this->hasOne('App\Models\ScholarProfile', 'scholar_id');
    } 

    public function education()
    {
        return $this->hasOne('App\Models\ScholarEducation', 'scholar_id');
    } 

    public function address()
    {
        return $this->hasOne('App\Models\ScholarAddress', 'scholar_id');
    } 

    public function info()
    {
        return $this->hasOne('App\Models\ScholarInformation', 'scholar_id');
    } 

    public function program()
    {
        return $this->belongsTo('App\Models\ListProgram', 'program_id', 'id');
    } 
    
    public function subprogram()
    {
        return $this->belongsTo('App\Models\ListProgram', 'subprogram_id', 'id');
    } 

    public function status()
    {
        return $this->belongsTo('App\Models\ListStatus', 'status_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'category_id', 'id');
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
