<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rental</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Rental</li>
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
                <h3 class="card-title">Rental</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form autocomplete="off" action="{{Route('rental.form.post')}}" method="POST">
                @csrf


                <div class="form-group">
                  <label for="exampleInputPassword1">Building Name</label>
                  <select class="form-control" name="flat_Id" id="flat_Id">

                    <option name="flat_Id" value="flat_Id" >Select</option>
                    @foreach ($dataFlats as $key=>$data)
                    <option name="flat_Id" value="{{ $data->flat_Id }}" >{{ $data->Buildings->name ?? "No Building" }}</option>

                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Unit Name</label>
                  <select class="form-control" name="flat_Id" id="flat_Id">

                    <option name="flat_Id" value="flat_Id" >Select</option>
                    @foreach ($dataFlats as $key=>$data)
                    <option name="flat_Id" value="{{ $data->flat_Id }}" >{{ $data->unit_name ?? "No Unit" }}</option>

                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                  <select class="form-control" name="status" id="status">

                    <option name="status" value="Available" >Select</option>

                    <option name="status" value="Available" >Available</option>
                    <option name="status" value="Not Available" >Not Available</option>


                  </select>
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
                  <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


          </div>

        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
