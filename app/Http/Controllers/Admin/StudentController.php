<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // <- pastikan baris ini ADA
use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'nisn' => 'required|unique:students',
        ]);

        Student::create($request->all());
        return redirect()->route('admin.students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    /**x
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis,'.$id,
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'nisn' => 'required|unique:students,nisn,'.$id,
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('admin.students.index')
            ->with('success', 'Student updated successfully.');     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
