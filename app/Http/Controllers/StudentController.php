<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = \App\Models\Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:aji_table',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'hobi' => 'required',
        ]);
    
        \App\Models\Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing t  he specified resource.
     */
    public function edit($id)
    {
        // Ambil data student berdasarkan ID
        $student = \App\Models\Student::find($id);
    
        // Jika student tidak ditemukan, redirect kembali dengan pesan error
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Siswa tidak ditemukan');
        }
    
        // Mengirim data siswa ke view untuk diedit
        return view('students.edit', compact('student'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input form
        $request->validate([
            'nis' => 'required|unique:aji_table,nis,' . $id, // Menggunakan ID untuk pengecualian nis yang sama
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'hobi' => 'required',
        ]);
    
        // Cari data siswa berdasarkan ID
        $student = \App\Models\Student::find($id);
    
        // Jika siswa tidak ditemukan, redirect kembali dengan pesan error
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Siswa tidak ditemukan');
        }
    
        // Update data siswa dengan data yang baru
        $student->update($request->all());
    
        // Redirect setelah berhasil update
        return redirect()->route('students.index')->with('success', 'Data berhasil diperbarui!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Data berhasil dihapus!');
    }
}
