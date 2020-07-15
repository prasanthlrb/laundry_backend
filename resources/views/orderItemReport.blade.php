@extends('layouts.app')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/pickers/daterange/daterange.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/daterange/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/pickadate/pickadate.css">
@endsection
@section('section')
<div class="content-wrapper">
        <div class="content-header row">
              <div class="col-lg-12 col-md-12">
                <div class="card" >
                  <div class="card-header">
                    <h4 class="card-title">Report</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                      <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                      </ul>
                    </div>
                  </div>
                  <div class="card-content collapse show">
                    <div class="card-body">
                      <!-- <p>Add <code>.disabled</code> to a <code>.list-group-item</code>to gray it out to appear disabled.</p> -->
                      <!-- <div class="list-group">
                        <a href="#" class="list-group-item disabled">
                                  Cras justo odio
                              </a>
                        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item">Morbi leo risus</a>
                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item">Vestibulum at eros</a>
                      </div> -->
                    <form target="_blank" method="post" action="/order-item-report">
                    {{csrf_field()}}
                      <div class="row">
                        <div class="form-group col-sm-3 col-md-3">
                          <h3 class="content-header-title">From Date</h3>
                          <input autocomplete="off" type='text' class="form-control singledate" id="from_date" name="from_date"  />
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                          <h3 class="content-header-title">To Date</h3>
                          <input autocomplete="off" type="text" class="form-control singledate" id="to_date" name="to_date">
                        </div>
                        <!-- <div class="form-group col-sm-3 col-md-3">
                          <h3 class="content-header-title">Area</h3>
                          <input type="text" class="form-control" id="area" name="area">
                        </div> -->

                        <div class="form-group col-sm-3 col-md-3">
                          <h3 class="content-header-title">Customer</h3>
                          <select class="select2 form-control" name="customer">
                            <option value="">SELECT</option>
                            @foreach($customer as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group col-sm-3 col-md-3">
                          <h3 class="content-header-title">Status</h3>
                          <select class="select2 form-control" name="status">
                            <option value="" selected="">All</option>
                            <option value="0">Pending</option>
                            <option value="1">Confirmed</option>
                            <option value="2">Picked Up</option>
                            <option value="3">In Process</option>
                            <option value="4">Shipped</option>
                            <option value="5">Delivered</option>
                          </select>
                        </div>

                        <div class="form-group col-sm-3 col-md-3">
                          <h3 class="content-header-title">Payment Status</h3>
                          <select class="select2 form-control" name="payment_status">
                            <option value="" selected="">All</option>
                            <option value="0">Un Paid</option>
                            <option value="1">Paid</option>
                          </select>
                        </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-sm-12 col-md-12">
                      <button type="submit" id="clone-button" class="btn btn-primary">
                              <i class="ft-plus"></i> Search
                      </button>
                      <button type="reset" id="clone-button" class="btn btn-primary">
                              <i class="ft-plus"></i> Reset
                      </button>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
              </div>



        </div>
      </div>
</div>
@endsection
@section('extra-js')
<script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.time.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/pickers/pickadate/legacy.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js"
  type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/pickers/daterange/daterangepicker.js"
  type="text/javascript"></script>

<script>
$('.report').addClass('active');
$('.singledate').daterangepicker({
  singleDatePicker: true,
  showDropdowns: true
});
$('#from_date').val('');
$('#to_date').val('');
</script>
@endsection
