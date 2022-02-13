<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Validation\CreateCategoryValidation;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{

    public function index()
    {
        try {
            $data['categories'] = Category::get();
            return view('admin.category.list',$data);
        } catch (Exception $e) {
            return redirect('500')->with($e->getMessage());
        }
    }



    public function store(CreateCategoryValidation $request)
    {
        try {
            $category = new Category();
            $category->category_name      = $request->category_name;
            $category->status             = $request->status;
            $category->meta_title         = $request->meta_title;
            $category->meta_keyword       = $request->meta_keyword;
            $category->meta_description   = $request->meta_description;
            //uploade single image
            if (!empty($request->file('thumbnail')))
                $category->thumbnail  = singleFile($request->file('thumbnail'), 'attachment/category');

            if ($category->save()) {
                return response(['status' => 'success', 'msg' => 'Category Created Successfully!']);
            }
            return response(['status' => 'error', 'msg' => 'Category Not Created!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }


    public function edit(Category $Category)
    {
        try {
            die(json_encode($Category));
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }

    public function update(CreateCategoryValidation $request, Category $Category)
    {

        try {
            $category = $Category;
            $category->category_name      = $request->category_name;
            $category->status             = $request->status;
            $category->meta_title         = $request->meta_title;
            $category->meta_keyword       = $request->meta_keyword;
            $category->meta_description   = $request->meta_description;

            if (!empty($request->file('thumbnail')))
                $category->thumbnail  = singleFile($request->file('thumbnail'), 'attachment/category');

            if ($category->update())
                return response(['status' => 'success', 'msg' => 'Category Updated Successfully!']);

            return response(['status' => 'error', 'msg' => 'Category not Updated!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }



    public function categoryStatus(Request $request)
    {

        try {
            $category = Category::find($request->id);
            $category->status = (int)$request->status;
            $category->save();
            if ($category->status == 1)
                return response(['status' => 'success', 'msg' => 'This Category is Active!', 'val' => $category->status]);

            return response(['status' => 'success', 'msg' => 'This Category is Inactive!', 'val' => $category->status]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }

    public function destroy($id)
    {
        try {

            $category = Category::find($id);
            $res = $category->delete();
            if ($res)
                return response(['status' => 'success', 'msg' => 'Category Removed Successfully!']);

            return response(['status' => 'error', 'msg' => 'Category not Removed!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }
}
