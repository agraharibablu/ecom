@extends('admin.layouts.app')

@section('content')
@section('page_heading', 'List')

<div class="row">
  <div class="col-12 mt-2">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List</h3>
        <div class="card-tools">
          <a href="javascript:void(0);" class="btn btn-sm btn-success mr-4" id="create_testimonial"><i class="fas fa-plus-circle"></i>&nbsp;Add</a>
        </div>
      </div>

      <!-- /.card-header -->
      <div class="card-body table-responsive py-4">
        <table id="" class="table table-hover text-nowrap table-sm">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>Name</th>
              <th>Title</th>
              <th>Designation</th>
              <th>Description</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($testimonials as $key=>$testimonial)
            <?php
            if ($testimonial->status == 1) {
              $status = ' <a href="javascript:void(0);"><span class="badge badge-success activeVer" id="active_' . $testimonial->_id . '" _id="' . $testimonial->_id . '" val="0">Active</span></a>';
            } else {
              $status = ' <a href="javascript:void(0)"><span class="badge badge-danger activeVer" id="active_' . $testimonial->_id . '" _id="' . $testimonial->_id . '" val="1">Inactive</span></a>';
            }
            ?>
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ ucwords($testimonial->name) }}</td>
              <td>{{ ucwords($testimonial->title) }}</td>
              <td>{!! ucwords($testimonial->designation) !!}</td>
              <td>{{ ucwords($testimonial->description) }}</td>
              <td>{!!$status!!}</td>
              <td><a href="javascript:void(0);" class="text-info edit_testimonial" data-toggle="tooltip" data-placement="bottom" title="Edit" testimonial_id="{{ $testimonial->_id }}"><i class="far fa-edit"></i></a>&nbsp;&nbsp;

                <a href="javascript:void(0);" class="text-danger remove_testimonial" data-toggle="tooltip" data-placement="bottom" title="Remove" testimonial_id="{{ $testimonial->_id }}"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
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


    $(document).on('click', '.remove_testimonial', function() {
      var id = $(this).attr('testimonial_id');
      var url = "{{ url('admin/testimonials') }}/" + id;
      var tr = $(this).parent().parent();
      removeRecord(tr, url);
    })

    $(document).on('click', '.activeVer', function() {
      var id = $(this).attr('_id');
      var val = $(this).attr('val');
      $.ajax({
        'url': "{{ url('admin/testimonial-status') }}",
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
<div class="modal fade" id="add_testimonial_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="heading_testimonial">Add Testimonial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--for loader-->
      <div class="cover-loader-modal d-none">
        <div class="loader-modal"></div>
      </div>

      <div class="modal-body" id="model-body">
        <form id="add_testimonial" action="{{ url('admin/testimonials') }}" method="post">
          @csrf
          <div id="put"></div>
          <div class="row">

            <div class="col-md-12">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                <span id="name_msg" class="custom-text-danger"></span>
              </div>
              <div class="form-group">
                <label for="title">Title</label>
                 <input type="title" name="title" class="form-control" id="title" placeholder="Enter Title">
                <span id="title_msg" class="custom-text-danger"></span>
              </div>
              <div class="form-group">
                <label for="designation">Designation</label>
                 <input type="designation" name="designation" class="form-control" id="designation" placeholder="Enter Designation">
                <span id="designation_msg" class="custom-text-danger"></span>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                  <textarea name="description" class="form-control" id="description" placeholder="Enter Description" rows="4"></textarea>
                <span id="description_msg" class="custom-text-danger"></span>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" id="status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
              <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-sm btn-success" id="submit_testimonial">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#create_testimonial').click(function(e) {
    e.preventDefault();
    $('form#add_testimonial')[0].reset();
    let url = '{{ url("admin/testimonials") }}';
    $('#heading_testimonial').html('Add Testimonial');
    $('#put').html('');
    $('form#add_testimonial').attr('action', url);
    $('#submit_testimonial').val('Submit');
    $('#add_testimonial_modal').modal('show');
  })


  $(document).on('click', '.edit_testimonial', function(e) {
    e.preventDefault();
    var id = $(this).attr('testimonial_id');
    var url = "{{ url('admin/testimonials') }}/" + id + "/edit";

    $.ajax({
      url: url,
      method: 'GET',
      dataType: "JSON",
      data: {
        id: id,
      },
      success: function(res) {
        // console.log(res);
        $('#name').val(res.name);
        $('#title').val(res.price);
        $('#designation').val(res.designation);
        $('#description').val(res.description);
        $('#status').val(res.status);

        let urlU = '{{ url("admin/testimonials") }}/' + id;
        $('#heading_testimonial').html('Edit Testimonial');
        $('#put').html('<input type="hidden" name="_method" value="PUT">');
        $('form#add_testimonial').attr('action', urlU);
        $('#submit_testimonial').val('Update');
        $('#add_testimonial_modal').modal('show');
      },

      error: function(error) {
        console.log(error)
      }
    });
  });

  /*start form submit functionality*/
  $("form#add_testimonial").submit(function(e) {
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
        $('.cover-loader-modal').removeClass('d-none');
        $('#model-body').hide();
      },
      success: function(res) {
        //hide loader
        $('.cover-loader-modal').addClass('d-none');
        $('#model-body').show();

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
          $('form#add_testimonial')[0].reset();
          setTimeout(function(){
            location.reload();
          },1000)
        }
      }
    });
  });

  /*end form submit functionality*/
</script>

@endpush
@endsection