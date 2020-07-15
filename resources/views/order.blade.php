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
            <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="projectinput5">Order Status</label>
                        <select id="orderStatus" name="orderStatus" class="form-control">
                          <option value="6" selected="">All</option>
                          <option value="0">Pending</option>
                          <option value="1">Confirmed</option>
                          <option value="2">Picked Up</option>
                          <option value="3">In Process</option>
                          <option value="4">Shipped</option>
                          <option value="5">Delivered</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-xl-8 col-lg-12 mb-1">
                            <div class="form-group text-center">
                              <!-- Floating button Regular with text -->
                              <a href="javascript:void(null)" id="orderFilter" class="btn btn-float btn-cyan"><i class="la la-filter"></i><span>Filter</span></a>
                              <a href="javascript:void(null)" id="orderAction" class="btn btn-float btn-float-lg btn-pink"><i class="la la-check-circle"></i><span>Action</span></a>
                              {{-- <a href="javascript:void(null)" id="addAgent" class="btn btn-float btn-float-lg btn-pink"><i class="la la-check-circle"></i><span>Add Agent</span></a> --}}
                              <a href="#" id="page-reload" class="btn btn-float btn-cyan"><i class="la la-refresh"></i><span>refresh</span></a>
                            </div>
                          </div>
                    <!-- <div class="col-md-4">
                        <br>
                        <a href="/admin/order-transport" class="btn btn-success mr-1">
                          <i class="la la-truck"></i> Go to Transport
                        </a>

                    </div> -->

            </div>
<section id="column-selectors">
    <div class="row">
      <div class="col-12">

        <div class="card">

          <div class="card-content collapse show">
            <div class="card-body card-dashboard">

              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th><input type="checkbox" name="order_master_checkbox" class="order_master_checkbox" value=""/></th>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Agent</th>
                    <th>Pickup Date</th>
                    <th>Payment Status</th>
                    <th>Order Status</th>
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



<div class="modal fade text-left" id="agent_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8"
  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary white">
          <h4 class="modal-title white" id="myModalLabel8">Add Agent</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="agent_form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" id="id">
        <div class="modal-body">

          <div class="form-group row">
            <label class="col-md-3 label-control" for="Select Role">Select Role</label>
            <div class="col-md-9">
              <select id="agent" name="agent" class="form-control">
                <option value="" selected="" disabled="">Select one</option>
                @foreach ($agent as $agent1)
                  <option value="{{$agent1->id}}">{{$agent1->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

        </div>
      </form>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="Save()" id="saveButton" class="btn btn-outline-primary">Save changes</button>
        </div>
      </div>

    </div>
  </div>
@endsection
@section('extra-js')


<script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>

<script>

var status_id = null;
$('.orders').addClass('active');
var orderPageTable = $('.zero-configuration').DataTable({
    processing: true,
    serverSide: true,
    "ajax":'/get-order/6',
    columns: [
      { data:'checkbox', name: 'checkbox', orderable:false, searchable:false },
      { data: 'order_id', name: 'order_id' },
      { data: 'customer_details', name: 'customer_details' },
      { data: 'agent_details', name: 'agent_details' },
      { data: 'pickup_date', name: 'pickup_date' },
      { data: 'payment_status', name: 'payment_status' },
      { data: 'order_status', name: 'order_status' },
      { data: 'print', name: 'print' },
    ]
});

$(document).on('click','.order_master_checkbox', function(){
  if($(".order_master_checkbox").prop('checked') == true){
      $(".order_checkbox").prop('checked',true);
  } else{
      $(".order_checkbox").prop('checked',false);
  }
});

$('#page-reload').click(function(){
    location.reload();
});


$(document).on('click','#addAgent', function(){
  var order_id=[];
  $(".order_checkbox:checked").each(function(){
      order_id.push($(this).val());
  });
  if(order_id.length > 0){
    $('input[name="id"]').val(order_id);
    $('#agent_model').modal('show');
    $('#saveButton').text('Add Agent');
    $('#myModalLabel8').text('Add Agent');
  }
});

$(document).on('click','#orderAction', function(){
    var order_id=[];
    var orderStatus = $('#orderStatus').val();
    if(orderStatus !=6){
    $(".order_checkbox:checked").each(function(){
        order_id.push($(this).val());
    });
    if(order_id.length > 0){
        $.ajax({
            url:"/changeStatus",
            method:"GET",
            data:{id:order_id,status:orderStatus},
            success:function(data){
                toastr.success(data);
              // orderPageTable.fnFilter("^"+ orderStatus +"$", 2, false, false)
                $('.zero-configuration').DataTable().ajax.reload();
                $(".order_master_checkbox").prop('checked',false);
            }
        })
    }else{
        toastr.error("Please select atleast one Checkbox");
    }
}else{
    toastr.error("Please select Any other Order Status");
}
});

$('#orderFilter').click(function(){
    var orderStatus = $('#orderStatus').val();
    // alert(orderStatus);
    var new_url = '/get-order/'+orderStatus;
    orderPageTable.ajax.url(new_url).load();
    //orderPageTable.draw();
})



    function Save(){


      var formData = new FormData($('#agent_form')[0]);
// var id = $('#id').val();
// alert(id);
        $.ajax({
                url : 'assign-agent',
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data)
                {
                  console.log(data);
                  $("#agent_form")[0].reset();
                  $('#agent_model').modal('hide');
                  $('.zero-configuration').DataTable().ajax.reload();
                $(".order_master_checkbox").prop('checked',false);
                  toastr.success('Add Agent Successfully', 'Successfully Save');
                },error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            //console.log(errorData);
            //console.log(Object.keys(errorData).length);
            $.each(errorData, function(i, obj) {
              //console.log(obj[0]);
              //console.log(i);
              toastr.error(obj[0]);
          });

                }

        });


    }
</script>


@endsection
