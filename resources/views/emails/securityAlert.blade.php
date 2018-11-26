<!DOCTYPE html>
<html>
<head>
	<title>Security Alert</title>
	 
</head>
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
<body> 
<div id="main-div">
	<div id="logo"> 
	<img src="{{ $logo }}" height="50px" align="right" width="auto" alt="logo">
</div>
	<br>
	<p>Dear Ashok Kumar,</p>
	<p>Your Lawrbit Account was just signed in to from a new &lt;&lt;DEVICE Name&gt;&gt; device.</p>
	<p>You're getting this email to make sure it was you.</p>
	<p>If it wasn&rsquo;t you, please contact your Lawrbit administrator @ &lt;&lt;Admin User&rsquo;s Id&gt;&gt; and change password. </br>
	 There&rsquo;s a high possibility that your account&rsquo;s security has been compromised.</p>
	<p>You can also login to your Lawrbit portal to check account activities &lt;&lt;Company&rsquo;s URL&gt;&gt;</p>
 
	 @includeIf('emails.footer')
</div>
		 
</body>
</html>