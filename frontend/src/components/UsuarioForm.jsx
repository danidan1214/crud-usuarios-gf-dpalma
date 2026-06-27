import { useEffect, useState } from 'react'
import {
  Button,
  CircularProgress,
  Dialog,
  DialogActions,
  DialogContent,
  DialogTitle,
  Grid,
  MenuItem,
  TextField,
} from '@mui/material'

import { USUARIO_FIELDS, buildEmptyUsuario } from '../config/usuarioFields'
import { validateUsuario } from '../utils/validation'

export default function UsuarioForm({
  open,
  mode = 'create',
  initialValues,
  loading = false,
  serverErrors = null,
  onClose,
  onSubmit,
}) {
  const [values, setValues] = useState(buildEmptyUsuario())
  const [errors, setErrors] = useState({})

  // Reinicia el formulario cada vez que se abre.
  useEffect(() => {
    if (open) {
      setValues(initialValues ?? buildEmptyUsuario())
      setErrors({})
    }
  }, [open, initialValues])

  useEffect(() => {
    if (serverErrors) setErrors((prev) => ({ ...prev, ...serverErrors }))
  }, [serverErrors])

  const handleChange = (name) => (event) => {
    const { value } = event.target
    setValues((prev) => ({ ...prev, [name]: value }))
    setErrors((prev) => ({ ...prev, [name]: undefined }))
  }

  const handleSubmit = (event) => {
    event.preventDefault()
    const validation = validateUsuario(values)
    if (Object.keys(validation).length > 0) {
      setErrors(validation)
      return
    }

    // Los opcionales vacíos se envían como null.
    const payload = { ...values }
    USUARIO_FIELDS.forEach((field) => {
      if (!field.required && String(payload[field.name] ?? '').trim() === '') {
        payload[field.name] = null
      }
    })
    onSubmit(payload)
  }

  const isEdit = mode === 'edit'

  return (
    <Dialog open={open} onClose={onClose} maxWidth="md" fullWidth>
      <form onSubmit={handleSubmit} noValidate>
        <DialogTitle>{isEdit ? 'Editar usuario' : 'Nuevo usuario'}</DialogTitle>
        <DialogContent>
          <Grid container spacing={2} sx={{ mt: 0 }}>
            {USUARIO_FIELDS.map((field) => (
              <Grid key={field.name} size={field.grid}>
                <TextField
                  id={field.name}
                  name={field.name}
                  label={field.label}
                  value={values[field.name] ?? ''}
                  onChange={handleChange(field.name)}
                  error={Boolean(errors[field.name])}
                  helperText={errors[field.name] ?? ''}
                  required={field.required}
                  type={field.type === 'select' ? 'text' : field.type}
                  select={field.type === 'select'}
                  fullWidth
                  margin="normal"
                  slotProps={
                    field.type === 'date'
                      ? { inputLabel: { shrink: true } }
                      : undefined
                  }
                >
                  {field.type === 'select'
                    ? field.options.map((option) => (
                        <MenuItem key={option.value} value={option.value}>
                          {option.label}
                        </MenuItem>
                      ))
                    : null}
                </TextField>
              </Grid>
            ))}
          </Grid>
        </DialogContent>
        <DialogActions>
          <Button onClick={onClose} disabled={loading}>
            Cancelar
          </Button>
          <Button
            type="submit"
            variant="contained"
            disabled={loading}
            startIcon={loading ? <CircularProgress size={18} /> : null}
          >
            {isEdit ? 'Guardar cambios' : 'Crear usuario'}
          </Button>
        </DialogActions>
      </form>
    </Dialog>
  )
}