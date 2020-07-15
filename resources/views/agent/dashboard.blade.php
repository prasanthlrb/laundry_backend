@extends('layouts.app')
@section('extra-css')

@endsection
@section('section')
<div class="content-wrapper">

    <div class="content-body">
      <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                  <h3 class="info"></h3>
                    <h6>Total Product</h6>
                  </div>
                  <div>
                    <i class="icon-basket-loaded info font-large-2 float-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                  <h3 class="danger"></h3>
                    <h6>Low Stock Product</h6>
                  </div>
                  <div>
                    <i class="ft ft-shopping-cart danger font-large-2 float-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                  <h3 class="success"></h3>
                    <h6>Total Customer</h6>
                  </div>
                  <div>
                    <i class="icon-user-follow success font-large-2 float-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                  <h3 class="warning"></h3>
                    <h6>Total Orders</h6>
                  </div>
                  <div>
                    <i class="icon-bag warning font-large-2 float-right"></i>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">
         
            <div class="col-12 col-md-6">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title text-center">Revenue</h4>
                      </div>
                      <div class="card-content collapse show">
                        <div class="card-body pt-0">
                          <div class="row">
                            <div class="col-md-6 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                
                              <br>
                              <h4 class="font-large-2 text-bold-400">₹ </h4>
                              <p class="blue-grey lighten-2 mb-0">Current Month</p>
                            </div>
                            <div class="col-md-6 col-12 text-center">
                              <br>
                              <h4 class="font-large-2 text-bold-400">₹ </h4>
                              <p class="blue-grey lighten-2 mb-0">Previous Month
                                  </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 
        <div class="col-xl-6 col-12">
          <div class="row">
                <div class="col-lg-6 col-12">
                        <div class="card">
                          <div class="card-header">
                            <h4 class="card-title">Top Products of Month</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                          </div>
                          <div class="card-content collapse show">
                            <div class="card-body p-0">
                              <div class="table-responsive">
                                <table class="table mb-0">
                                  <tbody>
                                  
                                      
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                     
            <div class="col-lg-6 col-12">
                    <div class="card">
                            <div class="card-header">
                              <h4 class="card-title">Top Customer of Month</h4>
                              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                            </div>
                            <div class="card-content collapse show">
                              <div class="card-body p-0">
                                <div class="table-responsive">
                                  <table class="table mb-0">
                                    <tbody>
                     
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
            </div>
           
          </div>

        </div>
      </div>



    </div>
  </div>

@endsection
@section('extra-js')
<script>
$('.dashboard').addClass('active');
</script>

    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../../../app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <script src="../../../app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
    <script src="../../../app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../../../app-assets/js/scripts/pages/dashboard-sales.js" type="text/javascript"></script>
@endsection
