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
            @foreach($categories as $key=>$category)
            <?php
            if ($category->status == 1) {
              $status = ' <a href="javascript:void(0);"><span class="badge badge-success activeVer" id="active_' . $category->_id . '" _id="' . $category->_id . '" val="0">Active</span></a>';
            } else {
              $status = ' <a href="javascript:void(0)"><span class="badge badge-danger activeVer" id="active_' . $category->_id . '" _id="' . $category->_id . '" val="1">Inactive</span></a>';
            }
            ?>
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $category->category_name }}</td>
              <td><img src="{{ (!empty($category->thumbnail))?asset('attachment/category/'.$category->thumbnail):asset('attachment/no-image.webp') }}" style="height:50px"></td>
              <td>{!!$status!!}</td>
              <td><a href="javascript:void(0);" class="text-info edit_category" data-toggle="tooltip" data-placement="bottom" title="Edit" category_id="{{ $category->_id }}"><i class="far fa-edit"></i></a>&nbsp;&nbsp;

                <a href="javascript:void(0);" class="text-danger remove_category" data-toggle="tooltip" data-placement="bottom" title="Remove" category_id="{{ $category->_id }}"><i class="fas fa-trash"></i></a>
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


    $(document).on('click', '.remove_category', function() {
      var id = $(this).attr('category_id');
      var url = "{{ url('admin/category') }}/" + id;
      var tr = $(this).parent().parent();
      removeRecord(tr, url);
    })

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

      <!--for loader-->
      <div class="cover-loader-modal d-none">
        <div class="loader-modal"></div>
      </div>

      <div class="modal-body">

        <div class="modal-header p-0">
          <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="category-tab" data-toggle="pill" href="#category" role="tab" aria-controls="category" aria-selected="true">Add Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="seo-tab" data-toggle="pill" href="#seo" role="tab" aria-controls="seo" aria-selected="false">SEO </a>
              </li>
            </ul>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div id="model-body">

          <form id="add_category" action="{{ url('admin/category') }}" method="post">
            @csrf
            <div id="put"></div>

            <div class="row">
              <div class="col-md-12">

                <!--start seo section -->
                <div class="tab-content" id="custom-tabs-four-tabContent">

                  <div class="tab-pane fade active show" id="category" role="tabpanel" aria-labelledby="category-tab">
                    <div class="form-group">
                      <label for="category_name">Category Name</label>
                      <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Enter category">
                      <span id="category_name_msg" class="custom-text-danger"></span>
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
                      <label>Status</label>
                      <select class="form-control" name="status" id="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                    </div>
                  </div>
                  <!--end category section -->

                  <!--start seo section-->
                  <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">

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
                  <!--end seo section-->
                </div>

                <div class="form-group">
                  <input type="submit" value="Submit" class="btn btn-sm btn-success" id="submit_category">
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script>
  $('#create_category').click(function(e) {
    e.preventDefault();
    $('form#add_category')[0].reset();
    let url = '{{ url("admin/category") }}';
    $('#category-tab').html('Add Category');
    $('#put').html('');
    $('form#add_category').attr('action', url);
    var imgurl = "{{ asset('attachment/no-image.webp')}}";
    $('#avatar').attr('src', imgurl);
    $('#submit_category').val('Submit');
    $('#add_category_modal').modal('show');
  })


  $(document).on('click', '.edit_category', function(e) {
    e.preventDefault();
    var id = $(this).attr('category_id');
    var url = "{{ url('admin/category') }}/" + id + "/edit";

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
        $('#status').val(res.status);
        $('#meta_title').val(res.meta_title);
        $('#meta_keyword').val(res.meta_keyword);
        $('#meta_description').val(res.meta_description);
        if (res.thumbnail) {
          var imgurl = "{{ asset('attachment/category/')}}/" + res.thumbnail;

        } else {
          var imgurl = "{{ asset('attachment/no-image.webp')}}";
        }
        $('#avatar').attr('src', imgurl);

        let urlU = '{{ url("admin/category") }}/' + id;
        $('#category-tab').html('Edit Category');
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
          $('form#add_category')[0].reset();
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