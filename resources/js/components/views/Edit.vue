<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Employee</h4>
                    </div>

                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="firstname" id="firstname" v-model="employee.firstname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lastname" id="lastname" v-model="employee.lastname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" id="address" v-model="employee.address" class="form-control">
                            </div>
                            <button type="button" class="btn btn-primary" @click="updateEmployee">Update</button>
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
             employee: {},
             error: {}
         }
        },

        methods: {
            updateEmployee() {
                let uri = '/employees/' + this.$route.params.id;
                axios.patch(uri, this.employee)
                    .then((response) => {
                        this.employee = response.data;
                        this.$router.push({name: 'home'});
                    })
                    .catch((error) => this.error = error.response.data.error)
            }
        },
        created() {
            let uri = '/employees/'+this.$route.params.id+'/edit';
            axios.get(uri)
                .then((response) => {
                this.employee = response.data;
            })
                .catch((error) => this.errors=error.response.data.errors)
        }
    }
</script>