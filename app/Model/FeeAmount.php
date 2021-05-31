<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeeAmount extends Model
{
    public function fee_category(){
      return $this->belongsTo(StudentFee::class,'fee_category_id','id');
    }
    public function student_class(){
      return $this->belongsTo(StudentClass::class,'student_class_id','id');
    }
}
