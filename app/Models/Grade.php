<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'grade',
        'subject_id',
        'user_id',
        'semester'
    ];

    public function getGrade($subject_id, $semester, $user_id){
        $grade = Grade::where('grades.subject_id', $subject_id)
                    ->where('grades.semester', $semester)
                    ->where('grades.user_id', $user_id)
                    ->pluck('grades.grade')->first();
        if($grade == null){
            return '-';
        }
        return $grade;
    }

    public function storeGrade($grade, $subject_id, $semester, $user_id){
        $grade = Grade::updateOrCreate(
            [
                'subject_id' => $subject_id,
                'semester' => $semester,
                'user_id' => $user_id
            ],
            [
                'grade' => $grade
            ]
        );
    }

    public function deleteGrade($subject_id, $semester, $user_id){
        $grade = Grade::where('grades.subject_id', $subject_id)
                    ->where('grades.semester', $semester)
                    ->where('grades.user_id', $user_id)
                    ->delete();
    }


}
