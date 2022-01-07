@extends('admin.layouts.app')

@section('content')
@section('page_heading', 'Products List')

<div class="row">
  <div class="col-12 mt-2">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Products List</h3>
        <div class="card-tools">
        <a href="{{ url('admin/products/create') }}" class="btn btn-sm btn-success mr-2"><i class="fas fa-plus-circle"></i>&nbsp;Add</a>
        <!-- <a href="javascript:void(0);" class="btn btn-sm btn-success mr-4" id="create_product"><i class="fas fa-plus-circle"></i>&nbsp;Add</a> -->
        </div>
      </div>

      <!-- /.card-header -->
      <div class="card-body table-responsive py-4">
        <table id="table" class="table table-hover text-nowrap table-sm">
          <thead>
            <tr>
            <tr>
                    <th>Num.</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Product Category</th>
                    <th>Product Price</th>
                    <th>Product Description</th>
                    <th>Product Tag</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
            </tr>
          </thead>
          <tbody>
          </tbody>

        </table>
      </div>
      <!-- /.card-body -->

    </div>
    <!-- /.card -->
  </div>
</div>
<!-- /.row -->

@push('custom-script')

<script type="text/javascript">
  $(document).ready(function() {

    $(document).on('click','.remove_product',function() {
            var id = $(this).attr('product_id');
            var url = "{{ url('admin/products') }}/" + id;
            var tr = $(this).parent().parent();
            removeRecord(tr, url);
        })

    $('#table').DataTable({
      lengthMenu: [
        [10, 30, 50, 100, 500],
        [10, 30, 50, 100, 500]
      ], // page length options

      bProcessing: true,
      serverSide: true,
      scrollY: "auto",
      scrollCollapse: true,
      'ajax': {
        "dataType": "json",
        url: "{{ url('admin/product-ajax') }}",
        data: {}
      },
      columns: [{
          data: "sl_no"
        },
        {
          data: 'product_name'
        },
        {
          data: "product_image",
          "render": function(data, type, row) {
            return "<img src=\"/attachment/" + data + "\" height=\"30\"/>";
          }
        },
        {
          data: 'product_category'
        },
        {
          data: 'product_price'
        },
        {
          data: "product_description"
        },
        {
          data: "product_tag"
        },
        {
          data: "status"
        },
        {
          data: "action"
        }
      ],

      columnDefs: [{
        orderable: false,
        targets: [0, 1, 2, 3, 4, 5, 6, 7]
      }],
    });

    $(document).on('click', '.activeVer', function() {
      var id = $(this).attr('_id');
      var val = $(this).attr('val');
      $.ajax({
        'url': "{{ url('admin/product-status') }}",
        data: {
          "_token": "{{ csrf_token() }}",
          'id': id,
          'status': val
        },
        type: 'POST',
        dataType: 'json',
        success: function(res) {
          if (res.val == 1) {
            $('#active_' + id).text('Active');
            $('#active_' + id).attr('val', '0');
            $('#active_' + id).removeClass('badge-danger');
            $('#active_' + id).addClass('badge-success');
          } else {
            $('#active_' + id).text('Inactive');
            $('#active_' + id).attr('val', '1');
            $('#active_' + id).removeClass('badge-success');
            $('#active_' + id).addClass('badge-danger');
          }
          Swal.fire(
            `${res.status}!`,
            res.msg,
            `${res.status}`,
          )
        }
      })

    })

  });
</script>
@endpush

@push('modal')

<!-- Modal -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="heading_bank">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add_product" action="{{ url('admin/products') }}" method="post" enctype="multipart/form-data">
          @csrf
        <div id="put"></div>
          <div class="row">

          <!-- <div class="card-body"> -->
          <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product name</label>
                    <input type="text" name="product_name" class="form-control form-control-sm" id="product_name" placeholder="Enter product name" required>
                    <span id="product_name_msg" class="custom-text-danger"></span>
                 </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product price</label>
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
                    <label for="product_tag">Product name</label>
                    <input type="text" name="product_tag" class="form-control form-control-sm" id="product_tag" placeholder="Enter product tag" required>
                    <span id="product_tag_msg" class="custom-text-danger"></span>
                 </div>
                  <label for="exampleInputFile">Product image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="product_image[]" class="custom-file-input" id="product_image" multiple>
                      <span id="product_image_msg" class="custom-text-danger"></span>
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      
                    </div>
                  </div>
                </div>
                <!-- <div class="card-footer"> -->
                <div class="form-group text-center">
                <input type="submit" class="btn btn-success btn-sm" id="submit_product" value="Submit">
              </div>      
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#create_product').click(function(e) {
    e.preventDefault();
    $('form#add_product')[0].reset();
    let url = '{{ url("admin/products") }}';
    $('#heading_bank').html('Add Product');
    $('#put').html('');
    $('form#add_product').attr('action', url);
    $('#submit_product').val('Submit');
    $('#add_product_modal').modal('show');
  })


  $(document).on('click','.edit_product',function(e) {
    e.preventDefault();
    var id = $(this).attr('product_id');
    var url = "{{ url('admin/products') }}/" + id + "/edit";
   
    $.ajax({
      url: url,
      method: 'GET',
      dataType: "JSON",
      data: {
        id: id,
      },
      success: function(res) {
        $('#product_name').val(res.product_name);
        $('#product_price').val(res.product_price);
        $('#product_category').val(res.product_category);
        $('#product_tag').val(res.product_tag);
        $('#product_description').val(res.product_description);
       

        let urlU = '{{ url("admin/products") }}/' + id;
        $('#heading_bank').html('Edit Product');
        $('#put').html('<input type="hidden" name="_method" value="PUT">');
        $('form#add_product').attr('action', urlU);
        $('#submit_product').val('Update');
        $('#add_product_modal').modal('show');
      },

      error: function(error) {
        console.log(error)
      }
    });
  });

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
        }
      }
    });
  });

  /*end form submit functionality*/
</script>

@endpush
@endsection