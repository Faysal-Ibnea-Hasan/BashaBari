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
                            <h3 class="card-title">Create Flat</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form autocomplete="off" action="{{ Route('flat.form.post') }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group w-50 px-1">
                                        <label for="exampleInputEmail1">Unit Name</label>
                                        <input type="text" name="unit_name" class="form-control"
                                            placeholder="Enter Unit Name">
                                    </div>
                                    <div class="form-group w-50">
                                        <label for="exampleInputPassword1">Floor</label>
                                        <input type="number" name="floor" class="form-control"
                                            placeholder="Enter Floor Number">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group w-50 px-1">
                                        <label for="exampleInputPassword1">Area</label>
                                        <input type="text" name="area" class="form-control"
                                            placeholder="Area Details">
                                    </div>
                                    <div class="form-group w-50">
                                        <label for="exampleInputPassword1">Room</label>
                                        <input type="number" name="room" class="form-control">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group w-50 px-1">
                                        <label for="exampleInputPassword1">Washroom</label>
                                        <input type="number" name="washroom" class="form-control">
                                    </div>
                                    <div class="form-group w-50">
                                        <label for="exampleInputPassword1">Balconi</label>
                                        <input type="number" name="balconi" class="form-control">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group w-50 px-1">
                                        <label for="exampleInputPassword1">Rent Value</label>
                                        <input type="text" name="rent_value" class="form-control"
                                            placeholder="Enter Rent Amount">
                                    </div>
                                    <div class="form-group w-50">
                                        <label for="exampleInputPassword1">Building Name</label>
                                        <select class="form-control" name="building_Id" id="building_Id">

                                            <option name="building_Id" value="building_Id">Select</option>
                                            @foreach ($dataBuilding as $key => $data)
                                                <option name="building_Id" value="{{ $data->building_Id }}">
                                                    {{ $data->name }}</option>
                                            @endforeach



                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image[]" class="custom-file-input"
                                                id="exampleInputFile" multiple>
                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="submit" value="submit"
                                    class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>


                </div>

            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
