<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Models\Category;
use App\Models\Product;
use App\Http\Validation\CreateProductValidation;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::All();
        $categories = Category::All();
        return view('admin.products.products')->with('products', $products)->with('categories', $categories);
    }

    public function create(){
       $categories = Category::All();

       return view('admin.products.addproduct')->with('categories', $categories);
    }
 
    public function store(CreateProductValidation $request){

        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
        $product->product_tag = $request->input('product_tag');
        $product->product_description = $request->input('product_description');

        if (!empty($request->file('product_image')))
        $product->product_image  = singleFile($request->file('product_image'), 'attachment');
       
        if (!empty($request->hasFile('product_image1')))
        $product->multi_images  = json_encode(multipleFile($request->file('product_image1'), 'attachment'));
        $product->status = 1;

          if($product->save())
             return response(['status' => 'success', 'msg' => 'The product has been Successfully!']);

          return response(['status' => 'error', 'msg' => 'The product has not Added Successfully!']);
    }
    public function show(product $product)
    {
    }

    public function edit(product $product){

        try {
            $categories = Category::All();

            return view('admin.products.editproduct', compact('product','categories'));
        } catch (Exception $e) {
            return redirect('500');
        }   
    }
   
    public function update(CreateProductValidation $request,$id){

        $product =  Product::find($id); 
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_category = $request->product_category;
        $product->product_tag = $request->product_tag;
        $product->product_description = $request->product_description;

        if (!empty($request->file('product_image')))
        $product->product_image  = singleFile($request->file('product_image'), 'attachment');
      
        if (!empty($request->hasFile('product_image1')))
        $product->multi_images  = json_encode(multipleFile($request->file('product_image1'), 'attachment'));
        if($product->update())
          return response(['status' => 'success', 'msg' => 'The product has been Updated Successfully!']);

        return response(['status' => 'error', 'msg' => 'The product has not Updated Successfully!']);
    }

    public function destroy($id){

        $product = Product::find($id);
       $res =  $product->delete();
        if ($res)
         return response(['status' => 'success', 'msg' => 'The product has been Removed Successfully!']);

        return response(['status' => 'error', 'msg' => 'The product has not Removed!']);
      
    }

    public function ajaxList(Request $request)
    {

        $draw = $request->draw;
        $start = $request->start;
        $length = $request->length;
        $search_arr = $request->search;
        $searchValue = $search_arr['value'];

        // count all data
        $totalRecords = Product::AllCount();

        if (!empty($searchValue)) {
            // count all data
            $totalRecordswithFilter = Product::LikeColumn($searchValue);
            $data = Product::GetResult($searchValue);
        } else {
            // get per page data
            $totalRecordswithFilter = $totalRecords;
            $data = Product::offset($start)->limit($length)->orderBy('created', 'DESC')->get();
        }
        $dataArr = [];
        $i = 1;

        foreach ($data as $val) {
            $action = '<a href="' . url('admin/products/' . $val->_id . '/edit') . '" class="text-info" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="far fa-edit"></i></a>';
            $action .= '<a href="javascript:void(0);" class="text-danger remove_product"  data-toggle="tooltip" data-placement="bottom" title="Remove" product_id="' . $val->_id . '"><i class="fas fa-trash"></i></a>';
            if ($val->status == 1) {
                $status = ' <a href="javascript:void(0);"><span class="badge badge-success activeVer" id="active_' . $val->_id . '" _id="' . $val->_id . '" val="0">Active</span></a>';
            } else {
                $status = ' <a href="javascript:void(0)"><span class="badge badge-danger activeVer" id="active_' . $val->_id . '" _id="' . $val->_id . '" val="1">Inactive</span></a>';
            }

            $dataArr[] = [
                'sl_no'                => $i,
                'product_name'         => ucwords($val->product_name),
                'product_price'        => $val->product_price,
                'product_description'  => $val->product_description,
                'product_category'     => $val->CategoryName['category_name'],
                'product_tag'          => $val->product_tag,
                'product_image'        => $val->product_image,
                'status'               => $status,
                'action'               => $action
            ];
            $i++;
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" =>  $totalRecordswithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $dataArr
        );
        //dd($response);die;
        echo json_encode($response);
        exit;
    }

    public function productStatus(Request $request)
    {

        try {
            $outlet = Product::find($request->id);
            $outlet->status = (int)$request->status;
            $outlet->save();
            if ($outlet->status == 1)
                return response(['status' => 'success', 'msg' => 'The Product is Active!', 'val' => $outlet->status]);

            return response(['status' => 'success', 'msg' => 'This Product is Inactive!', 'val' => $outlet->status]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => 'Something went wrong!!']);
        }
    }


}
