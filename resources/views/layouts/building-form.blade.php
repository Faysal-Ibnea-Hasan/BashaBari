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
                <h3 class="card-title">Create Building</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form autocomplete="off" action="{{Route('building.form.post')}}" method="POST">
                @csrf

                <div class="card-body">
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
                    <label for="exampleInputEmail1">Building's Name</label>
                    <input type="text" name="name" class="form-control"  placeholder="Enter Building Name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" name="address" class="form-control"  placeholder="Enter Address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Developed By</label>
                    <input type="text" name="developer" class="form-control"  placeholder="Developed By">
                  </div>
                  <!-- Date -->
                <div class="form-group">
                  <label for="date">Date:</label>
                  <input type="date" name="date" id="date"/>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Area</label>
                    <select class="form-control" name="area" id="area">

                      <option name="area" value="Not Selected" >Select</option>

                      <option name="area" value="Mirpur-1" >Mirpur-1</option>
                      <option name="area" value="Mirpur-2" >Mirpur-2</option>
                      <option name="area" value="Mirpur-6" >Mirpur-6</option>
                      <option name="area" value="Mirpur-7" >Mirpur-7</option>
                      <option name="area" value="Mirpur-10" >Mirpur-10</option>
                      <option name="area" value="Mirpur-11" >Mirpur-11</option>
                      <option name="area" value="Mirpur-12" >Mirpur-12</option>
                      <option name="area" value="Mirpur-13" >Mirpur-13</option>
                      <option name="area" value="Mirpur-14" >Mirpur-14</option>


                    </select>
                  </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <select class="form-control" name="city" id="city">

                      <option name="city" value="Not Selected" >Select</option>

                      <option name="city" value="Dhaka" >Dhaka</option>



                    </select>
                  </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">District</label>
                    <select class="form-control" name="district" id="district">

                      <option name="district" value="Not Selected" >Select</option>

                      <option name="district" value="Dhaka" >Dhaka</option>



                    </select>
                  </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Postal Code</label>
                    <select class="form-control" name="postal_code" id="postal_code">

                      <option name="postal_code" value="Not Selected" >Select</option>

                      <option name="postal_code" value="1216" >1216</option>



                    </select>
                  </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Parking Facility</label>
                    <select class="form-control" name="parking" id="parking">

                      <option name="parking" value="Not Selected" >Select</option>

                      <option name="parking" value="Available" >Available</option>
                      <option name="parking" value="Not Available" >Not Available</option>


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

          <div class="col-md-6">

            <button type="button" class="btn btn-primary w-25" data-toggle="modal" data-target="#exampleModal">
            <h6>Add Flat</h6><i class="fa-solid fa-plus fa-beat"></i>
            </button>
          </div>

        </div>
        <!-- Button trigger modal -->
        </div>

      </div>
    </section>
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

            <form action="{{Route('building.flat.form.post')}}" method="post">
                @csrf
                <div class="row">
                <div class="form-group w-50 px-1">
                  <label for="exampleInputEmail1">Unit Name</label>
                  <input type="text" name="unit_name" class="form-control"  placeholder="Enter unit Name">
                </div>
                <div class="form-group w-50 px-1">
                        <label for="exampleInputPassword1">Owner</label>
                      <select class="form-control" name="owner_Id" id="owner_Id">

                        <option name="owner_Id" value="owner_Id" >Select</option>
                        @foreach ($dataOwners as $key=>$data)
                        <option name="owner_Id" value="{{ $data->id }}" >#{{ $data->id}},{{$data->name}}</option>

                        @endforeach
                      </select>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>

        </div>




        </div>

      </div>
    </div>
<!-- Modal -->
  </div>
