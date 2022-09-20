<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = [
        'cmat_rollno',
        'category_group',
        'personal_photo',
        'courses_title',
        'full_Name',
        'nepali_full_name',
        'age',
        'gender',
        'nationality',
        'phone_no',
        'DOB',
        'email',
        'mobile_no',
        'parmanent_address_provience',
        'parmanent_address_disctict',
        'parmanent_address_municipality',
        'parmanent_address_village',
        'temporary_address_provience',
        'temporary_address_disctict',
        'temporary_address_municipality',
        'temporary_address_village',
        'father_name',
        'mother_name',
        'name_of_Guardian',
        'guardian_address',
        'Guardian_phone_number',
        'name_of_institute_1',
        'university&board_1',
        'qualification_1',
        'year_of_graduation_1',
        'obtaines_mark_1',
        'file_1',
        'name_of_institute_2',
        'university&board_2',
        'qualification_2',
        'year_of_graduation_2',
        'obtaines_mark_2',
        'file_2',
        'name_of_institute_3',
        'university&board_3',
        'qualification_3',
        'year_of_graduation_3',
        'obtaines_mark_3',
        'file_3',
    ];
}
