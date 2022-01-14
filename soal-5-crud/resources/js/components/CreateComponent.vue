<template>
    <div>
        <h3 class="text-center">Create New Employee</h3>

   <!--      <pre>
            {{field}}
        </pre>
 -->

        <div class="row justify-content-center">
            <div class="col-lg-12 col-xs-12 col-sm-12">

                <form @submit.prevent="AddEmployee" enctype="multipart/form-data">
                    <div class="row g-5">
                      <div class="col-sm-8 col-md-8">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="field.name" name="name">
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
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" v-model="field.gender" value="W">
                                    <label class="form-check-label">
                                        <font-awesome-icon icon="female" class="fs-3"/>
                                    </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" v-model="field.gender" value="P">
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
                            <select @change="ChangeHoby($event)" class="form-select" aria-label="Default select example" name="hoby">
                              <option selected>Select Hoby</option>
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
                              <div class="mb-3">
                                  <label for="photo" class="form-label">Upload Photo</label>
                                  <input class="form-control form-control-sm" id="photo" name="photo" type="file" @change="fileImage">
                              </div>
                          </div>
                          <img :src="field.preview" width="150" class="img-fluid rounded-pill circle">

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
                            Create New Employee
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
        data() {
            return {
                field: {},
                validation: [],
                loading: null
            }
        },
        methods: {
           AddEmployee(){
            this.loading=true
            let formData  = new FormData()
            formData.append("name", this.field.name)
            formData.append("email", this.field.email)
            formData.append("gender", this.field.gender)
            formData.append("nip", this.field.nip)
            formData.append("photo", this.field.photo)
            formData.append("hoby", this.field.hoby)
            const config = {

                headers: { 'content-type': 'multipart/form-data' }

            }
            this.axios.post('/api/v1/employee', formData, config)
                .then((res) => {
                    this.loading=false
                    // console.log(res.data)

                    this.$swal(
                      'Created!',
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
              this.field.preview = URL.createObjectURL(event.target.files[0]);
            },

            ChangeHoby(e){
            this.field.hoby = e.target.value
                // console.log(e.target.value)
            }
        }
    }
</script>