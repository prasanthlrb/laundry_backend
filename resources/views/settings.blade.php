@extends('layouts.app')
@section('css-js')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/tinymce/tinymce.min.css">
@endsection
@section('section')
<div class="content-wrapper">
<div class="content-body">
        <section id="horizontal-form-layouts">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                       
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                          <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                          
                          </ul>
                        </div>
                      </div>
                      <div class="card-content collpase show">
                        <div class="card-body">
                          <form class="form form-horizontal" method="POST" action="/update-settings" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">
                              <h4 class="form-section"><i class="ft-user"></i> Account Settings</h4>
                             <input type="hidden" name="id" value="{{$data['id']}}">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Company Name</label>
                                <div class="col-md-9">
                                  <input type="text" class="form-control" 
                                  name="name" value="{{$data['name']}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Email </label>
                                <div class="col-md-9">
                                  <input type="email" class="form-control" 
                                  name="email" value="{{$data['email']}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control">Phone</label>
                                <div class="col-md-9">
                                  <input type="text" id="phone" class="form-control" name="phone" value="{{$data['phone']}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control">City</label>
                                <div class="col-md-9">
                                  <input type="text" id="city" class="form-control" name="city" value="{{$data['city']}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control">Area</label>
                                <div class="col-md-9">
                                  <input type="text" id="area" class="form-control" name="area" value="{{$data['area']}}">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control">Pincode</label>
                                <div class="col-md-9">
                                  <input type="text" id="pincode" class="form-control" name="pincode" value="{{$data['pincode']}}">
                                </div>
                              </div>
                              
                              
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput9">Address</label>
                                <div class="col-md-9">
                                  <textarea id="address" rows="3" class="form-control" name="address">{{$data['address']}}</textarea>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control">Shop License Code</label>
                                <div class="col-md-9">
                                  <input type="text" id="shop_license_code" class="form-control" name="shop_license_code" value="{{$data['shop_license_code']}}">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput9">Shop Address</label>
                                <div class="col-md-9">
                                  <textarea id="shop_address" rows="3" class="form-control" name="shop_address">{{$data['shop_address']}}</textarea>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control">Vat Number</label>
                                <div class="col-md-9">
                                  <input type="text" id="vat_number" class="form-control" name="vat_number" value="{{$data['vat_number']}}">
                                </div>
                              </div>
                              

                              <div class="form-group row">
                                <label class="col-md-3 label-control">Logo</label>
                                <div class="col-md-4">
                                  <input type="file" id="logo" class="form-control" name="logo" >
                                  <input type="hidden" id="logo1" class="form-control" name="logo1" value="{{$data['logo']}}">
                                </div>
                                <div class="col-md-5">
                                  <img style="max-height:100px;height:100px;" src="{{asset('upload_image/').'/'.$data['logo']}}">
                                </div>
                              </div>
                                  
                            </div>


                          
        
                              <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> Update
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
             
                
              </section>
            
</div>
</div>

@endsection

@section('extra-js')
<script src="/app-assets/vendors/js/editors/tinymce/tinymce.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/editors/editor-tinymce.js" type="text/javascript"></script>
<script>
  $('.site-info').addClass('active');
</script>
@endsection