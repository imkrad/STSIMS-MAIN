<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListMenu extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    protected $fillable = [
        'name',
        'icon',
        'route',
        'path',
        'group',
        'order',
        'has_child',
        'is_mother',
        'is_active'
    ];
}
