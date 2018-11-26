<!DOCTYPE html>
<html>
<head>
	<title>Compliance Report</title>
	 
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
<body> 
<div id="main-div">
	<div id="logo"> 
	<img src="{{ $logo }}" height="50px" align="right" width="auto" alt="logo">
</div>
	<br>
	<p>Dear Ashok Kumar,</p>
	<p>Enclosing Compliance Status Report titled &lt;&lt;Compliance Report Named saved in Matrix Report&gt;&gt; for period &lt;&lt;Last Report Date&gt;&gt; to &lt;&lt;Today&gt;&gt;.</p>
<p>If you wish to change mail frequency, parameters, etc; login to your Lawrbit portal &lt;&lt;Company&rsquo;s URL&gt;&gt;</p>
 
	 @includeIf('emails.footer')
</div>
		 
</body>
</html>