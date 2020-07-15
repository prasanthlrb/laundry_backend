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
            
                <button id="open_model" data-backdrop="false" class="btn btn-success round btn-glow px-2" data-toggle="modal">Create Area</button>
         
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
                    <th>City Name</th>
                    <th>Area Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                @php ($x = 0) @endphp
                @foreach($area as $row)
                @php $x++ @endphp
                  <tr>
                    <td>{{$x}}</td>
                    <td>{{$row->city_name}}</td>
                    <td>{{$row->area_name}}</td>
                    <td class="text-center" onclick="Edit({{$row->id}})"><i class="ft-edit"></i></td>
                    <td class="text-center" onclick="Delete({{$row->id}})"><i class="ft-trash-2"></i></td>
                  </tr>
                @endforeach                  
                </tbody>
                <tfoot>
                  <tr>
                    <th>S.No</th>
                    <th>City Name</th>
                    <th>Area Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
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
          <h4 class="modal-title white" id="myModalLabel8">Create Item</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="user_form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-md-3 label-control">City Name</label>
            <div class="col-md-9">
              <input type="text" id="city_name" name="city_name" class="form-control" placeholder="Item">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 label-control">Area Name</label>
            <div class="col-md-9">
              <input type="text" id="area_name" name="area_name" class="form-control" placeholder="Item">
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
  var action_type;
  $('#open_model').click(function(){
    $('#user_model').modal('show');
    action_type = 1;
    $('#saveButton').text('Save');
    $('#myModalLabel8').text('Create Area');
  })
    function Save(){
      var formData = new FormData($('#user_form')[0]);
      if(action_type == 1){

        $.ajax({
                url : 'save-area',
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data)
                {
                  console.log(data);                
                  $("#user_form")[0].reset();
                  $('#user_model').modal('hide');
                  $('.table').load(location.href+' .table');
                  toastr.success('Area Store Successfully', 'Successfully Save');
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
          url : 'update-area',
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          dataType: "JSON",
          success: function(data)
                {
                  console.log(data);                
                  $("#user_form")[0].reset();
                  $('#user_model').modal('hide');
                  $('.table').load(location.href+' .table');
                  toastr.success('Area Store Successfully', 'Successfully Updated');
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
        url : 'edit-area/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('#myModalLabel8').text('Update Area');
          $('#saveButton').text('Save Change');
          $('input[name=area_name]').val(data.area_name);
          $('input[name=city_name]').val(data.city_name);
          $('input[name=id]').val(data.id);
          $('#user_model').modal('show');
          action_type = 2;
        }
      });
    }
     function Delete(id){
      var r = confirm("Are you sure");
      if (r == true) {
      $.ajax({
        url : 'area-delete/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success('Area Delete Successfully', 'Successfully Delete');
          $('.table').load(location.href+' .table');
        }
      });
    } 
     }
    
</script>


@endsection