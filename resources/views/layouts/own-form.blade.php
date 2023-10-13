<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Assign</li>
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
                <h3 class="card-title">Assign Owner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form autocomplete="off" action="{{Route('own.form.post')}}" method="POST">
                @csrf

                <div class="form-group">
                  <label for="exampleInputPassword1">Owner's Name</label>
                  <select class="form-control" name="owner_Id" id="owner_Id">

                    <option name="owner_Id" value="owner_Id" >Select</option>
                    @foreach ($dataOwners as $key=>$data)
                    <option name="owner_Id" value="{{ $data->id }}" >{{ $data->name }}</option>

                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Unit Name</label>
                  <select class="form-control" name="flat_Id" id="flat_Id">

                    <option name="flat_Id" value="flat_Id" >Select</option>
                    @foreach ($dataFlats as $key=>$data)
                    <option name="flat_Id" value="{{ $data->id }}" >{{ $data->unit_name }}</option>

                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Building Name</label>
                  <select class="form-control" name="building_Id" id="building_Id">

                    <option name="building_Id" value="building_Id" >Select</option>
                    @foreach ($dataBuildings as $key=>$data)
                    <option name="building_Id" value="{{ $data->id }}" >{{ $data->name }}</option>

                    @endforeach
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
