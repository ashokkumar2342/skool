<!DOCTYPE html>
<html>
<head>
	<title>New Device</title>
	 

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
    	padding-left:15px;margin-top:-10px; 
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
	<p>You recently logged in to lawrbit account from a New browser or Operating System we don't recognize.</p>
	<p>Browser : <strong>{{$browser}}</strong></p>
	<p>Operating System : <strong>{{$os}}</strong></p>
	<p>To ensure your account's security, we need to verify your identity. Enter the following code where prompted by application.</p>
	<p>Verification Code : <strong>{{$otp}}</strong></p>
	<p>Notes:</p>
	<ul>
	<li>Above Verification Code will expires in 24 hours.</li>
	<li>If you didn't didn’t attempt logging, contact your Lawrbit administrator.</li>
	</ul>
	 @includeIf('emails.footer')
</div>
		 
</body>
</html>