<!DOCTYPE html>
<html>
<head>
	<title>Accession Barcode</title>
</head>
<style>
	@page { margin:0px; }
</style>
<body>
    @foreach ($bookaccessions as $bookaccession)
   @php
	$path =storage_path('app/public/barcode/'.$bookaccession->barcode);
   @endphp
   <div align="center" >

    <img  src="{{ $path }}" alt="" width="125px" height="55px" style="border:solid 1px Black ;padding-top: 5px">
   		
   
   	
   </div>
    @endforeach
</body>
</html>