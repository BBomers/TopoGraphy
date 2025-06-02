<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('teacher.dashboard');
    }

    public function showStudents()
    {
        $students = User::role('student')
        ->whereNull('teacher_id')
        ->get();

        $yourStudents = Auth::user()->students;

    return view('teacher.dashboard', compact('students', 'yourStudents'));
    }

    public function showStudent(User $student)
    {
        if ($student->teacher_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this student.');
        }

        $student->load('scores');

        return view('teacher.student', compact('student'));
    }

   

    public function invite($studentId)
    {
        $student = User::findOrFail($studentId);

        if (!$student->hasRole('student')) {
            return back()->with('error', 'This user is not a student.');
        }
    
        // Assign the currently logged-in teacher as the student's teacher
        $student->teacher_id = Auth::id();
        $student->save();

        return back()->with('success', "Invite sent to {$student->name}.");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
