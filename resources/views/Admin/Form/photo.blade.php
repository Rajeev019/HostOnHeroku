<!DOCTYPE html>
<html>

<head>
    @include('Admin.Parts.metacss')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        @include('Admin.Parts.sidenav')
        <div class="content-wrapper ">

            <div class="panel-header panel-header-lg">

            </div>
            <div class="content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card  card-tasks ">
                            <div class="card-header text-center ">

                                <h4 class="card-title">Photo</h4>
                            </div>
                            <div class="card-body ">

                                @if (Session::has('delete'))

                                <div class="alert alert-danger " id="success_danger" role="alert">
                                    {{ Session::get('delete') }}
                                </div>
                                @endif
                                <script type="text/javascript">
                                    setTimeout(function() {
                                        $('#success_danger').fadeOut('fast');
                                    }, 3000);
                                </script>

                                @if (Session::has('success'))

                                <div class="alert alert-success " id="success_alert_email_sent" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                                @endif
                                <script type="text/javascript">
                                    setTimeout(function() {
                                        $('#success_alert_email_sent').fadeOut('fast');
                                    }, 3000);
                                </script>

                                @if($errors->any())
                                <div class="alert alert-danger" role="alert" id="errors-alert">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>
                                            {{$error}}
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>

                                @endif

                                <script type="text/javascript">
                                    setTimeout(function() {
                                        $('#errors-alert').fadeOut('fast');
                                    }, 3000);
                                </script>
                                @if($errors->any())
                                <div class="alert alert-danger" role="alert" id="errors-alert">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>
                                            {{$error}}
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>

                                @endif

                                <script type="text/javascript">
                                    setTimeout(function() {
                                        $('#errors-alert').fadeOut('fast');
                                    }, 3000);
                                </script>
                                <!-- Start of Form -->
                                <form action="{{url('adminlog/photo')}}" method="post" enctype="multipart/form-data">
                                    @csrf




                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <label for="title">Images File: </label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <input type='file' name="image[]" accept=".png, .jpg, .jpeg" id="file" multiple onchange="readURL(this);" />

                                                <img id="blah" src="#" alt="" height="100px" width="100px" padding="30px" />

                                            </div>
                                        </div>

                                    </div>
                                    <div style="margin-left: 200px; margin-top: 20px;">
                                        <div id="valueImage"></div>
                                    </div>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-success  float-right">Submit</button>
                                    </div>
                                </form>
                                <!-- End of Form -->
                            </div>
                            <!--End of Form Column -->
                            <!--Start of Summary -->
                            <div class="card-footer mt-3">
                                <div class="container">
                                    <div class="table-wrapper">
                                        <div class="table-title">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h2>Summary </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Image</th>
                                                    <th>Actions</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                @foreach ($photos as $intro)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td> <?php $count = 0; ?>
                                                        @foreach (json_decode($intro->image) as $edit)
                                                        @if ($count == 0)
                                                        <img src="{{ url('portfolio/img/'.$edit)}}" height="100" width="100" />
                                                        <?php $count++; ?>
                                                        @endif
                                                        @endforeach</td>

                                                    <td>
                                                        <a href="#editEmployeeModal<?php echo $intro->id; ?>" class="edit" data-toggle="modal"><i class="fas fa-pencil-alt fa-lg"></i></a>

                                                        <a href="#deleteEmployeeModal<?php echo $intro->id; ?>" class="delete" data-toggle="modal"><i class="fas fa-trash-alt fa-lg"></i></a>
                                                    </td>
                                                </tr>
                                                <div id="editEmployeeModal<?php echo $intro->id; ?>" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{url('adminlog/photo/update',array($intro->id))}}" method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Photo Edit </h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                </div>

                                                                <div class="modal-body">

                                                                    <div class="form-group row">
                                                                        <div class="col-md-2">
                                                                            <label for="title">Images File: </label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">

                                                                                <input type='file' id="image" name="image[]" accept=".png, .jpg, .jpeg" multiple />
                                                                            </div>
                                                                        </div>
                                                                        <?php $count = 0; ?>
                                                                        @foreach (json_decode($intro->image) as $edit)
                                                                        @if ($count == 0)
                                                                        <img src="{{ url('portfolio/img/'.$edit)}}" height="100" width="100" />
                                                                        <?php $count++; ?>
                                                                        @endif
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                                <!-- <div class="form-group">
                                  <label for="exampleFormControlFile1">Image File</label>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                  </div>" width="50px" height="50px">
                                </div> -->
                                                                <div class="modal-footer">
                                                                    <a href="{{url('adminlog/photo')}}" class="btn btn-danger mr-2" data-dismiss="modal" value="Cancel"> Cancel</a>
                                                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="deleteEmployeeModal<?php echo $intro->id; ?>" class="modal fade">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <form>
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete Records</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete these Records?</p>
                                                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{url('adminlog/photo')}}" class="btn btn-gallery mr-2" data-dismiss="modal">Cancel</a>
                                                                    <a href="{{url('adminlog/photo/delete',array($intro->id))}}" class="btn btn-danger">Delete</a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--End of Summary -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Admin.Parts.footer')
</body>

</html>