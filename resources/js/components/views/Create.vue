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
                                <input type="text" name="firstname" id="firstname" v-model="employee.firstname" class="form-control">
                                <span v-if="errors.firstname" style="color: red">{{ errors.firstname[0] }}</span>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lastname" id="lastname" v-model="employee.lastname" class="form-control">
                                <span v-if="errors.lastname" style="color: red">{{ errors.lastname[0] }}</span>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" id="address" v-model="employee.address" class="form-control">
                                <span v-if="errors.address" style="color: red">{{ errors.address[0] }}</span>
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
             errors:{}
         }
        },

        methods: {

            saveEmployee() {
                axios.post('/employees',this.$data.employee).then((response)=> {
                   this.$router.push({name: 'home'});
                })
                    .catch((error) => this.errors = error.response.data.errors)
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>