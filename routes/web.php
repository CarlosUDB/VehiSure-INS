<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IncidentController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Incident;
use App\Models\Workshop;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $userCount = User::count();
    $workCount = Workshop::count();
    $incidentCount = Incident::count();
    return view('dashboard', compact('userCount', 'workCount', 'incidentCount'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('autocomplete', [IncidentController::class, 'autocomplete'])->name('autocomplete');

    Route::get('incidents/search-car-part', [IncidentController::class, 'searchCarPartIndex'])->name('incidents.searchCarPartIndex');
    Route::get('incidents/purchasedParts', [IncidentController::class, 'incidentsPurchasedParts'])->name('incidents.authorize');
    Route::patch('incidents/authorize/{incident}', [IncidentController::class, 'updateAuthorizedIncident'])->name('incidents.authorizeIncident');
    Route::get('incidents/requisitions', [IncidentController::class, 'requisitions'])->name('incidents.requisitions');
    Route::get('incidents/search-car-part/{incident}', [IncidentController::class, 'searchCarPartView'])->name('incidents.searchCarPartView');

    Route::resource('incidents', IncidentController::class);
    Route::get('incidents/diagnose/{incident}', [IncidentController::class, 'diagnoseView'])->name('incidents.diagnose');
    Route::post('incidents/diagnose/complete/{incident}', [IncidentController::class, 'completeDiagnose'])->name('incidents.completeDiagnose');
    Route::post('incidents/requisition/complete/{incident}', [IncidentController::class, 'completeRequisition'])->name('incidents.completeRequisition');


});

require __DIR__.'/auth.php';
