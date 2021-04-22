
<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Subject;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

//subject controller
//subjectview student
    //
Route::get('/subjects/{subject}/show/s', [SubjectController::class, 'showstudent'])->middleware(['auth'])->name('subject.shows');
//subjectview teacher
Route::get('/subjects/{subject}/show/t', [SubjectController::class, 'showteacher'])->middleware(['auth'])->name('subject.showt');
//Route::view('subjectviewt', 'teacher/subjectviewteacher');

//subjects
Route::get('/subjectss',  [SubjectController::class, 'index'])->middleware(['auth'])->name('subject.list');

//new subject teacher

Route::get('/subjects/create', [SubjectController::class, 'create'])->middleware(['auth'])->name('subject.create');
Route::post('/subjects', [SubjectController::class, 'store'])->middleware(['auth'])->name('subject.store');
//mysubjects teacher
Route::get('/subjects',  [SubjectController::class, 'index_mysubjects_teacher'])->middleware(['auth'])->name('mysubject.list.t');
//mysubjects teacher
Route::get('/mysubjects',  [SubjectController::class, 'index_mysubjects_student'])->middleware(['auth'])->name('mysubject.list.s');

//subject join
Route::get('/subject/{subject}/join',  [SubjectController::class, 'attach'])->middleware(['auth'])->name('subject.attach');
//subject drop
Route::get('/subject/{subject}/drop',  [SubjectController::class, 'detach'])->middleware(['auth'])->name('subject.detach');

//edit subject
Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->middleware(['auth'])->name('subject.edit');
//update subject
Route::put('/subjects/{subject}/update', [SubjectController::class, 'update'])->middleware(['auth'])->name('subject.update');
//delete subject
Route::delete('/subjects/{subject}',[SubjectController::class, 'destroy'])->middleware(['auth'])->name('subject.delete');


//task controller
//Tasks
Route::get('/subject/{subject}/task', [TaskController::class, 'index'])->middleware(['auth'])->name('task.list');
//taskview student
Route::get('/subject/task/{task}/show/s', [TaskController::class, 'showstudent'])->middleware(['auth'])->name('task.shows');
//taskview teacher
Route::get('/subject/task/{task}/show/t', [TaskController::class, 'showteacher'])->middleware(['auth'])->name('task.showt');
//new task
Route::get('/subject/{subject}/task/create', [TaskController::class, 'create'])->middleware(['auth'])->name('task.create');
//store
Route::post('/subject/{subject}/tasks', [TaskController::class, 'store'])->middleware(['auth'])->name('task.store');
//tasks of the same subject
Route::get('/subject/{subject}/tasks',  [TaskController::class, 'index_tasks'])->middleware(['auth'])->name('subject.tasks.list');

//edit task

Route::get('/subject/task/{task}/edit', [TaskController::class, 'edit'])->middleware(['auth'])->name('task.edit');
Route::put('/subject/task/{task}/send', [TaskController::class, 'send'])->middleware(['auth'])->name('task.sendsolution');
//update task
Route::put('/subject/task/{task}/update', [TaskController::class, 'update'])->middleware(['auth'])->name('task.update');

Route::delete('/tasks/{task}',[TaskController::class, 'destroy'])->middleware(['auth'])->name('task.delete');
//show solution task
Route::get('/subject/task/{task}/solution', [TaskController::class, 'showsolution'])->middleware(['auth'])->name('task.solution');

//submissioncontroller
//Tasks submission
Route::get('/subject/tasks/{task}/submission', [SubmissionController::class, 'index'])->middleware(['auth'])->name('submissions.index');
//open submission
Route::get('/subject/task/{task}/submissions/show/', [SubmissionController::class, 'show'])->middleware(['auth'])->name('submission.show');

//store submission
Route::post('/subject/tasks/{task}/submissions', [SubmissionController::class, 'store'])->middleware(['auth'])->name('submission.store');
//checkmyanswer submission student
Route::get('/subject/task/submissions/', [SubmissionController::class, 'showanswer'])->middleware(['auth'])->name('submission.answer');

//edit
Route::get('/subject/task/submission/{submission}/edit', [SubmissionController::class, 'edit'])->middleware(['auth'])->name('submission.edit');

//update
Route::put('/subject/task/submission/{submission}/update', [SubmissionController::class, 'update'])->middleware(['auth'])->name('submission.update');

//my grades

Route::get('/grades', function () {
    return view('student/mygrades',['submissions' => Auth::user()->solutions]);
})->middleware(['auth'])->name('grades');

//other views
Route::view('about', 'about')->name('about');
Route::view('contact', 'contact')->name('contact');
//Route::view('home', 'main')->name('home');





Route::get('/', function () {
    return view('main',['subject' => Subject::all(),'task'=>Task::all(),'user'=>User::all()]);
})->name('main');

Route::get('/dashboard', function () {
    return view('main',['subject' => Subject::all(),'task'=>Task::all(),'user'=>User::all()]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
