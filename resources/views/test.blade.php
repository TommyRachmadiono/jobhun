@extends('templates.masteradmin');

@section('content')
<adminuser inline-template>
    <div>
    <i class="fa fa-spin fa-spinner" v-if="loading"></i>
    <table class="table table-bordered" v-if="!loading">
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
    <pagination :data="usersdata" v-on:pagination-change-page="getUsers" v-if="!loading"></pagination>

    <!-- Modal -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User @{{ userdipilih.name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="username" class="control-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control input-circle-right" id="username" placeholder="Username" name="username" v-model="userdipilih.username" required="" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-arrow-right"></i>
                                </span>
                                <input type="text" class="form-control input-circle-right" id="name" placeholder="Name" name="name" required="" v-model="userdipilih.name" readonly="">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn blue">Update</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
</div>
</adminuser>
@endsection