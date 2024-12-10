<!-- layouts/AuthenticatedLayout.vue -->
<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <!-- Logo -->
                    <div class="flex">
                        <router-link :to="{ name: 'home' }" class="flex items-center">
                            Home
                        </router-link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:flex">
                        <router-link
                            v-for="link in navigation"
                            :key="link.name"
                            :to="{ name: link.route }"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 focus:outline-none transition"
                            :class="[$route.name === link.route ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700']"
                        >
                            {{ link.name }}
                        </router-link>
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="flex items-center">
                        <button @click="logout" class="text-sm text-gray-500 hover:text-gray-700">
                            Cerrar sesión
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            navigation: [
                { name: 'Estudiantes', route: 'students' },
                { name: 'Cursos', route: 'courses' },
                { name: 'Calificaciones', route: 'grades' }
            ]
        }
    },
    methods: {
        async logout() {
            try {
                await axios.post('/logout')
                window.location.href = '/login'
            } catch (error) {
                console.error('Error durante el logout:', error)
            }
        }
    }
}
</script>
