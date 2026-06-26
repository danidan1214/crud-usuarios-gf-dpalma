#!/bin/sh
set -e

cd /app

# 1) Asegurar el archivo de entorno
if [ ! -f .env ]; then
    echo ">> .env no encontrado, copiando desde .env.example"
    cp .env.example .env
fi

# 2) Instalar dependencias de Composer si hace falta
if [ ! -f vendor/autoload.php ]; then
    echo ">> Instalando dependencias de Composer..."
    composer install --no-interaction --no-progress --optimize-autoloader
else
    echo ">> vendor presente, omitiendo composer install"
fi

# 3) Generar la APP_KEY solo si no tiene un valor base64 valido.
#    (En entorno local key:generate sobrescribe la key existente.)
if ! grep -q '^APP_KEY=base64:' .env 2>/dev/null; then
    echo ">> Generando APP_KEY..."
    php artisan key:generate
else
    echo ">> APP_KEY presente, se mantiene"
fi

# 4) Esperar a la base de datos y correr migraciones
i=0
until php artisan migrate --force --no-interaction; do
    i=$((i + 1))
    if [ "$i" -ge 15 ]; then
        echo ">> La base de datos no esta disponible, abortando."
        exit 1
    fi
    echo ">> Esperando la base de datos... (intento $i)"
    sleep 3
done

# 5) Lanzar FrankenPHP (o el comando que se pase)
exec "$@"