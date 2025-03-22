<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Captcha extends Model
{
    //
    use HasFactory;
    protected $table = 'captcha';
    protected $fillable = [
        'person_name',
        'surname',
        'contactno',
        'state',
        'district',
        'address',


    ];
}