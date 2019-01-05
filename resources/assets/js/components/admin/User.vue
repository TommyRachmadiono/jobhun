<script>
    export default{
        mounted(){
            this.getUsers();
        },
        data(){
            return{
                usersdata: {},
                userdipilih: {},
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
                });
            },

            detailUser: function(usr){
                this.userdipilih = usr;
                $("#modal_lihat").modal("show");
            }
        }
    }
</script>
