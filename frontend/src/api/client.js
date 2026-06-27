import axios from 'axios'

const api = axios.create({
  baseURL: import.meta.env.VITE_API_URL || '/api',
  headers: { Accept: 'application/json' },
  timeout: 15000,
})

// Normaliza los errores para que los componentes reciban un shape estable.
api.interceptors.response.use(
  (response) => response,
  (error) => {
    const status = error.response?.status
    const data = error.response?.data
    const fieldErrors = data?.errors ?? null
    const message = data?.message || error.message || 'Ocurrió un error inesperado.'

    return Promise.reject({ status, message, fieldErrors, original: error })
  }
)

export default api