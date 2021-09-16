<template>

    <div class="container">

        <router-link to="/create" class="btn btn-success mb-4">Create Employee</router-link>

        <div class="card">
            <div class="card-header">
                Employees
            </div>
            <div class="card-body">

                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(employee, index) in employees" :key="index">
                            <th scope="row">{{ index + 1 }}</th>
                            <td>{{ employee.id_employee }}</td>
                            <td>{{ employee.name }}</td>
                            <td>{{ employee.email }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <router-link :to="{name: 'Edit', params: {id: employee.id_employee}}"
                                        class="btn btn-info">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </router-link>
                                    <button type="button" 
                                        class="btn btn-danger"
                                        v-on:click="deleteEmployee(employee.id_employee)">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        
    </div>

</template>

<script>
export default {
    data() {
        return {
            employees: [],
        }
    },
    created: function() {
        this.getEmployees();
    },
    methods: {
        getEmployees() {
            let url = 'http://localhost:8888/employees/';
            fetch(url)
                .then((response) => response.json())
                .then((dataResponse) => {
                    console.log(dataResponse);
                    this.employees = [];
                    if (typeof dataResponse[0].success === 'undefined') {
                        this.employees = dataResponse;
                    }
                })
                .catch(console.log);
        },
        deleteEmployee(id_employee) {
            let url = 'http://localhost:8888/employees/?delete=' + id_employee;
            fetch(url)
                .then((response) => response.json())
                .then((dataResponse) => {
                    console.log(dataResponse);
                    window.location.href = 'list';
                })
                .catch(console.log);
        }
    }
}
</script>