@extends('admin.layouts.app')

@section('content')
@section('page_heading', 'Create Outlet')

<!-- <div class="cover-loader">
  <div class="loader"></div>
</div> -->

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0">Create Categories</h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Category</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<form id="add-outlet" action="{{ url('admin/savecategory') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName1">Category name</label>
                   <input type="text" name="category_name" class="form-control form-control-sm" id="exampleInputName1" placeholder="Enter category">
                   <span id="category_name_msg" class="custom-text-danger"></span>
                  </div>
                    <div class="form-group">
                        <label>Category Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="category_image" class="custom-file-input custom-file-input-sm" id="imgInp" accept="image/png, image/gif, image/jpeg">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        <span id="office_address_proff_msg" class="custom-text-danger"></span>
                    </div>
                   
                    <div class="card-footer">
                        <input type="submit" value="Submit" class="btn btn-sm btn-success">
                        <a href="{{ url('admin/categories') }}" class="btn btn-sm btn-warning">Back</a>
                    </div>

                </div>
                <!-- /.card-body -->
           
    </div>
</form>

@push('custom-script')
<script>
    /*start form submit functionality*/
    $("form#add-outlet").submit(function(e) {
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
                    $('form#add-outlet')[0].reset();
                    $('#custom-file-label').html('');
                }
            }
        });
    });

    /*end form submit functionality*/
</script>
@endpush

@endsection