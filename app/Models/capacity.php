<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class capacity extends Model
{
    //
    use HasFactory;
    protected $table = 'capacity';
    protected $fillable = [
        'date',
        'agronomy_name',
        'activity',
        'audience',
        'topic_name',
        'state',
        'district',
        'mandal_taluk',
        'location',
        'participant',
        'remarks',
        'upload_file',
        'upload_photo',
    ];
}
