<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Validation\CreateSettingValidation;

class SettingController extends Controller
{

    public function index()
    {
        try {
            $data['setting'] = Setting::Where('_id','6209068aadb21cf188f1c438')->first();
         
            return view('admin.setting.edit', $data);
        } catch (Exception $e) {
            return redirect('500')->with($e->getMessage());
        }
    }


    public function update(CreateSettingValidation $request,$id)
    {

        try {
            $template =  Setting::find($id);
            $template->email       = $request->email;
            $template->facebook    = $request->facebook;
            $template->instagram   = $request->instagram;
            $template->youtube     = $request->youtube;
            $template->linkedin    = $request->linkedin;
            $template->twitter    = $request->twitter;

            if ($template->update())
                return response(['status' => 'success', 'msg' => 'Media Settings Updated Successfully!']);

            return response(['status' => 'error', 'msg' => 'Media Settings not Updated Successfully!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }


}
