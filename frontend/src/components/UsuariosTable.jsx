import {
  IconButton,
  Paper,
  Table,
  TableBody,
  TableCell,
  TableContainer,
  TableHead,
  TableRow,
  Typography,
} from '@mui/material'
import DeleteOutlineIcon from '@mui/icons-material/DeleteOutline'
import EditOutlinedIcon from '@mui/icons-material/EditOutlined'

import { ESTADO_CIVIL_OPTIONS, SEXO_OPTIONS } from '../config/usuarioFields'

const ESTADO_CIVIL_LABELS = Object.fromEntries(
  ESTADO_CIVIL_OPTIONS.map((o) => [o.value, o.label])
)
const SEXO_LABELS = Object.fromEntries(SEXO_OPTIONS.map((o) => [o.value, o.label]))

const COLUMNS = [
  { key: 'identificacion', label: 'Identificación' },
  { key: 'nombre_usuario', label: 'Usuario' },
  { key: 'nombre_completo', label: 'Nombre completo' },
  { key: 'correo_personal', label: 'Correo' },
  { key: 'estado_civil', label: 'Estado civil' },
  { key: 'sexo', label: 'Sexo' },
]

export default function UsuariosTable({ usuarios = [], loading = false, onEdit, onDelete }) {
  const renderCell = (column, usuario) => {
    if (column.key === 'nombre_completo') {
      return `${usuario.nombres ?? ''} ${usuario.apellidos ?? ''}`.trim()
    }
    if (column.key === 'estado_civil') {
      return ESTADO_CIVIL_LABELS[usuario.estado_civil] ?? usuario.estado_civil
    }
    if (column.key === 'sexo') {
      return SEXO_LABELS[usuario.sexo] ?? usuario.sexo
    }
    return usuario[column.key] ?? '—'
  }

  return (
    <TableContainer component={Paper} variant="outlined">
      <Table size="small">
        <TableHead>
          <TableRow>
            {COLUMNS.map((column) => (
              <TableCell key={column.key}>{column.label}</TableCell>
            ))}
            <TableCell align="right">Acciones</TableCell>
          </TableRow>
        </TableHead>
        <TableBody>
          {loading && usuarios.length === 0 ? (
            <TableRow>
              <TableCell colSpan={COLUMNS.length + 1} align="center" sx={{ py: 6 }}>
                <Typography color="text.secondary">Cargando usuarios…</Typography>
              </TableCell>
            </TableRow>
          ) : usuarios.length === 0 ? (
            <TableRow>
              <TableCell colSpan={COLUMNS.length + 1} align="center" sx={{ py: 6 }}>
                <Typography color="text.secondary">
                  No hay usuarios registrados.
                </Typography>
              </TableCell>
            </TableRow>
          ) : (
            usuarios.map((usuario) => (
              <TableRow key={usuario.id} hover>
                {COLUMNS.map((column) => (
                  <TableCell key={column.key}>{renderCell(column, usuario)}</TableCell>
                ))}
                <TableCell align="right">
                  <IconButton size="small" color="primary" onClick={() => onEdit(usuario)} aria-label="Editar">
                    <EditOutlinedIcon fontSize="small" />
                  </IconButton>
                  <IconButton size="small" color="error" onClick={() => onDelete(usuario)} aria-label="Eliminar">
                    <DeleteOutlineIcon fontSize="small" />
                  </IconButton>
                </TableCell>
              </TableRow>
            ))
          )}
        </TableBody>
      </Table>
    </TableContainer>
  )
}