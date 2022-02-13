@extends('admin.layouts.app')

@section('content')
@section('page_heading', 'Banner List')

<div class="row">
  <div class="col-12 mt-2">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Banner List</h3>
        <div class="card-tools">
          <a href="javascript:void(0);" class="btn btn-sm btn-success mr-4" id="create_banner"><i class="fas fa-plus-circle"></i>&nbsp;Add</a>
        </div>
      </div>

      <!-- /.card-header -->
      <div class="card-body table-responsive py-4">
        <table id="" class="table table-hover text-nowrap table-sm">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>Name</th>
              <th>Image</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($banners as $key=>$banner)
            <?php
            if ($banner->status == 1) {
              $status = ' <a href="javascript:void(0);"><span class="badge badge-success activeVer" id="active_' . $banner->_id . '" _id="' . $banner->_id . '" val="0">Active</span></a>';
            } else {
              $status = ' <a href="javascript:void(0)"><span class="badge badge-danger activeVer" id="active_' . $banner->_id . '" _id="' . $banner->_id . '" val="1">Inactive</span></a>';
            }
            ?>
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ ucwords( str_replace('_',' ',$banner->name)) }}</td>
              <td><img src="{{ (!empty($banner->thumbnail))?asset('attachment/banner/'.$banner->thumbnail):asset('attachment/no-image.webp') }}" style="height:50px"></td>
              <td>{!!$status!!}</td>
              <td><a href="javascript:void(0);" class="text-info edit_banner" data-toggle="tooltip" data-placement="bottom" title="Edit" banner_id="{{ $banner->_id }}"><i class="far fa-edit"></i></a>&nbsp;&nbsp;

                <a href="javascript:void(0);" class="text-danger remove_banner" data-toggle="tooltip" data-placement="bottom" title="Remove" banner_id="{{ $banner->_id }}"><i class="fas fa-trash"></i></a>
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


    $(document).on('click', '.remove_banner', function() {
      var id = $(this).attr('banner_id');
      var url = "{{ url('admin/banners') }}/" + id;
      var tr = $(this).parent().parent();
      removeRecord(tr, url);
    })

    $(document).on('click', '.activeVer', function() {
      var id = $(this).attr('_id');
      var val = $(this).attr('val');
      $.ajax({
        'url': "{{ url('admin/banner-status') }}",
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
<div class="modal fade" id="add_banner_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="heading_banner">Add Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--for loader-->
      <div class="cover-loader-modal d-none">
        <div class="loader-modal"></div>
      </div>

      <div class="modal-body" id="model-body">

        <form id="add_banner" action="{{ url('admin/banner') }}" method="post">
          @csrf
          <div id="put"></div>

          <div class="row">
            <div class="col-md-12">

              <!--start seo section -->
              <div class="tab-content" id="custom-tabs-four-tabContent">

                <div class="tab-pane fade active show" id="banner" role="tabpanel" aria-labelledby="banner-tab">
                  <div class="form-group">
                    <label for="name">Banner Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter banner name">
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
                    <label for="find">Search Name</label>
                    <input type="text" name="find" class="form-control" id="find" placeholder="Enter name">
                    <span id="find_msg" class="custom-text-danger"></span>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" id="status">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                </div>
                <!--end banner section -->
              </div>

              <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-sm btn-success" id="submit_banner">
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>


<script>
  $('#create_banner').click(function(e) {
    e.preventDefault();
    $('form#add_banner')[0].reset();
    let url = '{{ url("admin/banners") }}';
    $('#banner-tab').html('Add Banner');
    $('#put').html('');
    $('form#add_banner').attr('action', url);
    var imgurl = "{{ asset('attachment/no-image.webp')}}";
    $('#avatar').attr('src', imgurl);
    $('#submit_banner').val('Submit');
    $('#add_banner_modal').modal('show');
  })


  $(document).on('click', '.edit_banner', function(e) {
    e.preventDefault();
    var id = $(this).attr('banner_id');
    var url = "{{ url('admin/banners') }}/" + id + "/edit";

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
        $('#find').val(res.find);
        $('#status').val(res.status);
        if (res.thumbnail) {
          var imgurl = "{{ asset('attachment/banner/')}}/" + res.thumbnail;

        } else {
          var imgurl = "{{ asset('attachment/no-image.webp')}}";
        }
        $('#avatar').attr('src', imgurl);

        let urlU = '{{ url("admin/banner") }}/' + id;
        $('#banner-tab').html('Edit Banner');
        $('#put').html('<input type="hidden" name="_method" value="PUT">');
        $('form#add_banner').attr('action', urlU);
        $('#submit_banner').val('Update');
        $('#add_banner_modal').modal('show');
      },

      error: function(error) {
        console.log(error)
      }
    });
  });

  /*start form submit functionality*/
  $("form#add_banner").submit(function(e) {
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
          $('form#add_banner')[0].reset();
          setTimeout(function() {
            location.reload();
          }, 1000)
        }
      }
    });
  });

  /*end form submit functionality*/
</script>

@endpush
@endsection