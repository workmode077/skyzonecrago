<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Courier;
use App\Traits\LogError;


class HomePageController extends Controller
{
    use LogError;
    
    public function homePage()
    {
        try {
            return view('frontend::index');
        } catch (\Exception $e) {
            $this->logError($e); 
            return view('frontend::404')->with('error','something went wrong');
        }
    }
    public function searchList(Request $request)
    {
        try {
            $order_id = $request->order_id;
            $courier = Courier::where('id',$order_id)->first();
        return response()->json(['result' => 'success', 'data' => $courier]);
        } catch (Exception $e) {
            $this->logError($e); 
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
   
}
