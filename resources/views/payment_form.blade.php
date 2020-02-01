


<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="{{$paypalURL}}" name="f1">
		<table border="1">
		<tbody>
               @foreach($form as $key =>$v)
                  <input type="hidden" name="{{$key}}" value="{{$v}}"> 
               @endforeach
        </tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>
