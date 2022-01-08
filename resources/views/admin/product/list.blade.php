@extends('admin.layouts.app')

@section('content')
@section('page_heading', 'Products List')

<div class="row">
  <div class="col-12 mt-2">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Products List</h3>
        <div class="card-tools">
          <a href="{{ url('admin/product/create') }}" class="btn btn-sm btn-success mr-2"><i class="fas fa-plus-circle"></i>&nbsp;Add</a>
          <!-- <a href="javascript:void(0);" class="btn btn-sm btn-success mr-4" id="create_product"><i class="fas fa-plus-circle"></i>&nbsp;Add</a> -->
        </div>
      </div>

      <!-- /.card-header -->
      <div class="card-body table-responsive py-4">
        <table id="table" class="table table-hover text-nowrap table-sm">
          <thead>
            <tr>
            <tr>
              <th>Sr. No</th>
              <th>Name</th>
              <th>Thumbnail</th>
              <th>Category</th>
              <th>Price</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $key=>$product)

            <?php
            if ($product->status == 1) {
              $status = ' <a href="javascript:void(0);"><span class="badge badge-success activeVer" id="active_' . $product->_id . '" _id="' . $product->_id . '" val="0">Active</span></a>';
            } else {
              $status = ' <a href="javascript:void(0)"><span class="badge badge-danger activeVer" id="active_' . $product->_id . '" _id="' . $product->_id . '" val="1">Inactive</span></a>';
            }
            ?>

            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ ucwords($product->product_name)}}</td>
              <td><img src="{{ (!empty($product->thumbnail))?asset('attachment/product/'.$product->thumbnail):asset('attachment/no-image.webp') }}" style="height:50px"></td>
              <td>{{ (!empty($product->CategoryName['category_name']))?ucwords($product->CategoryName['category_name']):""}}</td>
              <td>{!!mSign($product->price)!!}</td>
              <td>{!!$status!!}</td>
              <td><a href=" {{ url('admin/product/' . $product->_id . '/edit') }}" class="text-info" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="far fa-edit"></i></a>
                <a href="javascript:void(0);" class="text-danger remove_product" data-toggle="tooltip" data-placement="bottom" title="Remove" product_id="{{ $product->_id }}"><i class="fas fa-trash"></i></a>
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

    $(document).on('click', '.remove_product', function() {
      var id = $(this).attr('product_id');
      var url = "{{ url('admin/product') }}/" + id;
      var tr = $(this).parent().parent();
      removeRecord(tr, url);
    })



    $(document).on('click', '.activeVer', function() {
      var id = $(this).attr('_id');
      var val = $(this).attr('val');
      $.ajax({
        'url': "{{ url('admin/product-status') }}",
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