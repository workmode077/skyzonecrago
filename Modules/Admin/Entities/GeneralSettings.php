<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GeneralSettings extends Model
{
    use HasFactory;

    protected $fillable = ['logo','favicon'];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\GeneralSettingsFactory::new();
    }
    public function updateGeneralSettings($request)      //Update Method
    {
       

        $settings = self::first(); // Retrieve the first record from the table

        if ($settings) {

              if($request->file('logo')) {
                self::where('id',$settings->id)->update([
                    'logo'     => $request->file('logo')->store('logo'),
                ]);  
            } 
             if($request->file('favicon')) {
                self::where('id',$settings->id)->update([
                    'favicon'     => $request->file('favicon')->store('favicon'),
                ]);  
            }
            $settings->save(); // Save the updated record
        }else{
            
            $logo ="";$favicon="";
            if($request->file('logo')) {
                $logo    = $request->file('logo')->store('logo');
            }
            if($request->file('favicon')) {
                  $favicon     = $request->file('favicon')->store('favicon');
            }
            $create = self::create([
                'logo'             => $logo,
                'favicon'            => $favicon,
         ]);
        }
     }
}
