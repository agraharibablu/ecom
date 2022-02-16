@extends('admin.layouts.app')

@section('content')
@section('page_heading', 'List')

<div class="row">
  <div class="col-12 mt-2">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List</h3>
        <div class="card-tools">
          <a href="javascript:void(0);" class="btn btn-sm btn-success mr-4" id="create_user"><i class="fas fa-plus-circle"></i>&nbsp;Add</a>
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
            @foreach($users as $key=>$user)
            <?php
            if ($user->status == 1) {
              $status = ' <a href="javascript:void(0);"><span class="badge badge-success activeVer" id="active_' . $user->_id . '" _id="' . $user->_id . '" val="0">Active</span></a>';
            } else {
              $status = ' <a href="javascript:void(0)"><span class="badge badge-danger activeVer" id="active_' . $user->_id . '" _id="' . $user->_id . '" val="1">Inactive</span></a>';
            }
            ?>
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->user_code }}</td>
              <td>{!!mSign($user->price)!!}</td>
              <td><img src="{{ (!empty($user->thumbnail))?asset('attachment/users/'.$user->thumbnail):asset('attachment/no-image.webp') }}" style="height:50px"></td>
              <td>{{ $user->terms_condition }}</td>
              <td>{!!$status!!}</td>
              <td><a href="javascript:void(0);" class="text-info edit_user" data-toggle="tooltip" data-placement="bottom" title="Edit" user_id="{{ $user->_id }}"><i class="far fa-edit"></i></a>&nbsp;&nbsp;

                <a href="javascript:void(0);" class="text-danger remove_user" data-toggle="tooltip" data-placement="bottom" title="Remove" user_id="{{ $user->_id }}"><i class="fas fa-trash"></i></a>
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


    $(document).on('click', '.remove_user', function() {
      var id = $(this).attr('user_id');
      var url = "{{ url('admin/users') }}/" + id;
      var tr = $(this).parent().parent();
      removeRecord(tr, url);
    })

    $(document).on('click', '.activeVer', function() {
      var id = $(this).attr('_id');
      var val = $(this).attr('val');
      $.ajax({
        'url': "{{ url('admin/user-status') }}",
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
<div class="modal fade" id="add_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="heading_user">Add Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--for loader-->
      <div class="cover-loader-modal d-none">
        <div class="loader-modal"></div>
      </div>

      <div class="modal-body" id="model-body">
        <form id="add_user" action="{{ url('admin/users') }}" method="post">
          @csrf
          <div id="put"></div>
          <div class="row">

            <div class="col-md-12">
              <div class="form-group">
                <label for="name">user Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                <span id="name_msg" class="custom-text-danger"></span>
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                 <input type="number" name="price" class="form-control" id="price" placeholder="Enter Price">
                <span id="price_msg" class="custom-text-danger"></span>
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
                <input type="submit" value="Submit" class="btn btn-sm btn-success" id="submit_user">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#create_user').click(function(e) {
    e.preventDefault();
    $('form#add_user')[0].reset();
    let url = '{{ url("admin/users") }}';
    $('#heading_user').html('Add user');
    $('#put').html('');
    $('form#add_user').attr('action', url);
    var imgurl= "{{ asset('attachment/no-image.webp')}}";
    $('#avatar').attr('src',imgurl);
    $('#submit_user').val('Submit');
    $('#add_user_modal').modal('show');
  })


  $(document).on('click', '.edit_user', function(e) {
    e.preventDefault();
    var id = $(this).attr('user_id');
    var url = "{{ url('admin/users') }}/" + id + "/edit";

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
        $('#price').val(res.price);
        $('#terms_condition').val(res.terms_condition);
        $('#status').val(res.status);
        if(res.thumbnail){
          var imgurl = "{{ asset('attachment/users/')}}/"+res.thumbnail;

        }else{
          var imgurl= "{{ asset('attachment/no-image.webp')}}";
        }
        $('#avatar').attr('src',imgurl);

        let urlU = '{{ url("admin/users") }}/' + id;
        $('#heading_user').html('Edit user');
        $('#put').html('<input type="hidden" name="_method" value="PUT">');
        $('form#add_user').attr('action', urlU);
        $('#submit_user').val('Update');
        $('#add_user_modal').modal('show');
      },

      error: function(error) {
        console.log(error)
      }
    });
  });

  /*start form submit functionality*/
  $("form#add_user").submit(function(e) {
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
          $('form#add_user')[0].reset();
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