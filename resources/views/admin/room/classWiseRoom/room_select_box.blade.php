 <label>Room No</label>
                  <select name="room_name" class="form-control">
                    <option selected disabled>Select Room Name</option>
                     @foreach ($roomTypes as $roomType)
                      @if (in_array($roomType->id,$classWiseRoomSaveId))
                     
                        @else
                           <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>  
                      @endif 
                     
                     @endforeach
                  </select>