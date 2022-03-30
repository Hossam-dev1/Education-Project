<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\ExamController as AdminExamController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\LevelsController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Web\ExamController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LevelController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\SkillController;
use App\Http\Controllers\Web\TeacherController;
use App\Http\Controllers\Web\VideoController as WebVideoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


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

Route::get('/', [HomeController::class, 'index']);
Route::get('/levels/show/{id}', [LevelController::class, 'show']);
Route::get('/skills/show/{id}', [SkillController::class, 'show']);
Route::get('/exams/download-pdf/{id}', [ExamController::class, 'downloadModel']);
Route::get('/exams/show/{id}', [ExamController::class, 'show'])->middleware(['auth','student']);
Route::get('/videos/show/{id}', [WebVideoController::class, 'show'])->middleware(['auth','student']);
Route::get('/teacher', [TeacherController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);



Route::post('/videos/start/{id}', [WebVideoController::class, 'start'])->middleware(['auth','student']);
Route::get('/videos/started/{id}', [WebVideoController::class, 'user_coded'])->middleware(['auth','student']);

Route::post('/exams/start/{id}', [ExamController::class, 'start'])->middleware(['auth','student']);
Route::get('/exams/questions/{id}', [ExamController::class, 'questions'])->middleware(['auth','student']);
Route::post('/exams/submit/{id}', [ExamController::class, 'submit'])->middleware(['auth','student']);


Route::prefix('dashboard')->middleware(['auth','can-enter-dashboard'])->group(function(){
    Route::get('/', [AdminHomeController::class, 'index']);

    Route::get('/levels', [LevelsController::class, 'index']);
    Route::get('/levels/toggle/{level}', [LevelsController::class, 'toggle']);
    Route::get('/levels/delete/{id}', [LevelsController::class, 'delete']);
    Route::post('/levels/store', [LevelsController::class, 'store']);
    Route::post('/levels/update', [LevelsController::class, 'update']);

    //Skillssss
    Route::get('/skills', [AdminSkillController::class, 'index']);
    Route::get('/skills/toggle/{skill}', [AdminSkillController::class, 'toggle']);
    Route::get('/skills/delete/{id}', [AdminSkillController::class, 'delete']);
    Route::post('/skills/store', [AdminSkillController::class, 'store']);
    Route::post('/skills/update', [AdminSkillController::class, 'update']);

    //Examssss
    Route::get('/exams', [AdminExamController::class, 'index']);
    Route::get('/exams/show/{exam}', [AdminExamController::class, 'show']);
    Route::get('/exams/show/{exam}/questions', [AdminExamController::class, 'showQuestions']);
    Route::get('/exams/show/{exam}/students', [AdminExamController::class, 'showStudents']);
    Route::post('/exams/store', [AdminExamController::class, 'store']);
    Route::get('/exams/create-questions/{exam}', [AdminExamController::class, 'createQuestions']);
    Route::post('/exams/store-questions/{exam}', [AdminExamController::class, 'storeQuestions']);

    Route::get('/exams/edit/{exam}', [AdminExamController::class, 'edit']);
    Route::post('/exams/update/{exam}', [AdminExamController::class, 'update']);
    Route::get('/exams/edit-questions/{exam}/{question}', [AdminExamController::class, 'editQuestion']);
    Route::post('/exams/update-questions/{exam}/{question}', [AdminExamController::class, 'updateQuestion']);
    Route::get('/exams/create', [AdminExamController::class, 'create']);
    Route::get('/exams/toggle/{exam}', [AdminExamController::class, 'toggle']);
    Route::get('/exams/toggle-paid/{exam}', [AdminExamController::class, 'togglePaid']);
    Route::get('/exams/delete/{exam}', [AdminExamController::class, 'delete']);
    Route::get('/exams/code/{exam}', [AdminExamController::class, 'showCode']);
    Route::post('/exams/model/{exam}', [AdminExamController::class, 'answerModel']);
    Route::get('/exams/delete-model/{exam}', [AdminExamController::class, 'deleteModel']);



    // videosss
    Route::get('/videos', [VideoController::class, 'index']);
    Route::get('/videos/create', [VideoController::class, 'create']);
    Route::post('/videos/store', [VideoController::class, 'store']);
    Route::get('/videos/show/{video}', [VideoController::class, 'show']);
    Route::get('/videos/edit/{video}', [VideoController::class, 'edit']);
    Route::post('/videos/update/{video}', [VideoController::class, 'update']);
    Route::get('/videos/toggle/{video}', [VideoController::class, 'toggle']);
    Route::get('/videos/toggle-paid/{video}', [VideoController::class, 'togglePaid']);
    Route::get('/videos/delete/{video}', [VideoController::class, 'delete']);
    Route::get('/videos/code/{video}', [VideoController::class, 'showCode']);


    //codesss
    Route::get('/videos/create-code/{video}', [VideoController::class, 'create_code']);
    Route::get('/exams/create-code/{exam}', [AdminExamController::class, 'create_code']);

    //Studentsss
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/score/{id}', [StudentController::class, 'showScore']);
    Route::post('/students/update', [StudentController::class, 'update']);
    Route::get('/students/open-exam/{studentId}/{examId}', [StudentController::class, 'openExam']);
    Route::get('/students/close-exam/{studentId}/{examId}', [StudentController::class, 'closeExam']);

    //Adminsss
    Route::middleware('super')->group(function()
    {
        Route::get('/admins', [AdminController::class, 'index']);
        Route::get('/admins/edit/{id}', [AdminController::class, 'editAdmin']);
        Route::post('/admins/store/{id}', [AdminController::class, 'updateProfile']);
        Route::get('/admins/delete/{id}', [AdminController::class, 'delete']);

    });

    // Adsss
    Route::get('/ads', [AdsController::class, 'index']);
    Route::post('/ads/store', [AdsController::class, 'store']);
    Route::post('/ads/edit', [AdsController::class, 'update']);
    Route::get('/ads/toggle/{ads}', [AdsController::class, 'toggle']);
    Route::get('/ads/delete/{ads}', [AdsController::class, 'delete']);
    
    Route::get('/teacher', [AdminTeacherController::class, 'index']);
    Route::get('/teacher/create', [AdminTeacherController::class, 'create']);
    Route::post('/teacher/store', [AdminTeacherController::class, 'store']);
    Route::get('/teacher/show/{id}', [AdminTeacherController::class, 'create']);
    Route::get('/teacher/edit/{id}', [AdminTeacherController::class, 'edit']);
    Route::post('/teacher/update/{id}', [AdminTeacherController::class, 'update']);
    Route::get('/teacher/delete/{id}', [AdminTeacherController::class, 'delete']);

});



