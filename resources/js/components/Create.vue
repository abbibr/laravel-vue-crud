<template>
    <div class="container mt-3">
        <h1 class="text-primary text-center mb-3 mt-2">Insert Data to DB</h1>
        <div class="row">
            <form @submit.prevent class="col-6" style="margin-left: 25%;">
                <div>
                    <label>FirstName</label>
                    <input 
                        v-model="formData.firstname"
                        type="text" 
                        class="form-control p-2"
                        name="firstname">
                </div> <br>

                <div>
                    <label>LastName</label>
                    <input
                        v-model="formData.lastname"
                        type="text" 
                        class="form-control p-2"
                        name="lastname">
                </div> <br>

                <div>
                    <label>Email</label>
                    <input
                        v-model="formData.email" 
                        type="email"
                        class="form-control p-2"
                        name="email">
                </div> <br>

                <div>
                    <label>Password</label>
                    <input
                        v-model="formData.password" 
                        type="password" 
                        class="form-control p-2"
                        name="password">
                </div> <br>

                <div>
                    <button
                        @click="createUser"
                        class="bg-primary text-white ps-3 pe-3 pt-2 pb-2 border border-primary">
                            Create
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
                formData: {
                    firstname: '',
                    lastname: '',
                    email: '',
                    password: '',
                }
            }
        },
        methods: {
            createUser() {
                axios
                    .post('/store', this.formData)
                    .then(response => {
                        console.log(response)
                        
                        this.$toast.success('Your data successfully saved.', {
                            position: 'top-right'
                        });
                    })
                    .catch(error => console.log(error))

                this.formData = {
                    firstname: '',
                    lastname: '',
                    email: '',
                    password: ''
                }
            }
        }
    }
</script>
