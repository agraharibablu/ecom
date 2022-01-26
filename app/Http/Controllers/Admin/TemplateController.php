<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\Template;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Str;
use App\Http\Validation\CreateTemplateValidation;

class TemplateController extends Controller
{

    public function index()
    {
        try {
            $data['templates'] = Template::All();
            return view('admin.template.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with($e->getMessage());
        }
    }

    public function create()
    {
        try {

            return view('admin.template.create');
        } catch (Exception $e) {
            return redirect('500')->with($e->getMessage());
        }
    }


    public function store(CreateTemplateValidation $request)
    {
        try {
            $title = Str::slug($request->title);
            
            $template = new Template();
            $template->title                = $request->title;
            $template->url                  = url("/admin/landing-pages/{$title}");
            $template->template             = $request->template;
            $template->meta_title           = $request->meta_title;
            $template->meta_keyword         = $request->meta_keyword;
            $template->meta_description     = $request->meta_description;
           // $template->status               = 1;

            if ($template->save())
                return response(['status' => 'success', 'msg' => 'Landing Page Added Successfully!']);

            return response(['status' => 'error', 'msg' => 'Landing Page not Added Successfully!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }

    public function show(template $template)
    {
    }

    public function edit($id)
    {

        try {
            $template =  Template::find($id);
            $data['template'] = $template;
            return view('admin.template.edit', $data);
        } catch (Exception $e) {
            return redirect('500')->with($e->getMessage());
        }
    }

    public function update(CreateTemplateValidation $request, $id)
    {

        try {
            $template =  Template::find($id);
            $template->title                = $request->title;
            $template->template             = $request->template;
            $template->meta_title           = $request->meta_title;
            $template->meta_keyword         = $request->meta_keyword;
            $template->meta_description     = $request->meta_description;

            if ($template->update())
                return response(['status' => 'success', 'msg' => 'Landing Page Updated Successfully!']);

            return response(['status' => 'error', 'msg' => 'Landing Page not Updated Successfully!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }

    public function destroy($id)
    {

        try {
            $template = Template::find($id);
            $res =  $template->delete();
            if ($res)
                return response(['status' => 'success', 'msg' => 'Landing Page has been Removed Successfully!']);

            return response(['status' => 'error', 'msg' => 'Landing Page has not Removed!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }

    public function landingtStatus(Request $request)
    {

        try {
            $template = Template::find($request->id);
            $template->status = (int)$request->status;
            $template->save();
            if ($template->status == 1)
                return response(['status' => 'success', 'msg' => 'The Landing Page is Active!', 'val' => $template->status]);

            return response(['status' => 'success', 'msg' => 'This Landing Page is Inactive!', 'val' => $template->status]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }
}
