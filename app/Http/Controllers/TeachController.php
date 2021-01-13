<?php

namespace App\Http\Controllers;

use App\Lecturer;
use App\Course;
use App\Academicyear;
use App\Teach;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class TeachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Teach::all();
        return view('pages.teach.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Teach();
        $dosen = Lecturer::all();
        $matkul = Course::all();
        $akademik = Academicyear::orderBy("tahun_akademik", "asc")->get();
        $selectDosen = [];
        $selectMatkul = [];
        $selectAkademik = [];
        foreach ($dosen as $dosen) {
            $selectDosen[$dosen->nidn] = $dosen->nama_dosen;
        }

        foreach ($matkul as $matkul) {
            $selectMatkul[$matkul->kode_matkul] = $matkul->mata_kuliah;
        }

        foreach ($akademik as $akademik) {
            $selectAkademik[$akademik->idacad] = $akademik->tahun_akademik;
        }
        return view('pages.teach.form', compact('model', 'selectDosen', 'selectMatkul', 'selectAkademik'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'nidn' => 'required',
        //     'kode_matkul' => 'required',
        //     'idacad' => 'required'
        // ]);
        $model = Teach::insert([
            [
                'nidn' => $request->nidn,
                'kode_matkul' => $request->kode_matkul,
                'idacad' => $request->idacad
            ]
        ]);
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teach  $teach
     * @return \Illuminate\Http\Response
     */
    public function show(Teach $teach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teach  $teach
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Teach::findOrFail($id);
        $dosen = Lecturer::all();
        $matkul = Course::all();
        $akademik = Academicyear::orderBy("tahun_akademik", "asc")->get();
        $selectDosen = [];
        $selectMatkul = [];
        $selectAkademik = [];
        foreach ($dosen as $dosen) {
            $selectDosen[$dosen->nidn] = $dosen->nama_dosen;
        }

        foreach ($matkul as $matkul) {
            $selectMatkul[$matkul->kode_matkul] = $matkul->mata_kuliah;
        }

        foreach ($akademik as $akademik) {
            $selectAkademik[$akademik->idacad] = $akademik->tahun_akademik;
        }
        return view('pages.teach.form', compact('model', 'selectDosen', 'selectMatkul', 'selectAkademik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teach  $teach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Teach::findOrFail($id);
        $model->nidn = $request->nidn;
        $model->kode_matkul = $request->kode_matkul;
        $model->idacad = $request->idacad;
        $model->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teach  $teach
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Teach::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Teach::join('lecturers', 'lecturers.nidn', '=', 'teachs.nidn')
            ->join('courses', 'courses.kode_matkul', '=', 'teachs.kode_matkul')
            ->join('academicyears', 'academicyears.idacad', '=', 'teachs.idacad')
            ->select('teachs.*', 'lecturers.*', 'courses.*', 'academicyears.*')
            ->get();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layout._actionteach', [
                    'model' => $model,
                    'url_edit' => route('teach.edit', $model->idteachs),
                    'url_destroy' => route('teach.destroy', $model->idteachs),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make('true');
    }
}
