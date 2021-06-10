<template>
    <div class="container">

        <div class="card">
            <div class="card-header">
                Add new Employees
            </div>
            <div class="card-body">

                <form action="" 
                    autocomplete="off"
                    v-on:submit.prevent="addEmployee">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" 
                            class="form-control" 
                            name="name" 
                            id="name"
                            aria-describedby="helpId"
                            placeholder="Name"
                            v-model="employee.name">
                        <small id="helpId" 
                            class="form-text text-muted">
                            Escribe el nombre del empleado
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
                            v-model="employee.email">
                        <small id="helpId" 
                            class="form-text text-muted">
                            Escribe el nombre del empleado
                        </small>
                    </div>
                    <div class="btn-group"
                        role="group"
                        aria-label="">
                        <button type="submit" 
                            class="btn btn-success">
                            Add
                        </button>
                        <button type="button" 
                            class="btn btn-danger">
                            Cancel
                        </button>
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
    methods: {
        addEmployee() {
            console.log(this.employee);
        }
    }
}
</script>