<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'others', 'is_sub', 'is_category', 'is_active'
    ];

    public function getNameAttribute($value)
    {
        return ucwords($value);
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
