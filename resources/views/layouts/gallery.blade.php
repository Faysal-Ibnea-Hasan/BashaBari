<div class="content-wrapper">
    @foreach($data as $image)
    <tr><td>{{$image->unit_name}}</td>
        <td> <?php foreach (json_decode($image->image)as $picture) { ?>
              <img src="{{ asset('uploads/flats/'.$picture) }}" style="height:120px; width:200px"/>
             <?php } ?>
        </td>
   </tr>
     @endforeach

    {{-- @foreach($data as $key => $image)
    
    <img src="{{asset('uploads/flats/'.$image->image)}}"  height="100px" width="100px" >
    
    @endforeach --}}
</div>