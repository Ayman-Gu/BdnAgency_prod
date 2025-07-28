<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NavigationController;
use App\Livewire\Frontend\ServiceBddPage;
use App\Http\Controllers\DevisController;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
--------------------------------------------------------------------------
 dashboard Routes
--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
});
Route::get('/manage-pages', [DashboardController::class, 'getPagesManager'])->name('dashboard');
Route::get('/manage-blogs', [DashboardController::class ,'getBlogsManager'])->name('blogs-manager');
Route::get('/manage-team', [DashboardController::class ,'getTeamManager'])->name('team-manager');
Route::get('/manage-contact-infos', [DashboardController::class ,'getContactManager'])->name('contact-manager');
Route::get('/newsletter-subscribers', [DashboardController::class ,'getNewsletterSubscribers'])->name('newsletter');
Route::get('/manage-faq', [DashboardController::class ,'getFaqManager'])->name('faq-manager');
Route::get('/manage-services', [DashboardController::class ,'getServicesManager'])->name('services-manager');
Route::get('/manage-projects', [DashboardController::class ,'getProjectsManager'])->name('projects-manager');
Route::get('/manage-testimonials', [DashboardController::class ,'getTestimonialsManager'])->name('testimonials-manager');
Route::get('/manage-pdf-files', [DashboardController::class ,'getPdfManager'])->name('importPdf-manager');
Route::get('/manage-users', [DashboardController::class ,'getUsersManager'])->name('users-manager');
Route::get('/manage-roles', [DashboardController::class ,'getRolesManager'])->name('roles-manager');
Route::get('/manage-permissions', [DashboardController::class ,'getPermissionsManager'])->name('permissions-manager');








require __DIR__.'/auth.php';

/*
--------------------------------------------------------------------------
 pages redirection
--------------------------------------------------------------------------
*/
Route::get('/', [NavigationController::class ,'index'])->name('index');
Route::get('/blog', [NavigationController::class ,'getBlogs'])->name('page.blog');
Route::get('/a-propos', [NavigationController::class ,'getApropos'])->name('a-propos');
Route::get('/service-emailing', [NavigationController::class ,'getServiceEmailing'])->name('serviceEmailing');
Route::get('/service-sms', [NavigationController::class ,'getServiceSMS'])->name('serviceSMS');
Route::get('/service-bdd', [NavigationController::class ,'getServiceBDD'])->name('serviceBDD');
Route::get('/service-newsletter', [NavigationController::class ,'getServiceNewsletter'])->name('serviceNewsletter');
Route::get('/service-visionnaire', [NavigationController::class ,'getServiceVisionnaire'])->name('serviceVisionnaire');
Route::get('/service-Branding', [NavigationController::class ,'getServiceBranding'])->name('serviceBranding');
Route::get('/blog/{id}', [NavigationController::class, 'showSingleBlog'])->name('blog.show');

/*
--------------------------------------------------------------------------
devis
--------------------------------------------------------------------------
*/

Route::post('/devis', [DevisController::class, 'send'])->name('devis.send');
