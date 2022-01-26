@extends('admin.layouts.app')

@section('content')
@section('page_heading', 'Landing Pages List')

<div class="row">
  <div class="col-12 mt-2">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Landing Pages List</h3>
        <div class="card-tools">
          <a href="{{ url('admin/landing-pages/create') }}" class="btn btn-sm btn-success mr-2"><i class="fas fa-plus-circle"></i>&nbsp;Add</a>
          <!-- <a href="javascript:void(0);" class="btn btn-sm btn-success mr-4" id="create_product"><i class="fas fa-plus-circle"></i>&nbsp;Add</a> -->
        </div>
      </div>

      <!-- /.card-header -->
      <div class="card-body table-responsive py-4">
        <table id="table" class="table table-hover text-nowrap table-sm">
          <thead>
            <tr>
            <tr>
              <th>Sr.No</th>
              <th>Title</th>
              <th>Url</th>
              <th>Actions</th>
            </tr>
            </tr>
          </thead>
          <tbody>
            @foreach($templates as $key=>$template)

            <!-- <?php
            // if ($template->status == 1) {
            //   $status = ' <a href="javascript:void(0);"><span class="badge badge-success activeVer" id="active_' . $template->_id . '" _id="' . $template->_id . '" val="0">Active</span></a>';
            // } else {
            //   $status = ' <a href="javascript:void(0)"><span class="badge badge-danger activeVer" id="active_' . $template->_id . '" _id="' . $template->_id . '" val="1">Inactive</span></a>';
            // }
            ?> -->

            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ucwords($template->title)}}</td>
              <td>{{$template->url}}</td>
              <td><a href=" {{ url('admin/landing-pages/' . $template->_id . '/edit') }}" class="text-info" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="far fa-edit"></i></a>
                <a href="javascript:void(0);" class="text-danger remove_template" data-toggle="tooltip" data-placement="bottom" title="Remove" template_id="{{ $template->_id }}"><i class="fas fa-trash"></i></a>
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

    $(document).on('click', '.remove_template', function() {
      var id = $(this).attr('template_id');
      var url = "{{ url('admin/landing-pages') }}/" + id;
      var tr = $(this).parent().parent();
      removeRecord(tr, url);
    })



    $(document).on('click', '.activeVer', function() {
      var id = $(this).attr('_id');
      var val = $(this).attr('val');
      $.ajax({
        'url': "{{ url('admin/landing-status') }}",
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

@endsection