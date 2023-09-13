<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flat|Table</title>
  <!--AJAX-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  
</head>
<body class="hold-transition sidebar-mini">
  
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Flat's Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            

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
                    <th>Flat ID</th>
                    <th>Unit Name</th>
                    <th>Flat Owner</th>
                    {{-- <th>Floor</th>
                    <th>Area</th>
                    <th>Room</th>
                    <th>Washroom</th>
                    <th>Balconi</th>
                    <th>Rent Value</th>
                    <th>Building Name</th> --}}
                    <th>Image</th>
                    <th colspan="3">Action</th>
                    
                    
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $key=> $flats)
                        
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$flats->flat_Id}}</td>
                      <td>{{$flats->unit_name}}</td>
                      <td>{{$flats->Owners->name ?? 'No Owner'}}</td>
                      {{-- <td>{{$flats->floor}}</td>
                      <td>{{$flats->area}}</td>
                      <td>{{$flats->room}}</td>
                      <td>{{$flats->washroom}}</td>
                      <td>{{$flats->balconi}}</td>
                      <td>{{$flats->rent_value}}</td>
                      <td>{{$flats->Buildings->name ?? 'No Building'}}</td> --}}
                      <td>
                        <img src="{{asset('uploads/flats/'.$flats->image)}}" width="70px" height="70px" alt="Image">
                      </td>
                      
                      
                      <td><a href="{{Route("flat.form.update",['id' => $flats->id])}}"><button type="button" class="btn btn-block btn-primary">Update</button></a></td>
                      <td><a href="javascript:void(0)" id="flat-details" data-url="{{route('flat.details',$flats->id)}}"><button type="button" class="btn btn-block btn-info">Details</button></a></td>
                      <td><a href="{{Route("flat.delete",['id' => $flats->id])}}"><button type="button" class="btn btn-block btn-danger">Delete</button></a></td>
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
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  
</div>

<!-- Modal -->
<div class="modal fade" id="flatDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>ID:</strong> <span id="flat_Id"></span></p>
        <p><strong>Unit Name:</strong> <span id="unit_name"></span></p>
        <p><strong>Floor:</strong> <span id="floor"></span></p>
        <p><strong>Area:</strong> <span id="area"></span></p>
        <p><strong>Room:</strong> <span id="room"></span></p>
        <p><strong>Washroom:</strong> <span id="washroom"></span></p>
        <p><strong>Balconi:</strong> <span id="balconi"></span></p>
        <p><strong>Rent Amount:</strong> <span id="rent_value"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>



<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
<script type="text/javascript">

  $(document).ready(function() {
      /*when click details*/
      $('body').on('click', '#flat-details' , function(){
          var userURL = $(this).data('url');
          $.get(userURL, function(data){
  
              $('#flatDetails').modal('show');
              $('#flat_Id').text(data.id);
              $('#unit_name').text(data.unit_name);
              $('#floor').text(data.floor);
              $('#area').text(data.area);
              $('#room').text(data.room);
              $('#washroom').text(data.washroom);
              $('#balconi').text(data.balconi);
              $('#rent_value').text(data.rent_value);
          })
      });
  });
  
</script>
</html>
