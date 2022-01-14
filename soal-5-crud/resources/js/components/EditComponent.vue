<template>
    <div>
        <h3 class="text-center">Edit User</h3>
        
        <div class="row justify-content-center">
            <!-- <pre>
                {{field}}
            </pre> -->
            <!-- loadingg  dulu -->
            <div v-if="loading" class="col-lg-12  col-xs-12 col-sm-12">
                <div class="spinner-grow text-info" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>


            <div v-else class="col-lg-12 col-xs-12 col-sm-12">

                <form @submit.prevent="UpdateEmployee" enctype="multipart/form-data">
                    <div class="row g-5">
                      <div class="col-sm-8 col-md-8">
                        <input type="hidden" class="form-control" v-model="field.id" name="id">
                        <div class="form-group">
                            <label>Name</label>
                            <input v-if="field.name" type="text" class="form-control" v-model="field.name" name="name">
                            <div v-if="validation.name" class="mt-2 alert alert-danger">
                                {{ validation.name[0] }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" v-model="field.email">

                            <div v-if="validation.email" class="mt-2 alert alert-danger">
                                {{ validation.email[0] }}
                            </div>
                        </div>

                        <div class="form-group mt-3 mb-3">
                            <h5>Gender : </h5>
                                <!-- <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" v-model="field.gender"  :value="`${field.gender !== field.gender ? field.gender : ''}`">
                                    <label class="form-check-label">
                                        <font-awesome-icon icon="female" class="fs-3"/>
                                    </label>
                                </div> -->
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" v-model="field.gender" :value="field.gender">
                                  <label class="form-check-label">
                                    <font-awesome-icon icon="male" class="fs-3"/>
                                </label>
                            </div>
                            <div v-if="validation.gender" class="mt-2 alert alert-danger">
                                {{ validation.gender[0] }}
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <label>NIP</label>
                            <input type="text" class="form-control" v-model="field.nip" name="nip">
                            <div v-if="validation.nip" class="mt-2 alert alert-danger">
                                {{ validation.nip[0] }}
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <select class="form-select" aria-label="Default select example" name="hoby">
                              <option selected :value="field.hoby">{{field.hoby}}</option>
                              <option>Change Hoby</option>
                              <option value="sepak bola">Sepak Bola</option>
                              <option value="voli">Voli</option>
                              <option value="tenis meja">Tenis Meja</option>
                          </select>

                          <div v-if="validation.hoby" class="mt-3 alert alert-danger">
                                {{ validation.hoby[0] }}
                            </div>
                        </div>

                      </div>
                      <div class="col-3 col-md-4">
                          <div class="form-group">
                              <div v-if="!field.photo" class="mb-3">
                                  <label for="photo" class="form-label">Upload Photo</label>
                                  <input class="form-control form-control-sm" id="photo" name="photo" type="file" @change="fileImage">
                              </div>
                          </div>
                          <img :src="`http://localhost:8000/storage/${field.photo}`" width="150" class="img-fluid rounded-pill circle">

                          <button class="mt-2 btn btn-info rounded-pill btn-sm">
                              Update photo
                          </button>

                          <div v-if="validation.photo" class="mt-2 alert alert-danger">
                            {{ validation.photo[0] }}
                        </div>
                      </div>

                  </div>

                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary rounded-pill">
                        <div v-if="loading">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </div>
                        <span v-else>
                            Update Employee
                        </span>
                    </button>
                      <router-link class="btn btn-danger rounded-pill" to="/">Cancel</router-link>
                  </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name:'edit',
        data() {
            return {
                field: {},
                update: {},
                validation: [],
                loading: null
            }
        },
        created() {
            this.loading=true
            this.axios.get(`/api/v1/employee/${this.$route.params.id}`)
            .then((res) => {
                setTimeout(() => {
                    this.loading=false
                    this.field=res.data.data
                },1000)
                
            })
            .catch(err =>  {
                console.log(err.response)
            })
        },
        methods: {
            
            UpdateEmployee(){
                this.loading=true
                let formData  = new FormData()
                formData.append("id", this.field.id)
                formData.append("name", this.field.name)
                formData.append("email", this.field.email)
                formData.append("gender", this.field.gender)
                formData.append("nip", this.field.nip)
                formData.append("photo", this.field.photo)
                formData.append("hoby", this.field.hoby)
                const config = {

                    headers: { 'content-type': 'multipart/form-data' }

                }
                this.axios.put(`/api/v1/employee/${this.field.id}`, {
                    id: this.field.id,
                    name: this.field.name,
                    email: this.field.email,
                    gender:  this.field.gender,
                    nip: this.field.nip,
                    photo: this.field.photo,
                    hoby: this.field.hoby
                })
                .then((res) => {
                    this.loading=false
                    console.log(res.data)

                    this.$swal(
                      'Updated!',
                      res.data.message,
                      'success'
                      )

                    setTimeout(() => {
                        this.$router.push({
                            path: `/detail/${res.data.data.id}`
                        })
                    },1000)

                })
                .catch((err) => {
                    console.log(err.response)
                    this.loading=false
                    this.validation = err.response.data
                })
            },

            fileImage(event){   
              this.field.photo = event.target.files[0];  
              this.field.photo = URL.createObjectURL(event.target.files[0]);
            },

            ChangeHoby(e){
            this.field.hoby = e.target.value
                // console.log(e.target.value)
            }
        }
    }
</script>