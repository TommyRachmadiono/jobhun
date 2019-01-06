@extends('templates.masteradmin');

@section('content')
<adminuser inline-template>
<div>
	<div class="row">
		<div class="col-md-12">
		    <div class="portlet box green">
		        <div class="portlet-title">
		            <div class="caption">
		                <i class="fa fa-globe"></i>Pengguna
		            </div>
		            <div class="tools">
		              	ditemukan @{{usersdata.total}} pengguna
		            </div>
		        </div>
		        <div class="portlet-body">
		            <i class="fa fa-spin fa-spinner" v-if="isLoading"></i>

				   	<div v-else>
				   		<div class="row">
				   			<div class="col-md-10">
							    <div class="form-group">
								    <div class="input-group">
								        <span class="input-group-addon input-circle-left">
								            <i class="fa fa-search"></i>
								        </span>
									   	<input type="text" class="form-control input-circle-right" placeholder="Tekan enter setelah menulis.." v-model="search" v-on:keyup.enter="getUsers">
								    </div>
								</div>
							</div>
							<div class="col-md-2">
							    <div class="form-group">
								    <div class="input-group">
								        <button class="btn btn-success" data-toggle="modal" data-target="#modal_tambah"><i class="fa fa-plus"></i> Tambah</button>
								    </div>
								</div>
							</div>
						</div>

						<div v-if="usersdata.total > 0">
						    <table class="table table-bordered">
						        <thead>
						            <tr>
						                <th>#</th>
						                <th>Nama</th>
						                <th>Username</th>
						                <th>Email</th>
						                <th>Action</th>
						            </tr>
						        </thead>
						        <tbody>
						            <tr v-for="(user,index) in usersdata.data">
						                <td>@{{index + usersdata.from}}</td>
						                <td>@{{user.name}}</td>
						                <td>@{{user.username}}</td>
						                <td>@{{user.email}}</td>
						                <td><a href="#" v-on:click="detailUser(user)"><i class="fa fa-eye"></i></a></td>
						            </tr>
						        </tbody>
						    </table>
						    <pagination v-bind:data="usersdata" v-on:pagination-change-page="getUsers" v-if="!isLoading"></pagination>
						</div>
						<div v-else>
							<p>Tidak ditemukan data</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Modal -->
<div class="modal fade" id="modal_lihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lihat Data @{{ userdipilih.name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form role="form">
                    <div class="form-body">
                    	<div class="col-md-4">
	                    	<div class="form-group">
	                            <label for="name" class="control-label">Foto</label>
	                            <div class="input-group">
	                                <img v-bind:src="'images/users/' + userdipilih.username + '.jpg'" class="img-thumbnail" width="142">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label for="username" class="control-label">Username</label>
	                            <div class="input-group">
	                                <span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-user"></i>
	                                </span>
	                                <input type="text" class="form-control input-circle-right" placeholder="-" v-model="userdipilih.username" required="" readonly="">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label for="name" class="control-label">Name</label>
	                            <div class="input-group">
	                                <span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-arrow-right"></i>
	                                </span>
	                                <input type="text" class="form-control input-circle-right" placeholder="-" required="" v-model="userdipilih.name" readonly="">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label for="name" class="control-label">Email</label>
	                            <div class="input-group">
	                                <span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-arrow-right"></i>
	                                </span>
	                                <input type="text" class="form-control input-circle-right" placeholder="-" required="" v-model="userdipilih.email" readonly="">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label for="name" class="control-label">Role</label>
	                            <div class="input-group">
	                                <span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-arrow-right"></i>
	                                </span>
	                                <input type="text" class="form-control input-circle-right" placeholder="-" required="" v-model="userdipilih.role" readonly="">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4">
	                    	<div class="form-group">
	                            <label for="name" class="control-label">Telepon</label>
	                            <div class="input-group">
	                                <span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-arrow-right"></i>
	                                </span>
	                                <input type="text" class="form-control input-circle-right" placeholder="-" required="" v-model="userdipilih.biodata.phone" readonly="">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label for="name" class="control-label">Jenis Kelamin</label>
	                            <div class="input-group">
	                                <span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-arrow-right"></i>
	                                </span>
	                                <input type="text" class="form-control input-circle-right" placeholder="-" required="" v-model="userdipilih.biodata.gender" readonly="">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label for="name" class="control-label">Website</label>
	                            <div class="input-group">
	                                <span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-arrow-right"></i>
	                                </span>
	                                <input type="text" class="form-control input-circle-right" placeholder="-" required="" v-model="userdipilih.biodata.website" readonly="">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label for="name" class="control-label">Tanggal Lahir</label>
	                            <div class="input-group">
	                                <span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-arrow-right"></i>
	                                </span>
	                                <input type="text" class="form-control input-circle-right" placeholder="-" required="" v-model="userdipilih.biodata.date_of_brith" readonly="">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label for="name" class="control-label">Tempat Lahir</label>
	                            <div class="input-group">
	                                <span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-arrow-right"></i>
	                                </span>
	                                <input type="text" class="form-control input-circle-right" placeholder="-" required="" v-model="userdipilih.biodata.place_of_birth" readonly="">
	                            </div>
	                        </div>               
	                        <div class="form-group">
	                            <label for="name" class="control-label">Dibuat pada</label>
	                            <div class="input-group">
	                                <span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-arrow-right"></i>
	                                </span>
	                                <input type="text" class="form-control input-circle-right" placeholder="-" required="" v-model="userdipilih.biodata.created_at" readonly="">
	                            </div>
	                        </div>	   
	                    </div>
	                    <div class="col-md-4">	                    	                     
	                        <div class="form-group">
	                            <label for="name" class="control-label">Terakhir diupdate</label>
	                            <div class="input-group">
	                                <span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-arrow-right"></i>
	                                </span>
	                                <input type="text" class="form-control input-circle-right" placeholder="-" required="" v-model="userdipilih.biodata.updated_at" readonly="">
	                            </div>
	                        </div>
	                    </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-default pull-right" data-dismiss="modal" >Tutup</button>
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form role="form">
                    <div class="form-body">
                    	<div class="col-md-12">
	                        <div class="form-group">
	                            <label for="username" class="control-label">Nama Pengguna</label>
	                            <div class="input-group">
	                                <span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-user"></i>
	                                </span>
	                                <input type="text" class="form-control input-circle-right" placeholder="Nama Pengguna" v-model="usertambah.username" required="">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label for="name" class="control-label">Nama</label>
	                            <div class="input-group">
	                                <span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-arrow-right"></i>
	                                </span>
	                                <input type="text" class="form-control input-circle-right" placeholder="Nama" required="" v-model="usertambah.name">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label for="name" class="control-label">Email</label>
	                            <div class="input-group">
	                                <span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-arrow-right"></i>
	                                </span>
	                                <input type="text" class="form-control input-circle-right" placeholder="Email" required="" v-model="usertambah.email">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label for="name" class="control-label">Role</label>
	                            <div class="input-group">
	                            	<span class="input-group-addon input-circle-left">
	                                    <i class="fa fa-arrow-right"></i>
	                                </span>
	                                <select class="form-control input-circle-right" v-model="usertambah.role" style="width:100%">
	                                	<option value="administrator">Administrator</option>
	                                	<option value="author">Penulis</option>
	                                </select>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-default" v-on:click="addUser">Simpan</button>
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
</div>
</adminuser>
@endsection