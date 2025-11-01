<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentsController extends Controller
{
  public function index()
  {
    $students = Student::orderByDesc('created_at')->paginate(5);
    return view('students.index', compact('students'));
  }

  public function create()
  {
    return view('students.create');
  }

  public function store(Request $request)
  {
    // validate data
    $request->validate([
      'name' => ['required', 'string', 'min:2', 'max:255'],
      'email' => ['required', 'email', 'max:50', 'unique:students,email'],
      'phone' => ['required', 'digits:10', 'unique:students,phone'],
    ]);

    // create student
    Student::create($request->all());
    return redirect()->route('students.index')->with('success', 'Student added successfully');
  }

  public function show(Student $student)
  {
    return view('students.show', compact('student'));
  }

  public function edit(Student $student)
  {
    return view('students.edit', compact('student'));
  }

  public function update(Request $request, Student $student)
  {
    // validate data
    $request->validate([
      'name' => ['required', 'string', 'min:2', 'max:255'],
      'email' => [
        'required',
        'email',
        Rule::unique('students', 'email')->ignore($student->id),
        'max:50'
      ],
      'phone' => [
        'required',
        'digits:10',
        Rule::unique('students', 'phone')->ignore($student->id),
      ],
    ]);
    // update student details
    $student->update($request->all());
    return redirect()->route('students.index')->with('success', 'Student updated successfully');
  }

  public function destroy(Student $student)
  {
    $student->delete();
    return redirect()->route('students.index')->with('success', 'Student deleted successfully');
  }
}
