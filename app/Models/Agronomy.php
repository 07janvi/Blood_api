<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agronomy extends Model
{

    use HasFactory;
    protected $table = 'agronomy';
    protected $fillable = [
        'farmer_name',
        'contact_number',
        'state',
        'district',
        'mandal_taluk',
        'village',
        'crop',
        'area',
        'mis_type',
        'crop_spacing',
        'installation_date',
        'planting_date',
        'harvesting_date',
        'drip_current_area',
        'drip_par',
        'expenditure_current_area',
        'expenditure_par',
        'income_current_area',
        'income_par',
        'profit_current_area',
        'profit_par',
        'yield_current_area',
        'yield_par',
        'e_current_area',
        'e_par',
        'i_current_area',
        'i_par',
        'net_current_area',
        'net_par',
        'income_drip_current_area',
        'income_drip_par',
        'farmer_feedback',
        'crop_farmer_photos',
        'success_story',

    ];


    protected $casts = [
        'crop_farmer_photos' => 'array',
    ];
}
