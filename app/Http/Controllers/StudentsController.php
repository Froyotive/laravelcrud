<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::all();
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $students = new Students;
        // $students->nama = $request->nama;
        // $students->nisn = $request->nisn;
        // $students->email = $request->email;
        // $students->jurusan = $request->jurusan;

        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|size:6'
        ]);
        // $students->save();
        Students::create($request->all());
        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
        return view('students.show', compact(('students')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $students)
    {
        return view('students.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $students)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|size:6'
        ]);

        Students::where('id', $students->id)
            ->update([
                'nama' => $request->nama,
                'nisn' => $request->nisn,
                'email' => $request->email,
                'jurusan' => $request->jurusan,
            ]);
        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $students)
    {
        Students::destroy($students->id);

        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil Dihapus');
    }
}
