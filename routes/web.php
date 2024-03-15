<?php

use App\Models\Job;
use App\Models\About;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\BlogPost;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\EmployerAuthController;
use App\Http\Controllers\ResumeParserController;
use App\Http\Controllers\CandidateAuthController;
use App\Http\Controllers\JobPostControllerUpdate;
use App\Http\Controllers\EmployerProfileController;
use App\Http\Controllers\CandidateProfileController;
use App\Http\Controllers\Auth\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');






Route::get('/', function () {
    return view('pages.index');
});








// Admin authentication routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');

    // admin dashboard route
    Route::get('/dashboard', function () {
        return view('pages.admin.adminWelcome');
    })->name('admin.dashboard');

    //companies route
    Route::get('/companies',[CompanyController::class,'index'])->name('companies');
    Route::get('/companies/{id}/edit', [CompanyController::class, 'editCompany'])->name('companies.edit');
    Route::put('/companies/{id}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/companies/{id}', [CompanyController::class, 'deleteCompany'])->name('companies.delete');

    // routes for admin jobs
    Route::get('/jobs', [JobController::class, 'showList'])->name('admin.jobs');
    Route::get('/jobs/{id}/edit', [JobController::class, 'editJobs'])->name('jobs.edit');
    Route::put('/jobs/{id}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{id}', [JobController::class, 'deleteJobs'])->name('admin.jobs.delete');


    //admin employees
    Route::get('employees',[EmployerController::class,'employeeList'])->name("admin.employees");
    Route::get('/employees/{id}/edit', [EmployerController::class, 'editEmployees'])->name('employees.edit');
    Route::put('/employees/{id}', [EmployerController::class, 'update'])->name('employees.update');
    Route::delete('employees/{id}', [EmployerController::class, 'deleteEmployee'])->name('admin.employees.delete');



    // Route::get('/plugins', function () {
    //     $employers = Employer::all();
    //     return view('pages.admin.plugins', compact('employers'));
    // })->name('admin.plugins');

    Route::get('/plugins',[ResumeParserController::class,'view'])->name('admin.plugins');
    // Route::post('/parse-resume', [ResumeParserController::class, 'parse']);

    //accounts route
    Route::get('accounts', [AdminProfileController::class, 'view'])->name('admin.accounts');
    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});


//blogs route
Route::prefix("blogs")->group(function () {

    Route::get('/categories', function () {
        return view('pages.admin.categories');
    })->name('blogs.categories');

    Route::get('/posts', [BlogPostController::class, 'index'])->name('blogs.index');
    Route::get('/posts/create', [BlogPostController::class, 'create'])->name('blogs.create');
    Route::post('/posts', [BlogPostController::class, 'store'])->name('blogs.store');
    Route::get('/posts/{id}', [BlogPostController::class, 'show'])->name('blogs.show');
    Route::get('/posts/{id}/edit', [BlogPostController::class, 'edit'])->name('blogs.edit');
    Route::put('/posts/{id}', [BlogPostController::class, 'update'])->name('blogs.update');
    Route::delete('/posts/{id}', [BlogPostController::class, 'destroy'])->name('blogs.destroy');
});


//pages route
Route::prefix("pages")->group(function () {

    Route::get('/about', [AdminAuthController::class, 'edit'])->name('pages.about');
    Route::post('/about/update', [AdminAuthController::class, 'update'])->name('admin.about.update');


    Route::get('/contact', function () {
        return view('pages.admin.contact');
    })->name('pages.contact');
});















