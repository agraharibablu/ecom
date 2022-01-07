@extends('admin.layouts.app')

@section('content')
@section('page_heading', 'Create Product')

<!-- <div class="cover-loader">
  <div class="loader"></div>
</div> -->

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0">Create Product</h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Product</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<form id="add_product" action="{{ url('admin/products') }}" method="post" enctype="multipart/form-data">
          @csrf
        <div id="put"></div>
          <div class="row">

          <!-- <div class="card card-secondary">
                <div class="card-header card-custom-header">
                    <h3 class="card-title">Create</h3>
                </div> -->

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" name="product_name" class="form-control form-control-sm" id="product_name" placeholder="Enter product name" required>
                    <span id="product_name_msg" class="custom-text-danger"></span>
                 </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Price</label>
                    <input type="number" name="product_price" class="form-control" id="product_price" placeholder="Enter product price" min="1">
                    <span id="product_price_msg" class="custom-text-danger"></span>
                  </div>
                  <div class="form-group">
                    <label>Product category</label>
                   <select  name="product_category" class="form-control select2" style="width: 100%;" id="product_category">
                   <option value=" ">Select</option>
													@foreach($categories as $category)
													<option value="{{ $category->_id }}">{{ ucwords($category->category_name) }}</option>
													@endforeach
                   </select>
                   <span id="product_category_msg" class="custom-text-danger"></span>
                  </div>
                  <div class="form-group">
                    <label for="product_description">Product Description</label>
                    <input type="textarea" name="product_description" class="form-control" id="product_description" placeholder="Enter product Description" rows="3">
                    <span id="product_description_msg" class="custom-text-danger"></span>
                  </div>
                  <div class="form-group">
                    <label for="product_tag">Product Tag</label>
                    <input type="text" name="product_tag" class="form-control form-control-sm" id="product_tag" placeholder="Enter product tag" required>
                    <span id="product_tag_msg" class="custom-text-danger"></span>
                 </div>
                  <label for="exampleInputFile">Product Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="product_image" class="custom-file-input" id="product_image">
                      <span id="product_image_msg" class="custom-text-danger"></span>
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      
                    </div>
                   </div>
                  <label for="exampleInputFile">Add multiple Images</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="product_image1[]" class="custom-file-input" id="product_image1" multiple>
                      <span id="product_image1_msg" class="custom-text-danger"></span>
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      
                    </div>
                  </div>
                </div>
                <!-- <div class="card-footer"> -->
                <div class="form-group text-center">
                <input type="submit" value="Submit" class="btn btn-sm btn-success">
                        <a href="{{ url('admin/products') }}" class="btn btn-sm btn-warning">Back</a> 
                <!-- <input type="submit" class="btn btn-success btn-sm" id="submit_product" value="Submit"> -->
              </div>      
          </div>
        </form>
@push('custom-script')
<script>
    /*start form submit functionality*/
    $("form#add_product").submit(function(e) {
        e.preventDefault();
        formData = new FormData(this);
        var url = $(this).attr('action');
        $.ajax({
            data: formData,
            type: "POST",
            url: url,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('.has-loader').addClass('has-loader-active');
            },
            success: function(res) {
                //hide loader
                $('.has-loader').removeClass('has-loader-active');

                /*Start Validation Error Message*/
                $('span.custom-text-danger').html('');
                $.each(res.validation, (index, msg) => {
                    $(`#${index}_msg`).html(`${msg}`);
                })
                /*Start Validation Error Message*/

                /*Start Status message*/
                if (res.status == 'success' || res.status == 'error') {
                    Swal.fire(
                        `${res.status}!`,
                        res.msg,
                        `${res.status}`,
                    )
                }
                /*End Status message*/

                //for reset all field
                if (res.status == 'success') {
                    $('form#add_product')[0].reset();
                    $('#custom-file-label').html('');
                }
            }
        });
    });

    /*end form submit functionality*/
</script>
@endpush

@endsection