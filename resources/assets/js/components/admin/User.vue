<script>
    export default{
        mounted(){
            this.getUsers();
        },
        data(){
            return{
                usersdata: {},
                userdipilih: {
                    biodata:{}
                },
                usertambah:{
                    role: 'author'
                },
                isLoading: false,
                search: '',
                isTyping: false
            }
        },
        methods: {
            getUsers: function(pg=1){
                this.isLoading = true;
                axios.get(localStorage.getItem('appUrl') + 'user/jsondata?page=' + pg + '&search=' + this.search).then(response=>{
                    this.usersdata = response.data.users;
                    this.isLoading = false;
                }).catch(error => {
                    this.$swal(error.response.statusText, "Terdapat kesalahan di server. mohon menghubungi Admin", "error");
                    this.isLoading = false;
                });
            },

            detailUser: function(usr){
                this.userdipilih = usr;
                $("#modal_lihat").modal("show");
            },

            addUser: function(){
                this.isLoading = true;
                var qs = require('qs');
                axios.post(localStorage.getItem('appUrl') + 'user/ajaxadd', qs.stringify({'userdata': this.usertambah})).then(response=>{
                    this.usersdata.data.push(response.data.user);
                    $("#modal_tambah").modal("hide");$('.modal-backdrop').remove();
                    this.$swal("Berhasil",response.data.message,"success");
                    this.usertambah = {
                        role: 'author'
                    };
                    this.isLoading = false;
                }).catch(error => {
                    $("#modal_tambah").modal("hide");$('.modal-backdrop').remove();
                    this.$swal(error.response.statusText, error.response.data.message, "error");
                    this.isLoading = false;
                });
            },

            changeRole: function(){
                this.isLoading = true;

            }
        }
    }
    /*
    ,
      onNotaChange(e){
        this.img = e.target.files[0];
      },
      changeNota()
      {
        var fd = new FormData();
        fd.append('img',this.img);
        fd.append('idgambar',this.jadwal.kode_booking);
        if(this.img != '')
        {
          axios.post(this.$store.state.apiUrl + 'z_konsultasi/do_upload/', fd).then(response=>{
            alert(response.data.pesan);
            $("#modal-default2").modal('hide');
          });
        }
        else
        {
          alert("Masukkan gambar dengan benar.");
        }
      }
    */
</script>