// boot/axios.js
import axios from 'axios'

// Configuración para CSRF y cookies
axios.defaults.withCredentials = true
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const token = document.head.querySelector('meta[name="csrf-token"]')
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
}

// Interceptor para manejar errores de autenticación
axios.interceptors.response.use(
    response => response,
    error => {
        if ([401, 419].includes(error.response?.status)) {
            window.location.href = '/login'
        }
        return Promise.reject(error)
    }
)

export default axios
