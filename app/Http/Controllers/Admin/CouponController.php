<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Validation\CreateCouponValidation;
use App\Models\Coupon;
use Exception;

class CouponController extends Controller
{

    public function index()
    {
        try {
            $data['coupons'] = Coupon::get();
            return view('admin.coupons.list',$data);
        } catch (Exception $e) {
            return redirect('500')->with($e->getMessage());
        }
    }



    public function store(CreateCouponValidation $request)
    {
        try {
            $coupon = new Coupon();
            $coupon->name            = $request->name;
            $coupon->coupon_code     = uniqCode(8);
            $coupon->terms_condition = $request->terms_condition;
            $coupon->status          = $request->status;

            //uploade single image
            if (!empty($request->file('thumbnail')))
                $coupon->thumbnail  = singleFile($request->file('thumbnail'), 'attachment/coupons');

            if ($coupon->save()) {
                return response(['status' => 'success', 'msg' => 'Coupon Created Successfully!']);
            }
            return response(['status' => 'error', 'msg' => 'Coupon Not Created!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }


    public function edit(Coupon $Coupon)
    {
        try {
            die(json_encode($Coupon));
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }

    public function update(CreateCouponValidation $request, Coupon $Coupon)
    {

        try {
            $coupon = $Coupon;
            $coupon->name          = $request->name;
            $coupon->status        = $request->status;

            if (!empty($request->file('thumbnail')))
                $coupon->thumbnail  = singleFile($request->file('thumbnail'), 'attachment/coupons');

            if ($coupon->update())
                return response(['status' => 'success', 'msg' => 'Coupon Updated Successfully!']);

            return response(['status' => 'error', 'msg' => 'Coupon not Updated!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }



    public function couponStatus(Request $request)
    {

        try {
            $coupon = Coupon::find($request->id);
            $coupon->status = (int)$request->status;
            $coupon->save();
            if ($coupon->status == 1)
                return response(['status' => 'success', 'msg' => 'This Coupon is Active!', 'val' => $coupon->status]);

            return response(['status' => 'success', 'msg' => 'This Coupon is Inactive!', 'val' => $coupon->status]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }

    public function destroy($id)
    {
        try {

            $coupon = Coupon::find($id);
            $res = $coupon->delete();
            if ($res)
                return response(['status' => 'success', 'msg' => 'Coupon Removed Successfully!']);

            return response(['status' => 'error', 'msg' => 'Coupon not Removed!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }
}
