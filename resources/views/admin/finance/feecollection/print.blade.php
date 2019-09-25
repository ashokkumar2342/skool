  
 @php
    $paid=0;
    $concession_amount=0;
    $net_amount=0;
 @endphp
 @foreach ($cashbooks as $key => $datas) 
    @foreach ($datas as $cashbook)
       
   
<div>
    <div id="p1" style="font-family:Arial;">    
        <center>
            @include('admin.finance.Feecollection.fee_table')
        </center>
    
</div>
<div style="padding-top: 500px;">
    
</div>
 @endforeach
@endforeach
