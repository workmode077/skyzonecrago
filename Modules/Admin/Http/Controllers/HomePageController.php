<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\GeneralSettings;
use App\Traits\LogError;

class HomePageController extends Controller
{
   
    use LogError;
    
    public function homePage()
    {
        try {
            return view('admin::website.home');  
        } catch (\Exception $e) {
            $this->logError($e); 
            return view('frontend::404')->with('error','something went wrong');
        }
    }
}
