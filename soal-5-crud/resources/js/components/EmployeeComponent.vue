<template>
    <div>
        <h2 class="text-center">ALL Data</h2>

        <div class="row justify-content-center mb-3 mt-2">
            <div class="col-lg-12 col-xs-12 col-sm-12 mb-3">
                <small class="text-secondary text-bold">* Ketikan data yang akan di cari di kolom input pencarian di bawah ini. Pencarian data berdasarkan nama atau nip.</small>
            </div>
            <div class="col-lg-8 col-xs-8 col-sm-8">
                <div class="form-group">
                    <input type="search" name="keyword" id="keyword" class="form-control" placeholder="Ketik data yang ingin dicari" v-model="keyword" @keyup="SearchEmployee">
                </div>
            </div>
            <!-- <div class="col-lg-3 col-xs-3 col-sm-3">
                <button type="submit" class="btn btn-primary btn-md" @click="SearchEmploye"><font-awesome-icon icon="search" /></button>
            </div> -->


            <div class="col-lg-12 col-xs-12 col-sm-12 mt-5">
                <div class="row justify-content-center">

                    <div class="d-flex justify-content-evenly">
                        <div class="form-group">
                            <input class="form-check-input" type="checkbox" value="" id="nip" v-model="sorts" value="nip" @change="SortData($event)">
                            <label class="form-check-label" for="nip">
                                Sort by NIP
                            </label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-input" type="checkbox" value="" id="name" v-model="sorts" value="name" @change="SortData($event)">
                            <label class="form-check-label" for="name">
                                Sort by Name
                            </label>
                        </div>
                        <div class="form-group">
                            <input class="form-check-input" type="checkbox" value="" id="gender" v-model="sorts" value="gender" @change="SortData($event)">
                            <label class="form-check-label" for="gender">
                                Sort by Gender
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div v-if="loading" class="d-flex justify-content-center">
            <div class="spinner-grow text-info" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div v-else class="table-responsive">
            <table class="table table-hover table-dark table-sm">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <!-- <tbody v-if="loading">
                    <tr>
                        <td colspan="25">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-grow text-info" style="width: 3rem; height: 3rem;" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody> -->
                <tbody v-if="found">
                    <tr v-for="employee in employees.data" :key="employee.id">
                        <td>
                            <strong>{{ employee.nip }}</strong></td>
                        <td class="text-capitalize">{{ employee.name }}</td>
                        <td>{{ employee.email }}</td>
                        <td>
                            {{employee.gender === "P" ?  "Pria" : "Wanita"}}
                        </td>
                        <td>
                            <router-link :to="{name: 'detail', params: { id: employee.id }}" type="button" class="btn btn-success btn-sm">
                                <font-awesome-icon icon="eye" />
                            </router-link>
                            
                            <router-link :to="{name: 'edit', params: { id: employee.id }}" type="button" class="btn btn-primary btn-sm">
                                <font-awesome-icon icon="edit" />
                            </router-link>

                            <button type="button" class="btn btn-danger btn-sm" @click="DeleteEmployee(employee.id)">
                                <font-awesome-icon icon="trash" />
                            </button>
                        </td>
                    </tr>
                   <!--  <tr v-else>
                        <td class="text-center text-danger" colspan="15">
                            {{message}}
                        </td>
                    </tr> -->
                </tbody>
                <tbody class="bg-dark" v-else>
                    <td class="text-center text-danger" colspan="15">
                        {{message}}
                    </td>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <pagination class="pagination pagination-sm" :data="employees" @pagination-change-page="EmployeeList"></pagination>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                employees: [],
                keyword: '',
                loading: null,
                message: '',
                found: null,
                sorts:[]
            }
        },
        created() {
            this.EmployeeList()
        },
        
        methods: {
           EmployeeList(page=1){
            this.loading=true
            this.axios.get(`/api/v1/employee?page=${page}`)
            .then((res) => {
                // console.log(res.data.data)
                setTimeout(() =>  {
                    this.loading=false
                    this.found=true
                    this.employees = res.data.data
                }, 1000)
            })
            .catch(err =>  {
                console.log(err.response)
            })
           },

           SortData(e){
            console.log(e.target.value)
            this.loading=true
            const sortir = e.target.value
            this.axios.post('/api/v1/employee-sort', {
                sort: sortir
            })
            .then((res) => {
                // console.log(res.data.data)
                setTimeout(() =>  {
                    this.loading=false
                    this.found=true
                    this.employees = res.data.data
                }, 1000)
            })
            .catch(err =>  {
                console.log(err.response)
            })
           },

           SearchEmployee(){
            this.loading=true
            const key = this.keyword
            this.axios.post('/api/v1/employee-search',{
                keyword: key
            })
            .then((res) => {
                
                if(res.data.data === "Employee data not found!"){
                    // console.log(res.data.message)
                    this.found=false
                    setTimeout(() => {
                        this.loading=false
                        this.message = res.data.message
                        this.employees.data=[]
                    },1500)
                }else{
                    // console.log(res.data.data)
                    this.found=true
                    setTimeout(() => {
                        this.loading=false
                        this.employees=res.data.data
                    },1000)
                }
            })
            .catch((err) =>  {
                console.log(err.response)
            })
           },

           DeleteEmployee(id){
            this.$swal({
                title: 'Are you sure?',
                text: `You won't be able to revert this! ${id}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                // this.loading=true
                this.axios.delete(`/api/v1/employee/${id}`, {
                    id: id
                })
                .then((res) => {
                    let i = this.employees.data.map(data => data.id).indexOf(id);
                    this.employees.data.splice(i, 1)
                    this.$swal(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                      )
                })
               
            }
            })
           }

        }
    }
</script>s