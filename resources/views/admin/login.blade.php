<!DOCTYPE html>
<html>
<head>
	<title>Admin - Login</title>
  
        <link rel="icon" href="{{URL::ASSET('images/favicon.png')}}" type="image/gif" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="{{URL::ASSET('plugins/bootstrap/dist/css/bootstrap.css')}}">
</head>
<body>

		<div class="container">
		<div class="row">
             
             <div class="box" style="    width: 40%;
    margin: 151px auto 0;
    display: table;
    border: 1px solid #ccc;
    padding: 20px;
    position: relative;
    top: 25%;    box-shadow: 2px 3px 5px #ccc;" >
             	<h4>Admin Login </h4>

               @if(session()->has('message'))
                   <span class="alert alert-danger">
                       {{ session()->get('message') }}
                   </span>
               @endif
             	<form  class="form" action="{{route('admin_login')}}" method="post" id="login-form" >
             		@csrf
                   <div class="form-group">
                   	<label>Email*</label>
                   	<input type="email" name="email" class="form-control" value="{{old('email')}}">
                   	@if ($errors->has('email'))
                        <span class="error label-red" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                   </div> 
                   <div class="form-group">
                   	<label>Password*</label>
                   	<input type="password" name="password" class="form-control">
                   	@if ($errors->has('password'))
                        <span class="error label-red" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                   </div> 
                   <div class="form-group">
                       <button type="submit" class="btn btn-primary" >Login</button>
                   </div> 

             	</form>
             </div>


		</div>
		</div>


</body>
<style>
  
  button.btn.btn-primary {
    background: #f84f73;
    border-color: #f84f73;
    text-align: center;
}
h4 {
    text-align: center;
}
</style>
</html>