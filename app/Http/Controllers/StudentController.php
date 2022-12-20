<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(){
        $this->grade_model = new Grade();
        $this->subject_model = new Subject();
    }

    public function index($id){
        $student = User::find($id);
        for($i = 1; $i <= 4; $i++)
            $grades[$i] = $this->grade_model->getGrade($this->subject_model->getSubjectId(auth()->id()), $i, $id);

        return view('students.index', compact('student', 'grades'));
    }

    public function addGrade($id, $semester){
        $student = User::find($id);
        return view ('students.grades.add', compact('id', 'semester', 'student'));
    }

    public function storeGrade(Request $request){
        $this->validate($request, [
            'grade' => 'required|numeric|min:0|max:100'
        ]);
        $this->grade_model->storeGrade($request->grade, $this->subject_model->getSubjectId(auth()->id()), $request->semester, $request->student_id);
        return redirect()->route('student', ['id' => $request->student_id])->with('success', 'Grade saved successfully.');
    }

    public function editGrade($id, $semester){
        $student = User::find($id);
        $grade = $this->grade_model->getGrade($this->subject_model->getSubjectId(auth()->id()), $semester, $id);
        return view('students.grades.edit', compact('id', 'semester', 'student', 'grade'));
    }

    public function deleteGrade($id, $semester){
        $this->grade_model->deleteGrade($this->subject_model->getSubjectId(auth()->id()), $semester, $id);
        return redirect()->route('student', ['id' => $id])->with('success', 'Grade deleted successfully.');
    }
}
