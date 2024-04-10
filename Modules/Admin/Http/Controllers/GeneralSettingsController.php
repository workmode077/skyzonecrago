<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\GeneralSettings;
use Modules\Admin\Http\Requests\GeneralSettingsRequest;

class GeneralSettingsController extends Controller
{
    public function generalSettingsPage()
    {
        $data   =GeneralSettings::first();
        return view('admin::generalsettings.generalsettings',['data' => $data]);      
    }
    public function generalSettingsUpdate(GeneralSettingsRequest $request)
    {
        $updateGeneralSettings = (new GeneralSettings())->updateGeneralSettings($request);
        return redirect('admin/generalsettings')->with('status', 'Updated Successfully.');    
    }
}
