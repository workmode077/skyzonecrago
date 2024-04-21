<?php
  use Modules\Frontend\Http\Controllers\HomePageController;





  



    Route::get('/track', [HomePageController::class, 'homePage']);
    Route::post('/search-order', [HomePageController::class, 'searchList']);
  


    
   
