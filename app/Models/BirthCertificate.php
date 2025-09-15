<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_name_bn',
        'applicant_name_en',
        'father_name_bn',
        'father_name_en',
        'mother_name_bn',
        'mother_name_en',
        'date_of_birth',
        'gender',
        'birth_registration_number',
        'birth_place',
        'district',
        'upazila',
        'union',
        'mobile_number',
        'email',
        'present_address',
        'photo_path',
        'nid_path',
        'birth_registration_path',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];
}