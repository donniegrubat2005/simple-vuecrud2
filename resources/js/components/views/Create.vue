<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Employee</h4>
                    </div>

                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="firstname" id="firstname" v-model="employee.firstname" v-validate="'required'" class="form-control">
                                <span class="error" v-if="errors.has('firstname')">{{errors.first('firstname')}}</span>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lastname" id="lastname" v-model="employee.lastname" v-validate="'required'" class="form-control">
                                <span class="error" v-if="errors.has('lastname')">{{errors.first('lastname')}}</span>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" id="address" v-model="employee.address" v-validate="'required'" class="form-control">
                                <span class="error" v-if="errors.has('address')">{{errors.first('address')}}</span>
                            </div>
                            <button type="button" class="btn btn-primary" @click="saveEmployee">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {

         return {
             employee: {
                 firstname: '',
                 lastname: '',
                 address: ''
             },
             error: {}
         }
        },

        methods: {

            saveEmployee() {
                this.$validator.validateAll()
                axios.post('/employees',this.$data.employee).then((response)=> {
                   this.$router.push({name: 'home'});
                })
                    .catch((error) => this.error = error.response.data.error)
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>

<style>
    .error {
        color: red;
    }
</style>
