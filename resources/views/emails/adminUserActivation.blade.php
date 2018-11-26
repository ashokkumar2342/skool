<!DOCTYPE html>
<html>
<head>
	<title>Admin User Activation</title>
	<style type="text/css">
	body{
		padding:20px;
		font-family: Tahoma;
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
		th, td {
	    font-size: 11px;
	    padding-left: 2px;
		}
		#logo{ 
			padding-bottom: 40px;
		}
		#main-div{
			/*border: solid 1px #000;*/
			padding:20px;
			background-color: rgb(240,240,240);
			

		}
		.column {
	    float: left;
	     
	    /*height: 300px;  Should be removed. Only for demonstration */
	}

	.left {
	  width: 40%;
	}

	.right {
	  width: 60%;
	}

	/* Clear floats after the columns */
	.row:after {
	    content: "";
	    display: table;
	    clear: both;
	}
		table {
	    border-collapse: collapse;
	}

	table, th, td {
	    border: 1px solid #cac5c5;
	}

	</style>
	 
</head>

<body> 
<div id="main-div">
	<div id="logo"> 
	<img src="{{ $logo }}" height="50px" align="right" width="auto" alt="logo">
</div>
	<br>
	<div class="row">
	  <div class="column right">
	  	<br>
		<p>Dear {{$name}},</p>
	  	<p>Welcome onboard Lawrbit.</p>
		<p>To finish your account activation, click on following link, use OTP and set up your password. 
		 </br><a href="{{$link}}">{{$link}}</a></p>
		<p>OTP: <strong>{{$otp}}</strong></p>
		<p>Notes:</p>
		<ul>
		<li>Above link expires in 24 hours.</li>
		<li>If you can't click on the link, copy and paste it into your Web browser.</li>
		<li>If you have questions, contact your Lawrbit administrator {{$admin}}</li>
		</ul>
	  </div>
	  <div class="column left" style="padding-top: 100px;">
	  	</br>
	  	</br>
	  	<table >
	  	<tbody>
	  	<tr style="background-color: rgb(45, 143, 206); text-align: center;color:#fff;">
	  	 	<th>#</th>
	  	 	<th>Step</th>
	  	 	<th>Status</th>
	  	</tr> 
		<tr>
		<td style="width: 57px; text-align: center;">1</td>
		<td  style="width: 200px;">Account Activation</td>
		<td align="center" style="width:  60px;"><input checked type="checkbox" desabled name=""></td>
		</tr>
		<tr>
		<td style="width: 57px;text-align: center;">2</td>
		<td  style="width: 200px;">Add Company records</td>
		<td align="center" style="width: 60px;"><input type="checkbox" desabled name=""></td>
		</tr>
		<tr>
		<td style="width: 57px;text-align: center;">3</td>
		<td  style="width: 200px;">Add User & assign roles</td>
		<td align="center" style="width: 60px;"><input type="checkbox" desabled name=""></td>
		</tr>
		<tr>
		<td style="width: 57px;text-align: center;">4</td>
		<td  style="width: 200px;">Add Function & Location matrix</td>
		<td align="center" style="width: 60px;"><input type="checkbox" desabled name=""></td>
		</tr>
		<tr>
		<td style="width: 57px;text-align: center;">5</td>
		<td  style="width: 200px;">Choose Applicable laws</td>
		<td align="center" style="width: 60px;"><input type="checkbox" desabled name=""></td>
		</tr>
		<tr>
		<td style="width: 57px;text-align: center;">6</td>
		<td  style="width: 200px;">Map compliance to users</td>
		<td align="center" style="width: 60px;"><input type="checkbox" desabled name=""></td>
		</tr>
		<tr>
		<td style="width: 57px;text-align: center;">7</td>
		<td  style="width: 200px;">Customise various parameters</td>
		<td align="center" style="width: 60px;"><input type="checkbox" desabled name=""></td>
		</tr>
		<tr>
		<td style="width: 57px;text-align: center;">8</td>
		<td  style="width: 200px;">Take Control of compliance</td>
		<td align="center" style="width: 60px;"><input type="checkbox" desabled name=""></td>
		</tr>
		 
		 
	  	</tbody>
	  	</table>
	  </div>
	</div>
 
	 @includeIf('emails.footer')
</div>
		 
</body>
</html>