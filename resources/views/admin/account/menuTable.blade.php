    
                              @php($i=1)
                              @foreach($menus as $menu)
                               <?php $checked = (\App\Model\Minu::where(['minu_id'=>$menu->id,'admin_id'=>$id])->count())?'checked':''; ?>  
                              <tr> 
                                  <td><input type="checkbox" {{ $checked }}   class="checkbox" name="menu_id[]" value="{{$menu->id}}"></td>
                               
                                  <td>{{$i}}</td>
                                  <td>{{$menu->name}}</td>
                              </tr>
                              @php($i++) 
                            
                              @endforeach
                           