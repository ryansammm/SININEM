<?php

namespace App\Http\Controllers;

use App\Course;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Course::all();
        return view('pages.course.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Course();
        return view('pages.course.form', compact('model'));
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
            'kode_matkul' => 'required|max:6',
            'mata_kuliah' => 'required|max:100',
            'sks' => 'required|max:1',
            'semester' => 'required|max:1'
        ]);

        $model = Course::create($request->all());
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Course::findOrFail($id);
        return view('pages.course.form', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Course::findOrFail($id);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Course::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Course::query();
        return DataTables::of($model)
        ->addColumn('action', function ($model){
            return view('layout._actioncourse', [
                'model' => $model,
                'url_edit' => route('course.edit', $model->kode_matkul),
                'url_destroy' => route('course.destroy', $model->kode_matkul),
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make('true');
    }
}
