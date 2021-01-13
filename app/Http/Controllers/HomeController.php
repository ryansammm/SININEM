<?php

namespace App\Http\Controllers;

use App\CollegeStudent;
use App\Course;
use App\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        if (Session::has('login')) {
            $data['dosen'] = Lecturer::count();
            $data['mhs'] = CollegeStudent::count();
            $data['matkul'] = Course::count();
            return view('pages.dashboard', compact('data'));
        }
        return redirect('login');
    }
}
