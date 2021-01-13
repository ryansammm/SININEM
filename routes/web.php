<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Session::has('login')) {
        return redirect('dashboard');
    }
    return redirect('login');
});
Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/login', 'AuthController@index')->name('login');
Route::post('/doLogin', 'AuthController@login')->name('doLogin');
Route::get('/logout', 'AuthController@logout')->name('logout');


//course
Route::resource('course', 'CourseController');
Route::get('/data/course', 'CourseController@dataTable')->name('data.course');

//lecturer
Route::resource('lecturer', 'LecturerController');
Route::get('/data/lecturer', 'LecturerController@dataTable')->name('data.lecturer');

//collegestudent
Route::resource('collegestudent', 'CollegeStudentController');
Route::get('/data/collegestudent', 'CollegeStudentController@dataTable')->name('data.collegestudent');

//grade
Route::resource('grade', 'GradeController');
Route::get('/data/grade', 'GradeController@dataTable')->name('data.grade');

//academicyear
Route::resource('academicyear', 'AcademicyearController');
Route::get('/data/academicyear', 'AcademicyearController@dataTable')->name('data.academicyear');

//teach
Route::resource('teach', 'TeachController');
Route::get('/data/teach', 'TeachController@dataTable')->name('data.teach');

//user
Route::resource('user', 'UserController');
Route::get('/data/user', 'UserController@dataTable')->name('data.user');

//auth
