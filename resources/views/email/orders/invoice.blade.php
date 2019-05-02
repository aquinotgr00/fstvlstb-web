<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>EMAIL PEMBAYARAN</title>
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
							<a target="_blank" href="#"><img width="600" border="0" height="600" alt="" border="0" style="display:block; border:none; outline:none; text-decoration:none;" src="{{asset('frontend/images/banner.png')}}" class="banner"></a>
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
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 30px; font-weight: 600; color: #000000; text-align:center; line-height: 30px;" st-title="fulltext-heading">HAI, {{ $transaction->account->name }}</td>
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
								 Terimakasih sudah memesan serba aneka cendera mata dari album
							</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; color: #000000; text-align:center;" st-content="fulltext-content">
								FSTVLST II EDISI 01
							</td>
						</tr>
						<tr>
							<td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; color: #000000; text-align:center;" st-content="fulltext-content">
								Detail pesanan kamu adalah sebagai berikut :
							</td>
						</tr>
						<tr>
							<td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>
						<tr>
							<td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>

						
						<!-- End of content --></tbody>
						</table>
					</td>
				</tr>
				</tbody>
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
<!-- Start of invoice detail -->
<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
	<tbody>
		<tr>
			<td width="100%">
				<table width="500" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
					<tbody>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 14px; font-weight: 600; color: #000000; text-align:left; line-height: 30px; padding: 6px 16px;" st-title="fulltext-heading">Nomer Invoice : #{{ $transaction->id }}
							</td>
						</tr>
						<tr style="background-color: #eee; border-bottom: 1px solid #ddd;">
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; font-weight: 600; color: #000000; text-align:left; line-height: 30px; padding: 6px 16px;" st-title="fulltext-heading">Barang
							</td>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; font-weight: 600; color: #000000; text-align:right; line-height: 30px; padding: 6px 16px;" st-title="fulltext-heading">Harga
							</td>
                        </tr>
                        @foreach ($transaction->orders as $item)
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; font-weight: 600; color: #000000; text-align:left; line-height: 30px; padding: 6px 16px;" st-title="fulltext-heading">{{ $item->product->name }}
                                </td>
                                <td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; font-weight: 600; color: #000000; text-align:right; line-height: 30px; padding: 6px 16px;" st-title="fulltext-heading">Rp. {{ $item->price }}
                                </td>
                            </tr>
                        @endforeach
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; font-weight: 600; color: #000000; text-align:left; line-height: 30px; padding: 6px 16px;" st-title="fulltext-heading">Kurir
                            </td>
                            <td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; font-weight: 600; color: #000000; text-align:right; line-height: 30px; padding: 6px 16px;" st-title="fulltext-heading">Rp. {{ $transaction->courier_fee ?: 0 }}
                            </td>
                        </tr>
						<tr style="border-top: 2px solid #ddd;">
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; font-weight: 600; color: #000000; text-align:left; line-height: 30px; padding: 6px 16px;" st-title="fulltext-heading">Total
							</td>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 14px; font-weight: 600; color: #000000; text-align:right; line-height: 30px; padding: 6px 16px;" st-title="fulltext-heading">Rp. {{ $transaction->amount+$transaction->courier_fee }}
							</td>
						</tr>

					</tbody>
				</table>
			</td>
		</tr>

	</tbody>
</table>
<!-- end of invoice detail -->
<!-- Start of text 2-->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="seperator">
	<tbody>
		<tr>
			<td>
				<table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth">
					<tbody>
						<tr>
							<td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; color: #000000; text-align:center; " st-content="fulltext-content">
									Silahkan melakukan pembayaran dengan mentransfer dengan jumlah 
							</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; color: #000000; text-align:center; " st-content="fulltext-content">
								yang sesuai dengan yang tertera dalam tabel ke
							</td>
						</tr>
						<tr>
							<td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>
						<tr>
							<td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 14px; font-weight: 600; color: #000000; text-align:center; " st-content="fulltext-content">
								No rek : 8610188711
							</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 14px; font-weight: 600; color: #000000; text-align:center; " st-content="fulltext-content">
								Atas Nama : Anindito Susanto
							</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 14px; font-weight: 600; color: #000000; text-align:center; " st-content="fulltext-content">
								Bank : BCA
							</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 14px; font-weight: 600; color: #000000; text-align:center; " st-content="fulltext-content">
								Cabang : KCP Kaliurang
							</td>
						</tr>
						<tr>
							<td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>
						<tr>
							<td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; color: #000000; text-align:center; " st-content="fulltext-content">
								Kemudian lakukan konfirmasi dengan memasukan bukti pembayaran.
							</td>
						</tr>
						<tr>
							<td style="font-family: Helvetica, arial, sans-serif; font-size: 12px; color: #000000; text-align:center; " st-content="fulltext-content">
								dengan mengklik tombol berikut
							</td>
						</tr>
						<tr>
							<td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
						</tr>
						<tr>
                            <td>

                                <table height="36" align="center" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
                                    <tbody>
                                        <tr>
                                            <td width="auto" align="center" valign="middle" height="36" style=" background-color:#ff0000; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center; padding-left:25px; padding-right:25px;">
                                                                        
                                                <span style="color: #ffffff; font-weight: 600;">
                                                <a style="color: #ffffff; text-align:center;text-decoration: none;" href="{{ route('confirm.payment', $transaction->paymentProof->token) }}">Konfirmasi Pembayaran</a>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
							</td>
                        </tr>
						
					</tbody>
				</table>
				
			</td>
		</tr>
	</tbody>
</table>

<!-- end of text 2-->
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