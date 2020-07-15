
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content=" width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Isalon Send Email</title>
	<style type="text/css">
		
		/* Client-specific Styles */
		
		#outlook a { padding:0; } /* Force Outlook to provide a "view in browser" menu link. */
		.ExternalClass { width:100%; } /* Force Hotmail to display emails at full width */  
		.ExternalClass, 
		.ExternalClass p, 
		.ExternalClass span, 
		.ExternalClass font, 
		.ExternalClass td, 
		.ExternalClass div { line-height: 100%; } 
		/* Force Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */
		
		/* End reset */

		body, html {
			-webkit-text-size-adjust: none;
			-ms-text-size-adjust: none;
			margin:0; padding:0;
		}


		body {
			background: #fff;
			color: #000;
			font-family: Tahoma, Arial, Helvetica, sans-serif;
			font-size: 14px;
		}

		a {
			text-decoration: none;
			color: #2D87BA;
		}

		a img {
			border: none;
		}

		p {
			margin: 0;
			padding: 0;
		}

		h1 {
			color: #2d87ba;
			font-family: Helvetica, Arial, sans-serif;
			font-size: 20px;
			font-weight: bold;
			text-transform: uppercase;
			line-height: 36px;
			padding-right: 20px;
			margin: 0;
		}

		h2 {
			font-weight: bold;
			font-size: 16px;
			color: #2d87ba;
		}

		.outer {
			background: #fff;
		}

		.spacer {
			font-size: 1px;
			line-height: 1px;
		}

		.sub-header {
			color: #fff;
		}

		.sub-header a {
			color: #fff;
			text-decoration: none;
		}

		.header .social a {
			color: #2d87ba;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
			line-height: 17px;
		}

		.content, .content p, .content li, .footer td {
			font-size: 14px;
			line-height: 25px;
			font-family: Helvetica, Arial, sans-serif;
			color: #333;

		}

		.content .list th {
			text-align: left;
			font-weight: bold;
			border-bottom: 2px #2d87ba solid;
		}
		
		.content .list td {
			padding: 5px 0;
			border-bottom: 1px #2d87ba solid;
		}
		
		.content .list .grand-total td {
			font-weight: bold;
			border-bottom: 2px #2d87ba solid;
			border-top: 1px #2d87ba solid;
		}
		
		.content .list td.no-line {
			border: 0;
		}
		
		.content .list .line-total,
		.content .list .unit-price,
		.content .list .label {
			text-align: right;
		}

		.content a {
			text-decoration: underline;
			color: #2d87ba;
		}

		.w580 {
			width:580px;
		}

		.w275 {
			width: 275px;
		}

		.widget-header td {
			border-bottom: 5px #2d87ba solid;
		}

		.col-3 img {
			padding-bottom: 10px;
		}

		.button-link, .button-link a, .button-link span {
			color: #fff;
			font-family: Helvetica, Arial, sans-serif;
			font-size: 15px;
			font-weight: bold;
			text-transform: uppercase;
			text-decoration: none;
		}
		
		.button {
			border: 3px solid #dde9ef;
		}

		.footer a {
			color: #2d87ba;
			text-decoration: underline;
		}

		.left-align {
			float: left;
			padding-right: 30px;
			padding-bottom: 20px;
		}

		.right-align {
			float: right;
			padding-left: 30px;
			padding-bottom: 20px;
		}

		@media only screen and (max-width: 600px) {

				table[class=outer] {
					width: 100% !important;
					margin: 0 auto !important;
				}

				table[class=outer] .w30 {
					width: 8% !important;
				}

				table[class=outer] .w580, table[class=outer] td.w275 {
					width: auto !important;
				}

				table[class=outer] .widget.w275 {
					width: 100% !important;
				}

				table[class=outer] .container {
					width: 90% !important;
				}

				table[class=outer] .logo img {
					display: block !important;
					max-width: 100% !important;
					width: 100% !important;
				}

				table[class=outer] .mobile-block {
					display: block !important;
				}

				table[class=outer] .social {
					width: 135px !important;
					float: right !important;
					margin-top: 23px !important;
				}

				table[class=outer] .social img {
					width: 28px !important;
					height: 28px !important;	
				}

				table[class=outer] .social tr {
					display: block !important;
				}

				table[class=outer] .social .mobile-block {
					float: left !important;
					width: 21px !important;
					margin-left: 21px;
				}

				table[class=outer] .cut,
				table[class=outer] .content .list .unit-price,
				table[class=outer] .content .list .code,
				table[class=outer] .content .list .no-line,
				table[class=outer] .content .list .qty {
					display: none !important;
				}
				
				table[class=outer] .content .list .label {
					text-align: left!important;
				}
				
				table[class=outer] .content .list tbody td,
				table[class=outer] .content .list thead th {
					width: 33%!important;
				}

				table[class=outer] .content img {
					display: block !important;
					width: 100% !important;
					max-width: 100% !important;
					float: none !important;
					padding: 0px 0 20px 0 !important;
					margin: 0 !important;
					border: 0 !important;
				}

				table[class=outer] .col-3 .mobile-block {
					margin-bottom: 20px !important;
				}

				table[class=outer] .col-3 td, table[class=outer] .social-wrapper {
					width: 100% !important;
				}

				table[class=outer] .footer .container {
					padding: 0 25px !important;
				}
				table[class=outer] .content .list td.no-line {
					width: 30% !important;
				}
			}
		</style>
