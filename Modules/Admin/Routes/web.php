<?php
use Modules\Admin\Http\Controllers\RoleController;
use Modules\Admin\Http\Controllers\AdminUserController;
use Modules\Admin\Http\Controllers\HomePageController;

use Modules\Admin\Http\Controllers\CourierController;


    Route::prefix('admin')->group(function() {
        Route::get('/login', [AdminUserController::class, 'index']);
        Route::post('/login', [AdminUserController::class, 'login'])->name('admin.login');
        Route::get('/logout', [AdminUserController::class, 'logout'])->name('admin.logout');
            Route::group(['middleware' => 'admin_auth:admin'], function(){
                Route::middleware(['permission:Dashboard,uses'])->group(function(){
                    Route::get('/dashboard', [AdminUserController::class, 'dashboard'])->name('admin.dashboard');
                });
                Route::middleware(['permission:Admin,uses'])->group(function(){
                    Route::prefix('roles')->group(function() {
                         Route::get('/', [RoleController::class, 'roles'])->name('roles');
                         Route::get('list', [RoleController::class, 'roleList'])->name('roles.list');
                         Route::get('/add', [RoleController::class, 'addRole'])->name('add.roles');
                         Route::post('/add', [RoleController::class, 'store'])->name('roles.store');
                         Route::get('/edit/{id}', [RoleController::class, 'editRole'])->name('edit.roles');
                         Route::post('/edit/{id}', [RoleController::class, 'update'])->name('roles.update');
                         Route::get('/delete/{id}', [RoleController::class, 'delete']);
                         Route::post('/status', [RoleController::class, 'statusUpdate']);
                    });
                    Route::prefix('adminuser')->group(function() {
                         Route::get('/', [AdminUserController::class, 'list'])->name('adminuser');
                         Route::get('list', [AdminUserController::class, 'adminList']);
                         Route::get('/create', [AdminUserController::class, 'adminView']);
                         Route::post('/create', [AdminUserController::class, 'adminStore'])->name('adminuser.store');
                         Route::get('/edit/{id}', [AdminUserController::class, 'adminEdit']);
                         Route::post('/edit/{id}', [AdminUserController::class, 'adminUpdate'])->name('adminuser.update');
                         Route::get('/delete/{id}', [AdminUserController::class, 'adminDelete']);
                         Route::post('/status', [AdminUserController::class, 'adminStatusUpdate']);
                    });

                    

                    Route::middleware(['permission:Settings,uses'])->group(function(){

                        Route::prefix('courier')->group(function() {
                            Route::get('/', [CourierController::class, 'list'])->name('two-wheeler');
                            Route::get('list', [CourierController::class, 'courierList']);
                            Route::get('/create', [CourierController::class, 'courierView']);
                            Route::post('/create', [CourierController::class, 'courierStore'])->name('courier.store');
                            Route::get('/edit/{id}', [CourierController::class, 'courierEditView']);
                            Route::post('/edit/{id}', [CourierController::class, 'courierUpdate'])->name('courier.update');
                            Route::get('/delete/{id}', [CourierController::class, 'courierDelete']);
                            Route::post('/status', [CourierController::class, 'courierStatusUpdate']);

                           



                            Route::get('/delivery-status/{id}', [CourierController::class, 'deliveryStatusEditView']);

                            Route::post('/delivery-pickup/{id}', [CourierController::class, 'deliveryStatusPickUpUpdate'])->name('delivery-status-pickup.update');

                            Route::post('/delivery-booked/{id}', [CourierController::class, 'deliveryStatusBookedUpdate'])->name('delivery-status-booked.update');

                            Route::post('/delivery-on-his-way/{id}', [CourierController::class, 'deliveryStatusOnHisWayUpdate'])->name('delivery-status-on-his-way.update');

                            Route::post('/delivery-at-destination/{id}', [CourierController::class, 'deliveryStatusAtDestinationUpdate'])->name('delivery-status-at-detination.update');
                           
                            Route::post('/delivery-out-of-delivery/{id}', [CourierController::class, 'deliveryStatusOutOfDeliveryUpdate'])->name('delivery-status-out-of-delivery.update');
                           
                            Route::post('/delivery-delivered/{id}', [CourierController::class, 'deliveryStatusDeliveredUpdate'])->name('delivery-status-delivered.update');

                            Route::post('/delivery-cancel/{id}', [CourierController::class, 'deliveryStatusCanceledUpdate'])->name('order-cancel.update');
                            
                        });


                       











                        Route::prefix('generalsettings')->group(function() {                           
                            Route::get('/', [GeneralSettingsController::class, 'generalSettingsPage'])->name('generalsettings');
                            Route::post('/generalsettings', [GeneralSettingsController::class, 'generalSettingsUpdate'])->name('generalsettings.update');
                        });
                        Route::prefix('privacy')->group(function() {                           
                            Route::get('/', [PrivacyController::class, 'generalSettingsPage'])->name('privacy');
                            Route::post('/privacy', [PrivacyController::class, 'privacyUpdate'])->name('privacy.update');
                        });
                        Route::prefix('terms')->group(function() {                            
                            Route::get('/', [TermsController::class, 'generalSettingsPage'])->name('terms');
                            Route::post('/terms', [TermsController::class, 'termsUpdate'])->name('terms.update');
                        });
                    });
                });
            });
    });
