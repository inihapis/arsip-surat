<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Institution\InstitutionIndex;
use App\Livewire\InstitutionList;
use App\Livewire\CategoryList;
use App\Livewire\UserList;
use App\Livewire\IncomingLetterList;
use App\Livewire\OutgoingLetterList;

use App\Http\Controllers\ApiDataController;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    // Dashboard route
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Institution routes    
    Route::prefix('institution')->group(function () {
        Route::get('/', InstitutionList::class)->name('institution.index');
        Route::get('/data', [InstitutionList::class, 'getInstitutionsData'])->name('institution.data');

        Route::get('/view/{id}', [InstitutionList::class, 'view'])->name('institution.view');

        Route::get('/edit/{id}', [InstitutionList::class, 'edit'])->name('institution.edit');

        Route::post('/store', [InstitutionList::class, 'store'])->name('institution.store');
        Route::put('/update/{id}', [InstitutionList::class, 'update'])->name('institution.update');

        Route::delete('/delete/{id}', [InstitutionList::class, 'destroy'])->name('institution.destroy');
    });


    // Category routes    
    Route::prefix('category')->group(function () {
        Route::get('/', CategoryList::class)->name('category.index');
        Route::get('/data', [CategoryList::class, 'getCategoriesData'])->name('category.data');  

        Route::get('/view/{id}', [CategoryList::class, 'view'])->name('category.view');

        Route::get('/edit/{id}', [CategoryList::class, 'edit'])->name('category.edit');

        Route::post('/store', [CategoryList::class, 'store'])->name('category.store');
        Route::put('/update/{id}', [CategoryList::class, 'update'])->name('category.update');

        Route::delete('/delete/{id}', [CategoryList::class, 'destroy'])->name('category.destroy');
    });

    // Category routes    
    Route::prefix('user')->group(function () {
        Route::get('/', UserList::class)->name('user.index');
        Route::get('/data', [UserList::class, 'getUsersData'])->name('user.data');  

        Route::get('/view/{id}', [UserList::class, 'view'])->name('user.view');

        Route::get('/edit/{id}', [UserList::class, 'edit'])->name('user.edit');

        Route::post('/store', [UserList::class, 'store'])->name('user.store');
        Route::put('/update/{id}', [UserList::class, 'update'])->name('user.update');

        Route::delete('/delete/{id}', [UserList::class, 'destroy'])->name('user.destroy');
    });
    
    // Incoming Letter routes    
    Route::prefix('incoming-letter')->group(function () {
        Route::get('/', IncomingLetterList::class)->name('incoming-letter.index');
        Route::get('/data', [IncomingLetterList::class, 'getIncomingLettersData'])->name('incoming-letter.data');  
        
        Route::get('/view/{id}', [IncomingLetterList::class, 'view'])->name('incoming-letter.view');

        Route::get('/edit/{id}', [IncomingLetterList::class, 'edit'])->name('incoming-letter.edit');

        Route::post('/upload', [IncomingLetterList::class, 'upload'])->name('incoming-letter.upload');  
        Route::post('/store', [IncomingLetterList::class, 'store'])->name('incoming-letter.store');
        Route::patch('/update/{id}', [IncomingLetterList::class, 'update'])->name('incoming-letter.update');
        Route::delete('/delete/{id}', [IncomingLetterList::class, 'destroy'])->name('incoming-letter.destroy');
    });
    
    // Outgoing Letter routes    
    Route::prefix('outgoing-letter')->group(function () {
        Route::get('/', OutgoingLetterList::class )->name('outgoing-letter.index');
        Route::get('/data', [OutgoingLetterList::class, 'getOutgoingLettersData'])->name('outgoing-letter.data');  
        
        Route::get('/view/{id}', [OutgoingLetterList::class, 'view'])->name('outgoing-letter.view');

        Route::get('/edit/{id}', [OutgoingLetterList::class, 'edit'])->name('outgoing-letter.edit');

        Route::post('/upload', [OutgoingLetterList::class, 'upload'])->name('outgoing-letter.upload');  
        Route::post('/store', [OutgoingLetterList::class, 'store'])->name('outgoing-letter.store');
        Route::patch('/update/{id}', [OutgoingLetterList::class, 'update'])->name('outgoing-letter.update');
        Route::delete('/delete/{id}', [OutgoingLetterList::class, 'destroy'])->name('outgoing-letter.destroy');
    });

    
    // Document Show routes    
    Route::prefix('document')->group(function () {
        Route::get('/incoming_letter/{encryptedId}', [IncomingLetterList::class, 'showDocument'])->name('document.incoming-letter');  
        Route::get('/outgoing_letter/{encryptedId}', [OutgoingLetterList::class, 'showDocument'])->name('document.outgoing-letter');  
    });


    // API Data routes    
    Route::prefix('api')->group(function () {
        Route::get('/dataCategory', [ApiDataController::class, 'getCategoriesData'])->name('api.category');  
        Route::get('/dataInstitution', [ApiDataController::class, 'getInstitutionsData'])->name('api.institution');  
    });

    


});