</head>
<body style="-webkit-text-size-adjust: none;-ms-text-size-adjust: none;margin: 0;padding: 0;background: #fff;color: #b9b9b9;font-family: Helvetica, Arial, sans-serif;font-size: 14px;">
	<table cellpadding="0" cellspacing="0" width="100%" border="0" class="outer" style="background: #f6f9fa;" bgcolor="#f6f9fa">	
		<tr>
			<td class="content" style="font-size: 14px;line-height: 25px;font-family: Helvetica, Arial, sans-serif;color: #333;">
				<table cellpadding="0" cellspacing="0" width="640" border="0" class="container" bgcolor="#f6f9fa" align="center">
					<tr>
						<td class="spacer" height="41" colspan="3" style="font-size: 1px;line-height: 1px;">&nbsp;</td>
					</tr>
					<tr>
						<td class="spacer w30" width="30" style="font-size: 1px;line-height: 1px;">&nbsp;</td>
						<td class="w580" width="580" style="width: 580px;">
							<!-- Main content start -->

							<table class="widget w580" cellpadding="0" cellspacing="0" border="0" align="center" style="width: 580px;">
								<tr class="widget-header">
									<td height="55" style="border-bottom: 5px #2d87ba solid;">
										<h1 style="color: #2d87ba;font-family: Helvetica, Arial, sans-serif;font-size: 20px;font-weight: bold;text-transform: uppercase;line-height: 36px;padding-right: 20px;margin: 0;">Order Details</h1>
									</td>
								</tr>
								<tr>
									<td class="spacer" height="20" style="font-size: 1px;line-height: 1px;">&nbsp;</td>
								</tr>
								<tr class="widget-content">
									<table border="0" cellspacing="0" cellpadding="0" width="100%" style="font-family: Verdana, Arial, Helvetica, sans-serif;color:#000; font-size: 12px;">
                  <thead style="text-transform: uppercase;color:#fff; padding: 10px 10px 10px 10px; background: #2d87ba; border-right: 2px solid white;">
                    <tr>
                      <td style="font-weight:bold;border-bottom:2px solid #EDEDED;  padding: 10px 10px 10px 10px;" width="1%">#</td>
                      <td style="font-weight:bold;border-bottom:1px solid #EDEDED;  padding: 10px 10px 10px 10px;" width="25%">Item</td>
                      <td style="font-weight:bold;border-bottom:1px solid #dde9ef;  padding: 10px 10px 10px 10px;" width="17%">Wash & Iron</td>
                      <td style="font-weight:bold;border-bottom:1px solid #dde9ef;  padding: 10px 10px 10px 10px;" width="17%">Dry Clean</td>
                      
                      <td style="font-weight:bold;border-bottom:1px solid #dde9ef;  padding: 10px 10px 10px 10px;" width="17%">Iron</td>
                      <td style="font-weight:bold;border-bottom:1px solid #2d87ba; padding: 10px 10px 10px 10px; text-align: right;" width="20%">Total</td>
                    </tr>
                  </thead>
                  <tbody id="lineItem">
                    <?php $sub_total=0; 
                    $x=1; 
                    ?>
                    @foreach ($order_item as $row)
                    <tr>
                      <td style="border-bottom:1px solid #EDEDED; padding: 7px 5px 7px 40px; font-size: 12px;">
                        {{$x}}
                      </td>
                      <td style="border-bottom:1px solid #EDEDED; padding: 7px 5px 7px 40px; font-size: 12px;">
                        <span id="tmp_item_name" style="word-wrap: break-word;">@foreach($item as $item1)
                    @if($row->item_id == $item1->id)
                    {{$item1->name}}
                    @endif
                    @endforeach</span>
                        <br>
                      </td>
                      <td style="border-bottom:1px solid #EDEDED; padding: 7px 5px; font-size: 12px;" valign="top">
                        <span id="tmp_item_qty">{{$row->laundry_price}} * {{$row->laundry_qty}}</span>
                      </td>
                      <td style="border-bottom:1px solid #EDEDED; padding: 7px 5px; font-size: 12px;" valign="top">
                        <span id="tmp_item_qty">{{$row->dry_clean_price}} * {{$row->dry_clean_qty}}</span>
                      </td>
                      <td style="border-bottom:1px solid #EDEDED; padding: 7px 5px; font-size: 12px;" valign="top">
                        <span id="tmp_item_qty">{{$row->iron_price}} * {{$row->iron_qty}}</span>
                      </td>
                      <td valign="top" style="border-bottom:1px solid #2d87ba; padding: 7px 40px 7px 0; font-size: 12px; text-align: right;">{{$row->total}}</td>
                    </tr>
                    <?php $sub_total=$row->total + $sub_total; 
                    $x++; 
                    ?>
                  @endforeach
                  </tbody>
                  <tbody>
                    <tr>
                      <td colspan="4" style="padding: 7px 5px">&nbsp;</td>
                      <td style="padding: 7px 5px 7px"><b>Total</b></td>
                      <td style="padding: 7px 40px 7px 5px; text-align: right;" id="tmp_total"><b>{{$sub_total}}</b></td>
                    </tr>
                    @if($order->coupon_id)
                    <tr>
                      <td colspan="4" style="padding: 7px 5px">&nbsp;</td>
                      <td colspan="1" style="padding: 7px 5px 7px;">Discount({{$order->coupon_code}})</td>
                      <td style="padding: 7px 40px 5px 5px; text-align: right; color: green">{{$order->coupon_value}}</td>
                    </tr>
                    @endif
                    <?php
                    $total = $sub_total - $order->coupon_value;
                    ?>
                    <tr>
                      <td colspan="4" style="border-bottom:1px solid #EDEDED; padding: 10px 5px;border-bottom:1px solid #dde9ef;border-top:1px solid #dde9ef;">&nbsp;</td>
                      <td style="border-bottom:1px solid #EDEDED; border-bottom:1px solid #dde9ef;border-top:1px solid #dde9ef;padding: 10px 5px; color:#2d87ba; font-size: 13px"><b>Total</b></td>
                      <td style="border-bottom:1px solid #2d87ba;border-top:1px solid #2d87ba;padding: 10px 40px 10px 0; text-align: right; color:#2d87ba; font-size: 13px"  id="tmp_balance_due"><b>AED {{$total}}</b></td>
                    </tr>
                    <tr>
                      <td colspan="4" style="border-bottom:1px solid #EDEDED; padding: 10px 5px;border-bottom:1px solid #dde9ef;border-top:1px solid #dde9ef;">
                        @if($order->payment_status == 0)
                          <h4 style="color: #FF0000;font-size: 24px;margin-left: 100px;">UN PAID</h4>
                        @else
                          <h4 style="color: #32CD32;font-size: 24px;margin-left: 100px;">PAID</h4>
                        @endif
                      </td>
                      <td style="border-bottom:1px solid #EDEDED; border-bottom:1px solid #dde9ef;border-top:1px solid #dde9ef;padding: 10px 5px; color:#2d87ba; font-size: 13px"></td>
                      <td style="border-bottom:1px solid #EDEDED; border-bottom:1px solid #dde9ef;border-top:1px solid #dde9ef;padding: 10px 5px; color:#2d87ba; font-size: 13px" ></td>
                    </tr>
                  </tbody>
                </table>
								</tr>
								<tr>
									<td class="spacer" height="40" style="font-size: 1px;line-height: 1px;">&nbsp;</td>
								</tr>
							</table>
							<!-- / .widget -->
							
							<!-- Main content end -->
						</td>
						<td class="spacer w30" width="30" style="font-size: 1px;line-height: 1px;">&nbsp;</td>
					</tr> 
					<tr>
						<td class="spacer" height="41" colspan="3" style="font-size: 1px;line-height: 1px;">&nbsp;</td>
					</tr>
				</table>
			</td>
			<!-- / .content -->
		</tr>
		<tr>
			<!-- <td class="footer"  bgcolor="#eee" >
				<table cellpadding="0" cellspacing="0" width="640" border="0" class="container" align="center">
					<tr>
						<td height="74" align="center" valign="middle" style="font-size: 14px;line-height: 25px;font-family: Helvetica, Arial, sans-serif;color: #333;">
							Don’t want to receive our newsletter?  <a href="#" style="text-decoration: underline;color: #2d87ba;">Unsubscribe</a>
						</td>
					</tr>
				</table>
			</td> -->
			<!-- / .footer -->
		</tr>
	</table>
</body>
</html>