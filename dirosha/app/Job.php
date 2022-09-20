<?php

namespace App;
use App\Models\Navigation;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = [
        'semister',
        'admission',
        'course_number',
        'security_deposit',
        'courses_title',
        'credit_hours',
        'theory_number',
        'practical_final',
        'maintenance',
        'tuition_fee',
        'fee_particular',
        'exam_charge',
        'internal_number',
        'navigation_id',
       

        ];
    public function navigation(){
        return $this->belongsTo(Navigation::class,'navigation_id','id');
    }
}
