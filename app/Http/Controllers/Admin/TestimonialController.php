<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Validation\CreateTestimonialValidation;
use App\Models\Testimonial;
use Exception;

class TestimonialController extends Controller
{

    public function index()
    {
        try {
            $data['testimonials'] = Testimonial::get();
            return view('admin.testimonial.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with($e->getMessage());
        }
    }



    public function store(CreateTestimonialValidation $request)
    {
        try {
            $testimonial = new Testimonial();

            $testimonial->title           = $request->title;
            $testimonial->name            = $request->name;
            $testimonial->designation     = $request->designation;
            $testimonial->description     = $request->description;
            $testimonial->status          = $request->status;

            if ($testimonial->save()) {
                return response(['status' => 'success', 'msg' => 'Testimonial Created Successfully!']);
            }
            return response(['status' => 'error', 'msg' => 'Testimonial Not Created!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }


    public function edit(Testimonial $Testimonial)
    {
        try {
            die(json_encode($Testimonial));
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }

    public function update(CreateTestimonialValidation $request, Testimonial $Testimonial)
    {

        try {
            $testimonial = $Testimonial;
            $testimonial->title           = $request->title;
            $testimonial->name            = $request->name;
            $testimonial->designation     = $request->designation;
            $testimonial->description     = $request->description;
            $testimonial->status          = $request->status;


            if ($testimonial->update())
                return response(['status' => 'success', 'msg' => 'Testimonial Updated Successfully!']);

            return response(['status' => 'error', 'msg' => 'Testimonial not Updated!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }



    public function testimonialStatus(Request $request)
    {

        try {
            $testimonial = Testimonial::find($request->id);
            $testimonial->status = (int)$request->status;
            $testimonial->save();
            if ($testimonial->status == 1)
                return response(['status' => 'success', 'msg' => 'This Testimonial is Active!', 'val' => $testimonial->status]);

            return response(['status' => 'success', 'msg' => 'This Testimonial is Inactive!', 'val' => $testimonial->status]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }

    public function destroy($id)
    {
        try {

            $testimonial = Testimonial::find($id);
            $res = $testimonial->delete();
            if ($res)
                return response(['status' => 'success', 'msg' => 'Testimonial Removed Successfully!']);

            return response(['status' => 'error', 'msg' => 'Testimonial not Removed!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }
}
