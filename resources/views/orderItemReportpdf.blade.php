<!DOCTYPE html>
<html lang="en">
<head>
  <title>Order Report</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">

  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="text-align:center;">
            @if($fdate !="1970-01-01" && $tdate !="1970-01-01" )
            {{date('d-m-Y',strtotime($fdate))}} to {{date('d-m-Y',strtotime($tdate))}}
            @endif
          </th>
        </tr>
      </thead>
    </table>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
    <table style="width: 100%;font-size: 12px;" class="table table-bordered table-sm">
      @if(!empty($data))
    
    <?php $t_ids=array(); ?>
    <?php $t_ids1=array(); $x = 0;  $y = 0 ; ?>
    @foreach($data as $item)
    <?php  $x++; ?>

    @if(!in_array($item->order_id, $t_ids))
    	<tr>
            <th>Invoice No</th>
            <th>Date</th>
            <th>Payment Status</th>
            <th>Payment Type</th>
            <th>Discount</th>
            <th>Delivery Type</th>
        </tr>
      <tr>
            <td>
                #{{$item->order_id}}
            </td>
            <td>
                {{date('d-m-Y',strtotime($item->date))}}
            </td>
            <td>
                @if ($item->payment_status == 0)
                  Un Paid
                @else
                  Paid
                @endif
            </td>
            <td>
                @if ($item->payment_type == 0)
                  Cash
                @else
                  Online
                @endif
            </td>
            <td>{{$item->coupon_value}}</td>
            <td>{{$item->delivery_option}}</td>
          </tr>
      <tr>
        <th colspan="2">Item</th>
        <th>Wash & Iron</th>
        <th>Dry Clean</th>
        <th>Iron</th>
        <th>Total</th>
      </tr>
      <?php 
    
      $total_qty=0;
      $total_balance=0;
      ?>
      @foreach($data as $item1)
      @if($item->order_id == $item1->order_id)
      <?php $y++; ?>
      @endif
      @endforeach
      <?php $t_ids1[]=$y; ?>
    @endif
    
    <?php 
    $t_ids[]=$item->order_id; 
    
    ?>
      <tr>
        
        <td colspan="2">
            {{$item->name}}
        </td>
        <td>{{$item->laundry_price}} * {{$item->laundry_qty}}</td>
        <td>{{$item->dry_clean_price}} * {{$item->dry_clean_qty}}</td>
        <td>{{$item->iron_price}} * {{$item->iron_qty}}</td>
        <td>{{$item->total}}</td>
      </tr>
    @endforeach

@endif
      </tbody>
    </table>
    </div>
  </div>

</div>


</div>

</body>
</html>
