<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>FooDuro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<style>
		.ReadMsgBody {width: 100%; background-color: #ffffff;}
		.ExternalClass {width: 100%; background-color: #ffffff;}
		@-ms-viewport { 
		    width: device-width; 
		}
	</style>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background: #e7e7e7; width: 100%; height: 100%; margin: 0; padding: 0;">
	<div id="mailsub">
		<center class="wrapper" style="table-layout: fixed; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; padding: 0; margin: 0 auto; width: 100%; max-width: 960px;">
	        <div class="webkit">
				<table cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" style="padding: 0; margin: 0 auto; width: 100%; max-width: 960px;">
					<tbody>
						<tr>
							<td align="center">
                                {{-- BACKGROUUUUUNNNDDDD --}}
								<table id="intro" cellpadding="0" cellspacing="0" border="0" bgcolor="#4F6331" align="center" style="width: 100%; padding: 0; margin: 0; background-image: url({{asset('storage/assets/email-2.png')}}); background-size: cover; background-position: center center; background-repeat: repeat; background-color: #ffffff">
									<tbody >
										<tr><td colspan="3" height="20"></td></tr>
										<tr>
											<!-- LOGO -->
											<td width="300" style="width: 30%;" align="center">
												<a href="#" target="_blank" border="0" style="border: none; display: block; outline: none; text-decoration: none; line-height: 60px; height: 60px; color: #ffffff; font-family: Verdana, Geneva, sans-serif;  -webkit-text-size-adjust:none;">
                                                    <img src="{{asset('storage/assets/logo.svg')}}" width="200" height="50" border="0" style="border: none; display: block; -ms-interpolation-mode: bicubic;">
												</a>
											</td>																			
										</tr>
										<tr><td colspan="3" height="50"></td></tr>
										<!-- GRAZIE -->
										<tr>
											<td colspan="3" height="60" align="center">
												<div border="0" style="border: none; line-height: 60px; color: #FCC15D; font-family: Verdana, Geneva, sans-serif; font-size: 35px; font-weight: bolder;">Grazie del tuo ordine!</div>
											</td>
										</tr>
										<!-- SPACE -->
										<tr>
											<td colspan="3" height="20" valign="bottom" align="center">
											</td>
										</tr>
										<!-- E-MAIL MESSAGE -->
										<tr>
											<td colspan="3">
												<table cellpadding="0" cellspacing="0" border="0" align="center" style="padding: 0; margin: 0; width: 100%;">
													<tbody>
														<tr>
															<td width="90" style="width: 9%;"></td>
															<td align="center">
																<div border="0" style="border: none; height: 60px;">
																	<p style="font-size: 18px; font-weight: bold; line-height: 24px; font-family: Verdana, Geneva, sans-serif; color: #FCC15D; text-align: center; mso-table-lspace:0;mso-table-rspace:0;">
																		Gentile {{$order['buyer_name']}} {{$order['buyer_lastname']}},
                                                                        il tuo ordine del totale di {{$order['final_price']/100}}€ sta arrivando al tuo indirizzo in {{$order['address']}}.                                                                        
                                                                        <p style="font-size: 17px; font-weight: bold;  line-height: 24px; font-family: Verdana, Geneva, sans-serif; color: #E7257D; text-align: center; mso-table-lspace:0;mso-table-rspace:0;">
                                                                        Buon appetito dallo staff di Fooduro! &hearts;<p>                                    
																	</p>
																</div>
															</td>
															<td width="90" style="width: 9%;">
                                                            </td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
										<tr><td colspan="3" height="130"></td></tr>																		
										<tr><td colspan="3" height="40"></td></tr>
									</tbody>
								</table>
								
								<!-- FOOTER -->
								<table id="news__article" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" align="center" style="width: 100%; padding: 0; margin: 0; background-color: #FCC15D">
									<tbody>
										<tr><td colspan="3" height="23"></td></tr>
										<tr>
											<td align="center">
												<div border="0" style="border: none; line-height: 14px; color: #E7257D; font-family: Verdana, Geneva, sans-serif; font-size: 15px;">
													2021 © FooDuro <br>
                                                    <a href="https://github.com/Giancarlo-Zuliani/proj21-team3" target="_blank" border="0" style="border: none; outline: none; text-decoration: none; line-height: 14px; font-size: 15px; color: #E7257D; font-family: Verdana, Geneva, sans-serif; -webkit-text-size-adjust:none;">Natália Veras | Giancarlo Zuliani | Angelo Cinà | Dario Alessio | Andrea Sansica</a>
												</div>
											</td>
										</tr>
										<tr><td colspan="3" height="23"></td></tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div> 
		</center> 
	</div> 
</body>
</html>