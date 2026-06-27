import api from './client'

const RESOURCE = '/usuarios'

// Operaciones CRUD sobre el recurso /usuarios.
export const usuariosApi = {
  list: (params = {}) => api.get(RESOURCE, { params }).then((r) => r.data),
  get: (id) => api.get(`${RESOURCE}/${id}`).then((r) => r.data.data),
  create: (payload) => api.post(RESOURCE, payload).then((r) => r.data.data),
  update: (id, payload) => api.put(`${RESOURCE}/${id}`, payload).then((r) => r.data.data),
  remove: (id) => api.delete(`${RESOURCE}/${id}`).then(() => undefined),
}

export default usuariosApi