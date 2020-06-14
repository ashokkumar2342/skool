 
@foreach ($responseError as $key=>$elements)
   @foreach ($elements as $element)
     <p class="text-danger">Sheet Row : {{ $key+1 }} - {{ $element }}</p>
   @endforeach
@endforeach


