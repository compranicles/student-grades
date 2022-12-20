<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->grade_model = new Grade();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == '1'){
            $grades = [];

            for ($i = 4; $i >= 1; $i--){
                $subjects = Subject::select('subjects.name as subject_name', 'users.name as teacher_name', 'subjects.id as subject_id')
                                ->join('users', 'subjects.user_id', 'users.id')
                                ->get()->toArray();
                $j = 0;
                foreach($subjects as $subject){
                    $subjects[$j]['grade'] = $this->grade_model->getGrade($subject['subject_id'], $i, auth()->user()->id);
                    $j++;
                }
                array_push($grades, $subjects);
            }
            return view('home', compact('grades'));
        }

        $subject = Subject::where('user_id', auth()->user()->id)->first();
        $students = User::where('role', '1')->get()->toArray();

        $j = 0;
        foreach($students as $student){
            for($i = 1; $i <= 4; $i++){
                $grades[$i] = $this->grade_model->getGrade($subject->id, $i, $student['id']);
            }

            $students[$j]['grade'] = $grades;
            $j++;
        }
        return view('home', compact('subject', 'students'));
    }
}
