<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    use HasFactory;

    protected $fillable=[
        'first_name',
        'last_name',
        'father_name',
        'phone_number',
        'qualification',
        'special_education',
        'category_id',
        'subcategory_id',
        'email_id',
        'id_proof',
        'id_number',
        'state_id',
        'city_id',
        'address',
        'pincode',
        'created_by'
    ];
}
