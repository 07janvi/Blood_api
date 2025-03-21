<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    //
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = ['customer_name', 'email', 'contect_no', 'state', 'district', 'address'];
}
