<template>
    <div class="container">
        <h1 class="text-primary text-center mb-3 mt-2">Get Data from DB using Axios</h1>
        <button @click="$router.push('/create')" class="btn btn-success pt-2 pb-2 mb-2">Create User</button>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            <tbody v-for="(user, index) in users" :key="user.id">
                <tr>
                    <td>{{ index + 1 }}</td>
                    <td>{{ user.firstname }}</td>
                    <td>{{ user.lastname }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <router-link :to="{ name: 'edit', params: {id: user.id} }" class="btn btn-info">
                            Edit
                        </router-link> &nbsp;
                        <button @click="deleteUser(user.id)" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: []
            }
        },
        methods: {
            getData() {
                axios
                    .get('/index')
                    .then(response => {
                        console.log(response)
                        this.users = response.data.message
                    })
                    .catch(error => console.log(error))
            },
            deleteUser(id) {
                console.log(id)
                axios
                    .post('/destroy/' + id)
                    .then(response => {
                        this.getData()
                        console.log(response)

                        this.$toast.error('Your data successfully deleted.', {
                            position: 'top-right'
                        });
                    })
                    .catch(error => console.log(error))
            }
        },
        mounted() {
            this.getData()
        }
    }
</script>
