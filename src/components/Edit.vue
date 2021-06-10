<template>
    <div class="container">

        <div class="card">
            <div class="card-header">
                Edit Employees
            </div>
            <div class="card-body">

                <form autocomplete="off"
                    v-on:submit.prevent="addEmployee">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" 
                            class="form-control" 
                            name="name" 
                            id="name"
                            aria-describedby="helpId"
                            placeholder="Name"
                            required
                            v-model="employee.name">
                        <small id="helpId" 
                            class="form-text text-muted">
                            Write employee's name
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" 
                            class="form-control" 
                            name="email" 
                            id="email"
                            aria-describedby="helpId"
                            placeholder="Email"
                            required
                            v-model="employee.email">
                        <small id="helpId" 
                            class="form-text text-muted">
                            Write employee's email
                        </small>
                    </div>
                    <div class="btn-group"
                        role="group"
                        aria-label="">
                        <button type="submit" 
                            class="btn btn-success"
                            v-on:click="updateEmployee()">
                            Modificar
                        </button>
                        <router-link :to="{name: 'List'}" 
                            class="btn btn-danger">
                            Cancel
                        </router-link>
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
            employee: {}
        }
    },
    created: function() {
        this.getEmployeeForId();
    },
    methods: {
        getEmployeeForId() {
            let url = 'http://localhost:8888/employees/?get=' + this.$route.params.id;
            fetch(url)
                .then(response => response.json())
                .then(dataResponse => {
                    console.log(dataResponse);
                    this.employee = dataResponse[0];
                })
                .catch(console.log);
        },
        updateEmployee() {
            let data = {
                id_employee: this.$route.params.id,
                name: this.employee.name,
                email: this.employee.email
            }

            let url = 'http://localhost:8888/employees/?update=' + this.$route.params.id;
            fetch(url, {
                method: 'POST',
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(dataResponse => {
                    console.log(dataResponse);
                    window.location.href = '../list';
                    
                })
                .catch(console.log);
        }
    }
}
</script>