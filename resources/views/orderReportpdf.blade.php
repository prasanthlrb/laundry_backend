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
      <thead>
        <tr>
          	<th>#</th>
          	<th>Invoice No</th>
          	<th>Date</th>
            <th>Payment Status</th>
            <th>Payment Type</th>
            <th>Discount</th>
            <th>Delivery Type</th>
            <th>Total</th>
        </tr>
      </thead>
      <tbody>
	    @foreach($data as $x => $row)
	        <tr>
	          <td>
	              {{$x+1}}
	          </td>
            <td>
                #{{$row->id}}
            </td>
	          <td>
	              {{date('d-m-Y',strtotime($row->date))}}
	          </td>
	          <td>
	              @if ($row->payment_status == 0)
                  Un Paid
                @else
                  Paid
                @endif
	          </td>
            <td>
                @if ($row->payment_type == 0)
                  Cash
                @else
                  Online
                @endif
            </td>
	          <td>{{$row->coupon_value}}</td>
            <td>{{$row->delivery_option}}</td>
            <td>{{$row->total}}</td>
	        </tr>
	    @endforeach
      </tbody>
    </table>
    </div>
  </div>

</div>


</div>

</body>
</html>
