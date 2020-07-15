@extends('layouts.app')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
  <style>
  .clickable-Product-row{
    cursor: pointer;
  }
  </style>
@endsection
@section('section')
<div class="content-wrapper">

    <div class="content-body">
          
<section id="column-selectors">
    <div class="row">
      <div class="col-12">

        <div class="card">

          <div class="card-content collapse show">
            <div class="card-body card-dashboard">

              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th>Customer</th>
                    <th>E-mail</th>
                    <th>Phone</th>  
                    <th>Action</th>  
                  </tr>
                </thead>
                <tbody>

                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
    </div>
  </div>


@endsection
@section('extra-js')


<script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script>
    var status_id = null;
    $('.customer').addClass('active');
    var orderPageTable = $('.zero-configuration').DataTable(
    {
      processing: true,
      serverSide: true,
      "ajax":'/get-customer',
      columns: [
          { data: 'name', name: 'name' },
          { data: 'email', name: 'email' },
          { data: 'mobile', name: 'mobile' },
          { data: 'action', name: 'action' },
      ],
    });
    </script>

    <script>
// $('#page-reload').click(function(){
//     location.reload();
// });
// $('#orderFilter').click(function(){
//     var orderStatus = $('#orderStatus').val();
//     console.log(orderStatus);
//     var new_url = '/admin/get-customer/'+orderStatus;
//     orderPageTable.ajax.url(new_url).load();
//     //orderPageTable.draw();
// })
</script>


@endsection
