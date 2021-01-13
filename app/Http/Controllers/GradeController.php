<?php

namespace App\Http\Controllers;

use App\Grade;
use App\CollegeStudent;
use App\Course;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Grade::all();
        return view('pages.grade.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Grade();
        $mhs = CollegeStudent::all();
        $matkul = Course::all();
        $selectMhs = [];
        $selectMatkul = [];
        foreach ($mhs as $mhs) {
            $selectMhs[$mhs->nim] = $mhs->nama;
        }

        foreach ($matkul as $matkul) {
            $selectMatkul[$matkul->kode_matkul] = $matkul->mata_kuliah;
        }
        return view('pages.grade.form', compact('model', 'selectMhs', 'selectMatkul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quiz = $request->quiz * 0.10;
        $tugas = $request->tugas * 0.20;
        $uts = $request->uts * 0.30;
        $uas = $request->uas * 0.40;
        $grade = $quiz + $tugas + $uts + $uas;

        if ($grade >= 85) {
            $grade = 'A';
        } elseif ($grade >= 76) {
            $grade = 'B';
        } elseif ($grade >= 66) {
            $grade = 'C';
        } elseif ($grade >= 40) {
            $grade = 'D';
        } else {
            $grade = 'E';
        }

        $model = Grade::insert([
            [
                'nim' => $request->nim,
                'kode_matkul' => $request->kode_matkul,
                'tugas' => $request->tugas,
                'quiz' => $request->quiz,
                'uts' => $request->uts,
                'uas' => $request->uas,
                'grade' => $grade
            ]
        ]);
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Grade::findOrFail($id);
        $mhs = CollegeStudent::all();
        $matkul = Course::all();
        $selectMhs = [];
        $selectMatkul = [];
        foreach ($mhs as $mhs) {
            $selectMhs[$mhs->nim] = $mhs->nama;
        }

        foreach ($matkul as $matkul) {
            $selectMatkul[$matkul->kode_matkul] = $matkul->mata_kuliah;
        }
        return view('pages.grade.form', compact('model', 'selectMhs', 'selectMatkul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quiz = $request->quiz * 0.10;
        $tugas = $request->tugas * 0.20;
        $uts = $request->uts * 0.30;
        $uas = $request->uas * 0.40;
        $grade = $quiz + $tugas + $uts + $uas;

        if ($grade >= 85) {
            $grade = 'A';
        } elseif ($grade >= 76) {
            $grade = 'B';
        } elseif ($grade >= 66) {
            $grade = 'C';
        } elseif ($grade >= 40) {
            $grade = 'D';
        } else {
            $grade = 'E';
        }

        $model = Grade::findOrFail($id);
        $model->nim = $request->nim;
        $model->kode_matkul = $request->kode_matkul;
        $model->tugas = $request->tugas;
        $model->quiz = $request->quiz;
        $model->uts = $request->uts;
        $model->uas = $request->uas;
        $model->grade = $grade;
        $model->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Grade::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Grade::join('collegestudents', 'collegestudents.nim', '=', 'grades.nim')
            ->join('courses', 'courses.kode_matkul', '=', 'grades.kode_matkul')
            ->select('grades.*', 'collegestudents.*', 'courses.*')
            ->get();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layout._actiongrade', [
                    'model' => $model,
                    'url_edit' => route('grade.edit', $model->idnilai),
                    'url_destroy' => route('grade.destroy', $model->idnilai),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make('true');
    }
}
