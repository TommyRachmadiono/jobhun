@extends('templates.masteradmin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-plus font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Add New User</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group">
                            <label for="username" class="control-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control input-circle-right" id="username" placeholder="Username" name="username" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-arrow-right"></i>
                                </span>
                                <input type="text" class="form-control input-circle-right" id="name" placeholder="Name" name="name" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control input-circle-right" id="email" placeholder="Email Address" name="email" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="password" class="form-control input-circle-right" id="password" placeholder="Password" name="password" required="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="role" class="control-label">Role</label>
                            <select class="form-control" name="role" id="role" required="">
                                <option value="">-- Select Role --</option>
                                <option value="administrator">Administrator</option>
                                <option value="author">Author</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="photo" class="control-label">Select Photo</label>
                            <input type="file" id="photo" name="photo" class="form-control" required="">
                            <p class="help-block"> Select a photo (<b>max xx MB</b>) </p>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn blue">Submit</button>
                        <button type="button" class="btn default">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
@endsection