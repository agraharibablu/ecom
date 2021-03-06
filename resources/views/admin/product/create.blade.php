@extends('admin.layouts.app')

@section('content')
@section('page_heading', 'Create Product')

<div class="cover-loader d-none">
  <div class="loader"></div>
</div>

<div id="page-loader">
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

  <div class="card p-2">
    <form id="add_product" action="{{ url('admin/product') }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="row">
        <div class="col-md-6">

          <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" name="product_name" class="form-control" id="name" placeholder="Enter Product Name">
            <span id="product_name_msg" class="custom-text-danger"></span>
          </div>

          <div class="form-group">
            <label for="tag">Tag</label>
            <input type="text" name="tag" class="form-control" id="tag" placeholder="Enter product tag" required>
            <span id="tag_msg" class="custom-text-danger"></span>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="Enter Product Price">
            <span id="price_msg" class="custom-text-danger"></span>
          </div>

          <div class="form-group">
            <label>Category</label>
            <select name="category" class="form-control" id="category">
              <option value="">Select</option>
              @foreach($categories as $category)
              <option value="{{ $category->_id }}">{{ ucwords($category->category_name) }}</option>
              @endforeach
            </select>
            <span id="category_msg" class="custom-text-danger"></span>
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" placeholder="Enter Description" rows="5"></textarea>
            <span id="description_msg" class="custom-text-danger"></span>
          </div>
        </div>

        <div class="col-md-6">

          <div><img src="{{ asset('attachment/no-image.webp') }}" id="avatar" style="height:50px"></div>

          <label for="exampleInputFile">Thumbnail</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="thumbnail" class="custom-file-input" id="imgInp" accept="image/png, image/gif, image/jpeg">
              <span id="thumbnail_msg" class="custom-text-danger"></span>
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
          <label for="exampleInputFile">Multi Image</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="images[]" class="custom-file-input" id="images" multiple>
              <span id="images_msg" class="custom-text-danger"></span>
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status" id="status">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group text-center">
            <input type="submit" value="Submit" class="btn btn-sm btn-success">
            <a href="{{ url('admin/product') }}" class="btn btn-sm btn-warning">Back</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
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
        $('.cover-loader').removeClass('d-none');
        $('#page-loader').hide();
      },
      success: function(res) {
        //hide loader
        $('.cover-loader').addClass('d-none');
        $('#page-loader').show();

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