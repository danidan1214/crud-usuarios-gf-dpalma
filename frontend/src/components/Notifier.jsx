import { Alert, Snackbar } from '@mui/material'

export default function Notifier({ notification, onClose }) {
  return (
    <Snackbar
      open={Boolean(notification)}
      autoHideDuration={4000}
      onClose={onClose}
      anchorOrigin={{ vertical: 'bottom', horizontal: 'center' }}
    >
      {notification ? (
        <Alert
          onClose={onClose}
          severity={notification.severity}
          variant="filled"
          elevation={6}
        >
          {notification.message}
        </Alert>
      ) : undefined}
    </Snackbar>
  )
}