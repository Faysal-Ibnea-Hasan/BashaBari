<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Owner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Owner</li>
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
                <h3 class="card-title">Update Owner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form autocomplete="off" action="{{Route('owner.form.update.put',['id'=>$data->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Owner's Name</label>
                    <input type="text" name="name" value="{{$data->name}}" class="form-control"  placeholder="Enter Owner's Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mobile Number</label>
                    <input type="text" name="mobile" value="{{$data->mobile}}" class="form-control"  placeholder="Enter Mobile Number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" name="address" value="{{$data->address}}" class="form-control"  placeholder="Enter Address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" value="{{$data->password}}" class="form-control"  placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Building Name</label>
                    <select class="form-control" name="building_Id" id="building_Id">
                      
                      <option name="building_Id" value="building_Id" >Select</option>
                      @foreach ($dataBuildings as $key=>$data)
                      <option name="building_Id" value="{{ $data->building_Id }}" >{{ $data->name }}</option>
            
                      @endforeach

                      
                     
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">NID</label>
                    <input type="text" name="nid" value="{{$data->nid}}" class="form-control"  placeholder="Enter NID">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="text" name="image" value="{{$data->image}}" class="form-control"  placeholder="Image">
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