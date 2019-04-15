<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>FSTVLST</title>
<style type="text/css">
         /* Client-specific Styles */
         #outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
         body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
         /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
         .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
         .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.*/
         #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
         img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}
         a img {border:none;}
         .image_fix {display:block;}
         p {margin: 0px 0px !important;}
         table td {border-collapse: collapse;}
         table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
         a {color: #0a8cce;text-decoration: none;text-decoration:none!important;}
         /*STYLES*/
         table[class=full] { width: 100%; clear: both; }
         /*IPAD STYLES*/
         @media only screen and (max-width: 640px) {
         a[href^="tel"], a[href^="sms"] {
         text-decoration: none;
         color: #0a8cce; /* or whatever your want */
         pointer-events: none;
         cursor: default;
         }
         .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
         text-decoration: default;
         color: #0a8cce !important;
         pointer-events: auto;
         cursor: default;
         }
         table[class=devicewidth] {width: 440px!important;text-align:center!important;}
         table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
         img[class=banner] {width: 440px!important;height:220px!important;}
         img[class=colimg2] {width: 440px!important;height:220px!important;}
         }
         /*IPHONE STYLES*/
         @media only screen and (max-width: 480px) {
         a[href^="tel"], a[href^="sms"] {
         text-decoration: none;
         color: #0a8cce; /* or whatever your want */
         pointer-events: none;
         cursor: default;
         }
         .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
         text-decoration: default;
         color: #0a8cce !important; 
         pointer-events: auto;
         cursor: default;
         }
         table[class=devicewidth] {width: 280px!important;text-align:center!important;}
         table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
         img[class=banner] {width: 280px!important;height:140px!important;}
         img[class=colimg2] {width: 280px!important;height:140px!important;}
         td[class=mobile-hide]{display:none!important;}
         td[class="padding-bottom25"]{padding-bottom:25px!important;}
         }
</style>
</head>
<body>
<!-- Start of main-image -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="banner">
<tbody>
<tr>
	<td>
		<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
		<tbody>
		<tr>
			<td width="100%">
				<table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth">
				<tbody>
				<tr>
					<!-- start of image -->
					<td align="center" st-image="banner-image">
						<table cellpadding="0" cellspacing="0" border="0"> 
  							<tr> 
							<a target="_blank" href="#"><img width="600" border="0" height="600" alt="" border="0" style="display:block; border:none; outline:none; text-decoration:none;" src="{!!Storage::disk('s3')->url(Auth::guard('account')->user()->images)!!}" class="banner"></a>
                          	</tr>
                      </table>
					</td>
				</tr>
				</tbody>
				</table>
				<!-- end of image -->
			</td>
		</tr>
		</tbody>
		</table>
	</td>
</tr>
</tbody>
</table>
<!-- End of main-image -->
<!-- Start of button-image -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="preheader">
<tbody>
<tr>
	<td>
		<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
		<tbody>
		<tr>
			<td width="100%">
				<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
				<tbody>
				<!-- Spacing -->
				<tr>
					<td width="100%" height="10"></td>
				</tr>
				<!-- Spacing -->
				<tr>
					<td>
						<table width="100" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidth">
						<tbody>
						<tr>
							<td width="35" height="33" align="left">
								<table cellpadding="0" cellspacing="0" border="0"> 
 									<tr>
									<a target="_blank" href="#"><img src="{{asset('email/img/download.png')}}" alt="" border="0" width="35" height="33" style="display:block; border:none; outline:none; text-decoration:none;"></a>
                                  	</tr>
                              	</table>
							</td>
						</tr>
						</tbody>
						</table>
						<table width="130" align="right" border="0" cellpadding="0" cellspacing="0" class="devicewidth">
						<tbody>
						<tr>
							<td width="33" height="33" align="right">
								<table cellpadding="0" cellspacing="0" border="0"> 
 									<tr>
									<a target="_blank" href="#"><img src="{{asset('email/img/instagram.png')}}" alt="" border="0" width="33" height="33" style="display:block; border:none; outline:none; text-decoration:none;"></a>
                                  	</tr>
                              	</table>
							</td>
							<td align="left" width="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
							<td width="30" height="30" align="center">
								<table cellpadding="0" cellspacing="0" border="0"> 
 									<tr>
									<a target="_blank" href="#"><img src="{{asset('email/img/facebook.png')}}" alt="" border="0" width="17" height="37" style="display:block; border:none; outline:none; text-decoration:none;"></a>
									</tr>
                              	</table>
							</td>
							<td align="left" width="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
							<td width="37" height="32" align="center">
								<table cellpadding="0" cellspacing="0" border="0"> 
 									<tr>
									<a target="_blank" href="#"><img src="{{asset('email/img/twitter.png')}}" alt="" border="0" width="37" height="32" style="display:block; border:none; outline:none; text-decoration:none;"></a>
									</tr>
                              	</table>
							</td>
						</tr>
						</tbody>
						</table>
					</td>
				</tr>
				<!-- Spacing -->
				<tr>
					<td width="100%" height="10"></td>
				</tr>
				<!-- Spacing --></tbody>
				</table>
			</td>
		</tr>
		</tbody>
		</table>
	</td>
