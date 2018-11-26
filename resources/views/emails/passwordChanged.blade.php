<!DOCTYPE html>
<html>
<head>
	<title>Password Changed</title>
	 

<style type="text/css">
body{
	padding:20px;
}
	p{
		font-size: 11px;
	}
	li{
		font-size: 11px;
	}
	ul {
    	padding-left:15px;margin-top:-12px; 
	}
	#logo{ 
		padding-bottom: 40px;
	}
	#main-div{
		/*border: solid 1px #000;*/
		padding:20px;
		background-color: rgb(240,240,240);
		font-family: Tahoma;

	}

</style>
</head>
<body> 
<div id="main-div">
	<div id="logo"> 
	<img src="{{ $logo }}" height="50px" align="right" width="auto" alt="logo">
</div>
	<br>
	<p>Dear {{$name}},</p>
	<p>Congratulations, your password has been successfully updated.
	</p>
	<p>Please ensure you change your password regularly.
	</p>
	 <p>If you did not initiate password change, please contact your Lawrbit administrator immediately.</p>
 
	 @includeIf('emails.footer')
</div>
		 
</body>
</html>