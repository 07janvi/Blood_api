<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sendotp extends Model
{
    //
    use HasFactory;
    protected $table = 'sendotp';
    protected $fillable = [
        'date',
        'person_name',
        'surname',
        'dob',
        'contactno',
        // 'otp',
        'state',
        'district',
        'address'
    ];
}
