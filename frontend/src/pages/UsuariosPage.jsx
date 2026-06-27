import { useCallback, useEffect, useState } from 'react'
import { Box, Button, Typography } from '@mui/material'
import AddIcon from '@mui/icons-material/Add'

import { usuariosApi } from '../api/usuarios'
import { buildEmptyUsuario } from '../config/usuarioFields'
import UsuariosTable from '../components/UsuariosTable'
import UsuarioForm from '../components/UsuarioForm'
import ConfirmDialog from '../components/ConfirmDialog'
import Notifier from '../components/Notifier'

export default function UsuariosPage() {
  const [usuarios, setUsuarios] = useState([])
  const [loading, setLoading] = useState(true)

  const [formOpen, setFormOpen] = useState(false)
  const [formMode, setFormMode] = useState('create')
  const [formInitial, setFormInitial] = useState(buildEmptyUsuario())
  const [formLoading, setFormLoading] = useState(false)
  const [serverErrors, setServerErrors] = useState(null)

  const [toDelete, setToDelete] = useState(null)
  const [deleting, setDeleting] = useState(false)

  const [notification, setNotification] = useState(null)

  const notify = useCallback((severity, message) => {
    setNotification({ severity, message })
  }, [])

  const fetchUsuarios = useCallback(async () => {
    setLoading(true)
    try {
      const response = await usuariosApi.list()
      setUsuarios(response.data ?? [])
    } catch (error) {
      notify('error', error.message ?? 'No se pudo cargar la lista de usuarios.')
    } finally {
      setLoading(false)
    }
  }, [notify])

  useEffect(() => {
    fetchUsuarios()
  }, [fetchUsuarios])

  const openCreate = () => {
    setServerErrors(null)
    setFormInitial(buildEmptyUsuario())
    setFormMode('create')
    setFormOpen(true)
  }

  const openEdit = (usuario) => {
    setServerErrors(null)
    setFormInitial({ ...usuario })
    setFormMode('edit')
    setFormOpen(true)
  }

  const closeForm = () => {
    if (formLoading) return
    setFormOpen(false)
    setServerErrors(null)
  }

  const handleFormSubmit = async (payload) => {
    setFormLoading(true)
    setServerErrors(null)
    try {
      if (formMode === 'create') {
        await usuariosApi.create(payload)
        notify('success', 'Usuario creado correctamente.')
      } else {
        await usuariosApi.update(formInitial.id, payload)
        notify('success', 'Usuario actualizado correctamente.')
      }
      setFormOpen(false)
      await fetchUsuarios()
    } catch (error) {
      // Errores de validación del backend (422): se muestran por campo.
      if (error.status === 422 && error.fieldErrors) {
        setServerErrors(error.fieldErrors)
      } else {
        notify('error', error.message ?? 'No se pudo guardar el usuario.')
      }
    } finally {
      setFormLoading(false)
    }
  }

  const handleConfirmDelete = async () => {
    if (!toDelete) return
    setDeleting(true)
    try {
      await usuariosApi.remove(toDelete.id)
      notify('success', 'Usuario eliminado correctamente.')
      setToDelete(null)
      await fetchUsuarios()
    } catch (error) {
      notify('error', error.message ?? 'No se pudo eliminar el usuario.')
    } finally {
      setDeleting(false)
    }
  }

  return (
    <Box>
      <Box sx={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', mb: 2 }}>
        <Typography variant="h5" component="h2">Usuarios</Typography>
        <Button variant="contained" startIcon={<AddIcon />} onClick={openCreate}>
          Nuevo usuario
        </Button>
      </Box>

      <UsuariosTable
        usuarios={usuarios}
        loading={loading}
        onEdit={openEdit}
        onDelete={setToDelete}
      />

      <UsuarioForm
        open={formOpen}
        mode={formMode}
        initialValues={formInitial}
        loading={formLoading}
        serverErrors={serverErrors}
        onClose={closeForm}
        onSubmit={handleFormSubmit}
      />

      <ConfirmDialog
        open={Boolean(toDelete)}
        title="Eliminar usuario"
        description={
          toDelete
            ? `¿Seguro que deseas eliminar a "${toDelete.nombre_usuario}"? Esta acción no se puede deshacer.`
            : ''
        }
        confirmText="Eliminar"
        loading={deleting}
        onConfirm={handleConfirmDelete}
        onClose={() => !deleting && setToDelete(null)}
      />

      <Notifier notification={notification} onClose={() => setNotification(null)} />
    </Box>
  )
}