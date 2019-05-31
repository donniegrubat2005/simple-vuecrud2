<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-md-left">List of Employee</h4>

                    </div>
                    <div class="card-body">
                       <table class="table table-responsive">
                            <table class="table table-striped">
                                   <tr>
                                       <th>First Name</th>
                                       <th>Last Name</th>
                                       <th>Address</th>
                                       <th colspan="2">Actions</th>
                                   </tr>
                                   <tbody>
                                   <tr>
                                   <tr v-for="employee ,key in employees">
                                       <td>{{ employee.firstname }}</td>
                                       <td>{{ employee.lastname }}</td>
                                       <td>{{ employee.address }}</td>
                                       <td>
                                       <router-link :to="{name: 'edit', params: { id: employee.id }}" class="btn btn-info">Edit</router-link>
                                           <a href="#" class="btn btn-secondary btn-danger" @click="deleteEmployee(key, employee.id)">Delete</a>
                                       </td>
                                   </tr>
                                   </tbody>
                               </table>
                          </table>
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
                employees: {},
                errors: []
            }
        },

        methods: {
            loadEmployees() {
                axios.get('/employees')
                    .then((response) => (this.employees = response.data))
                    .catch((error) => this.errors=error.response.data.errors)
            },

            deleteEmployee(key, id) {
                //console.log(`${key} ${id}`)
                axios.delete(`/employees/${id}`)
                    .then((response) => this.employees.splice(key,1))
                    .catch((error) => this.errors=error.response.data.errors)
            },
        },

        created() {
            this.loadEmployees();
        }
    }
</script>