</tr>
</tbody>
</table>
<!-- End of button-image -->
<!-- Start of seperator -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="seperator">
<tbody>
<tr>
	<td>
		<table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth">
		<tbody>
		<tr>
			<td align="center" height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
		</tr>
		</tbody>
		</table>
	</td>
</tr>
</tbody>
</table>
<!-- End of seperator -->
<!-- Start Text 1 -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="full-text">
<tbody>
<tr>
	<td>
		<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
		<tbody>
		<tr>
			<td width="100%">
				<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
				<tbody>
				<!-- Spacing -->
				<tr>
					<td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
				</tr>
				<!-- Spacing -->
				<tr>
					<td>
						<table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
						<tbody>
						<!-- Title -->
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 30px; font-weight: 600; color: #000000; text-align:center; line-height: 30px;" st-title="fulltext-heading">HAI, {{ Auth::guard('account')->user()->name }}</td>
						</tr>
						<!-- End of Title -->
						<!-- spacing -->
						<tr>
							<td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>
						<!-- End of spacing -->
						<!-- content -->
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; color: #000000; text-align:center; " st-content="fulltext-content">
								 Selamat, kamu sudah terdaftar di FSTVLST,
							</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; color: #000000; text-align:center;" st-content="fulltext-content">
								NIF (Nomor Induk Festivalist)-mu adalah:
							</td>
						</tr>
						<tr>
							<td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 30px; font-weight: 600; color: #ff0000; text-align:center; line-height: 30px;" st-title="fulltext-heading">{!! sprintf("%06d", Auth::guard('account')->user()->id)!!}</td>
						</tr>
						<tr>
							<td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; color: #000000; text-align:center;" st-content="fulltext-content">
								Ini adalah nomor saktimu,
							</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; color: #000000; text-align:center;" st-content="fulltext-content">
								untuk segala urusan administratif dengan FSTVLST.
							</td>
						</tr>
						<!-- End of content --></tbody>
						</table>
					</td>
				</tr>
				<!-- Spacing -->
				<tr>
					<td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
				</tr>
				<!-- Spacing --></tbody>
				</table>
			</td>
		</tr>
		</tbody>
		</table>
	</td>
</tr>
</tbody>
</table>
<!-- end of Text 1 -->
<!-- Start of seperator -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="seperator">
<tbody>
<tr>
	<td>
		<table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth">
		<tbody>
		<tr>
			<td align="center" height="30" style="font-size:1px; line-height:1px;">&nbsp;</td>
		</tr>
		<tr>
			<td width="550" align="center" height="1" bgcolor="#d1d1d1" style="font-size:1px; line-height:1px;">&nbsp;</td>
		</tr>
		<tr>
			<td align="center" height="30" style="font-size:1px; line-height:1px;">&nbsp;</td>
		</tr>
		</tbody>
		</table>
	</td>
</tr>
</tbody>
</table>
<!-- End of seperator -->
<!-- Start Text 2 -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="full-text">
<tbody>
<tr>
	<td>
		<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
		<tbody>
		<tr>
			<td width="100%">
				<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
				<tbody>
				<!-- Spacing -->
				<tr>
					<td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
				</tr>
				<!-- Spacing -->
				<tr>
					<td>
						<table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
						<tbody>
						<!-- Footer -->
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 30px; font-weight: 600; color: #000000; text-align:center; line-height: 30px;" st-title="fulltext-heading">FSTVLST II</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 30px; font-weight: 600; color: #000000; text-align:center; line-height: 30px;" st-title="fulltext-heading">HAMPIR ROCK</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 30px; font-weight: 600; color: #000000; text-align:center; line-height: 30px;" st-title="fulltext-heading">NYARIS SENI</td>
						</tr>
				<!-- Spacing -->
						<tr>
							<td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>
				<!-- Spacing -->
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 10px; color: #000000; text-align:center;" st-content="fulltext-content">
								Terimakasih telah mengambil keputusan untuk mendukung FSTVLST 
							</td>
						</tr>
				<!-- End of Footer -->
				<!-- Spacing -->
						<tr>
							<td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>
						<tr>
							<td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>
				<!-- Spacing -->
						<!-- End of content --></tbody>
						</table>
					</td>
				</tr>
				<!-- Spacing -->
				<tr>
					<td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
				</tr>
				<!-- Spacing --></tbody>
				</table>
			</td>
		</tr>
		</tbody>
		</table>
	</td>
</tr>
</tbody>
</table>
<!-- end of Text 2 -->

<!-- End of postfooter -->
</body>
</html>