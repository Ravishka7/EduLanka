<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Show all students (Index)
    public function index(Request $request)
    {
        $search = $request->query('search');
        
        $students = Student::when($search, function ($query, $search) {
            return $query->where('student_id', 'like', "%$search%")
                         ->orWhere('class', 'like', "%$search%");
        })->get();
        
        return view('students.index', compact('students', 'search'));
    }

    // Show the form to create a new student (Create)
    public function create()
    {
        return view('students.create');
    }

    // Store a new student in the database (Store)
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'class' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'guardian_name' => 'required',
        ]);

        Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    // Show a specific student (Read - Show)
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    // Show the form to edit a student (Update - Edit)
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Update a specific student in the database (Update - Update)
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'class' => 'required',
            'details' => 'nullable',
        ]);

        $student = Student::findOrFail($id);
        $student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // Delete a specific student from the database (Delete - Destroy)
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}

