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
	<p>This is to highlight that following Compliance are pending for your approval:</p>
	<table>
<tbody>
<tr style="background-color: rgb(45, 143, 206); text-align: center;color: #fff;">
<td width="48">
<p><strong>S.No</strong></p>
</td>
<td width="92">
<p><strong>Location</strong></p>
</td>
<td width="140">
<p><strong>Department</strong></p>
</td>
<td width="219">
<p><strong>Act / Regulation Name</strong></p>
</td>
<td width="194">
<p><strong>Compliance Name</strong></p>
</td>
<td width="109">
<p><strong>Performer</strong></p>
</td>
<td width="95">
<p><strong>Due Date</strong></p>
</td>
<td width="102">
<p><strong>Reported on</strong></p>
</td>
<td width="115">
<p><strong>Pending (Days)</strong></p>
</td>
<td width="89">
<p><strong>Criticality</strong></p>
</td>
</tr>
<tr>
<td colspan="10" width="1202" style="background-color: rgb(255,255,255);">
<p><strong>Entity Name: </strong>&lt;&lt;ABC Ltd&gt;&gt;</p>
</td>
</tr>
<tr>
<td align="center" width="48">
<p>1</p>
</td>
<td width="92">
<p>&lt;&lt;Location&gt;&gt;</p>
</td>
<td width="140">
<p>&lt;&lt;Department&gt;&gt;</p>
</td>
<td width="219">
<p>&lt;&lt;Act Short Name&gt;&gt;</p>
</td>
<td width="194">
<p>&lt;&lt;Compliance Name&gt;&gt;</p>
</td>
<td width="109">
<p>&lt;&lt;Performer Name&gt;&gt;</p>
</td>
<td width="95">
<p>&lt;&lt;Due Date&gt;&gt;</p>
</td>
<td width="102">
<p>&lt;&lt;Performer&rsquo;s Reported Date&gt;&gt;</p>
</td>
<td width="115">
<p><strong>Formula </strong></p>
<p>Today() - Reported Date</p>
</td>
<td width="89">
<p>&lt;&lt;Extreme / High / Medium / Low&gt;&gt;</p>
</td>
</tr>
<tr>
<td align="center" width="48">
<p>2</p>
</td>
<td width="92">&nbsp;</td>
<td width="140">&nbsp;</td>
<td width="219">&nbsp;</td>
<td width="194">&nbsp;</td>
<td width="109">&nbsp;</td>
<td width="95">&nbsp;</td>
<td width="102">&nbsp;</td>
<td width="115">&nbsp;</td>
<td width="89">&nbsp;</td>
</tr>
</tbody>
</table>
	<p>Notes:</p>
<ul>
<li>The above mentioned compliance will continue to reflect in &ldquo;Pending with Approver&rdquo; stage till your action.</li>
<li>You can login to your LAWRBIT portal to view and take necessary steps &lt;&lt;Company&rsquo;s URL&gt;&gt;</li>
<li>If you have any questions, contact your Lawrbit administrator @ &lt;&lt;Admin User&rsquo;s Id&gt;&gt;</li>
</ul>
	 @includeIf('emails.footer')
</div>
		 
</body>
</html>