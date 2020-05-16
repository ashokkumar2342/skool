<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Student;

class StudentUserMap extends Model
{
    protected $table ='student_user_map';


    public function userIdBySibling($user_id)
    {
        try {
                 $student =StudentUserMap::where('userid',$user_id)->pluck('userid')->toArray();
          return $sinlintid =StudentUserMap::whereIn('userid',$student)->pluck('student_id')->toArray();
        } catch (Exception $e) {
            return $e;
        }

    }
    public function userIdByStudetnDetails($user_id)
    {
        try {
            $student =StudentUserMap::where('userid',$user_id)->first();
          return $studentdetails =Student::find($student->student_id);
        } catch (Exception $e) {
            return $e;
        }

    }
}
