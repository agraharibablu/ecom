<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Validation\CreateProductValidation;

class ProductController extends Controller
{

    public function index()
    {
        try {
            $data['products'] = Product::where('status', 1)->get();
            return view('admin.product.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with($e->getMessage());
        }
    }

    public function create()
    {
        try {
            $data['categories'] = Category::where('status', "1")->get();

            return view('admin.product.create', $data);
        } catch (Exception $e) {
            return redirect('500')->with($e->getMessage());
        }
    }


    public function store(CreateProductValidation $request)
    {

        try {
            $product = new Product();
            $product->product_name = $request->product_name;
            $product->price       = $request->price;
            $product->category    = $request->category;
            $product->tag         = $request->tag;
            $product->description = $request->description;
            $product->status      = 1;

            //for uploading single image
            if (!empty($request->file('thumbnail')))
                $product->thumbnail = singleFile($request->file('thumbnail'), 'attachment/product');

            //for uploadign multi image
            if (!empty($request->hasFile('images')))
                $product->images  = json_encode(multipleFile($request->file('images'), 'attachment/product'));

            if ($product->save())
                return response(['status' => 'success', 'msg' => 'Prodcut Added Successfully!']);

            return response(['status' => 'error', 'msg' => 'Product not Added Successfully!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }

    public function show(product $product)
    {
    }

    public function edit(product $product)
    {

        try {
            $data['categories'] = Category::where('status',"1")->get();
            $data['product'] = $product;
            return view('admin.product.edit', $data);
        } catch (Exception $e) {
            return redirect('500')->with($e->getMessage());
        }
    }

    public function update(CreateProductValidation $request, $id)
    {

        try {
            $product =  Product::find($id);
            $product->product_name = $request->product_name;
            $product->price       = $request->price;
            $product->category    = $request->category;
            $product->tag         = $request->tag;
            $product->description = $request->description;

            //for single product update
            if (!empty($request->file('thumbnail')))
                $product->thumbnail  = singleFile($request->file('thumbnail'), 'attachment/product');

            //for multi product update
            if (!empty($request->hasFile('images')))
                $product->images  = json_encode(multipleFile($request->file('images'), 'attachment/product'));

            if ($product->update())
                return response(['status' => 'success', 'msg' => 'Product Updated Successfully!']);

            return response(['status' => 'error', 'msg' => 'Product not Updated Successfully!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }

    public function destroy($id)
    {

        try {
            $product = Product::find($id);
            $res =  $product->delete();
            if ($res)
                return response(['status' => 'success', 'msg' => 'Product has been Removed Successfully!']);

            return response(['status' => 'error', 'msg' => 'Product has not Removed!']);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }

    public function productStatus(Request $request)
    {

        try {
            $product = Product::find($request->id);
            $product->status = (int)$request->status;
            $product->save();
            if ($product->status == 1)
                return response(['status' => 'success', 'msg' => 'The Product is Active!', 'val' => $product->status]);

            return response(['status' => 'success', 'msg' => 'This Product is Inactive!', 'val' => $product->status]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'msg' => errorMsg($e->getMessage())]);
        }
    }
}
