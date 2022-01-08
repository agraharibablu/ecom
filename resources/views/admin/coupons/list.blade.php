@extends('admin.layouts.app')

@section('content')
@section('page_heading', 'Coupons List')

<div class="row">
  <div class="col-12 mt-2">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Coupons List</h3>
        <div class="card-tools">
          <a href="javascript:void(0);" class="btn btn-sm btn-success mr-4" id="create_coupon"><i class="fas fa-plus-circle"></i>&nbsp;Add</a>
        </div>
      </div>

      <!-- /.card-header -->
      <div class="card-body table-responsive py-4">
        <table id="" class="table table-hover text-nowrap table-sm">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>Name</th>
              <th>Coupon Code</th>
              <th>Image</th>
              <th>Terms&Condition</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($coupons as $key=>$coupon)
            <?php
            if ($coupon->status == 1) {
              $status = ' <a href="javascript:void(0);"><span class="badge badge-success activeVer" id="active_' . $coupon->_id . '" _id="' . $coupon->_id . '" val="0">Active</span></a>';
            } else {
              $status = ' <a href="javascript:void(0)"><span class="badge badge-danger activeVer" id="active_' . $coupon->_id . '" _id="' . $coupon->_id . '" val="1">Inactive</span></a>';
            }
            ?>
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $coupon->name }}</td>
              <td>{{ $coupon->coupon_code }}</td>
              <td><img src="{{ (!empty($coupon->thumbnail))?asset('attachment/coupons/'.$coupon->thumbnail):asset('attachment/no-image.webp') }}" style="height:50px"></td>
              <td>{{ $coupon->terms_condition }}</td>
              <td>{!!$status!!}</td>
              <td><a href="javascript:void(0);" class="text-info edit_coupon" data-toggle="tooltip" data-placement="bottom" title="Edit" coupon_id="{{ $coupon->_id }}"><i class="far fa-edit"></i></a>&nbsp;&nbsp;

                <a href="javascript:void(0);" class="text-danger remove_coupon" data-toggle="tooltip" data-placement="bottom" title="Remove" coupon_id="{{ $coupon->_id }}"><i class="fas fa-trash"></i></a>
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


    $(document).on('click', '.remove_coupon', function() {
      var id = $(this).attr('coupon_id');
      var url = "{{ url('admin/coupons') }}/" + id;
      var tr = $(this).parent().parent();
      removeRecord(tr, url);
    })

    $(document).on('click', '.activeVer', function() {
      var id = $(this).attr('_id');
      var val = $(this).attr('val');
      $.ajax({
        'url': "{{ url('admin/coupon-status') }}",
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
<div class="modal fade" id="add_coupon_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="heading_coupon">Add Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--for loader-->
      <div class="cover-loader-modal d-none">
        <div class="loader-modal"></div>
      </div>

      <div class="modal-body" id="model-body">
        <form id="add_coupon" action="{{ url('admin/coupons') }}" method="post">
          @csrf
          <div id="put"></div>
          <div class="row">

            <div class="col-md-12">
              <div class="form-group">
                <label for="name">Coupon Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                <span id="name_msg" class="custom-text-danger"></span>
              </div>

              <div><img src="{{ asset('attachment/no-image.webp') }}" id="avatar" style="height:50px"></div>
              <div class="form-group">
                <label>Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="thumbnail" class="custom-file-input" id="imgInp" accept="image/png, image/gif, image/jpeg">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
                <span id="thumbnail_msg" class="custom-text-danger"></span>
              </div>
              <div class="form-group">
                <label for="terms_condition">Terms & Condition</label>
                  <textarea name="terms_condition" class="form-control" id="terms_condition" placeholder="Enter Terms & condition" rows="4"></textarea>
                <span id="terms_condition_msg" class="custom-text-danger"></span>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" id="status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
              <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-sm btn-success" id="submit_coupon">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#create_coupon').click(function(e) {
    e.preventDefault();
    $('form#add_coupon')[0].reset();
    let url = '{{ url("admin/coupons") }}';
    $('#heading_coupon').html('Add Coupon');
    $('#put').html('');
    $('form#add_coupon').attr('action', url);
    var imgurl= "{{ asset('attachment/no-image.webp')}}";
    $('#avatar').attr('src',imgurl);
    $('#submit_coupon').val('Submit');
    $('#add_coupon_modal').modal('show');
  })


  $(document).on('click', '.edit_coupon', function(e) {
    e.preventDefault();
    var id = $(this).attr('coupon_id');
    var url = "{{ url('admin/coupons') }}/" + id + "/edit";

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
        $('#terms_condition').val(res.terms_condition);
        $('#status').val(res.status);
        if(res.thumbnail){
          var imgurl = "{{ asset('attachment/coupons/')}}/"+res.thumbnail;

        }else{
          var imgurl= "{{ asset('attachment/no-image.webp')}}";
        }
        $('#avatar').attr('src',imgurl);

        let urlU = '{{ url("admin/coupons") }}/' + id;
        $('#heading_coupon').html('Edit Coupon');
        $('#put').html('<input type="hidden" name="_method" value="PUT">');
        $('form#add_coupon').attr('action', urlU);
        $('#submit_coupon').val('Update');
        $('#add_coupon_modal').modal('show');
      },

      error: function(error) {
        console.log(error)
      }
    });
  });

  /*start form submit functionality*/
  $("form#add_coupon").submit(function(e) {
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
          $('form#add_coupon')[0].reset();
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