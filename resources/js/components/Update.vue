<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'>Edit Customer</div>
                    <div class='card-body'>
                        <div class="alert alert-danger" v-if="errors.length">
                            <b>Terdapat kesalahan dalam input data:</b>
                            <ul>
                                <li v-for="error in errors" :key="error">{{ error }}</li>
                            </ul>
                        </div>

                        <form @submit.prevent="updateCustomer">
                            <div class='form-group'>
                                <label htmlFor='name'>Name</label>
                                <input type="text" class="form-control" id="name" v-model="customer.name">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='email'>Email</label>
                                <input type="text" class="form-control" id="email" v-model="customer.email">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='gender'>Gender</label>
                                <div class="radio-inline">
                                    <input type="radio" id="gender" value="M" v-model="customer.gender"> Male
                                    <input type="radio" id="gender" value="F" v-model="customer.gender"> Female
                                </div>
                            </div>
                            <div class='form-group'>
                                <label htmlFor='is_married'>Married</label>
                                <div class="checkbox-inline">
                                    <input type="checkbox" id="is_married" v-model="customer.is_married"> Married
                                </div>
                            </div>
                            
                            <div class='form-group'>
                                <label htmlFor='address'>Address</label>
                                <textarea type="text" class="form-control" id="address" v-model="customer.address" rows="5"></textarea>
                            </div>
                            <div class='form-group'>
                                <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>
                                &nbsp;
                                &nbsp;
                                <button class='btn btn-primary'>Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
        return {
            customer:{},
            errors: [],
            name: null,
            email: null,
        }
    },
    created() {
        let uri = `/api/customer/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.customer = response.data.result;
        });
    },
    methods: {
        updateCustomer(e){
            
            if (this.$data.customer.name != null && this.$data.customer.email != null) {
                
                this.$swal.fire({
                    title: 'Success',
                    text: "Customer update successfully",
                    icon: 'success',
                    timer: 1000
                });
                let uri = `/api/customer/${this.$route.params.id}`;
                this.axios.put(uri, this.customer).then((response) => {
                    this.$router.push({name: 'home'});
                });
                return true;
            }


            this.errors = [];

            if (!this.name) {
                this.errors.push('Title wajib diisi !');
            }
            if (!this.email) {
                this.errors.push('Content wajib diisi !');
            }

            e.preventDefault();
        }
    }
  }
</script>