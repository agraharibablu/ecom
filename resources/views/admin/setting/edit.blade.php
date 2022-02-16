@extends('admin.layouts.app')

@section('content')
@section('page_heading', 'Edit Profile')

<div class="cover-loader d-none">
  <div class="loader"></div>
</div>

<div id="page-loader">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0">Edit Profile</h5>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit Profile</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="card p-2">
    <form id="edit-setting" action="{{ url('admin/settings/'.$setting->_id) }}" method="POST" enctype="multipart/form-data">

      {{ method_field('PUT') }}

      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="email">Social Email</label>
            <input type="text" name="email" value="{{ $setting->email }}" class="form-control" id="email" placeholder="Enter Social Email">
            <span id="email_msg" class="custom-text-danger"></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Facebook URL</label>
            <input type="text" name="facebook" value="{{ $setting->facebook }}" class="form-control" id="facebook" placeholder="Enter Facebook Url">
            <span id="facebook_msg" class="custom-text-danger"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="instagram">Instagram URL</label>
            <input type="text" name="instagram" value="{{ $setting->instagram }}" class="form-control" id="instagram" placeholder="Enter Instagram Url ">
            <span id="instagram_msg" class="custom-text-danger"></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="youtube">Youtube URL</label>
            <input type="text" name="youtube" value="{{ $setting->youtube }}" class="form-control" id="youtube" placeholder="Enter Youtube Url">
            <span id="youtube_msg" class="custom-text-danger"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="linkedin">Linkedin URL</label>
            <input type="linkedin" name="linkedin" value="{{ $setting->linkedin }}" class="form-control" id="linkedin" placeholder="Enter Linkedin Url">
            <span id="linkedin_msg" class="custom-text-danger"></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="twitter">Twitter URL</label>
            <input type="twitter" name="twitter" value="{{ $setting->twitter }}" class="form-control" id="twitter" placeholder="Enter Twitter Url">
            <span id="twitter_msg" class="custom-text-danger"></span>
          </div>
        </div>

      </div>
      <div class="col-md-12">
        <div class="form-group text-center">
          <input type="submit" value="Submit" class="btn btn-sm btn-success">
          <a href="{{ url('admin/settings') }}" class="btn btn-sm btn-warning">Back</a>
        </div>
      </div>
    </form>
  </div>


  @push('custom-script')
  <script>
    /*start form submit functionality*/
    $("form#edit-setting").submit(function(e) {
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
            $('form#add-setting')[0].reset();
          }
        }
      });
    });

    /*end form submit functionality*/
  </script>
  @endpush

  @endsection