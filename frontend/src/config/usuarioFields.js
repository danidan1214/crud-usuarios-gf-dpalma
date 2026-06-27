export const ESTADO_CIVIL_OPTIONS = [
  { value: 'soltero', label: 'Soltero/a' },
  { value: 'casado', label: 'Casado/a' },
  { value: 'divorciado', label: 'Divorciado/a' },
  { value: 'viudo', label: 'Viudo/a' },
  { value: 'union_libre', label: 'Unión libre' },
]

export const SEXO_OPTIONS = [
  { value: 'masculino', label: 'Masculino' },
  { value: 'femenino', label: 'Femenino' },
  { value: 'otro', label: 'Otro' },
]

export const USUARIO_FIELDS = [
  { name: 'identificacion', label: 'Identificación', type: 'text', required: true, maxLength: 20, grid: { xs: 12, sm: 6 } },
  { name: 'nombre_usuario', label: 'Nombre de usuario', type: 'text', required: true, maxLength: 50, grid: { xs: 12, sm: 6 } },
  { name: 'apellidos', label: 'Apellidos', type: 'text', required: true, maxLength: 100, grid: { xs: 12, sm: 6 } },
  { name: 'nombres', label: 'Nombres', type: 'text', required: true, maxLength: 100, grid: { xs: 12, sm: 6 } },
  { name: 'fecha_nacimiento', label: 'Fecha de nacimiento', type: 'date', required: true, grid: { xs: 12, sm: 6 } },
  { name: 'celular', label: 'Celular', type: 'text', required: true, maxLength: 20, grid: { xs: 12, sm: 6 } },
  { name: 'telefono', label: 'Teléfono', type: 'text', required: false, maxLength: 20, grid: { xs: 12, sm: 6 } },
  { name: 'correo_personal', label: 'Correo personal', type: 'email', required: true, maxLength: 150, grid: { xs: 12, sm: 6 } },
  { name: 'estado_civil', label: 'Estado civil', type: 'select', required: true, options: ESTADO_CIVIL_OPTIONS, grid: { xs: 12, sm: 6 } },
  { name: 'sexo', label: 'Sexo', type: 'select', required: true, options: SEXO_OPTIONS, grid: { xs: 12, sm: 6 } },
  { name: 'direccion', label: 'Dirección / ubicación', type: 'text', required: false, maxLength: 255, grid: { xs: 12 } },
]

export const buildEmptyUsuario = () =>
  Object.fromEntries(USUARIO_FIELDS.map((field) => [field.name, '']))

export default USUARIO_FIELDS