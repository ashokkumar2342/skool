 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <table>
 	<tr> 
 		<td> 
 			<form action="{{ route('barcode.generate') }}" method="post">
 			 {{ csrf_field() }}
 			<textarea name="barcode"></textarea>
 			<input type="submit" value="Generate">
 			</form>
 			
 		</td>

 	</tr>
 </table>
         
 </body>
 </html>