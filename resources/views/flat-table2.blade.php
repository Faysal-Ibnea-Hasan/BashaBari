<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Flat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Flat's Details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>S.N</th>
                {{-- <th>Flat ID</th> --}}
                <th>Unit Name</th>
                {{-- <th>Flat Owner</th> --}}
                <th>Floor</th>
                <th>Area</th>
                <th>Room</th>
                <th>Washroom</th>
                <th>Balconi</th>
                <th>Rent Value</th>
                <th>Building Name</th>
                {{-- <th>Image</th>
                <th colspan="2">Action</th> --}}
                
                
              </tr>
              </thead>
              <tbody>
                @foreach ($data as $key=> $flats)
                    
                <tr>
                  <td>{{$key+1}}</td>
                  {{-- <td>{{$flats->flat_Id}}</td> --}}
                  <td>{{$flats->unit_name}}</td>
                  {{-- <td>{{$flats->Owners->name ?? 'No Owner'}}</td> --}}
                  <td>{{$flats->floor}}</td>
                  <td>{{$flats->area}}</td>
                  <td>{{$flats->room}}</td>
                  <td>{{$flats->washroom}}</td>
                  <td>{{$flats->balconi}}</td>
                  <td>{{$flats->rent_value}}</td>
                  <td>{{$flats->Buildings->name ?? 'No Building'}}</td>
                  {{-- <td>
                    <img src="{{asset('uploads/flats/'.$flats->image)}}" width="70px" height="70px" alt="Image">
                  </td> --}}
                  
                  
                  
                </tr>
                @endforeach
              
              
              </tbody>
              {{-- <tfoot>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
              </tr>
              </tfoot> --}}
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      
    </div>
          
      
      
      
    </div>
    
  </div>
</div>
<!-- Modal -->