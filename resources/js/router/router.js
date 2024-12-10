// router/index.js
import { createRouter, createWebHistory } from 'vue-router'
import axios from 'axios'

// Definimos un layout principal para las rutas autenticadas
import AuthenticatedLayout from '../layouts/AuthenticatedLayout.vue'

const routes = [
    {
        path: '/login',
        name: 'login',
        component: () => import('../pages/Login/index.vue'),
        meta: { requiresAuth: false }
    },
    {
        // Todas las rutas autenticadas estarán dentro de este grupo
        path: '/',
        component: AuthenticatedLayout,
        meta: { requiresAuth: true },
        children: [
            {
                path: '',
                name: 'home',
                component: () => import('../pages/Home/index.vue'),
            },
            {
                path: 'students',
                name: 'students',
                component: () => import('../pages/Students/index.vue')
            },
            {
                path: 'courses',
                name: 'courses',
                component: () => import('../pages/Courses/index.vue')
            },
            {
                path: 'grades',
                name: 'grades',
                component: () => import('../pages/Grades/index.vue')
            }
        ]
    }
]

export const router = createRouter({
    history: createWebHistory(),
    routes
})

// Esta función verifica la autenticación consultando a Jetstream
async function isAuthenticated() {
    try {
        const response = await axios.get('/api/user')
        return !!response.data
    } catch {
        return false
    }
}

router.beforeEach(async (to, from, next) => {
    const authenticated = await isAuthenticated()

    if (to.meta.requiresAuth && !authenticated) {
        window.location.href = '/login'
        return
    }

    if (to.path === '/login' && authenticated) {
        next('/')
        return
    }

    next()
})

