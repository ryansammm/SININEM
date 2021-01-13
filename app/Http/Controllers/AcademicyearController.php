<?php

namespace App\Http\Controllers;

use App\Academicyear;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class AcademicyearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Academicyear::all();
        return view('pages.academicyear.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Academicyear();
        return view('pages.academicyear.form', compact('model'));
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
            'tahun_akademik' => 'required'
        ]);
        $model = Academicyear::create($request->all());
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Academicyear  $academicyear
     * @return \Illuminate\Http\Response
     */
    public function show(Academicyear $academicyear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Academicyear  $academicyear
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Academicyear::findOrFail($id);
        return view('pages.academicyear.form', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Academicyear  $academicyear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Academicyear::findOrFail($id);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Academicyear  $academicyear
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Academicyear::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Academicyear::query();
        return DataTables::of($model)
        ->addColumn('action', function ($model){
            return view('layout._actionacad', [
                'model' => $model,
                'url_edit' => route('academicyear.edit', $model->idacad),
                'url_destroy' => route('academicyear.destroy', $model->idacad),
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make('true');
    }
}
