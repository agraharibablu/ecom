<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Validation\CreateBannerValidation;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; 
use Exception;

class BannerController extends Controller
{

    public function index()
    {
        try {
            $data['banners'] = Banner::get();
            return view('admin.banner.list',$data);
        } catch (Exception $e) {
            return redirect('500')->with($e->getMessage());
        }
    }



    public function store(CreateBannerValidation $request)
    {
        try {

            $banner = new Banner();
            $banner->name               = $request->name;
            $banner->status             = $request->status;
            $banner->image              = $request->image;
            $banner->url               = $request->url;      
            
            //uploade single image
            if (!empty($request->file('thumbnail')))
                $banner->thumbnail  = singleFile($request->file('thumbnail'), 'attachment/Banner');

            if ($banner->save()) {
                return response(['status' => 'success', 'msg' => 'Banner Created Successfully!']);
            }
            return response(['status' => 'error', 'msg' => 'Banner Not Created!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }


    public function edit(Banner $Banner)
    {
        try {
            die(json_encode($Banner));
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }

    public function update(CreateBannerValidation $request, Banner $Banner)
    {

        try {
         
            $banner = $Banner;
            $banner->name               = $request->name;
            $banner->status             = $request->status;
            $banner->image              = $request->image;
            $banner->url               = $request->url;

            if (!empty($request->file('thumbnail')))
                $banner->thumbnail  = singleFile($request->file('thumbnail'), 'attachment/Banner');

            if ($banner->update())
                return response(['status' => 'success', 'msg' => 'Banner Updated Successfully!']);

            return response(['status' => 'error', 'msg' => 'Banner not Updated!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }



    public function bannerStatus(Request $request)
    {

        try {
            $banner = Banner::find($request->id);
            $banner->status = (int)$request->status;
            $banner->save();
            if ($banner->status == 1)
                return response(['status' => 'success', 'msg' => 'This Banner is Active!', 'val' => $banner->status]);

            return response(['status' => 'success', 'msg' => 'This Banner is Inactive!', 'val' => $banner->status]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }

    public function destroy($id)
    {
        try {

            $banner = Banner::find($id);
            Storage::delete('public/banner/'.$banner->image);
            $res = $banner->delete();
            if ($res)
                return response(['status' => 'success', 'msg' => 'Banner Removed Successfully!']);

            return response(['status' => 'error', 'msg' => 'Banner not Removed!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }
}
