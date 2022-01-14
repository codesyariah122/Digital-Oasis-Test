<template>
	<div>

		<!-- debuging -->
		<!-- <pre>
			{{employee}}
		</pre> -->

		<div class="row justify-content-center mb-5">
			<div v-if="loading" class="col-lg-12  col-xs-12 col-sm-12">
				<div class="spinner-grow text-info" style="width: 3rem; height: 3rem;" role="status">
					<span class="visually-hidden">Loading...</span>
				</div>
			</div>
			<div v-else class="col-lg-12 col-xs-12 col-sm-12">
				<div class="position-absolute top-50 start-50 translate-middle">
					<div class="card mb-3" style="max-width: 540px;">
						<div class="row g-0">
							<div v-if="employee.photo" class="col-md-4 mt-2">
								<img :src="`http://localhost:8000/storage/${employee.photo}`" class="img-fluid rounded-pill" alt="...">
							</div>
							<div v-else class="col-md-4 mt-2">
								<img v-if="employee.gender" :src="`${employee.gender === 'P' ? avatar.male : avatar.female}`" class="img-fluid rounded-pill" alt="..." width="200">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title">
										{{employee.name}}
									</h5>
									<article class="card-text">
										<ul>
											<li>
												<strong>Email : </strong> {{employee.email}}
											</li>
											<li>
												<strong>Gender : </strong> 
												<span v-if="employee.gender==='P'" class="badge bg-primary rounded-pill">
													<font-awesome-icon icon="male" />
												</span>
												<span v-else class="badge bg-success rounded-pill">
													<font-awesome-icon icon="female" />
												</span>
											</li>
											<li>
												<strong>NIP : </strong> {{employee.nip}}
											</li>
											<li>
												<strong>Hoby : </strong> {{employee.hoby}}
											</li>
										</ul>
									</article>
									<p class="card-text"><small class="text-muted">Created at
									{{$moment(employee.created_at).tz("Asia/Jakarta").format("LLLL")}}</small></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'detail',
		data(){
			return {
				employee: {},
				loading: null,
				avatar: {
					female: 'https://st3.depositphotos.com/9998432/13335/v/380/depositphotos_133352152-stock-illustration-default-placeholder-profile-icon.jpg?forcejpeg=true',
					male: 'https://www.hollywoodprimaryschool.co.uk/wp-content/uploads/male-placeholder.jpg'
				}
			}
		},

		beforeMount(){
			this.DetailEmployee()
		},

		methods: {
			DetailEmployee(){
				this.loading=true
				const id = this.$route.params.id 
				this.axios.get(`/api/v1/employee/${id}`)
				.then((res) => {
					setTimeout(() => {
						this.loading=false
						this.employee=res.data.data
					},1000)
				})
				.catch(err =>  {
					console.log(err.response)
				})
			}
		}
	}
</script>