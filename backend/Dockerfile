# syntax=docker/dockerfile:1
#
# Imagen de desarrollo para el backend Laravel de PruebaGF.
# Basada en FrankenPHP 8.x (PHP 8.4) sobre Alpine.

FROM dunglas/frankenphp:1.12.4-php8.4-alpine

LABEL org.opencontainers.image.title="PruebaGF - Backend (Laravel + FrankenPHP)"
LABEL org.opencontainers.image.description="API REST Laravel para el CRUD de usuarios"

# Extensiones de PHP necesarias para PostgreSQL y Composer
RUN apk add --no-cache \
        postgresql-dev \
        libzip-dev \
        zip \
        unzip \
    && docker-php-ext-install pdo pdo_pgsql zip

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Caddyfile para servir Laravel (docroot public + try_files hacia index.php)
COPY Caddyfile /etc/caddy/Caddyfile

# Entrypoint de desarrollo
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

WORKDIR /app

# Permisos de los directorios que Laravel necesita escribir.
# En desarrollo el codigo se monta sobre /app, por lo que esto aplica
# cuando se ejecuta el contenedor sin el volumen.
RUN mkdir -p /app/storage/logs /app/bootstrap/cache \
    && chmod -R 0777 /app/storage /app/bootstrap/cache

EXPOSE 8000

ENTRYPOINT ["docker-entrypoint"]
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]