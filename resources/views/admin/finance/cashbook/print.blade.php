  
 @php
    $paid=0;
    $concession_amount=0;
    $net_amount=0;
 @endphp
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>

</title>
    <style type="text/css">
        .style1
        {
            width: 184px;
            font-weight: bold;
            font-size: small;
            font-family: "Arial";
        }
        .style4
        {
            width: 891px;
        }
    </style>
</head>
<body>
<br>

<div>
    <div id="p1" style="font-family:Arial;">    
        <center>
           @include('admin.finance.Feecollection.fee_table')
        </center>
    
</div>
<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
</body>
</html>


<script>
$(document).ready(function() {
  // window.print();  
});
    
</script>