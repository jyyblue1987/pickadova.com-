<html>	
	<head>
		<title>Reset Password Link</title>
	</head>
	<body>  
		<table border="0" cellspacing="0" cellpadding="0" width="800" align="center">
			<tbody>
				<tr>
					<td align="left" style="font-size:12px;font-family:Arial; border-bottom:1px solid #c8c8c8;">
						<table border="0" cellspacing="0" cellpadding="0" width="100%">
							<tbody>
								<tr valign="middle">
								</tr>
							</tbody>
						</table>
						&nbsp;<br>
					</td>
				</tr>

				<tr>
					<td align="left" style="border:solid 1px #c8c8c8;font-size:12px;font-family:Arial;padding:20px;">
						<h4>Reset Password Link</h4>
						<div style="width:800px;min-height:30px;border:solid 1px #e5e5e5;background:-webkit-gradient(linear,left top,left bottom,from(#fff),to(#eee));background:-moz-linear-gradient(top,#fff,#eee)">
							<table border="0" cellpadding="0" cellspacing="0" style="width:800px;height:30px;margin:auto">
								<tbody>
									<tr valign="" style="height:30px"></tr>
								   
									@foreach($demo->mail_data AS $key=>$val)
									
    								<tr>
										<td style="font-weight:bold ;padding-left: 11%; padding-bottom: 1%;">{{$key}} </td>
										<td style="padding-left: 11%; padding-bottom: 1%;">@php echo html_entity_decode($val); @endphp</td>
									</tr >
									@endforeach
											  
    							</tr>

							</tbody>

						</table>

						<div style="clear:both"></div>
						<br><br>
						<div style="clear:both"></div>
						<br>&nbsp;
					</td>
				</tr>
				<tr>

					<td align="left" style="font-size:12px;font-family:Arial">

					<br>
			  
					</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>