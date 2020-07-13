@extends('layouts.app')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/vendors.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/selects/select2.min.css">

@endsection
@section('section')
<div class="content-wrapper">
    <div class="content-body">
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/categories">Services</a>
                </li>
              <li class="breadcrumb-item">
                  {{$category->title_1}}
                  @if($category->title_2 != '')
                  , {{$category->title_2}}
                  @endif
                </li>
              </ol>
            </div>
          </div>
   <br>
<section id="column-selectors">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
                <button id="open_model" data-backdrop="false" class="btn btn-success round btn-glow px-2" data-toggle="modal">Create Services</button>
          </div>
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">

              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th>S No</th>
                    <th>Service Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 <?php $x=1?>
                @foreach($service as $row)
                <tr>
                <td>{{$x}}</td>
                <td>
                @foreach ($item as $item1)
                  @if($item1->id == $row->item_id)
                  {{$item1->name}}
                  @endif
                @endforeach
                </td>
                <td class="text-center">
                    <span class="dropdown">
          <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
          <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
            
            @if($role_get[0]->services_edit == 'on')
            <a href="javascript:void(null)" onclick="Edit({{$row->id}})" class="dropdown-item"><i class="ft-edit"></i> Edit</a>
            @endif
            @if($role_get[0]->services_del == 'on')
            <a href="#" onclick="Delete({{$row->id}})" class="dropdown-item"><i class="la la-trash"></i> Delete</a>
            @endif

          </span>
        </span>
                    </td>
              
                </tr>
                <?php $x++?>
                  @endforeach
                </tbody>
                <tfoot>
                      <tr>
                    <th>S No</th>
                    <th>Service Name</th>
                    <th>Action</th>
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

  <div class="modal fade text-left" id="attribute_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8"
  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary white">
          <h4 class="modal-title white" id="myModalLabel8">Create Services</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="Category_form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id">
            <input type="hidden" name="cat_id" value="{{ $category->id }}">
        <div class="modal-body">

          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Service Name</label>
            <div class="col-md-9">
              <select id="item_id" name="item_id" class="select2 form-control">
                <option selected="" value="">Select Item</option>
                @foreach($item as $item1)
                  <option value="{{$item1->id}}">{{$item1->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">{{$category->title_1}} Price</label>
            <div class="col-md-9">
              <input type="text" id="price_1" class="form-control" placeholder="Enter your Service Price"
              name="price_1">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">{{$category->title_1}} Duration</label>
            <div class="col-md-9">
              <input type="text" id="duration_1" class="form-control" placeholder="Enter your Service Duration"
              name="duration_1">
            </div>
          </div>

          @if($category->title_2 != '')
          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">{{$category->title_2}} Price</label>
            <div class="col-md-9">
              <input type="text" id="price_2" class="form-control" placeholder="Enter your Service Price"
              name="price_2">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">{{$category->title_2}} Duration</label>
            <div class="col-md-9">
              <input type="text" id="duration_2" class="form-control" placeholder="Enter your Service Duration"
              name="duration_2">
            </div>
          </div>
          @endif

          

        </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-primary" onclick="saveAttr()" id="saveCat">Save</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('extra-js')

<script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="../../../app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
<script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
<script src="../../../app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>

<script>
  $('.select2').css("width","100%");
  
$(".select2").select2({
    dropdownParent: $("#attribute_model")
});

  $('.category-menu').addClass('active');
  var action_type; // the action type used to from data Save And Update
  $('#open_model').click(function(){
    $('#attribute_model').modal('show');
    $("#Category_form")[0].reset();
    
    $("#item_id").select2("val", "");
    action_type = 1;
    $('#saveCat').text('Save');
    $('#myModalLabel8').text('Create Services');
  });


    function saveAttr(){
      $('#saveCat').attr('disabled',true);
      var formData = new FormData($('#Category_form')[0]);
      if(action_type == 1){

        $.ajax({
                url : '/create-services',
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data)
                {
                  $('#saveCat').attr('disabled',false);
                    $("#Category_form")[0].reset();
                     $('#attribute_model').modal('hide');
                     $('.zero-configuration').load(location.href+' .zero-configuration');
                     toastr.success('Category Store Successfully', 'Successfully Save');
                },error: function (data, errorThrown) {
                var errorData = data.responseJSON.errors;
                  $.each(errorData, function(i, obj) {
                    toastr.error(obj[0]);
                  });
                }
            });
      }else{
        $.ajax({
          url : '/update-services',
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          dataType: "JSON",
          success: function(data)
          {
            console.log(data);
            $('#saveCat').attr('disabled',false);
              $("#Category_form")[0].reset();
               $('#attribute_model').modal('hide');
               $('.zero-configuration').load(location.href+' .zero-configuration');
               toastr.success('Category Update Successfully', 'Successfully Update');
          },error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
              toastr.error(obj[0]);
            });
          }
      });
      }

    }

    function Edit(id){

      $.ajax({
        url : '/edit-services/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('#myModalLabel8').text('Update Services');
          $('#saveCat').text('Save Change');
          //$('input[name=name]').val(data.name);
          $("#item_id").select2("val", data.item_id);
          $('input[name=price_1]').val(data.price_1);
          $('input[name=price_2]').val(data.price_2);
          $('input[name=duration_1]').val(data.duration_1);
          $('input[name=duration_2]').val(data.duration_2);
          
          $('input[name=id]').val(id);
          $('#attribute_model').modal('show');
          action_type = 2;
        }
      });
    }
     function Delete(id){
      var r = confirm("Are you sure");
      if (r == true) {
      $.ajax({
        url : '/delete-services/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success('Services Delete Successfully', 'Successfully Delete');
          $('.zero-configuration').load(location.href+' .zero-configuration');
        }
      });
    }
     }
     $('#category_image').change(function(){
      readURL(this);
     });

function readURL(input) {
if (input.files && input.files[0]) {
  var reader = new FileReader();
  reader.onload = function(e) {
    $('#prevImage').attr('src', e.target.result);
  }
  reader.readAsDataURL(input.files[0]);
}
}

</script>
@endsection
