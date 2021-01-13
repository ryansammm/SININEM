<?php

namespace App\Http\Controllers;

use App\CollegeStudent;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class CollegeStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = CollegeStudent::all();
        return view('pages.collegestudent.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new CollegeStudent();
        return view('pages.collegestudent.form', compact('model'));
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
            'nim' => 'required|min:10|max:10',
            'nama' => 'required|max:100',
            'kelas' => 'required'
        ]);

        $model = CollegeStudent::create($request->all());
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CollegeStudent  $collegeStudent
     * @return \Illuminate\Http\Response
     */
    public function show(CollegeStudent $collegeStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CollegeStudent  $collegeStudent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = CollegeStudent::findOrFail($id);
        return view('pages.collegestudent.form', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CollegeStudent  $collegeStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = CollegeStudent::findOrFail($id);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CollegeStudent  $collegeStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = CollegeStudent::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = CollegeStudent::query();
        return DataTables::of($model)
        ->addColumn('action', function ($model){
            return view('layout._actioncollegestudent', [
                'model' => $model,
                'url_edit' => route('collegestudent.edit', $model->nim),
                'url_destroy' => route('collegestudent.destroy', $model->nim),
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make('true');
    }
}
