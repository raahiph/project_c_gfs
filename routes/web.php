<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    HomeController,
    CustomerController,
    ProductController,
    UnitTypeController,
    SupplierController,
    CategoryController,
    SaleController,
    UserController,
};

use App\Http\Middleware\Role\CustomerMiddlware;

Auth::routes();

Route::get('/', function () {
    return redirect('login');
});

Route::get('/delivery_note', function () {
    return view('delivery_note');
});

Route::get('/home', [HomeController::class, 'index'])->name('dashboard');

Route::middleware(['auth', 'is_active'])->group(function () {

    // Route::middleware(['admin'])->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/customers', CustomerController::class);
    Route::resource('/products', ProductController::class);

    Route::resource('/unit_types', UnitTypeController::class);
    Route::resource('/suppliers', SupplierController::class);
    Route::resource('/categories', CategoryController::class);

    Route::resource('/sales', SaleController::class);
    Route::get('requested', [SaleController::class, 'requestedView'])->name('requested');
    Route::get('delivered', [SaleController::class, 'deliveredView'])->name('delivered');
    Route::get('approved', [SaleController::class, 'approvedView'])->name('approved');
    Route::get('/sales/approved/{id}', [SaleController::class, 'statusUpdateApproved'])->name('sales.approved');
    Route::put('/sales/delivered/{id}', [SaleController::class, 'imageUploadDelivered'])->name('sales.delivered');
    Route::get('/generate/receipt/pdf/{id}', [SaleController::class, 'generatePDF'])->name('generate.receipt');

    Route::get('/edit-sale/{id}', [SaleController::class, 'edit_sale']);
    Route::put('update-sale', [SaleController::class, 'update_sale']);


    //});

    // Route::middleware(['inventory'])->group(function () {

    //     Route::prefix('inventory')->group(function () {

    //         Route::resource('/customers', CustomerController::class);

    //     });

    // });


    // Route::middleware(['prefix'=>'staff','as'=>'staff.','middleware'=>'staff'])->group(function () {

    // });

});
