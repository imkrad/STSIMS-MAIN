<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualifierEndorsement extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id', 'course_id', 'user_id', 'qualifier_id', 'endorsed_to', 'endorsed_by','is_approved','is_seened'
    ];

    public function qualifier()
    {
        return $this->belongsTo('App\Models\Qualifier', 'qualifier_id', 'id');
    }

    public function school()
    {
        return $this->belongsTo('App\Models\SchoolCampus', 'school_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\ListCourse', 'course_id', 'id');
    }

    public function endorsedby()
    {
        return $this->belongsTo('App\Models\LocationRegion', 'endorsed_by', 'code');
    }

    public function endorsedto()
    {
        return $this->belongsTo('App\Models\LocationRegion', 'endorsed_to', 'code');
    }
}
