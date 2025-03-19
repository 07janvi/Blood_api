<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Signature extends Model
{
    //
    use HasFactory;

    protected $table = 'signature';

    protected $fillable = [
        'date',
        'person_name',
        'surname',
        'dob',
        'contectno',
        'state',
        'district',
        'address',
        'signature'
    ];
}
