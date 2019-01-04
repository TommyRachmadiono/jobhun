@extends('templates.masteradmin')

@section('content')

<div class="page-container-bg-solid page-content-white">
    <h1 class="page-title"><b> Profil Pengguna</b>
    </h1>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{ asset('admin/assets/pages/media/profile/avatar.png') }}" class="img-responsive" alt=""> </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">{{ $user->name }}</div>
                        <div class="profile-usertitle-job"> {{ $user->role }} </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                        <button type="button" class="btn btn-circle red btn-sm">Message</button>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">

                            <li class="active">
                                <a href="#">
                                    <i class="icon-settings"></i> Pengaturan Akun </a>
                            </li>

                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->
                {{-- <div class="portlet light ">
                    <!-- STAT -->
                    <div class="row list-separated profile-stat">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 37 </div>
                            <div class="uppercase profile-stat-text"> Projects </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 51 </div>
                            <div class="uppercase profile-stat-text"> Tasks </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 61 </div>
                            <div class="uppercase profile-stat-text"> Uploads </div>
                        </div>
                    </div>
                    <!-- END STAT -->
                    <div>
                        <h4 class="profile-desc-title">About Marcus Doe</h4>
                        <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <a href="http://www.keenthemes.com">www.keenthemes.com</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-twitter"></i>
                            <a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-facebook"></i>
                            <a href="http://www.facebook.com/keenthemes/">keenthemes</a>
                        </div>
                    </div>
                </div> --}}
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->

            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Akun Profil</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Info Biodata</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">Ganti Foto Profil</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">Ubah Password</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <form role="form" action="{{ route('user.update', $user->id) }}">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="PATCH">
                                            <div class="form-group">
                                                <label class="control-label">Nama</label>
                                                <input type="text" placeholder="John" class="form-control" value="{{ $user->name }}" name="name" /> 
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Nama Pengguna</label>
                                                <input type="text" placeholder="username" class="form-control" value="{{ $user->username }}" name="username" /> 
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <input type="mail" placeholder="mail@example.com" class="form-control" value="{{ $user->email }}" name="email" /> 
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Hak Akses</label>
                                                <input type="mail" placeholder="admin / author / dll" class="form-control" readonly="" value="{{ $user->role }}" name="role" /> 
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Nomor Telepon</label>
                                                <input type="text" placeholder="+1 646 580 DEMO (6284)" class="form-control" value="{{ $user->biodata->phone }}" name="phone" /> 
                                            </div>
                                      
                                            <label class="control-label">Jenis Kelamin</label>
                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="gender" id="gender" value="Laki-Laki" checked=""> Laki - Laki
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="gender" id="gender" value="Perempuan"> Perempuan
                                                    <span></span>
                                                </label>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" value="{{ $user->biodata->date_of_birth }}" name="date_of_birth" /> 
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Tempat Lahir</label>
                                                <input type="text" placeholder="Pinggir Jalan" class="form-control" value="{{ $user->biodata->place_of_birth }}" name="place_of_birth" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Link Website</label>
                                                <input type="text" placeholder="http://www.mywebsite.com" class="form-control" value="{{ $user->biodata->website }}" name="website" />
                                            </div>
                                            <div class="margiv-top-10">
                                                <a href="javascript:;" class="btn green"> Simpan </a>
                                                <a href="javascript:;" class="btn default"> Batal </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                            eiusmod. </p>
                                        <form action="#" role="form">
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Pilih Gambar </span>
                                                            <span class="fileinput-exists"> Ubah </span>
                                                            <input type="file" name="photo"> </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Hapus </a>
                                                    </div>
                                                </div>
                                                <div class="clearfix margin-top-10">
                                                    <span class="label label-danger">CATATAN! </span>
                                                    <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                </div>
                                            </div>
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn green"> Ubah </a>
                                                <a href="javascript:;" class="btn default"> Batal </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE AVATAR TAB -->
                                    <!-- CHANGE PASSWORD TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                        <form action="#">
                                            <div class="form-group">
                                                <label class="control-label">Kata Sandi Sekarang</label>
                                                <input type="password" class="form-control" name="password" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Kata Sandi Baru</label>
                                                <input type="password" class="form-control" name="password_baru" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Ketik Ulang Kata Sandi Baru</label>
                                                <input type="password" class="form-control" name="konfirmasi_password" /> </div>
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn green"> Ubah Password </a>
                                                <a href="javascript:;" class="btn default"> Batal </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE PASSWORD TAB -->
                                    <!-- PRIVACY SETTINGS TAB -->
                                    <div class="tab-pane" id="tab_1_4">
                                        <form action="#">
                                            <table class="table table-light table-hover">
                                                <tr>
                                                    <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                                    <td>
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios1" value="option1" /> Yes
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios1" value="option2" checked/> No
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                    <td>
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios11" value="option1" /> Yes
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios11" value="option2" checked/> No
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                    <td>
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios21" value="option1" /> Yes
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios21" value="option2" checked/> No
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                    <td>
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios31" value="option1" /> Yes
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios31" value="option2" checked/> No
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--end profile-settings-->
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn red"> Save Changes </a>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END PRIVACY SETTINGS TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
</div>
@endsection