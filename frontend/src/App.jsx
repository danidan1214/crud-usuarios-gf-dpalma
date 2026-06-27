import { AppBar, Container, Toolbar, Typography } from '@mui/material'

import UsuariosPage from './pages/UsuariosPage'

export default function App() {
  return (
    <>
      <AppBar position="sticky" color="primary">
        <Toolbar>
          <Typography variant="h6" component="h1" sx={{ flexGrow: 1 }}>
            PruebaGF · Gestión de usuarios
          </Typography>
        </Toolbar>
      </AppBar>

      <Container maxWidth="lg" sx={{ py: 4 }}>
        <UsuariosPage />
      </Container>
    </>
  )
}