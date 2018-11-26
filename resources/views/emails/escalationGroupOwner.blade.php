<!DOCTYPE html>
<html>
<head>
	<title>Reminder Ferformer</title>
	 
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
	table {
	    border-collapse: collapse;
	}

	table, th, td {
	    border: 1px solid #cac5c5;
	}


</style>
<body> 
<div id="main-div">
	<div id="logo"> 
	<img src="{{ $logo }}" height="50px" align="right" width="auto" alt="logo">
</div>
	<br>
	<p>Dear Ashok Kumar,</p>
	<p>This is an escalation mail to highlight that following Compliance are pending for action with your team:</p>
	<p>&nbsp;</p>
<table>
<tbody>
<tr style="background-color: rgb(45, 143, 206); text-align: center;color: #fff;">
<td width="50">
<p><strong>S.No</strong></p>
</td>
<td width="97">
<p><strong>Location</strong></p>
</td>
<td width="97">
<p><strong>Department</strong></p>
</td>
<td width="189">
<p><strong>Act / Regulation Name</strong></p>
</td>
<td width="204">
<p><strong>Compliance Title</strong></p>
</td>
<td width="115">
<p><strong>Due Date</strong></p>
</td>
<td width="100">
<p><strong>Criticality</strong></p>
</td>
<td width="101">
<p><strong>Status</strong></p>
</td>
<td width="115">
<p><strong>Performer</strong></p>
</td>
<td width="106">
<p><strong>Approver</strong></p>
</td>
</tr>
<tr>
<td colspan="10" width="1175" style="background-color: rgb(255,255,255);">
<p><strong>Entity Name: </strong>&lt;&lt;ABC Ltd&gt;&gt;</p>
</td>
</tr>
<tr>
<td align="center" width="50">
<p>1</p>
</td>
<td width="97">
<p>&lt;&lt;Location&gt;&gt;</p>
</td>
<td width="97">
<p>&lt;&lt;Department&gt;&gt;</p>
</td>
<td width="189">
<p>&lt;&lt;Act Short Name&gt;&gt;</p>
</td>
<td width="204">
<p>&lt;&lt;Compliance Name&gt;&gt;</p>
</td>
<td width="115">
<p>&lt;&lt;Due Date&gt;&gt;</p>
</td>
<td width="100">
<p>&lt;&lt;Extreme / High / Medium / Low&gt;&gt;</p>
</td>
<td width="101">
<p>&lt;&lt;With Performer / With Approver&gt;&gt;</p>
</td>
<td width="115">
<p>&lt;&lt;Performer&rsquo;s Name&gt;&gt;</p>
</td>
<td width="106">
<p>&lt;&lt;Approver&rsquo;s Name&gt;&gt;</p>
</td>
</tr>
<tr>
<td align="center" width="50">
<p>2</p>
</td>
<td width="97">&nbsp;</td>
<td width="97">&nbsp;</td>
<td width="189">&nbsp;</td>
<td width="204">&nbsp;</td>
<td width="115">&nbsp;</td>
<td width="100">&nbsp;</td>
<td width="101">&nbsp;</td>
<td width="115">&nbsp;</td>
<td width="106">&nbsp;</td>
</tr>
</tbody>
</table>
	<p>Kindly take necessary steps to ensure that the team has fulfilled their obligations on time.<br>
 If you have questions, contact your Lawrbit administrator @ &lt;&lt;Admin User&rsquo;s Id&gt;&gt;</p>
	 @includeIf('emails.footer')
</div>
		 
</body>
</html>