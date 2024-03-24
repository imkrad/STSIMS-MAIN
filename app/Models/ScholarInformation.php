<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarInformation extends Model
{
    use HasFactory;

    protected $fillable = ['account_no','information'];

    // Define attributes that should be encrypted
    protected $encryptable = ['account_no'];

    // Define an accessor to automatically encrypt the data before saving
    public function setAccountNoAttribute($value)
    {
        $this->attributes['account_no'] = encrypt($value);
    }

    // Define an accessor to automatically decrypt the data when accessing
    public function getAccountNoAttribute($value)
    {   
        if($value != null){
            return decrypt($value);
        }else{
            return $value;
        }
    }

    public function scholar()
    {
        return $this->belongsTo('App\Models\Scholar', 'scholar_id', 'id');
    }
}