//for employer
Route::prefix('employer')->group(function () {
    Route::get('/login', [EmployerAuthController::class, 'showLoginForm'])->name('employer.login');
    Route::post('/login', [EmployerAuthController::class, 'login']);
    Route::get('/register', [EmployerAuthController::class, 'showRegistrationForm'])->name('employer.register');
    Route::post('/register', [EmployerAuthController::class, 'register']);

    // "Login with Google" routes
    Route::get('/google/login', [EmployerAuthController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/google/callback', [EmployerAuthController::class, 'handleGoogleCallback']);

    // Route for Google signup
    Route::get('/signup/google', [EmployerAuthController::class, 'redirectToGoogle'])->name('google.signup');
    Route::get('/signup/google/callback', [EmployerAuthController::class, 'handleGoogleCallback']);

    // Employer dashboard route
    Route::get('/dashboard', [JobController::class, 'view'])->name('employer.dashboard')->middleware('auth');

    // Route for editing a job post
    Route::get('/job/{id}/edit', [JobPostControllerUpdate::class, 'edit'])->name('job.edit');

    // Route for updating a job post
    Route::put('job/{id}', [JobPostControllerUpdate::class, 'update'])->name('job.update');

    // Employer jobs route
    Route::get('/jobs/post', [JobController::class, 'create'])->name('jobs.post');
    Route::post('/jobs/post', [JobController::class, 'store'])->name('jobs.store');

    //blogs route 
    Route::get('/blogs', [BlogController::class, 'showEmployer'])->name('employer.blogs');

    // Employer plugin route
    Route::get('/plugins', function () {
        return view('pages.employer.plugins');
    })->name('plugins');


    //accounts route
    Route::get('accounts', [EmployerProfileController::class, 'view'])->name('employer.accounts');

    //edit/update routes
    Route::get('/profile/edit', [EmployerProfileController::class, 'edit'])->name('employer.profile.edit');
    Route::post('/profile/update', [EmployerProfileController::class, 'update'])->name('employer.profile.update');
});
















//for candidate
Route::prefix('candidate')->group(function () {
    Route::get('/login', [CandidateAuthController::class, 'showLoginForm'])->name('candidate.login');
    Route::post('/login', [CandidateAuthController::class, 'login']);
    Route::get('/register', [CandidateAuthController::class, 'showRegistrationForm'])->name('candidate.register');
    Route::post('/register', [CandidateAuthController::class, 'register']);

    // Candidate dashboard route
    Route::get('/dashboard', function () {
        return view('pages.candidate.candidateWelcome');
    })->name('candidate.dashboard')->middleware('auth');

    // "Login with Google" routes
    Route::get('/google/login', [CandidateAuthController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/google/callback', [CandidateAuthController::class, 'handleGoogleCallback']);

    // Route for Google signup
    Route::get('/signup/google', [CandidateAuthController::class, 'redirectToGoogle'])->name('google.signup');
    Route::get('/signup/google/callback', [CandidateAuthController::class, 'handleGoogleCallback']);

    Route::get('/jobs', [JobController::class, 'index'])->name('candidate.jobs');
    Route::get('/jobpage2', [JobController::class, 'nextPage'])->name('candidate.nextpage');
    Route::get('/apply', [JobController::class, 'apply'])->name('candidate.apply');
    Route::post('/submit-resume', [JobController::class, 'submit'])->name('candidate.submit');

    // Settings candidate routes
    Route::get('/profile', function () {
        return view('pages.candidate.profile');
    })->name('candidate.profile');

    // Route for editing candidate profile
    Route::get('/profile/edit', [CandidateProfileController::class, 'edit'])->name('candidate.profile.edit');
    Route::post('/profile/update', [CandidateProfileController::class, 'update'])->name('candidate.profile.update');

    //blog routes
    Route::get('/blogs', [BlogController::class, 'showCandidate'])->name('candidate.blogs');
});

Route::get('/about', function () {
    $about = About::first();
    return view('pages.candidate.about', compact('about'));
})->name('about');

Route::get('/contact', function () {
    return view('pages.candidate.contact');
})->name('contact');

Route::post('contact', [ContactController::class, 'send'])->name('contact.send');

Auth::routes();





Route::get('email/verify', [VerificationController::class, 'show'])
    ->name('verification.notice')
    ->middleware('auth'); // Ensure authentication middleware is applied

Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed', 'verification.verify'])
    ->name('verification.verify');

Route::post('email/resend', [VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1']) // Apply auth and throttle middleware
    ->name('verification.resend');
