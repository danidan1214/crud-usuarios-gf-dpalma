# PruebaGF — CRUD de usuarios

Prueba técnica: un CRUD de usuarios con backend en Laravel (API REST) y frontend
en React con Material UI. Todo levanta con Docker Compose.

## Composición

El repositorio tiene dos aplicaciones y la base de datos, orquestadas con Docker
Compose:

- **backend/** — API REST con Laravel 13 (PHP 8.4) servida por FrankenPHP sobre
  Caddy. Expone los endpoints del recurso `usuarios`.
- **frontend/** — SPA con React 19, Vite 8 y Material UI 7. Consume la API.
- **db** — PostgreSQL 15.

El frontend no configura CORS: en desarrollo el proxy de Vite pasa las peticiones
`/api` al backend, así que navegador y API hablan al mismo origen.

## Requisitos

- Docker
- Docker Compose

Con eso basta. Las dependencias de PHP (Composer) y de Node (npm) se instalan
dentro de los contenedores al levantar.

## Cómo levantar

Desde la raíz del proyecto:

```bash
docker compose up -d --build
```

El `--build` importa la primera vez y cada vez que cambie el `Dockerfile` o el
`docker-entrypoint.sh`, porque el entrypoint se hornea dentro de la imagen (no lo
sobreescribe el volumen que monta el código).

Al levantar, el contenedor del backend hace esto solo:

1. Copia `.env.example` a `.env` si no existe.
2. Instala las dependencias de Composer si falta `vendor/autoload.php`.
3. Genera la `APP_KEY` si no tiene un valor válido.
4. Espera a la base de datos y corre las migraciones.

Luego carga los datos de prueba (esto sí hay que hacerlo a mano):

```bash
docker compose exec backend php artisan db:seed
```

Cuando termine, quedan disponibles:

- Frontend: http://localhost:5173
- API: http://localhost:8000/api/usuarios
- Health de la API: http://localhost:8000/api/health
- Health de Laravel: http://localhost:8000/up

## Variables de entorno

Cada app trae su `.env.example`. Para desarrollo con Docker no hace falta
copiarlos a mano: el entrypoint del backend crea el `.env` y el frontend usa
`VITE_API_URL=/api` por defecto, que es lo que necesita el proxy de Vite.

Si se cambia alguna variable del backend, hay que recrear el contenedor:

```bash
docker compose up -d
```

## Endpoints de la API

Prefijo `/api`. Rutas del recurso `usuarios`:

| Método  | Ruta                 | Acción            |
|---------|----------------------|-------------------|
| GET     | /api/usuarios        | Listar usuarios   |
| POST    | /api/usuarios        | Crear usuario     |
| GET     | /api/usuarios/{id}   | Ver un usuario    |
| PUT     | /api/usuarios/{id}   | Actualizar usuario|
| DELETE  | /api/usuarios/{id}   | Eliminar usuario  |

Además `GET /api/health` devuelve un JSON simple para confirmar que la API
responde.

## Datos de prueba

El seeder crea algunos usuarios base y otros generados con la factory. Se puede
repetir sin problema porque los usuarios base se crean con `firstOrCreate`.

Si se quiere partir de cero:

```bash
docker compose exec backend php artisan migrate:fresh --seed
```

## Script SQL

En `backend/database/sql/PruebaGF.sql` está el script SQL con el esquema y los
datos de prueba, listo para ejecutarse directo sobre PostgreSQL sin pasar por
Laravel (por ejemplo, para revisión rápida o importarlo a mano).

## Comandos útiles

```bash
# ver logs del backend
docker compose logs -f backend

# entrar al contenedor del backend
docker compose exec backend sh

# reiniciar todo desde cero (contenedores, imagen y volumen de la base)
docker compose down -v
docker compose up -d --build

# correr el frontend sin Docker (si se quiere desarrollar fuera de los contenedores)
cd frontend
npm install
npm run dev
```

## Estructura

```
.
├── backend/        API Laravel + FrankenPHP
├── frontend/       SPA React + Vite + Material UI
└── docker-compose.yml
```

El backend sigue la estructura estándar de Laravel: controladores en
`app/Http/Controllers`, form requests en `app/Http/Requests`, recursos en
`app/Http/Resources`, modelo y migración en `app/Models` y `database/migrations`,
seeder y factory en `database/seeders` y `database/factories`.

El frontend separa la pantalla contenedora (`src/pages`) de los componentes
presentacionales (`src/components`), la configuración de campos del formulario
(`src/config`), las validaciones (`src/utils`) y el cliente HTTP
(`src/api`).