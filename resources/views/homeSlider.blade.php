@extends('layouts.app')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  
@endsection
@section('section')
<div class="content-wrapper">

    <div class="content-body">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
   
<section id="column-selectors">
    <div class="row">
      <div class="col-12">
        
        <div class="card">
          <div class="card-header">
            
                <button id="open_model" data-backdrop="false" class="btn btn-success round btn-glow px-2" data-toggle="modal">Create Slider</button>
            
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
             
              <table id="draggable" class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th>Position</th>                   
                    <th>Slider Image</th>
                      <th>Title</th>  
                	  <th>Description</th>                     
                    @if($role_get[0]->slider_edit == 'on')
                    <th>Edit</th>
                    @endif
                    @if($role_get[0]->slider_del == 'on')
                    <th>Delete</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach($home_slider as $row)
                  <tr id="<?php echo $row->id ?>" class="ui-draggable ui-draggable-handle ui-sortable-handle">
                    <td>{{$row->position}}</td>
                    <td><img style="width: 100px;" src="{{asset('upload_slider/').'/'.$row->image}}" alt=""></td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->text}}</td>
                    @if($role_get[0]->slider_edit == 'on')
                    <td class="text-center" onclick="Edit({{$row->id}})"><i class="ft-edit"></i></td>
                    @endif
                    @if($role_get[0]->slider_del == 'on')
                    <td class="text-center" onclick="Delete({{$row->id}})"><i class="ft-trash-2"></i></td>
                    @endif
                    <input type="hidden" value="<?php echo $row->id; ?>" id="item" name="item">
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Position</th>                   
                	  <th>Slider Image</th>  
                	  <th>Title</th>  
                	  <th>Description</th>  
                    @if($role_get[0]->slider_edit == 'on')
                    <th>Edit</th>
                    @endif
                    @if($role_get[0]->slider_del == 'on')
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

  <div class="modal fade text-left" id="brand_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8"
  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary white">
          <h4 class="modal-title white" id="myModalLabel8">Create Slider</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="brand_form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id">
        <div class="modal-body">
            <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Title</label>
            <div class="col-md-9">
              <input type="text" id="title" class="form-control" placeholder="Enter title"
              name="title">
            </div>
          </div>

            <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Description</label>
            <div class="col-md-9">
              <textarea name="text" id="text" cols="30" rows="10" class="form-control"></textarea>
             
            </div>
          </div>


          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Slider Image</label>
            <div class="col-md-9">
              <input type="hidden" name="image1" id="image1">
              <input type="file" class="form-control" placeholder="Enter your Slider Image"
              name="image" id="image">
            </div>
          </div>
          
          
        </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-primary" onclick="Save()" id="saveCat">Save</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('extra-js')

<script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>

 
  <script src="../../../app-assets/js/scripts/tables/datatables/datatable-basic.js"
  type="text/javascript"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  var $sortable = $( "#draggable > tbody" );
  $sortable.sortable({
      stop: function ( event, ui ) {
          var parameters = $sortable.sortable( "toArray" );
          $.ajax({
            url : 'changeSliderOrder',
            type: "POST",
            data: {
              value:parameters,
              _token: '{{csrf_token()}}'
            },
            dataType: "JSON",
            success: function(data)
            {                
              location.reload();
            }
          });
      }
  });
</script>
 
<script>
  var action_type;
  $('#open_model').click(function(){
    $('#brand_model').modal('show');
    $("#brand_form")[0].reset();
    action_type = 1;
    $('#saveCat').text('Save');
    $('#myModalLabel8').text('Create Slider');
  })
    function Save(){
      var formData = new FormData($('#brand_form')[0]);
      if(action_type == 1){

        $.ajax({
                url : 'sliderSave',
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data)
                {                
                 
                    $("#brand_form")[0].reset();
                     $('#brand_model').modal('hide');
                     $('.zero-configuration').load(location.href+' .zero-configuration');
                     toastr.success('Slider Store Successfully', 'Successfully Save');
                },error: function (data) {
                  
                  toastr.error('Field Is', 'Required!');
              }
            });
      }else{
        $.ajax({
          url : 'sliderUpdate',
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          dataType: "JSON",
          success: function(data)
          {
         
              $("#brand_form")[0].reset();
               $('#brand_model').modal('hide');
               $('.zero-configuration').load(location.href+' .zero-configuration');
               toastr.success('Brand Update Successfully', 'Successfully Update');
          },error: function (data) {
            toastr.error('Field Is', 'Required!');
        }
      });
      }
      
    }

    function Edit(id){
      
      $.ajax({
        url : 'sliderEdit/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('#myModalLabel8').text('Update Slider');
          $('#saveCat').text('Save Change');
          $('input[name=image1]').val(data.image);
          $('input[name=id]').val(id);
          $('input[name=title]').val(data.title);
          $('textarea[name=text]').val(data.text);
          $('#brand_model').modal('show');
          action_type = 2;
        }
      });
    }
     function Delete(id){
      var r = confirm("Are you sure");
      if (r == true) {
      $.ajax({
        url : 'sliderDelete/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success('Slider Delete Successfully', 'Successfully Delete');
          $('.zero-configuration').load(location.href+' .zero-configuration');
        }
      });
    } 
     }
    
</script>
@endsection