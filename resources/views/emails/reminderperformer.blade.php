<!DOCTYPE html>
<html>
<head>
	<title>Reminder Performer</title>
	 
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
	<p>This is to highlight that one or more Compliance actionable are pending your calendar:</p>
	<table >
	<tbody>
	<tr style="background-color: rgb(45, 143, 206); text-align: center;color: #fff;">
	<td width="49">
	<p><strong>S.No</strong></p>
	</td>
	<td width="94">
	<p><strong>Location</strong></p>
	</td>
	<td width="121">
	<p><strong>Department</strong></p>
	</td>
	<td width="172">
	<p><strong>Act / Regulation Name</strong></p>
	</td>
	<td width="158">
	<p><strong>Task Type</strong></p>
	</td>
	<td width="158">
	<p><strong>Task Description</strong></p>
	</td>
	<td width="109">
	<p><strong>Due Date</strong></p>
	</td>
	<td width="101">
	<p><strong>Status</strong></p>
	</td>
	<td width="114">
	<p><strong>Criticality</strong></p>
	</td>
	</tr>
	<tr>
	<td colspan="9" width="1077" style="background-color: rgb(255,255,255);">
	<p><strong>Entity Name: </strong>&lt;&lt;ABC Ltd&gt;&gt;</p>
	</td>
	</tr>
	<tr>
	<td align="center" width="49">
	<p>1</p>
	</td>
	<td width="94">
	<p>&lt;&lt;Location&gt;&gt;</p>
	</td>
	<td width="121">
	<p>&lt;&lt;Department&gt;&gt;</p>
	</td>
	<td width="172">
	<p>&lt;&lt;Act Short Name&gt;&gt;</p>
	</td>
	<td width="158">
	<p>&lt;&lt;Pre Compliance Task / Main Compliance / Post Compliance Task&gt;&gt;</p>
	</td>
	<td width="158">
	<p>&lt;&lt;Compliance Name&gt;&gt;<br /> <br /> If Task<br /> &lt;&lt;Task Name&gt;&gt; for &lt;&lt;Compliance Name&gt;&gt;</p>
	</td>
	<td width="109">
	<p>&lt;&lt;Due Date&gt;&gt;</p>
	</td>
	<td width="101">
	<p>&lt;&lt;Upcoming / Overdue&gt;&gt;</p>
	</td>
	<td width="114">
	<p>&lt;&lt;High/Medium/Low&gt;&gt;</p>
	</td>
	</tr>
	<tr>
	<td align="center" width="49">
	<p>2</p>
	</td>
	<td width="94">&nbsp;</td>
	<td width="121">&nbsp;</td>
	<td width="172">&nbsp;</td>
	<td width="158">&nbsp;</td>
	<td width="158">&nbsp;</td>
	<td width="109">&nbsp;</td>
	<td width="101">&nbsp;</td>
	<td width="114">&nbsp;</td>
	</tr>
	</tbody>
   </table>
	<p>&nbsp;</p>
	<p>Notes:</p>
	<ul>
	<li>Please login to your LAWRBIT portal to take necessary steps immediately &lt;&lt;Company&rsquo;s URL&gt;&gt;</li>
	<li>If you have any questions, contact your Lawrbit administrator @ &lt;&lt;Admin User&rsquo;s Id&gt;&gt;</li>
	</ul>
 
	 @includeIf('emails.footer')
</div>
		 
</body>
</html>