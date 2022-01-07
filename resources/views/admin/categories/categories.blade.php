@extends('admin.layouts.app')

@section('content')
@section('page_heading', 'Category List')

<div class="row">
  <div class="col-12 mt-2">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Category List</h3>
        <div class="card-tools">
        <a href="javascript:void(0);" class="btn btn-sm btn-success mr-4" id="create_category"><i class="fas fa-plus-circle"></i>&nbsp;Add</a>
        </div>
      </div>

      <!-- /.card-header -->
      <div class="card-body table-responsive py-4">
        <table id="table" class="table table-hover text-nowrap table-sm">
          <thead>
            <tr>
                    <th>Num.</th>
                    <th>Category Name</th>
                    <th>Category Image</th>
                    <th>Status</th>
                    <th>Actions</th>
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


    $(document).on('click','.remove_category',function() {
            var id = $(this).attr('category_id');
            var url = "{{ url('admin/categories') }}/" + id;
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
        url: "{{ url('admin/category-ajax') }}",
        data: {}
      },
      columns: [{
          data: "sl_no"
        },
        {
          data: 'category_name'
        },
        {
          data: 'category_image',
          "render": function(data, type, row) {
            return "<img src=\"/attachment/" + data + "\" height=\"30\"/>";
          }
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
        targets: [0, 1, 2, 3]
      }],
    });

    $(document).on('click', '.activeVer', function() {
      var id = $(this).attr('_id');
      var val = $(this).attr('val');
      $.ajax({
        'url': "{{ url('admin/category_status') }}",
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
<div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="heading_bank">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add_category" action="{{ url('admin/categories') }}" method="post">
          @csrf
        <div id="put"></div>
          <div class="row">

         
          <div class="col-md-12">
                  <div class="form-group">
                    <label for="category_name">Category name</label>
                   <input type="text" name="category_name" class="form-control form-control-sm" id="category_name" placeholder="Enter category">
                   <span id="category_name_msg" class="custom-text-danger"></span>
                  </div>
                    <div class="form-group">
                        <label>Category Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="category_image" class="custom-file-input custom-file-input-sm" id="category_image" accept="image/png, image/gif, image/jpeg">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        <span id="category_image_msg" class="custom-text-danger"></span>
                    </div>
                   
                    <div class="card-footer">
                        <input type="submit" value="Submit" class="btn btn-sm btn-success" id="submit_category">
                    </div>

                </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#create_category').click(function(e) {
    e.preventDefault();
    $('form#add_category')[0].reset();
    let url = '{{ url("admin/categories") }}';
    $('#heading_bank').html('Add Category');
    $('#put').html('');
    $('form#add_category').attr('action', url);
    $('#submit_category').val('Submit');
    $('#add_category_modal').modal('show');
  })


  $(document).on('click','.edit_category',function(e) {
    e.preventDefault();
    var id = $(this).attr('category_id');
    var url = "{{ url('admin/categories') }}/" + id + "/edit";
   
    $.ajax({
      url: url,
      method: 'GET',
      dataType: "JSON",
      data: {
        id: id,
      },
      success: function(res) {
       // console.log(res);
        $('#category_name').val(res.category_name);
    
        let urlU = '{{ url("admin/categories") }}/' + id;
        $('#heading_bank').html('Edit Category');
        $('#put').html('<input type="hidden" name="_method" value="PUT">');
        $('form#add_category').attr('action', urlU);
        $('#submit_category').val('Update');
        $('#add_category_modal').modal('show');
      },

      error: function(error) {
        console.log(error)
      }
    });
  });

  /*start form submit functionality*/
  $("form#add_category").submit(function(e) {
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
          $('form#add_category')[0].reset();
        }
      }
    });
  });

  /*end form submit functionality*/
</script>

@endpush
@endsection