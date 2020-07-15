@extends('layouts.app')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/vendors.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/selects/select2.min.css">

@endsection
@section('section')
<div class="content-wrapper">

    <div class="content-body">     
   
<section id="column-selectors">
    <div class="row">
      <div class="col-12">
        
        <div class="card">
          <div class="card-header">
            <button id="open_model" data-backdrop="false" class="btn btn-success round btn-glow px-2" data-toggle="modal">Add Item</button>
          </div>
      
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
             <div class="table-responsive">
	            <style type="text/css">
	                .table td{
	                     padding: .0rem !important; 
	                }
	                .table th{
	                     padding: .30rem !important; 
	                }
	            </style>
	          <form method="post" id="form" enctype="multipart/form-data">
	          	{{ csrf_field() }}
              <table id="productTable" class="table table-primary table-bordered mb-0">
                <thead class="thead-primary">
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
                        <th></th>
                    </tr>
                </thead>
                <tbody id="productTabletbody">
                	
                </tbody>
                <tfoot>
	            	<tr>
	                    <td colspan="7">
	                        <input type="hidden" name="number_of_product" id="number_of_product" class="form-control">
	                        <input type="hidden" name="number_of_qty" id="number_of_qty" class="form-control">
	                    </td>
	                    <td>Sub Total</td>
	                    <td><input style="text-align: right;" value="0" type="text" name="sub_total" id="sub_total" autocomplete="off" class="form-control" readonly="true" /></td>
	                    <td></td>
	                </tr>
	            </tfoot>
            </table>
        	</form>>
            <hr>
            <button id="btnSave" style="float: right;margin-right: 100px;" onclick="Save()" class="btn btn-primary" type="button">Save</button>
			</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 
</div>
    </div>
  </div>


  <div class="modal fade text-left" id="popup_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary white">
          <h4 class="modal-title white" id="myModalLabel8">Add Item</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="Category_form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="o_id" id="o_id" value="{{ $order_id }}">
        <div class="modal-body">

          <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput1">Search Item</label>
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
            <label class="col-md-3 label-control" for="projectinput1">Qty</label>
            <div class="col-md-9">
              <input type="text" id="qty" class="form-control" name="qty">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-2 label-control">Laundry</label>
            <div class="col-md-2">
              <input type="checkbox" id="laundry" class="form-control" name="laundry">
            </div>
            <label class="col-md-2 label-control">Dry Clean</label>
            <div class="col-md-2">
              <input type="checkbox" id="dry_clean" class="form-control" name="dry_clean">
            </div>
            <label class="col-md-2 label-control">Iron</label>
            <div class="col-md-2">
              <input type="checkbox" id="iron" class="form-control" name="iron">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-2 label-control">Express Laundry</label>
            <div class="col-md-2">
              <input type="checkbox" id="express_laundry" class="form-control" name="express_laundry">
            </div>
            <label class="col-md-2 label-control">Express Dry Clean</label>
            <div class="col-md-2">
              <input type="checkbox" id="express_dry_clean" class="form-control" name="express_dry_clean">
            </div>
            <label class="col-md-2 label-control">Express Iron</label>
            <div class="col-md-2">
              <input type="checkbox" id="express_iron" class="form-control" name="express_iron">
            </div>
          </div>

        </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-primary" onclick="addItem()" id="saveCat">Add Item</button>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('extra-js')

  <script src="../../../app-assets/vendors/js/tables/jszip.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/tables/pdfmake.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/tables/vfs_fonts.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/tables/buttons.html5.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/tables/buttons.print.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/tables/buttons.colVis.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
<script>
  $('.select2').css("width","100%");
  // $('.select2').select2();

$(".select2").select2({
    dropdownParent: $("#popup_model")
});

$('#open_model').click(function(){
	$('#popup_model').modal('show');
	$("#Category_form")[0].reset();
	$("#item_id").select2("val", "");
	$('#saveCat').text('Save');
	$('#myModalLabel8').text('Add Item');
});


