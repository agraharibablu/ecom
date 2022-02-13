@extends('admin.layouts.app')

@section('content')
@section('page_heading', 'Landing Page')

<div class="cover-loader d-none">
  <div class="loader"></div>
</div>

<div id="page-loader">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h5 class="m-0">Create Landing Page</h5>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Create Landing Page</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="card p-2">
  <form id="add_template" action="{{ url('admin/landing-pages') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
          <span id="title_msg" class="custom-text-danger"></span>
        </div>

        <div class="form-group">
          <label for="template">Template</label>
          <textarea name="template" class="form-control" id="template" placeholder="Enter "></textarea>
          <span id="template_msg" class="custom-text-danger"></span>
        </div>             
      </div>

         <div class="col-md-6">
                   <div class="form-group">
                      <label for="meta_title">Title</label>
                      <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Enter Title">
                      <span id="meta_title_msg" class="custom-text-danger"></span>
                    </div>

                    <div class="form-group">
                      <label for="meta_keyword">Keyword</label>
                      <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" placeholder="Enter Keyword">
                      <span id="meta_keyword_msg" class="custom-text-danger"></span>
                    </div>

                    <div class="form-group">
                      <label for="meta_description">Description</label>
                      <textarea name="meta_description" class="form-control" id="meta_description" placeholder="Enter Description"></textarea>
                      <span id="meta_description_msg" class="custom-text-danger"></span>
                    </div>
      </div>
      <div class="col-md-12">
        <div class="form-group text-center">
          <input type="submit" value="Submit" class="btn btn-sm btn-success">
          <a href="{{ url('admin/landing-pages') }}" class="btn btn-sm btn-warning">Back</a>
        </div>
      </div>
    </div>
  </form>
</div>
</div>
@push('custom-script')

<script>
ClassicEditor
.create( document.querySelector( '#template' ) )
.catch( error => {
console.error( error );
} );
</script>
<script>
  /*start form submit functionality*/
  $("form#add_template").submit(function(e) {
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
          $('form#add_template')[0].reset();
          $('#custom-file-label').html('');
        }
      }
    });
  });

  /*end form submit functionality*/
</script>
@endpush

@endsection