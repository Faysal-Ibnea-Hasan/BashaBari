<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Building</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Building</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-6">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Building</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form autocomplete="off" action="{{Route('building.form.update.put',['id'=>$data->id])}}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Building's Name</label>
                    <input type="text" name="name" value="{{$data->name}}" class="form-control"  placeholder="Enter Building's Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" name="address" value="{{$data->address}}" class="form-control"  placeholder="Enter Address">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Developed By</label>
                    <input type="text" name="developer" value="{{$data->developer}}" class="form-control"  placeholder="Developed By">
                  </div>
                  <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" value="{{$data->date}}" name="date" id="date"/>
                  </div>



                  {{-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> --}}


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>


          </div>

        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
