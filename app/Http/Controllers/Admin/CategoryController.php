<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Validation\CreateCategoryValidation;
use App\Models\Category;
use Exception;
class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
       return view('admin.categories.categories')->with('categories', $categories);
    }
 
    public function addcategory(){
     
    }

    public function store(CreateCategoryValidation $request){
      $category = new Category();
      $category->category_name = $request->input('category_name');
      $category->status        = 1;
     
       if (!empty($request->file('category_image')))
       $category->category_image  = singleFile($request->file('category_image'), 'attachment');

      if ($category->save()){  
          return response(['status' => 'success', 'msg' => 'Category Created Successfully!']);
      }
      return response(['status' => 'error', 'msg' => 'Category Not Created!']);
     }

   
    public function edit(Category $Category){
    
     try {
        die(json_encode($Category));
    } catch (Exception $e) {
        return redirect('500');
    }
     } 

    public function update(CreateCategoryValidation $request,Category $Category){
    
            $category = $Category;
          $category->category_name = $request->input('category_name');

          if (!empty($request->file('category_image')))
            $category->category_image  = singleFile($request->file('category_image'), 'attachment');
          if($category->update())
            return response(['status' => 'success', 'msg' => 'Category Updated Successfully!']);

           return response(['status' => 'error', 'msg' => 'Category not Updated!']);
       }  
  
     
    public function ajaxList(Request $request)
    {

        $draw = $request->draw;
        $start = $request->start;
        $length = $request->length;
        $search_arr = $request->search;
        $searchValue = $search_arr['value'];

        // count all data
        $totalRecords = Category::AllCount();
        if (!empty($searchValue)) {
            // count all data
            $totalRecordswithFilter = Category::LikeColumn($searchValue);
            $data = Category::GetResult($searchValue);
        } else {
            // get per page data
            $totalRecordswithFilter = $totalRecords;
            $data = Category::offset($start)->limit($length)->orderBy('created', 'DESC')->get();
        }
        $dataArr = [];
        $i = 1;

        foreach ($data as $val) {
            $action = '<a href="javascript:void(0);" class="text-info edit_category" data-toggle="tooltip" data-placement="bottom" title="Edit" category_id="' . $val->_id . '"><i class="far fa-edit"></i></a>&nbsp;&nbsp;';
            $action .= '<a href="javascript:void(0);" class="text-danger remove_category"  data-toggle="tooltip" data-placement="bottom" title="Remove" category_id="' . $val->_id . '"><i class="fas fa-trash"></i></a>';

            if ($val->status == 1) {
                $status = ' <a href="javascript:void(0);"><span class="badge badge-success activeVer" id="active_' . $val->_id . '" _id="' . $val->_id . '" val="0">Active</span></a>';
            } else {
                $status = ' <a href="javascript:void(0)"><span class="badge badge-danger activeVer" id="active_' . $val->_id . '" _id="' . $val->_id . '" val="1">Inactive</span></a>';
            }

           
            $dataArr[] = [
                'sl_no'             => $i,
                'category_name'     => $val->category_name,
                'category_image'     => $val->category_image,
                'status'            => $status,
                'action'            => $action
            ];
            $i++;
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" =>  $totalRecordswithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $dataArr
        );
        echo json_encode($response);
        exit;
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
            return response(['status' => 'error', 'msg' => 'Something went wrong!!']);
        }
    }
        
    public function destroy($id){

     $category = Category::find($id);
         $res = $category->delete();
     if ($res)
     return response(['status' => 'success', 'msg' => 'Category Removed Successfully!']);
     
     return response(['status' => 'error', 'msg' => 'Category not Removed!']);
}  
  



}
