<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    // Show all teachers (Index)
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    // Show the form to create a new teacher (Create)
    public function create()
    {
        return view('teachers.create');
    }
    // Store a new teacher in the database (Store)
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'section' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        Teacher::create($validatedData);

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully!');
    }
    // Show a specific teacher (Read - Show)
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.show', compact('teacher'));
    }
    // Show the form to edit a teacher (Update - Edit)
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }
    // Update a specific teacher in the database (Update - Update)
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'section' => 'required',
            'subject' => 'required',
            'details' => 'nullable',
        ]);

        $teacher = Teacher::findOrFail($id);
        $teacher->update($validatedData);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully!');
    }
    // Delete a specific teacher from the database (Delete - Destroy)
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully!');
    }
}

