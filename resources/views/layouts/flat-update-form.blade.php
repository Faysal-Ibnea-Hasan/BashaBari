<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Flat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Flat</li>
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
                <h3 class="card-title">Update Flat</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form autocomplete="off" action="{{Route('flat.form.update.put',['id'=>$data->id])}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Unit Name</label>
                    <input type="text" name="unit_name" value="{{$data->unit_name}}" class="form-control"  placeholder="Enter Unit Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Floor</label>
                    <input type="number" name="floor" value="{{$data->floor}}" class="form-control"  placeholder="Enter Floor Number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Area</label>
                    <input type="text" name="area" value="{{$data->area}}" class="form-control"  placeholder="Enter Area Details">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Room</label>
                    <input type="number" name="room" value="{{$data->room}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Washroom</label>
                    <input type="number" name="washroom" value="{{$data->washroom}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Balconi</label>
                    <input type="number" name="balconi" value="{{$data->balconi}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Rent Value</label>
                    <input type="text" name="rent_value" value="{{$data->balconi}}" class="form-control" placeholder="Enter Rent Amount">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Owner Name</label>
                    <select class="form-control" name="owner_Id" id="owner_Id">

                        <option name="owner_Id" value="owner_Id">Select</option>
                        @foreach ($dataOwner as $key => $data)
                            <option name="owner_Id" value="{{ $data->owner_Id }}">
                                {{ $data->name }}</option>
                        @endforeach



                    </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Building Name</label>
                    <select class="form-control" name="building_Id" id="building_Id">

                      {{-- <option name="building_Id" value="building_Id" >Select</option> --}}
                      @foreach ($dataBuilding as $key=>$data)
                      <option name="building_Id" value="{{ $data->building_Id }}" >{{ $data->name }}</option>

                      @endforeach



                      </select>
                  </div>

                  {{-- <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="text" name="image" value="{{$data->image}}" class="form-control"  placeholder="Image">
                  </div> --}}

                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image[]" multiple value="{{$data->image}}" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>


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
