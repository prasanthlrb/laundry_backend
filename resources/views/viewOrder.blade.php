
@extends('layouts.app')
@section('extra-css')

@endsection
@section('section')
<div class="content-wrapper">
    <div class="content-body">     
          <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
         
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="order">Order</a>
                </li>
              
                <li class="breadcrumb-item active">Order View
                </li>
              </ol>
              <a href="/add-item/{{$order->id}}"><button data-backdrop="false" class="btn btn-success round btn-glow px-2" data-toggle="modal">Add Item</button></a>
            </div>
          </div>
        </div>
   
    </div>

<div class="content-body">
  <section class="card">
    <div id="invoice-template" class="card-body">
      <!-- Invoice Company Details -->
      <div id="invoice-company-details" class="row">
        <div class="col-md-6 col-sm-12 text-center text-md-left">
          <div class="row">
           
            <div class="media-body">
              <div class="col-md-4">
              <div class="form-group">
                <label for="projectinput5">Order Status</label>
                <select id="orderStatus" name="orderStatus" class="form-control">
                  <option value="0" {{$order->status == 0 ?'selected':''}}>Pending</option>
                  <option value="1" {{$order->status == 1 ?'selected':''}}>Confirmed</option>
                  <option value="2" {{$order->status == 2 ?'selected':''}}>Picked Up</option>
                  <option value="3" {{$order->status == 3 ?'selected':''}}>In Process</option>
                  <option value="4" {{$order->status == 4 ?'selected':''}}>Shipped</option>
                  <option value="5" {{$order->status == 5 ?'selected':''}}>Delivered</option>
                </select>
              </div>
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-primary mr-1" id="orderStatusChangr">
                <i class="la la-check-circle"></i> Apply
                </button>
              </div>
              <!-- </div>
              <div class="media-body"> -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="projectinput5">Assign Agent</label>
                  <select id="agent" name="agent" class="form-control">
                    <option value="" selected="" disabled="">Select One</option>
                    @foreach ($agent as $agent1)
                    @if($order->agent_id == $agent1->id)
                    <option selected="" value="{{$agent1->id}}">{{$agent1->name}}</option>
                    @else
                    <option value="{{$agent1->id}}">{{$agent1->name}}</option>
                    @endif
                    @endforeach
                  </select>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <button type="button" class="btn btn-primary mr-1" id="addAgent">
                  <i class="la la-check-circle"></i> Apply
                  </button>
                </div>
              </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12 text-center text-md-right">
                    <h2>ORDER ID</h2>
                  <p class="pb-3"># {{$order->id}}</p>
                    <p>
                    <span class="text-muted">Order Date :</span> {{$order->created_at}}</p>
                    <p>
                    <span class="text-muted">Payment Type :</span> {{$order->payment_type == 1?"Cash on Delivery":"Online Payment"}}</p>
                  </div>
                </div>
                <!--/ Invoice Company Details -->
                <!-- Invoice Customer Details -->
                <div id="invoice-customer-details" class="row pt-2">
                  <div class="col-sm-8 text-center text-md-left">
                    <p class="text-muted">Bill To</p>
                  </div>
                  <!-- <div class="col-sm-4 text-center text-md-left">
                    <p class="text-muted">Shipping To</p>
                  </div> -->
                  <div class="col-sm-4 text-center text-md-left">
                    <p class="text-muted">Customer :</p>
                  </div>
                  <div class="col-md-8 col-sm-12 text-center text-md-left">
                    <ul class="px-0 list-unstyled">
                    
                     
                    </ul>
                  </div>
                  <!-- <div class="col-md-4 col-sm-12 text-left text-md-left">
                    <ul class="px-0 list-unstyled">
                            
                    </ul>
                  </div> -->
                  <div class="col-md-4 col-sm-12 text-left text-md-left">
                    <ul class="px-0 list-unstyled">
                    <li class="text-bold-800">{{$customer->name}}</li>
                      <li>{{$customer->mobile}}</li>
                      <li>{{$customer->email}}</li>
                    </ul>
                  </div>
                  
                </div>
                <!--/ Invoice Customer Details -->
                <!-- Invoice Items Details -->
                <div id="invoice-items-details" class="pt-2">
                  <div class="row">
                    <div class="table-responsive col-sm-12">
                      <table class="table">
                      <tr style="text-align: center;">
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Laundry</th>
                        <th>Dry Clean</th>
                        <th>Iron</th>
                        <th>Express <br> Laundry</th>
                        <th>Express <br> Dry Clean</th>
                        <th>Express <br> Iron</th>
                        <th>Total</th>
                      </tr>
                      @foreach($order_item as $row)
                      <tr>
                        <td>
                        @foreach ($item as $item1)
                          @if($item1->id == $row->item_id)
                          {{$item1->name}}
                          @endif
                        @endforeach
                        </td>
                        <td>{{$row->qty}}</td>
                        <td>{{$row->laundry_price}}</td>
                        <td>{{$row->dry_clean_price}}</td>
                        <td>{{$row->iron_price}}</td>
                        <td>{{$row->express_laundry_price}}</td>
                        <td>{{$row->express_dry_clean_price}}</td>
                        <td>{{$row->express_iron_price}}</td>
                        <td>{{$row->total}}</td>
                      </tr>
                      @endforeach
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7 col-sm-12 text-center text-md-left">

                    </div> 
                    <div class="col-md-5 col-sm-12">
                      <p class="lead">Calculate</p>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <td>Total</td>
                              <td class="pink text-right">{{$order->total}}</td>
                            </tr>
                           
                          </tbody>
                        </table>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <!-- Invoice Footer -->
                {{-- <div id="invoice-footer">
                  <div class="row">
                    <div class="col-md-7 col-sm-12">
                      <h6>Terms & Condition</h6>
                      <p>You know, being a test pilot isn't always the healthiest business
                        in the world. We predict too much for the next year and yet far
                        too little for the next 10.</p>
                    </div>
                    <div class="col-md-5 col-sm-12 text-center">
                      <button type="button" class="btn btn-info btn-lg my-1"><i class="la la-paper-plane-o"></i> Send Invoice</button>
                    </div>
                  </div>
                </div> --}}
                <!--/ Invoice Footer -->
              </div>
            </section>
          </div>
    </div>
  </div>


@endsection
@section('extra-js')

<script>
$('#orderStatusChangr').click(function(){
    var orderStatus = $('#orderStatus').val();
    $.ajax({
            url:"/changeStatusview",
            method:"get",
            data:{id:"{{$order->id}}",status:orderStatus},
            success:function(data){
                toastr.success(data);
            }
        })
})
$('#addAgent').click(function(){
    var agent = $('#agent').val();
    $.ajax({
            url:"/assign-agent-view",
            method:"get",
            data:{id:"{{$order->id}}",agent:agent},
            success:function(data){
                toastr.success('Add Agent Successfully', 'Successfully Save');
            }
        })
})
</script>

@endsection