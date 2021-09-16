<template>
    <div class="container">

        <div class="card">
            <div class="card-header">
                Add new Employees
            </div>
            <div class="card-body">

                <form autocomplete="off"
                    v-on:submit.prevent="createEmployee">
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
                            class="btn btn-success">
                            Add
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
    methods: {
        createEmployee() {
            // console.log(this.employee);
            let data = {
                name: this.employee.name,
                email: this.employee.email
            }

            let url = 'http://localhost:8888/employees/?create=1';
            fetch(url, {
                method: 'POST',
                body: JSON.stringify(data)
            })
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