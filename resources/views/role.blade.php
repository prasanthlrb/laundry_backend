@extends('layouts.app')
@section('extra-css')
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/toggle/switchery.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/switch.css">
@endsection
@section('section')
<div class="content-wrapper">

    <div class="content-body">
     
   
<section id="column-selectors">
    <div class="row">
      <div class="col-12">
        
        <div class="card">
          <div class="card-header">
            
                <button id="open_model" data-backdrop="false" class="btn btn-success round btn-glow px-2" data-toggle="modal">Create Role</button>
         
            <div class="heading-elements">
               
              <ul class="list-inline mb-0">
                
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
             
              <table class="table table-striped table-bordered dataex-html5-selectors">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Role</th>
                    @if($role_get[0]->role_edit == 'on')
                    <th>Edit</th>
                    @endif
                    @if($role_get[0]->role_del == 'on')
                    <th>Delete</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                @php ($x = 0) @endphp
                @foreach($role as $row)
                @php $x++ @endphp
                  <tr>
                    <td>{{$x}}</td>
                    <td>{{$row->role_name}}</td>
                    @if($role_get[0]->role_edit == 'on')
                    <td class="text-center" onclick="Edit({{$row->id}})"><i class="ft-edit"></i></td>
                    @endif
                    @if($role_get[0]->role_del == 'on')
                   <td class="text-center" onclick="Delete({{$row->id}})"><i class="ft-trash-2"></i></td>
                    @endif
                  </tr>
                @endforeach 
                </tbody>
                <tfoot>
                  <tr>
                    <th>S.No</th>
                    <th>Role</th>
                    @if($role_get[0]->role_edit == 'on')
                    <th>Edit</th>
                    @endif
                    @if($role_get[0]->role_del == 'on')
                    <th>Delete</th>
                    @endif
                  </tr>
                </tfoot>
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

  <div class="modal fade text-left" id="role_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8"
  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary white">
          <h4 class="modal-title white" id="myModalLabel8">Create Role</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="role_form" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="Role">Role</label>
            <div class="col-md-6">
              <input type="text" id="role_name" class="form-control" placeholder="Role Name" name="role_name">
            </div>
          </div>

          <div class="form-group">
            <label>Select Crediencial :</label>
            <div class="row">
             
              <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="category_read" id="category_read" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Category</label>
                    </div>
                </div>
              <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="category_edit" id="category_edit" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Category Edit</label>
                    </div>
                </div>
              <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="category_del" id="category_del" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Category Delete</label>
                    </div>
                </div>

              <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="services_read" id="services_read" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Services</label>
                    </div>
                </div>
              
              <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="services_edit" id="services_edit" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Services Edit</label>
                    </div>
                </div>
              <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="services_del" id="services_del" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Services Delete</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="customer_read" id="customer_read" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Customer</label>
                    </div>
                </div>
              <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="customer_edit" id="customer_edit" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Customer Edit</label>
                    </div>
                </div>
              <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="customer_delete" id="customer_delete" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Customer Delete</label>
                    </div>
                </div>
           
              <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="user_read" id="user_read" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">User</label>
                    </div>
                </div>
              <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="user_edit" id="user_edit" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">User Edit</label>
                    </div>
                </div>
              <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="user_del" id="user_del" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">User Delete</label>
                    </div>
                </div>
              <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="role_read" id="role_read" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Role</label>
                    </div>
                </div>
              <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="role_edit" id="role_edit" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Role Edit</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="role_del" id="role_del" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Role Delete</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="order_read" id="order_read" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Order</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="order_edit" id="order_edit" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Order Edit</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="order_del" id="order_del" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Order Delete</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="coupon_read" id="coupon_read" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Coupon</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="coupon_edit" id="coupon_edit" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Coupon Edit</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="coupon_del" id="coupon_del" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Coupon Delete</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="agent_read" id="agent_read" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Agent</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="agent_edit" id="agent_edit" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Agent Edit</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="agent_del" id="agent_del" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Agent Delete</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="slider_read" id="slider_read" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Slider</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="slider_edit" id="slider_edit" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Slider Edit</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="slider_del" id="slider_del" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Slider Delete</label>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="dropdown-item">
                      <input type="checkbox" name="order_report" id="order_report" class="switchery-xs" />
                      <label for="switchery4" class="card-title ml-1">Order Report</label>
                    </div>
                </div>

              </div>
          </div>
        </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
          <button onclick="Save()" id="saveButton" type="button" class="btn btn-outline-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('extra-js')

