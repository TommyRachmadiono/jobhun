<template>
<div>
    <i class="fa fa-spin fa-spinner" v-if="loading"></i>
    <table class="table">
        <thead>
            <th>Nama</th>
            <th>Username</th>
            <th>Action</th>
        </thead>
        <tbody>
            <tr v-for="user in usersdata">
                <td>{{user.name}}</td>
                <td>{{user.username}}</td>
                <td><a href="#" @click="detailUser(user)"><i class="fa fa-eye"></i></a></td>
            </tr>
        </tbody>
    </table>

    <!-- Modal -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User {{ userdipilih.name }}</h5>
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
</template>
<script>
    export default{
        mounted(){
            this.getUsers();
        },
        data(){
            return{
                operator1: 0,
                operator2: 0,
                usersdata: [],
                userdipilih: {},
                loading: true
            }
        },
        methods: {
            getUsers: function(){
                axios.get('http://localhost/jobhun/public/user/jsondata').then(response=>{
                    this.usersdata = response.data.users;
                    this.loading = false;
                });
            },

            detailUser: function(usr){
                this.userdipilih = usr;
                $("#modal_edit").modal("show");
            }
        }
    }
</script>
