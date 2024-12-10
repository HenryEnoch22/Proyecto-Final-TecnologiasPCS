<!-- pages/Login/index.vue -->
<script>
import axios from 'axios'
import LoginCard from "../../components/LoginCard/LoginCard.vue";

export default {
    components: {LoginCard},
}
</script>

<template>
<!--    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div v-if="error" class="mb-4 text-sm text-red-600">
                {{ error }}
            </div>

            <form @submit.prevent="handleLogin">
                <div>
                    <label class="block font-medium text-sm text-gray-700">
                        Email
                    </label>
                    <input
                        v-model="form.email"
                        type="email"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    >
                </div>

                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700">
                        Contraseña
                    </label>
                    <input
                        v-model="form.password"
                        type="password"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    >
                </div>

                <div class="mt-4">
                    <label class="flex items-center">
                        <input
                            type="checkbox"
                            v-model="form.remember"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        >
                        <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button
                        type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                        :disabled="processing"
                    >
                        {{ processing ? 'Iniciando sesión...' : 'Iniciar sesión' }}
                    </button>
                </div>
            </form>
        </div>
    </div>-->
    <div class="login-container min-vh-100 d-flex align-items-center">
        <login-card />
    </div>
</template>

<style scoped>
.login-container {
    background-image: url('/wave.svg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
</style>


