@if ($option_id==1)
@foreach ($smsTemplates as $smsTemplate) 
<div class="col-lg-5">
	<input type="radio" name="sms_template_id" value="{{ $smsTemplate->id }}"{{$smsTemplate->id==@$default? 'checked' : '' }}> 
	<textarea class="form-control"  style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $smsTemplate->message}} </textarea>
	
</div> 
@endforeach
@endif
@if ($option_id==2)
@foreach ($EmailTemplates as $EmailTemplate)

<div class="col-lg-5">
	<input type="radio" name="email_template_id" value="{{ $EmailTemplate->id }}">
	<textarea class="form-control" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $EmailTemplate->message}} </textarea> 
</div> 
@endforeach
@endif 
 