import { USUARIO_FIELDS } from '../config/usuarioFields'

const EMAIL_RE = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
const PHONE_RE = /^[0-9+\-\s()]+$/

// Reglas espejando las del backend.
export function validateUsuario(values) {
  const errors = {}
  const today = new Date().toISOString().slice(0, 10)

  for (const field of USUARIO_FIELDS) {
    const value = values[field.name]
    const isEmpty = value === undefined || value === null || String(value).trim() === ''

    if (field.required && isEmpty) {
      errors[field.name] = 'Este campo es obligatorio.'
      continue
    }
    if (isEmpty) continue

    if (field.maxLength && String(value).length > field.maxLength) {
      errors[field.name] = `Máximo ${field.maxLength} caracteres.`
      continue
    }

    if (field.type === 'email' && !EMAIL_RE.test(value)) {
      errors[field.name] = 'Ingresa un correo válido.'
      continue
    }

    if (field.name === 'fecha_nacimiento') {
      if (Number.isNaN(Date.parse(value))) {
        errors[field.name] = 'Fecha inválida.'
      } else if (String(value) >= today) {
        errors[field.name] = 'La fecha debe ser anterior a hoy.'
      }
      continue
    }

    if ((field.name === 'celular' || field.name === 'telefono') && !PHONE_RE.test(value)) {
      errors[field.name] = 'Solo dígitos, espacios y los símbolos + - ( ).'
    }
  }

  return errors
}

export default validateUsuario