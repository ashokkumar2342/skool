  <option selected disabled>Select Employee</option>  
   @foreach ($employees as $employee)
    <option value="{{ $employee->id }}">{{ $employee->name }}</option>  
   @endforeach