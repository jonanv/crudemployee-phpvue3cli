<template>
    <div>

        <div v-for="employee in employees" :key="employee.id_employee">
            <div>{{ employee.id_employee }}</div>
            <div>{{ employee.name }}</div>
            <div>{{ employee.email }}</div>
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