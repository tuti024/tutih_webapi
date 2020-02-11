<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Test Api</div>

                    <button class="btn btn-warning" style="margin-bottom: 20px;" @clik-getData>
                        refresh
                    </button>

                    <div
                    v-if="loading ===false"
                    class="card-body">
                        Contoh Hasil pemanggilan endpoin api
                        <P>Response: </P>

                          <input  v-model="katakunci" type="search" placeholder="masukan kata kunci dan tekan enter" @change="jalankan pencarians"/>

                          {{katakunci}}

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>nama</th>
                                    <th>jk</th>
                                    <th>dibuat oleh pada</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in data": key="item.id">
                                    <td>{{ item.nama }}</td>
                                    <td>{{ item.jk }}</td>
                                    <td>{{ item.created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <pagination :data="data" @pagination-change-page="aksesApi"></pagination>
                            
                        {{ data }}
                        {{error}}
                    </div>
                    <div
                        v-else
                        class="card-body">
                        loading....
                        </div>
                </div>
            </div>
        </div>
        <vue-progress-bar></vue-progress-bar>
    </div>
</template>
<script>
     export default {
        data(){
            return{
                data:[],
                error:null,
                loading:false,
                katakunci:''
            }
        },
        mounted() {
        console.log('component mounted.')
        this.aksesApi()
        },

        methods: {
            getData(){
                aksesApi(page = 1, katakunci){
                    this.$progress.start()
                    this.loading = true
               
                const params = {
                    page: page
                }

                axios.get('/testapi' , {
                    params
                })
                .then((response)=>{//2
                    this.data = response.data
                    this.loading = false
                    this.$Progress.finish()
                    })
                .catch((error)=>{//3
                    this.error = error.message
                    this.loading = false
                    this.$Progress.fall()
                    })
                this.$notify({
                    group: 'foo'
                    title: 'Important message',
                    text: 'Hello user! ini notification'
                });
                 }
            }
        }
    }
</script>