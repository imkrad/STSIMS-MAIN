<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ListPrivilege extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name', 'type', 'short', 'regular_amount', 'summer_amount', 'is_fixed', 'is_active', 'is_reimburseable'
    ];

    public function setRegularAmountAttribute($value)
    {
        $this->attributes['regular_amount'] = trim(str_replace(',','',$value),'₱ ');
    }

    public function getRegularAmountAttribute($value)
    {
        return '₱'.number_format($value,2);
    }

    public function setSummerAmountAttribute($value)
    {
        $this->attributes['summer_amount'] = trim(str_replace(',','',$value),'₱ ');
    }

    public function getSummerAmountAttribute($value)
    {
        return '₱'.number_format($value,2);
    }

    protected static $recordEvents = ['updated'];
    public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults()
        ->logFillable()
        ->setDescriptionForEvent(fn(string $eventName) => "$eventName the privilege")
        ->useLogName('Privilege')
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
}
