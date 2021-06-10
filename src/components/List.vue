<template>

    <div class="container">

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
                        <tr v-for="(employee) in employees" :key="employee.id_employee">
                            <th scope="row">1</th>
                            <td>{{ employee.id_employee }}</td>
                            <td>{{ employee.name }}</td>
                            <td>{{ employee.email }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </button>
                                    <button type="button" class="btn btn-danger">
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
                .then(response => response.json())
                .then(dataResponse => {
                    console.log(dataResponse);
                    this.employees = [];
                    if (typeof dataResponse[0].success === 'undefined') {
                        this.employees = dataResponse;
                    }
                })
                .catch(console.log);
        }
    }
}
</script>