function addItem() {
	var tableLength = $("#productTable tbody tr").length;

	var tableRow;
	var arrayNumber;
	var count;

	if(tableLength > 0) {		
		tableRow = $("#productTable tbody tr:last").attr('id');
		arrayNumber = $("#productTable tbody tr:last").attr('class');
		count = tableRow.substring(3);	
		count = Number(count) + 1;
		arrayNumber = Number(arrayNumber) + 1;					
	} else {
		count = 1;
		arrayNumber = 0;
	}




var tr = '<tr value="'+count+'" id="row'+count+'">'+
  	'<td>'+
		'<input class="form-control" type="text" name="item[]" id="item'+count+'" autocomplete="off"  />'+
		'<input type="hidden" name="order_id[]" id="order_id'+count+'" autocomplete="off" class="form-control" />'+
		'<input type="hidden" name="item_id[]" id="item_id'+count+'" autocomplete="off" class="form-control" />'+
	'</td>'+
	'<td>'+
		'<input style="text-align:right;" value="0" type="text" name="qty[]" id="qty'+count+'" autocomplete="off" class="form-control" />'+
	'</td>'+
	'<td>'+
		'<input style="text-align:right;" value="0" type="text" name="laundry_price[]" id="laundry_price'+count+'" autocomplete="off" class="form-control" />'+
	'</td>'+
	'<td>'+
		'<input style="text-align:right;" value="0" type="text" name="dry_clean_price[]" id="dry_clean_price'+count+'" autocomplete="off" class="form-control" />'+
	'</td>'+
	'<td>'+
		'<input style="text-align:right;" value="0" type="text" name="iron_price[]" id="iron_price'+count+'" autocomplete="off" class="form-control" />'+
	'</td>'+
	'<td>'+
		'<input style="text-align:right;" value="0" type="text" name="express_laundry_price[]" id="express_laundry_price'+count+'" autocomplete="off" class="form-control" />'+
	'</td>'+
	'<td>'+
		'<input style="text-align:right;" value="0" type="text" name="express_dry_clean_price[]" id="express_dry_clean_price'+count+'" autocomplete="off" class="form-control" />'+
	'</td>'+
	'<td>'+
		'<input style="text-align:right;" value="0" type="text" name="express_iron_price[]" id="express_iron_price'+count+'" autocomplete="off" class="form-control" />'+
	'</td>'+
	
	'<td>'+
		'<input style="text-align: right;" value='+total+' type="text" name="total[]" id="total'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
	'</td>'+
	'<td align="center">'+
		'<button id="removeProductRowBtn'+count+'" class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="la la-trash"></i></button>'+
	'</td>'+
'</tr>';


if(tableLength > 0) {							
	$("#productTable tbody tr:last").after(tr);
} else {				
	$("#productTable tbody").append(tr);
}		


var item_id = $("#item_id").val();
var order_id = $("#o_id").val();
var qty = Number($("#qty").val());
$("#qty"+count).val(qty);
$("#order_id"+count).val(order_id);
$("#item_id"+count).val(item_id);
// var laundry = $("#laundry").val();
// var dry_clean = $("#dry_clean").val();
// var iron = $("#iron").val();
// var express_laundry = $("#express_laundry").val();
// var express_dry_clean = $("#express_dry_clean").val();
// var express_iron = $("#express_iron").val();

var laundry_price = 0;
var dry_clean_price = 0;
var iron_price = 0;
var express_laundry_price = 0;
var express_dry_clean_price = 0;
var express_iron_price = 0;
var total = 0;


$.ajax({
	url : '/ItemEdit/'+item_id,
	type: "GET",
	dataType: "JSON",
	success: function(data)
	{
		//alert(data.item);
	  $("#item"+count).val(data.name);
	}
});

$.ajax({
    url : '/get-item-price/'+item_id,
    type: "GET",
    dataType: "JSON",
    success:function(response) 
    {
 	
	jQuery.each( response, function( i, val ) {
	    // alert(val.price_1);
	    if($('#laundry').is(":checked"))
  		{
  			if(val.cat_id == '1'){
				laundry_price = qty * Number(val.price_1);
  				$("#laundry_price"+count).val(laundry_price);
  			}
  		}
  		if($('#express_laundry').is(":checked"))
  		{
  			if(val.cat_id == '1'){
				express_laundry_price = qty * Number(val.price_2);
				$("#express_laundry_price"+count).val(express_laundry_price);
  			}
  		}
  		if($('#dry_clean').is(":checked"))
  		{
  			if(val.cat_id == '2'){
				dry_clean_price = qty * Number(val.price_1);
				$("#dry_clean_price"+count).val(dry_clean_price);
  			}
  		}
  		if($('#express_dry_clean').is(":checked"))
  		{
  			if(val.cat_id == '2'){
				express_dry_clean_price = qty * Number(val.price_2);
				$("#express_dry_clean_price"+count).val(express_dry_clean_price);
  			}
  		}
  		if($('#iron').is(":checked"))
  		{
  			if(val.cat_id == '3'){
				iron_price = qty * Number(val.price_1);
				$("#iron_price"+count).val(iron_price);
  			}
  		}
  		if($('#express_iron').is(":checked"))
  		{
  			if(val.cat_id == '3'){
				express_iron_price = qty * Number(val.price_2);
				$("#express_iron_price"+count).val(express_iron_price);
  			}
  		}

  		total=Number(laundry_price) + Number(express_laundry_price) + Number(dry_clean_price) + Number(express_dry_clean_price) + Number(iron_price) + Number(express_iron_price);
  		$("#total"+count).val(total);

	});
		
		subAmount();
    }
});



$('#popup_model').modal('hide');
} // /add item


function removeProductRow(row = null)
{
	if(confirm('Are you sure delete this row?'))
	{
	   	var tableProductLength = $("#productTable tbody tr").length;

		// if(tableProductLength > '1') {
			$("#row"+row).remove();
			subAmount();
		// }
	}
}


function subAmount() {
	var tableProductLength = $("#productTable tbody tr").length;
	var total = 0;
	var number_of_qty = 0;
	var number_of_product = 0;

	for(x = 0; x < tableProductLength; x++) {
		var tr = $("#productTable tbody tr")[x];
		var count = $(tr).attr('id');
		count = count.substring(3);

		total = Number(total) + Number($("#total"+count).val());

		number_of_qty = Number(number_of_qty) + Number($("#qty"+count).val());

		if($("#item"+count).val() != ''){
			number_of_product++;
		}
	} 

	$("#number_of_qty").val(number_of_qty.toFixed(2));
	$("#number_of_product").val(number_of_product);
	
	$("#sub_total").val(Math.round(total));
}


function Save(){
    $("#btnSave").attr("disabled", true);
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/save-item',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
          console.log(data);                
          $("#form")[0].reset();
          toastr.success('Successfully Save');

          location.reload();
        },error: function (data, errorThrown) {
            var errorData = data.responseJSON.errors;
            $("#btnSave").attr("disabled", false);
        }
    });
}

</script>


@endsection