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
	<p>This is to notify that your approver has Rejected following compliance tasks reported by you.</p>
	<table>
	<tbody>
	<tr align="center" style="background-color: rgb(45, 143, 206);color: #fff;">
	<td width="60">
	<p><strong>S.No</strong></p>
	</td>
	<td width="116">
	<p><strong>Location</strong></p>
	</td>
	<td width="149">
	<p><strong>Department</strong></p>
	</td>
	<td width="212">
	<p><strong>Act / Regulation Name</strong></p>
	</td>
	<td width="195">
	<p><strong>Task Type</strong></p>
	</td>
	<td width="195">
	<p><strong>Task Description</strong></p>
	</td>
	<td width="121">
	<p><strong>Due Date</strong></p>
	</td>
	<td width="121">
	<p><strong>Report Date</strong></p>
	</td>
	<td width="121">
	<p><strong>Attachments</strong></p>
	</td>
	</tr>
	<tr>
	<td colspan="9" width="1292" style="background-color: rgb(255,255,255);">
	<p><strong>Entity Name: </strong>&lt;&lt;ABC Ltd&gt;&gt;</p>
	</td>
	</tr>
	<tr>
	<td align="center" width="60">
	<p>1</p>
	</td>
	<td width="116">
	<p>&lt;&lt;Location&gt;&gt;</p>
	</td>
	<td width="149">
	<p>&lt;&lt;Department&gt;&gt;</p>
	</td>
	<td width="212">
	<p>&lt;&lt;Act Short Name&gt;&gt;</p>
	</td>
	<td width="195">
	<p>&lt;&lt;Pre Compliance Task / Main Compliance / Post Compliance Task&gt;&gt;</p>
	</td>
	<td width="195">
	<p>&lt;&lt;Compliance Name&gt;&gt;<br /> <br /> If Task<br /> &lt;&lt;Task Name&gt;&gt; for &lt;&lt;Compliance Name&gt;&gt;</p>
	</td>
	<td width="121">
	<p>&lt;&lt;Due Date&gt;&gt;</p>
	</td>
	<td width="121">
	<p>&lt;&lt;Report Date&gt;&gt;</p>
	</td>
	<td width="121">
	<p>Yes / No</p>
	</td>
	</tr>
	<tr>
	<td align="center" width="60">
	<p>2</p>
	</td>
	<td width="116">&nbsp;</td>
	<td width="149">&nbsp;</td>
	<td width="212">&nbsp;</td>
	<td width="195">&nbsp;</td>
	<td width="195">&nbsp;</td>
	<td width="121">&nbsp;</td>
	<td width="121">&nbsp;</td>
	<td width="121">&nbsp;</td>
	</tr>
	<tr>
	<td width="60">&nbsp;</td>
	<td width="116">&nbsp;</td>
	<td width="149">&nbsp;</td>
	<td width="212">&nbsp;</td>
	<td width="195">&nbsp;</td>
	<td width="195">&nbsp;</td>
	<td width="121">&nbsp;</td>
	<td width="121">&nbsp;</td>
	<td width="121">&nbsp;</td>
	</tr>
	<tr>
	<td width="60">&nbsp;</td>
	<td width="116">&nbsp;</td>
	<td width="149">&nbsp;</td>
	<td width="212">&nbsp;</td>
	<td width="195">&nbsp;</td>
	<td width="195">&nbsp;</td>
	<td width="121">&nbsp;</td>
	<td width="121">&nbsp;</td>
	<td width="121">&nbsp;</td>
	</tr>
	<tr>
	<td width="60">&nbsp;</td>
	<td width="116">&nbsp;</td>
	<td width="149">&nbsp;</td>
	<td width="212">&nbsp;</td>
	<td width="195">&nbsp;</td>
	<td width="195">&nbsp;</td>
	<td width="121">&nbsp;</td>
	<td width="121">&nbsp;</td>
	<td width="121">&nbsp;</td>
	</tr>
	<tr>
	<td width="60">&nbsp;</td>
	<td width="116">&nbsp;</td>
	<td width="149">&nbsp;</td>
	<td width="212">&nbsp;</td>
	<td width="195">&nbsp;</td>
	<td width="195">&nbsp;</td>
	<td width="121">&nbsp;</td>
	<td width="121">&nbsp;</td>
	<td width="121">&nbsp;</td>
	</tr>
	</tbody>
	</table>
	{{-- <p>Notes:</p> --}}
<p>Notes:</p>
	<ul>

	<li>You can login to your LAWRBIT portal to view and take necessary steps &lt;&lt;Company&rsquo;s URL&gt;&gt;</li>
	<li>If you have any questions, contact your Lawrbit administrator @ &lt;&lt;Admin User&rsquo;s Id&gt;&gt;</li>
	</ul>
 
	 @includeIf('emails.footer')
</div>
		 
</body>
</html>