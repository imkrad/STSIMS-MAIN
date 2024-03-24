<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualifierNotavail extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason','user_id', 'qualifier_id','is_seened'
    ];

    public function qualifier()
    {
        return $this->belongsTo('App\Models\Qualifier', 'qualifier_id', 'id');
    }
}
