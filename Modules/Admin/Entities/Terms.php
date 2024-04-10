<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Terms extends Model
{
    use HasFactory;

    protected $fillable = ['title','description'];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\TermsFactory::new();
    }
    public function updateTerms($request)      //Update Method
    {
        $settings = self::first(); // Retrieve the first record from the table

        if ($settings) {
              self::where('id',$settings->id)->update([
                    'title'     => $request->title,
                    'description'     => $request->description,
                ]);  
        }else{
            $create = self::create([
                'title'  => $request->title,
                'description' => $request->description,
         ]);
        }
     }
}
