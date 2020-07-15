@extends('layouts.app')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
  
@endsection
@section('section')
<div class="content-wrapper">

    <div class="content-body">     
   
<section id="column-selectors">
    <div class="row">
      <div class="col-12">
        
        <div class="card">
          <div class="card-header">
            
                <button id="open_model" data-backdrop="false" class="btn btn-success round btn-glow px-2" data-toggle="modal">Create Coupon</button>
         
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
                    <th>Coupon Code</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Discount Type</th>
                    <th>Amount</th>
                    @if($role_get[0]->coupon_edit == 'on')
                    <th>Edit</th>
                    @endif
                    @if($role_get[0]->coupon_del == 'on')
                    <th>Delete</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                @php ($x = 0) @endphp
                @foreach($coupon as $row)
                @php $x++ @endphp
                  <tr>
                    <td>{{$x}}</td>
                    <td>
                      @if(date('Y-m-d') > $row->end_date )
                        <span style="color:red">{{$row->coupon_code}}</span>
                      @else
                        <span style="color:green">{{$row->coupon_code}}</span>
                      @endif
                    </td>
                    <td>{{$row->start_date}}</td>
                    <td>{{$row->end_date}}</td>
                    <td>
                      @if($row->discount_type == '1')
                      Discount from product
                      @elseif($row->discount_type == '2')
                      Discount % from product
                      @elseif($row->discount_type == '3')
                      Discount from total cart
                      @else
                      Discount % from total cart
                      @endif
                    </td>
                    <td>{{$row->amount}}</td>
                    @if($role_get[0]->coupon_edit == 'on')
                    <td class="text-center"><a href="/viewCoupon/{{$row->id}}"><i class="ft-edit"></i></a></td>
                    @endif
                    @if($role_get[0]->coupon_del == 'on')
                    <td class="text-center" onclick="Delete({{$row->id}})"><i class="ft-trash-2"></i></td>
                    @endif
                  </tr>
                @endforeach                  
                </tbody>
                <tfoot>
                  <tr>
                    <th>S.No</th>
                    <th>Coupon Code</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Discount Type</th>
                    <th>Amount</th>
                    @if($role_get[0]->coupon_edit == 'on')
                    <th>Edit</th>
                    @endif
                    @if($role_get[0]->coupon_del == 'on')
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

  <div class="modal fade text-left" id="user_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8"
  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary white">
          <h4 class="modal-title white" id="myModalLabel8">Create Role</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="user_form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="Name">Name</label>
            <div class="col-md-9">
              <input type="text" id="emp_name" name="emp_name" class="form-control" placeholder="Name"
              name="name">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 label-control" for="Employee Id">Employee Id</label>
            <div class="col-md-9">
              <input type="text" id="emp_id" name="emp_id" class="form-control" placeholder="Employee Id"
              name="fname">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 label-control" for="Email">Email</label>
            <div class="col-md-9">
              <input type="text" id="email" name="email" class="form-control" placeholder="Email"
              name="fname">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 label-control" for="Select Role">Select Role</label>
            <div class="col-md-9">
              <select id="role_id" name="role_id" class="form-control">
                <option value="none" selected="" disabled="">Select one</option>
                <option value="1">admin</option>
                <option value="2">user</option>
              
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label id="labelpass" class="col-md-3 label-control" for="Password">Password</label>
            <div class="col-md-9">
              <input type="password" class="form-control" placeholder="Password" name="password" id="password">
              <input type="hidden" class="form-control" placeholder="Password" name="newpassword" id="newpassword">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput6">Active Status</label>
            <div class="col-md-9">
              <select id="status" name="status" class="form-control">
                <option value="none" selected="" disabled="">Select one</option>
                <option value="0">Active</option>
                <option value="1">Deactive</option>
              
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

<script>

$('#open_model').click(function(){
  window.location.href="/addCoupon/";
})
     function Delete(id){
      var r = confirm("Are you sure");
      if (r == true) {
      $.ajax({
        url : '/CouponDelete/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success('User Delete Successfully', 'Successfully Delete');
          $('.table').load(location.href+' .table');
        }
      });
    } 
     }
    
</script>


@endsection