<template>
    <div class="container mt-3">
        <h1 class="text-primary text-center mb-3 mt-2">Edit: User id - {{ $route.params.id }}</h1>
        <div class="row">
            <form @submit.prevent class="col-6" style="margin-left: 25%;">
                <div>
                    <label>FirstName</label>
                    <input 
                        v-model="user.firstname"
                        type="text" 
                        class="form-control p-2"
                        name="firstname"
                        value="firstname"
                    >
                </div> <br>

                <div>
                    <label>LastName</label>
                    <input
                        v-model="user.lastname"
                        type="text" 
                        class="form-control p-2"
                        name="lastname">
                </div> <br>

                <div>
                    <label>Email</label>
                    <input
                        v-model="user.email" 
                        type="email"
                        class="form-control p-2"
                        name="email">
                </div> <br>

                <div>
                    <button
                        @click="updateUser"
                        class="bg-primary text-white ps-3 pe-3 pt-2 pb-2 border border-primary">
                            Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {}
            }
        },
        methods: {
            getUser() {
                axios
                    .get('user/' + this.$route.params.id)
                    .then(response => {
                        console.log(response)
                        this.user = response.data.message
                    })
                    .catch(error => console.log(error))
            },
            updateUser() {
                axios
                    .post('update/' + this.$route.params.id, this.user)
                    .then(response => {
                        console.log(response)
                        
                        this.$toast.warning('Your data successfully updated.', {
                            position: 'top-right'
                        });
                    })
                    .catch(error => console.log(error))
            }
        },
        mounted() {
            this.getUser()
        }
    }
</script>
