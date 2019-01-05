<script>
    export default{
        mounted(){
            this.getUsers();
        },
        data(){
            return{
                usersdata: {},
                userdipilih: {},
                loading: true
            }
        },
        methods: {
            getUsers: function(pg=1){
                axios.get('http://localhost/jobhun/public/user/jsondata?page=' + pg).then(response=>{
                    this.usersdata = response.data.users;
                    this.loading = false;
                    console.log(response);
                });
            },

            detailUser: function(usr){
                this.userdipilih = usr;
                $("#modal_edit").modal("show");
            }
        }
    }
</script>
