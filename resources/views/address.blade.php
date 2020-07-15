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
                    <th>Map Title</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Type</th>
                    <th>Address Title</th>
                    <th>View</th>
                  </tr>
                  
                </thead>
                <tbody>
                 <?php $x=1?>
                @foreach($address as $row)
                <tr>
                <td onclick="Edit({{$row->id}})">{{$row->map_title}}</td>
                <td>{{$row->lat}}</td>
                <td>{{$row->lng}}</td>
                <td>{{$row->addr_type}}</td>
                <td>{{$row->addr_title}}</td>
                <td class="text-center" onclick="Edit({{$row->id}})">View</td>
                </tr>
                <?php $x++?>
                  @endforeach
                </tbody>
                <tfoot>
                   <tr>
                    <th>Map Title</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Type</th>
                    <th>Address Title</th>
                    <th>View</th>
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
          <h4 class="modal-title white" id="myModalLabel8">View Address</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="Category_form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id">
        <div class="modal-body">

          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Map Title</label>
            <div class="col-md-9">
              <input type="text" id="map_title" class="form-control"
              name="map_title">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Latitude</label>
            <div class="col-md-9">
              <input type="text" id="lat" class="form-control"
              name="lat">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Longitude</label>
            <div class="col-md-9">
              <input type="text" id="lng" class="form-control"
              name="lng">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Address Type</label>
            <div class="col-md-9">
              <input type="text" id="addr_type" class="form-control"
              name="addr_type">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Address Title</label>
            <div class="col-md-9">
              <input type="text" id="addr_title" class="form-control"
              name="addr_title">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Address 1</label>
            <div class="col-md-9">
              <input type="text" id="address1" class="form-control"
              name="address1">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Address 2</label>
            <div class="col-md-9">
              <input type="text" id="address2" class="form-control"
              name="address2">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Address 3</label>
            <div class="col-md-9">
              <input type="text" id="address3" class="form-control"
              name="address3">
            </div>
          </div>
        

        </div>
        </form>
        <!-- <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-primary" onclick="saveAttr()" id="saveCat">Save</button>
        </div> -->
      </div>
    </div>
  </div>
@endsection
@section('extra-js')

<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>


  <script src="{{ asset('app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"
  type="text/javascript"></script>
<script>
  $('.customer').addClass('active');


function Edit(id){

      $.ajax({
        url : '/edit-address/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('#myModalLabel8').text('View Address');
          $('#saveCat').text('Save Change');
          $('input[name=map_title]').val(data.map_title);
          $('input[name=lat]').val(data.lat);
          $('input[name=lng]').val(data.lng);
          $('input[name=addr_type]').val(data.addr_type);
          $('input[name=addr_title]').val(data.addr_title);
          $('input[name=address1]').val(data.address1);
          $('input[name=address2]').val(data.address2);
          $('input[name=address3]').val(data.address3);
          $('input[name=id]').val(id);
          $('#attribute_model').modal('show');
          action_type = 2;
        }
      });
    }

</script>
@endsection
