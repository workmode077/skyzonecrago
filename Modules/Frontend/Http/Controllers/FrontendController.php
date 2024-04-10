<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Traits\LogError;

class FrontendController extends Controller
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
            $txt = $request->input('txt');
            $products = Product::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($txt) . '%'])->get();


        // Assuming each product has 'name' and 'slug' attributes
        $productData = $products->map(function ($product) {
            return [
                'name' => $product->name,
                'slug' => $product->slug,
            ];
        });

        return response()->json(['result' => 'success', 'data' => $productData]);
        } catch (Exception $e) {
            $this->logError($e); 
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
