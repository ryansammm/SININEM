<?php

namespace App\Http\Controllers;

use App\Lecturer;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Lecturer::all();
        return view('pages.lecturer.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Lecturer();
        return view('pages.lecturer.form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nidn' => 'required|min:16|max:16',
            'nama_dosen' => 'required|max:100',
            'email' => 'required|min:11|max:50',
            'nohp' => 'required|min:11|max:13'

        ]);

        $model = Lecturer::create($request->all());
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Lecturer::findOrFail($id);
        return view('pages.lecturer.form', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Lecturer::findOrFail($id);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Lecturer::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Lecturer::query();
        return DataTables::of($model)
        ->addColumn('action', function ($model){
            return view('layout._actionlecturer', [
                'model' => $model,
                'url_edit' => route('lecturer.edit', $model->nidn),
                'url_destroy' => route('lecturer.destroy', $model->nidn),
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make('true');
    }
}
