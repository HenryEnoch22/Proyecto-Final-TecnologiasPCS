<script>
import axios from "axios";
import InputComponent from "../InputComponent/InputComponent.vue";
import ButtonComponent from "../ButtonComponent/ButtonComponent.vue";

export default {
    components: {ButtonComponent, InputComponent},
    data() {
        return {
            form: {
                email: '',
                password: '',
                remember: false
            },
            processing: false,
            error: null
        }
    },
    methods: {
        async handleLogin() {
            this.processing = true
            this.error = null

            try {
                // await axios.post('/sanctum/csrf-cookie').then(() => {
                // })
                await axios.post('/login', this.form)
                // window.location.href = '/'
                this.$router.push('/')
            } catch (error) {
                this.error = error.response?.data?.message || 'Error al iniciar sesión'
            } finally {
                this.processing = false
            }
        }
    }
}

</script>

<template>
    <form @submit.prevent="handleLogin" class="card shadow-lg mx-auto p-4" method="post">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Inicia sesión :)</h2>
            </div>

            <div v-if="error" class=" error-container mb-4 text-sm text-red-600">
                {{ error }}
            </div>

<!--            <input placeholder="Correo" type="email" name="email">
            <input placeholder="*********" type="password" name="password">
            <button type="submit">Enviar</button>-->

            <div class="mb-3">
                <input-component
                    :is-required="true"
                    input-type="email"
                    label-text="Correo electrónico"
                    placeholder="fulanito@email.com"
                    v-model="form.email"
                />
            </div>
            <div class="mb-3">
                <input-component
                    :is-required="true"
                    input-type="password"
                    label-text="Contraseña"
                    placeholder="********"
                />
            </div>

            <button-component
                hierarchy="primary"
                type-button="submit"
                text="Iniciar sesión"
                class="w-100"
            />

        </div>
    </form>
</template>

<style scoped>
.card {
    width: 90%;
    max-width: 500px;
    border-radius: 1rem;
    border: none;
}

.error-container {
    width: 90%;
    max-width: 500px;
    border-radius: 1rem;
    border: none;
    color: red;
}
</style>
