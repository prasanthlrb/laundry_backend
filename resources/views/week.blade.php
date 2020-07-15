@extends('layouts.app')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">


@endsection
@section('section')
<div class="content-wrapper">

    <div class="content-body">
<section id="column-selectors">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <!-- <div class="card-header">
                <button id="open_model" data-backdrop="false" class="btn btn-success round btn-glow px-2" data-toggle="modal">Create Category</button>
          </div> -->
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th>S No</th>
                    <th>Weeks</th>
                  </tr>
                  
                </thead>
                <tbody>
                 <?php $x=1?>
                @foreach($week as $row)
                <tr>
                <td>{{$x}}</td>
                
                <td><a href="/schedule/{{$row->id}}">{{$row->name}}</a></td>
                
                
                </tr>
                <?php $x++?>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>S No</th>
                    <th>Weeks</th>
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
          <h4 class="modal-title white" id="myModalLabel8">Create Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="Category_form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id">
            <input type="hidden" name="parent_id" value="{{ Request::segment(3) }}">
        <div class="modal-body">

          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Category 1</label>
            <div class="col-md-9">
              <input type="text" id="title_1" class="form-control" placeholder="Enter your Category Name"
              name="title_1">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Category 2</label>
            <div class="col-md-9">
              <input type="text" id="title_2" class="form-control" placeholder="Enter your Category Name"
              name="title_2">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Category Image</label>
            <div class="col-md-9">
              <input id="image" type="file" class="form-control" accept="image/*" name="image" />
              <div id="preview"><img id="prevImage" style="width:120px;padding-top:20px;" src="" /></div><br>
            </div>
          </div>
            <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Service Time</label>
            <div class="col-md-9">
              <input type="text" id="time" class="form-control"
              name="time">
            </div>
          </div>
        

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

<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>


  <script src="{{ asset('app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"
  type="text/javascript"></script>
<script>
  $('.category-menu').addClass('active');
  var action_type; // the action type used to from data Save And Update
  $('#open_model').click(function(){
    $('#attribute_model').modal('show');
    $("#Category_form")[0].reset();
    $('#prevImage').attr('src', '');
    action_type = 1;
    $('#saveCat').text('Save');
    $('#myModalLabel8').text('Create Category');
  });


    function saveAttr(){
      $('#saveCat').attr('disabled',true);
      var formData = new FormData($('#Category_form')[0]);

        $.ajax({
          url : '/update-categories',
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

    function Edit(id){

      $.ajax({
        url : '/categories/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('#myModalLabel8').text('Update Attribute');
          $('#saveCat').text('Save Change');
          $('input[name=title_1]').val(data.title_1);
          $('input[name=title_2]').val(data.title_2);
          $('#prevImage').attr('src', '/category/'+data.image);
          $('input[name=time]').val(data.time);
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
        url : '/delete-categories/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success('Category Delete Successfully', 'Successfully Delete');
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