<script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"
  type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"
  type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/tables/jszip.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/tables/pdfmake.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/tables/vfs_fonts.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/tables/buttons.html5.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/tables/buttons.print.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/tables/buttons.colVis.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js"
  type="text/javascript"></script>

  <script src="../../../app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/js/scripts/dropdowns/dropdowns.js" type="text/javascript"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js" type="text/javascript"></script> -->
  <script>

      $('.roles').addClass('active');
  </script>
  <script>

var action_type;
$('#open_model').click(function(){
  $('#role_model').modal('show');
  action_type = 1;
  $('#saveButton').text('Save');
  $('#myModalLabel8').text('Create role');
  $("#role_form")[0].reset();

$.each(['category_read','category_edit','category_del','services_read','services_edit','services_del','customer_read','customer_edit','customer_del','user_read','user_edit','user_del','role_read','role_edit','role_del','order_read','order_edit','order_del','coupon_read','coupon_edit','coupon_del','agent_read','agent_edit','agent_del','slider_read','slider_edit','slider_del','order_report' ], function( index, value ) {

if ($('#'+value)[0].checked){ 
    $('#'+value).trigger('click').removeAttr("checked"); 
  }else{ 
    // nothing, already off
}

});


});



  function Save(){
    var formData = new FormData($('#role_form')[0]);
    if(action_type == 1){

      $.ajax({
              url : 'roleSave',
              type: "POST",
              data: formData,
              contentType: false,
              processData: false,
              dataType: "JSON",
              success: function(data)
              {
                console.log(data);                
                $("#role_form")[0].reset();
                $('#role_model').modal('hide');
                $('.table').load(location.href+' .table');
                toastr.success('Role Store Successfully', 'Successfully Save');
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
    }else{
      $.ajax({
        url : 'roleUpdate',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
              {
                console.log(data);                
                $("#role_form")[0].reset();
                $('#role_model').modal('hide');
                $('.table').load(location.href+' .table');
                toastr.success('Role Store Successfully', 'Successfully Updated');
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
    
  }

  function Edit(id){
    
    $.ajax({
      url : 'roleEdit/'+id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('#myModalLabel8').text('Update Role');
        $('#saveButton').text('Save Change');
        $('input[name=role_name]').val(data.role_name);

$.each([ 'category_read','category_edit','category_del','services_read','services_edit','services_del','customer_read','customer_edit','customer_del','user_read','user_edit','user_del','role_read','role_edit','role_del','order_read','order_edit','order_del','coupon_read','coupon_edit','coupon_del','agent_read','agent_edit','agent_del','slider_read','slider_edit','slider_del','order_report' ], function( index, value ) {

if (data[value] == 'on'){ 
  if ($('#'+value)[0].checked){ 
    // nothing
  }else{
    $('#'+value).trigger('click').attr("checked", "checked"); 
  }
}
else{ 
  if ($('#'+value).checked){ 
    $('#'+value).trigger('click').removeAttr("checked"); 
  }else{ 
    // nothing, already off
  }
}

//alert( index + ": " + value );
});
       
        $('input[name=id]').val(data.id);
        $('#role_model').modal('show');
        action_type = 2;
      }
    });
  }
  
function Delete(id){
  var r = confirm("Are you sure");
  if (r == true) {
    $.ajax({
      url : 'roleDelete/'+id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        toastr.success('role Delete Successfully', 'Successfully Delete');
        $('.table').load(location.href+' .table');
      }
    });
  } 
}
  
</script>


@endsection